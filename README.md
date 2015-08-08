Slack integration to receive Mixpanel notification
=========

It's based on Hammock(https://github.com/tinyspeck/hammock)

This integration could make a simple receiver of mixpanel webhook,
and post user datas on Slack channel what you want to post.

![screenshot](https://raw.githubusercontent.com/toshipon/slack-mixpanel-integration/master/images/mixpanel.png)

## Installation

* Make a clone of this git repository onto your web server
* Copy `lib/config.php.example` to `lib/config.php`
* Open `lib/config.php` in a text editor and follow the instructions inside
* Make sure `data/` is writable by your web server
* Visit `index.php` in your browser and start configuring


## Heroku

You can run this integration on Heroku using the following commands (you'll need  to have installed
the Heroku toolbelt already):

    cd slack-mixpanel-integration
    heroku create
    heroku config:set BUILDPACK_URL=https://github.com/heroku/heroku-buildpack-php.git
    heroku config:set HAMMOCK_ROOT=http://{URL-TO-APP}/
    heroku config:set HAMMOCK_CLIENT_ID={YOUR-CLIENT-ID}
    heroku config:set HAMMOCK_CLIENT_SECRET={YOUR-CLIENT-SECRET}
    heroku addons:add redistogo
    git push heroku master

All config options are loaded from the environment variables and data is stored in Redis.

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)
