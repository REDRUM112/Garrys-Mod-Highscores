if Highscores.Config.SpawnMenu.Tab then

highscoresaddress = Highscores.Config.SpawnMenu.TabUrl
highscores =  Highscores.Config.SpawnMenu.TabName
highscoresicon = Highscores.Config.SpawnMenu.TabIcon
  
spawnmenu.AddCreationTab( highscores , function()
    HTML = vgui.Create( "HTML" )
    HTML:OpenURL( highscoresaddress )
    HTML:SetMouseInputEnabled(true)
    HTML:OpenURL( highscoresaddress )
    return HTML
 
end, highscoresicon, 200 )
 
end