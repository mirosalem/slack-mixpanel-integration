<?php

	class MixpanelPlugin extends SlackServicePlugin {
		const NAME = "Mixpanel";
		const DESC = "An analitics platform.";
		const TOOLTIP = "Get Mixpanels in Slack.";
		const DEFAULT_BOT_NAME = "Mixpanel";

		function onHook($request){
			$payload = $request['post'];
			if (!$payload || !is_array($payload)) return array('ok' => false, 'error' => "invalid_payload");

			$text = '';
			if (isset($payload['users']))
			{
				$users = json_decode($payload['users'], true);
				if (!$users) return array('ok' => false, 'error' => "invalid_payload");

				foreach($users as $user) {
					$text = $user['$email'] . ' \n';
				}
			}

			$attachment = array(
				'text' 		=> $text,
				'fallback'	=> 'Mixpanel notification',
				'color' 	=> '9B59B6',
				'mrkdwn_in'	=> 'text',
			);

			$message = array();
			$message['attachments'] = array($attachment);

			return $this->postMessage($this->icfg['channel'], $message);
		}
	}
