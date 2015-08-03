<?php

	class MixpanelPlugin extends SlackServicePlugin {
		const NAME = "Mixpanel";
		const DESC = "Zero character communication.";
		const TOOLTIP = "Get Mixpanels in Slack.";
		const DEFAULT_BOT_NAME = "Mixpanel";

		function onHook($request){

			if (!$request['get']['username']){
				return array('ok' => false, 'error' => "invalid_payload");
			}

			$attachment = array(
				'text' 		=> 'Mixpanel from *'.$request['get']['username'].'*',
				'fallback'	=> 'Mixpanel from '.$request['get']['username'],
				'color' 	=> '9B59B6',
				'mrkdwn_in'	=> 'text',
			);

			$message = array();
			$message['attachments'] = array($attachment);

			return $this->postMessage($this->icfg['channel'], $message);
		}
	}
