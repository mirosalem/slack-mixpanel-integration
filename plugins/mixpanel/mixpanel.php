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

        $text = "Following customers reached our goal:\r\n";
				foreach($users as $user) {
          if (! empty($user['$properties']['$name'])) {
            $text = $text . 'name: ' . $user['$properties']['$name'] + ', ';
          }
					$text = $text . 'email: ' . $user['$properties']['$email'] . " \r\n";
				}
			}

      // $text = 'This is test.';

			$attachment = array(
				'text' 		=> $text,
				'fallback'	=> 'You received '.count($users).' notifications.',
				'color' 	=> '647997',
				'mrkdwn_in'	=> 'text',
			);

			$message = array();
			$message['attachments'] = array($attachment);

			return $this->postMessage($this->icfg['channel'], $message);
		}
	}
