Has … yet?
==========

Has something happend yet? This is a super easy script to set up one of those Twitter accounts which automatically tweet answers to important questions like:

* Has invisibility been invented yet?
* Has [sports team] won/lose yet?
* Has [shady polititian] resigned yet?
* Has the world ended yet?

Example account using this repository:

* https://twitter.com/has___yet

Installation
------------

**Set up the script**

1. Use composer to install the script and all dependencies
  - »composer create-project pixelbrackets/has_yet« or pick your favourite release version »composer create-project pixelbrackets/has_yet has_yet 0.1.0«
1. Copy the configuration example file and rename it to »configuration.json«
  - The example configuration should be self-explaining, you may define custom messages for special days and/or one or more default messages
  - A status message may consist of a text and an image
  - The optional image may be a local filename or a URL (http/https supported)
1. Protect the whole folder from public access (eg. with a htaccess file or place it outside of the document root)!
1. Set up a cronjob which points to the »cron.php« file
  - Please Note: Twitter has a mechanism to detect duplicate tweets (https://twittercommunity.com/t/duplicate-tweets/13264). Consider this if you want to frequently post the same status message. It appears that a 24 hour time range is sufficient.
1. If you want to set up multiple accounts or use varying messages, then rename the configuration file (eg. »johndoe.json«) and pass the filename as argument (»php /path/to/cron.php johndoe«)

**Set up a twitter account**

1. Register a twitter account (that was obvious, wasn't it?)
1. Register an app for this account
  - The advantage of this move is that you won't need to set up an OAuth Login, since Twitter offers to generate an Access Token for the own account
1. Go to https://apps.twitter.com/ to create/register the Twitter App
1. Click “Create New App” Button
1. Create an application (Name, Description, Website etc.)
1. Change “Permissions” to “Read & Write”
1. Generate an Access Token on the “Keys and Access Tokens” tab
1. Copy API Key, API Secret, Access Token, Access Token Secret into the configuration file

Source
------

https://github.com/pixelbrackets/has_yet/

Documentation
-------------

Read online (HTML) https://github.com/pixelbrackets/has_yet/blob/master/README.md

License
-------

GNU General Public License version 2

The GNU General Public License can be found at http://www.gnu.org/copyleft/gpl.html.

Author
------

Dan Untenzu (<mail@pixelbrackets.de> / [@pixelbrackets](https://github.com/pixelbrackets))

Changelog
---------

https://github.com/pixelbrackets/has_yet/commits/master

Contribution
------------

This script is Open Source, so please use, patch, extend or fork it.

[![Flattr](https://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/thing/3713801)
