<?php
	$cfg = array();

	# This URL should point to your Hammock install.
	# It must end in a slash.

	$cfg['root_url'] = 'http://myserver.com/hammock/';


	# The details of your OAuth application.
	# You can create it here: https://api.slack.com/applications
	# Make sure to set the OAuth URL to the same as 'root_url' above

        $cfg['client_id'] = '123456.7890';
        $cfg['client_secret'] = 'abcdefg';


	# Where we should store cookies
	# NOTE: the domain must contain a dot. if you want to use localhost,
	# try `127.0.0.1`, or set up an alias in your /etc/hosts file.
	# If running from a subdirectory, make sure to change 'cookie_path'

        $cfg['cookie_domain'] = 'myserver.com';
        $cfg['cookie_path'] = '/';
        $cfg['cookie_name'] = 'hammock-auth';


	# Base URL for Slack.
	# Leave this as-is unless you're using Slack-in-a-box

	$cfg['slack_root'] = "https://slack.com/";
