<?php
//MYSQL INFO
$host = ''; // Host
$user = ''; // Username
$password = ''; // Password
$db = 'hsdb'; // Make sure to create a database called 'hsdb' if you don't want to edit queries.

// Theme
$theme = 'light'; // 'dark' or 'light'
$themedark = false; // Set to true if you're using the dark theme. False if light.
$themelight = true; // Set to true if you're using the light theme. False if dark.

//Navigation Bar 
$logo = 'images/glogo.png';
$name = 'Highscores';

//Navigation bar Top players 
$navkdr = 'Best KDR'; 
$navkills = 'Most Kills';
$navdeaths = 'Most Deaths';
$navheadshots = 'Most Headshots';
$navrich = 'Richest Player';
$navtime = 'Most Hours Played';
$navutimetop = 'Most Hours Played';

//Navigation bar Top Players (included) enable = true;
$navtopkdr = true;
$navtopkills = true;
$navtopdeaths = true;
$navtopheadshots = true;
$navtoprich = false; // set to true if you have DarkRP

//Navigation bar Top players Utime (disable default and enable Utime.) 
$navdefaulttime = true; //
$navutime = false; // You need to have UTime in order for this to work

//Main page leaderboards
$navleader = 'Leaderboard'; // Nav Link
$navleaderheader = 'Leaderboards'; // Page header
$leaderdesc = 'Top 10 players of our community!';

// Server statistics page
$navserver = 'Server Statistics'; // Used for the nav links and header on the page.
$serverdesc = 'All of our data compiled in one place!';

//Player search page
$navsearch = 'Player Search';
$searchdesc = 'Search for yourself or another player using their name or steamid!';
$searchinput = 'Search by name or steamid';

// Server statistics (included)
$svdeath = 'Deaths';
$svdeathdesc = 'Total amount of deaths';
$svkill = 'Kills';
$svkilldesc = 'Total amount of kills';
$svheadshot = 'Headshots';
$svheadshotdesc = 'Total amount of Headshots';
$svplayer = 'Players';
$svplayerdesc = 'Total amount of players';

// Server statistics (Extra)
$svtime = 'Time';
$svtimedesc = 'Total amount time played';
$svpointshop = 'Pointshop';
$svpointshopdesc = 'Total amount of points';
$svwallet = 'Money';
$svwalletdesc = 'Total amount of money';

// IF you are using U-time set this to false.
$defaulttime = true;

//Extra Stats (Server statistics) enabled = true;
$pointshop = false; // You need to have Pointshop in order for this to work.
$darkrpserver = false; // You need to have the DakrRP game mode for this to work.
$srvutime = false; // You need to have UTime in order for this to work.

//Extra Tables (Leaderboard) enabled = true;
$ember = false; // You need to own Ember in order for this to work.
$darkrptable = false; // You need to have the DakrRP game mode for this to work.
$utime = false; // You need to have UTime in order for this to work.


//included tables (Leaderboards) enabled = true;
$timeplayed = true; // Set to false if you have UTime
$kills = true; 
$deaths = true; 
$headshots = true; 
$kdr = true; 

//included server stats (Server Statistics) enabled = true;
$srvtimeplayed = true; // Set to false if you have UTime
$srvkills = true; 
$srvdeaths = true; 
$srvheadshots = true; 
$srvplayers = true; 

## Tools ## 
$resolution = false; // Used to get the resolution in-game in the spawn menu tab.
$cache = false; // Used to clear cache instead of relying on steams ghetto browser.
?>