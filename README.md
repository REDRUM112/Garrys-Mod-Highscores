[This page](https://gist.github.com/REDRUM112/dafc941d8fb23c16fa03f3928205120b)

# Ghighscores

Thank you for purchasing Ghighscores. Here is a guide to get started, it will be setup in two parts. One for the Server and Website installation and one for the queries if you don't have mysql database prefixes you can ignore the second part of the installation.
If you want to enable the DarkRP, Pointshop or Utime, you will need to checkout the second part of the setup guide.

## Getting Started

### Server installation
* Place the `lua/ghighscores` folder into your GMod addons folder.
* Create a database and name it: hsdb.
* Open file `ghighscores/lua/autorun/highscores_config.lua` and enter your database information.

### Website installation
* Place the `web/ghighscores` folder into your websites main directory.
* Open the config file `web/highscores/connection/config.php`, enter your database information.
  Tweak the website how you like.
* Visit your `https://website.com/highscores`

That's it, you are done!

# Query Setup

You will need to complete this step if you have [Ember](https://www.gmodstore.com/market/view/ember-donation-system-bans-loading-screen-landing-index-page), [U-TimeMOO](https://forums.ulyssesmod.net/index.php/topic,9905.msg50951.html#msg50951), [DarkRP](https://github.com/FPtje/DarkRP), [Pointshop](https://pointshop.burt0n.net/) or a Database Prefix.


## Database Prefix
Editing a query is very simple, there is only one part of it that we need to change. We are interested in the `FROM` part of the query.
On line #2 of every of these folders you will find a file with a query.

`/tables`

`/svstats`

`/top`

Leaderboards Death query
```
$dea = "SELECT highscores.name, highscores.deaths FROM hsdb.highscores ORDER by highscores.deaths DESC LIMIT 10"; 
```

If your database name that has a prefix such as `example_hsdb`, You would have to edit your query like this.

```
$dea = "SELECT highscores.name, highscores.deaths FROM example_hsdb.highscores ORDER by highscores.deaths DESC LIMIT 10"; 
```

You will need to do this for each file in the 3 folder listed above.
It is important to note that each query needs a database name and a table name, or else it will not work.
Each time you edit a query try and keep that in mind if you are not as experience.

DB = `example_hsdb` | Table name = `highscores` 

Your query will be `FROM example_hsdb.highscores";`

## Search Query with a database prefix
The search query is in this directory: `/connection/search.php`
Again if you have a database prefix you will also need to edit the search query.
If you database name has a prefix such as example.hsdb this is how you would edit the query.

```
 AS kdr FROM hsdb.highscores";
```
TO ( Only the end of the query needs to be edited)
```
 AS kdr FROM example_hsdb.highscores";
```

PLEASE NOTE: There are 3 queries in the search.php file. All 3 need to be edited, you cannot copy and paste as all the queries are different.

# Ember, Pointshop, DarkRP, Utime Setup & info
For each addon the process is the same.
You need to go in the modules respective file.

`Ember = tables/ember.php`

`Pointshop = svstats/pointshop.php`

`darkrp = top/richest.php,   tables/wallet.php   &   svdata/swallet.php`

`utime = top/utime.php,   tables/utime.php  &   svdata/utime.php`

On line #2 of each of those files there will be a query for which a database name has been preset.

`Ember db = ember`

`Pointshop db = pointshop`

`DarkRP db = darkrp`

`U-Time db = utime`

You can edit the queries for each addon you want, so it matches your existing database. 
You can also edit you existing database names to match these and it will work.

[If you have a database prefix the process is still the same as above just you need to add a prefix to your queries](https://gist.github.com/REDRUM112/dafc941d8fb23c16fa03f3928205120b#database-prefix)

# What to do if you cannot figure it out ?
Please message me if you cannot get it working. It can be tedious but if you cant do it on your own I will do it for you.
You can always open a ticket on the [GmodStore](https://www.gmodstore.com/users/m4er), you can add me on [steam](https://steamcommunity.com/id/M4er/) or Discord @REDRUM#0263.