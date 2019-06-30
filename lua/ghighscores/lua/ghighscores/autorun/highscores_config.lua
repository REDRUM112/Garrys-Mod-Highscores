-- Dont touch this part
Highscores = Highscores or {}
Highscores.Config	= {}
Highscores.Config.SpawnMenu	= {}
Highscores.Config.TTT	= {}
Highscores.Config.MySQL	= {}

-- Spawn Menu Tab Config
Highscores.Config.SpawnMenu.Tab 			= true	-- Ingame Highscores tab.
Highscores.Config.SpawnMenu.TabUrl 			= 'http://example.com/highscores'	-- Put your Install URL here.
Highscores.Config.SpawnMenu.TabName 			= 'HighScores'	-- You can choose you tab name.
Highscores.Config.SpawnMenu.TabIcon			= "icon16/rosette.png"	-- You can choose you tab Icon. You can use any icon included with gmod. TIP: If you change the icon make sure to use " " to quote it not the single quotes.

-- For TTT users.
Highscores.Config.TTT.TeamKilling	= true	-- Ignore team killing.
Highscores.Config.TTT.Inactive	= true	-- Ignore kills before or after the round.

-- MYSQL Info
Highscores.Config.MySQL.Server			= ''	-- Host.
Highscores.Config.MySQL.Username		= ''	-- User.
Highscores.Config.MySQL.Password		= ''	-- Password.
Highscores.Config.MySQL.Database		= 'hsdb'	-- !IMPORTANT! If you don't want to edit queries make your database name 'hsdb'.
								-- If your MYSQL provider has an automatic prefix please view the read me.
Highscores.Config.MySQL.Port			= 3306	-- Port (def: 3306)

