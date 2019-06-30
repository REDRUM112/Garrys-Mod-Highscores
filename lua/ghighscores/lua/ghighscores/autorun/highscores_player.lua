local PlayerMeta	= FindMetaTable("Player")

function PlayerMeta:RSGetKills()
	return self:GetNWInt("Highscores.Kills", 0)
end

function PlayerMeta:RSGetHeadshots()
	return self:GetNWInt("Highscores.Headshots", 0)
end

function PlayerMeta:RSGetDeaths()
	return self:GetNWInt("Highscores.Deaths", 0)
end

function PlayerMeta:RSGetKDR()
	if self:RSGetKills() == 0 then return 0 end
	if self:RSGetDeaths() == 0 then return self:RSGetKills() end
	return math.Round(self:RSGetKills()/self:RSGetDeaths(), 2)
end

function PlayerMeta:RSGetJoinTime()
	return math.Round(self:GetNWInt("Highscores.JoinTime", 0))
end

function PlayerMeta:RSGetSessionTime()
	return math.Round(CurTime()-self:RSGetJoinTime())
end

function PlayerMeta:RSGetTotalTime()
	return math.Round(self:RSGetSessionTime() + self:GetNWInt("Highscores.TotalTime", 0))
end

if SERVER then
	function PlayerMeta:RSSetKills(kills)
		self:SetNWInt("Highscores.Kills", kills)
	end

	function PlayerMeta:RSSetHeadshots(headshots)
		self:SetNWInt("Highscores.Headshots", headshots)
	end

	function PlayerMeta:RSSetDeaths(deaths)
		self:SetNWInt("Highscores.Deaths", deaths)
	end

	function PlayerMeta:RSSetJoinTime(jointime)
		self:SetNWInt("Highscores.JoinTime", jointime)
	end

	function PlayerMeta:RSSetTotalTime(totaltime)
		self:SetNWInt("Highscores.TotalTime", totaltime)
	end
end