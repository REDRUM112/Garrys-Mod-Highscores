Highscores.Logs = {}

local queue = {}
local db = nil


function Highscores.AddLog( sqltype, log )
	Highscores.Logs[#Highscores.Logs+1] = {os.date(), "[Highscores by REDRUM]: "..log}
	ServerLog("[Highscores by REDRUM]: "..log.."\n")
end

concommand.Add( "highscores_logs", function( ply, cmd, args )
	if IsValid(ply) then return end
	print("Highscores Logs:")
	for i=1,#Highscores.Logs do
		print(unpack(Highscores.Logs[i]))
	end
end )



	require('mysqloo')
	
	if not mysqloo then
		Highscores.AddLog("MySQL", "MySQLoo is not installed.")
		return nil
	end

	db = mysqloo.connect(Highscores.Config.MySQL.Server == "localhost" and "127.0.0.1" or Highscores.Config.MySQL.Server, Highscores.Config.MySQL.Username, Highscores.Config.MySQL.Password, Highscores.Config.MySQL.Database, Highscores.Config.MySQL.Port)
	
	function db:onConnected()
		Highscores.AddLog( "MySQL", "Connection established")

		for k, v in pairs( queue ) do
			query( v[1], v[2] )
		end
		
		queue = {}
	end

	function db:onConnectionFailed(err)
		Highscores.AddLog( "MySQL", "Connection Failed, please check your settings: " .. err)
	end

	db:connect();
	db:wait();


function Highscores.Query( str, callback )
	if db then
		local q = db:query( str )
		if not q then
			table.insert( queue, { str, callback } )
			db:connect()
			return
		end
		function q:onSuccess( data )
			callback( data )
		end
		function q:onError( err )
			if db:status() == mysqloo.DATABASE_NOT_CONNECTED then
				table.insert( queue, { str, callback } )
				db:connect()
			return end
			Highscores.AddLog( "MySQL", "Error! The query \"" .. (str or "") .. "\" failed: " .. (err or "") )
		end
		q:start();
		q:wait();
	else
		local result = sql.Query(str)
		if (sql.LastError(result) ~= nil) then
			Highscores.AddLog( "SQLite", "Error! The query \"" .. (str ~= nil and str or "") .. "\" failed: " .. (sql.LastError(result) ~= nil and sql.LastError(result) or "") )
			return
		end
		callback( result )
	end
end

function Highscores.Initialize()
	Highscores.Query("CREATE TABLE IF NOT EXISTS highscores ( steamid varchar(255) NOT NULL, name char(255) NOT NULL, kills int(32) NOT NULL, headshots int(32) NOT NULL, deaths int(32) NOT NULL, plytime int(32) NOT NULL, PRIMARY KEY (steamid) )", function(data)
		for k,v in pairs(player.GetAll()) do
			if IsValid(v) and v:IsPlayer() and not v:IsBot() then Highscores.Get(v) end
		end
		Highscores.AddLog( "MySQL", "Loaded.")
	end)
end

function Highscores.Save(ply)
	local steamid = ply:SteamID()
	local name = string.gsub(ply:GetName(), "'", "")
	if db then
		Highscores.Query("INSERT INTO `highscores` (steamid, name, kills, headshots, deaths, plytime) VALUES ('" .. steamid .. "', '" .. name .. "', '" .. ply:RSGetKills() .. "', '" .. ply:RSGetHeadshots() .. "', '" .. ply:RSGetDeaths()  .. "', '" .. ply:RSGetTotalTime() .. "') ON DUPLICATE KEY UPDATE name = VALUES(name), kills = VALUES(kills), headshots = VALUES(headshots), deaths = VALUES(deaths), plytime = VALUES(plytime)", function() end)
	else
		Highscores.Query("INSERT OR REPLACE INTO highscores (steamid, name, kills, headshots, deaths, plytime) VALUES ('" .. steamid .. "', '" .. name .. "', '" .. ply:RSGetKills() .. "', '" .. ply:RSGetHeadshots() .. "', '" .. ply:RSGetDeaths()  .. "', '" .. ply:RSGetTotalTime() .. "')", function() end)
	end
end

function Highscores.Get( ply )
	Highscores.Query("SELECT kills,headshots,deaths,plytime FROM highscores WHERE steamid = '" .. ply:SteamID() .. "'", function(data)
		if data and data[1] then
			local row = data[1]
			ply:RSSetKills(row.kills)
			ply:RSSetHeadshots(row.headshots)
			ply:RSSetDeaths(row.deaths)
			ply:RSSetTotalTime(row.plytime)
		end
	end)
end

hook.Add("ScalePlayerDamage", "Highscores.DoScaleDamage", function(ply, HitGroup)
	if IsValid(ply) then ply.ranking_getlasthitgroup = HitGroup end
end)

function Highscores.DoDeath( victim, weapon, killer ) 
	if IsValid(killer) and killer:IsPlayer() and not killer:IsBot() and killer ~= victim then

		if string.match(GetConVarString("gamemode"), "terrortown") and (Highscores.Config.TTT.Inactive or Highscores.Config.TTT.TeamKilling) and IsValid(victim) then
			local VictimIsTraitor = victim:IsActiveTraitor()
			local VictimIsDetective = victim:IsActiveDetective()
			local VictimIsInnocent = !victim:IsActiveDetective() and !victim:IsActiveTraitor()
			local KillerIsTraitor = killer:IsActiveTraitor()
			local KillerIsDetective = killer:IsActiveDetective()
			local KillerIsInnocent = (!killer:IsActiveDetective() and !killer:IsActiveTraitor())

			if GetRoundState() ~= ROUND_ACTIVE and Highscores.Config.TTT.Inactive then return end
			if VictimIsTraitor and KillerIsTraitor and Highscores.Config.TTT.TeamKilling then return end
			if VictimIsInnocent and KillerIsInnocent and Highscores.Config.TTT.TeamKilling then return end
			if VictimIsDetective and KillerIsDetective and Highscores.Config.TTT.TeamKilling then return end
			if VictimIsDetective and KillerIsInnocent and Highscores.Config.TTT.TeamKilling then return end
			if VictimIsInnocent and KillerIsDetective and Highscores.Config.TTT.TeamKilling then return end
		end

		killer:RSSetKills(killer:RSGetKills()+1)
		if IsValid(victim) and victim.ranking_getlasthitgroup and victim.ranking_getlasthitgroup == HITGROUP_HEAD then
			killer:RSSetHeadshots(killer:RSGetHeadshots()+1)
		end

	end
	
	if IsValid(victim) and victim:IsPlayer() and not victim:IsBot() then
		victim:RSSetDeaths(victim:RSGetDeaths()+1)
	end
end
hook.Add( "PlayerDeath", "Highscores.DoDeath", Highscores.DoDeath )

function Highscores.DoDisconnect( ply )
	Highscores.Save(ply)
end
hook.Add( "PlayerDisconnected", "Highscores.DoDisconnect", Highscores.DoDisconnect )

function Highscores.DoShutdown()
	if SERVER then
		for k,v in pairs(player.GetAll()) do
			if IsValid(v) and v:IsPlayer() and not v:IsBot() then Highscores.Save(v) end
		end
	end
end
hook.Add( "ShutDown", "Highscores.DoShutdown", Highscores.DoShutdown )

function Highscores.DoSpawn( ply )
	ply:RSSetJoinTime(CurTime())
	Highscores.Get( ply )
end
hook.Add( "PlayerInitialSpawn", "Highscores.DoSpawn", Highscores.DoSpawn )

function Highscores.Commands( ply, text, public )
	if string.lower( string.sub( text, 1, 5) ) == "!rank" then
		ply:SendLua("RunConsoleCommand('highscores_getrank')")
		return ""
	elseif string.lower( string.sub( text, 1, 5) ) == "/rank" then
		ply:SendLua("RunConsoleCommand('highscores_getrank')")
		return ""
	elseif string.lower( string.sub( text, 1, 11) ) == "!highscores" then
		local args = string.Split(text, " ")
		local page = tonumber(args[2])
		if page == nil or page < 1 then page = 1 end
		ply:SendLua("RunConsoleCommand('highscores_gettop', " .. page .. ")")
		return ""
	elseif string.lower( string.sub( text, 1, 11) ) == "/highscores" then
		local args = string.Split(text, " ")
		local page = tonumber(args[2])
		if page == nil or page < 1 then page = 1 end
		ply:SendLua("RunConsoleCommand('highscores_gettop', " .. page .. ")")
		return ""
	end
end
hook.Add( "PlayerSay", "Highscores.Commands", Highscores.Commands)

function SendText( pl, ... )
	local t, k, v, s
	t = { ... }
	for k,v in ipairs(t) do
		if type(v) == "table" then
			if v.r and v.g and v.b then
				t[k] = string.format( "Color(%d,%d,%d,255)", tonumber(v.r) or 255, tonumber(v.g) or 255, tonumber(v.b) or 255)
			end
		else
			t[k] = string.format( "%q", tostring(v))
		end
	end
	s = "chat.AddText( %s )"
	pl:SendLua(s:format(table.concat(t, ",")))
end

Highscores.Initialize()