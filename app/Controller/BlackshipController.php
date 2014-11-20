<?php
App::uses('AppController', 'Controller');

class BlackshipController extends AppController {

	public $uses = array('Cap', 'Pseudo', 'Publication', 'Message');
	public $components = array('RequestHandler');

	public function index() {
		$this->layout = 'admin';
	}

	public function login() {
		$this->layout = 'admin';

		$infos = $this->request->data;

		if($infos['username'] == 'test' && $infos['password'] == 'test') {
			$this->response->location('/BlackSheep/Blackship/cap');
		}

	}

	public function cap() {
		$this->layout = 'admin';

		$cap_unvalid = $this->Cap->find('all', array(
				"conditions" => array(
				)
			)
		);

		$this->set(array(
        	'cap_unvalid' => $cap_unvalid,
            '_serialize' => array('cap_unvalid')
        ));
	}

	public function comments() {
		$this->layout = 'admin';
		session_start();
		$messages = array();
		$messages['facebook'] = array();
		$messages['tweet'] = array();


		$fb_id="602780313159165";
		//be sure to update this access token
		$myFBToken="CAAKTUrSoBpkBANpydmgLiqDMwymaUOZCyoaYYOElFKwQmUGIN89jGEhCiEoCl7FNiUfgZA46G7rtbB1pjX7SkWEF8HRZBBjaQfwg8ViTtetLegJSZAxsJwU65vJ1Dx2TysBEMJRjbcoM5o64P5jSynkkueW977PipNZATJIq37nVTdDnWit2GH7l21LmeuI11jxcHRSis4wZA0pYaTYLjVn1yo4PMAqb0ZD";
		
		//must be https when using an access token
		$url="https://graph.facebook.com/".$fb_id."/feed?access_token=".$myFBToken."&limit=20";
		//load and setup CURL
		$c = curl_init($url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		//don't verify SSL (required for some servers)
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);			
		//get data from facebook and decode JSON
		$page = json_decode(curl_exec($c), true);
		//close the connection
		curl_close($c);
		
		$n = 0;
		foreach ($page as $key => $the_page) {
			foreach ($the_page as $key => $yes) {
				if(isset($yes['from'])) {
					if($yes['from']['name'] != 'Comme des Gosses') {
						//debug($yes);
						//die;
						$messages['facebook'][$n] = array();
						$messages['facebook'][$n]['message'] = $yes['message'];
						$messages['facebook'][$n]['name'] = $yes['from']['name'];
						$messages['facebook'][$n]['link'] = $yes['actions'][0]['link'];
						$n++;
					}
				}
			}
		}
		
		require_once("twitteroauth-master/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
		 
		$twitteruser = "Webarranco";
		$notweets = 30;
		$consumerkey = "XeHBGlRIxgQVFdcgP5Gzz4VTe";
		$consumersecret = "Q9B9qXLIrBLWx1y93mUgjhzi5Ktun18QZ3QKLANnLZ9iSp6VLH";
		$accesstoken = "2538080443-6tlNYMX2Fm9KmYxDtX69f9dlFfaCjEJXfT2xiFB";
		$accesstokensecret = "mWf912cQzJHLfdIYvcHIZ2BMYRi6du2N1PK9Pit2Mz4V4";
		
		function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		  return $connection;
		}
		
		$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
		 
		$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=%23commedesgosses?");

		$the_tweets = json_decode(json_encode($tweets), true);
		
		$f = 0;
		foreach ($the_tweets as $key => $the_tweet) {
			foreach ($the_tweet as $key => $message_tweet) {
				//debug($message_tweet);
				//die;
				if(isset($message_tweet['text']) && strlen($message_tweet['text']) > 5) {
					$messages['tweet'][$f] = array();
					$messages['tweet'][$f]['message'] = $message_tweet['text'];
					$messages['tweet'][$f]['name'] = $message_tweet['user']['name'];
					$messages['tweet'][$f]['link'] = $message_tweet['user']['url'];
					$f++;
				}
			}
		}

		$all_messages = $this->Message->find('all');

		$check_messages = array();

		foreach ($all_messages as $key => $the_message) {
			array_push($check_messages, $the_message['Message']['message']);
		}
		
		foreach ($messages['facebook'] as $key => $message) {

			if(!in_array($message['message'], $check_messages)) {
				$this->Message->create();
				$this->Message->save(array(
					'author' => $message['name'],
					'message' => $message['message'],
					'url' => $message['link'],
					'type' => 'facebook'
				));
			}	
		}

		foreach ($messages['tweet'] as $key => $message) {
			if(!in_array($message['message'], $check_messages)) {
				$this->Message->create();
				$this->Message->save(array(
					'author' => $message['name'],
					'message' => $message['message'],
					'url' => $message['link'],
					'type' => 'tweet'
				));
			}
		}

		//debug($messages);
		//die;

		$this->set(array(
        	'messages' => $messages,
            '_serialize' => array('messages')
        ));
	}

	public function affiche() {
		$this->layout = 'admin';

		if(count($this->request->data) != 0) {
			$file = $this->request->data['Affiche']['upload'];
			debug($file);
			$destination = 'img/upload/'.uniqid().$file['name'];
			move_uploaded_file($file['tmp_name'], $destination);
		}
	}

	public function video() {
		$this->layout = 'admin';
	}

	public function validCap($id = 0) {
		$this->RequestHandler->renderAs($this, 'json');
		$this->layout = null;

		$check = 'OK';

		$id = intval($id);

		if($id !== 0) {
			$this->Cap->id = $id;
			$this->Cap->set(array(
				'validated' => 1,
			));
			$this->Cap->save();
		} else {
			$check = 'KO';
		}

		$this->set(array(
        	'check' => $check,
            '_serialize' => array('check')
        ));
	}

	public function deleteCap($id = 0) {
		$this->RequestHandler->renderAs($this, 'json');
		$this->layout = null;

		$check = 'OK';

		$id = intval($id);

		if($id !== 0) {
			$this->Cap->delete($id);
		} else {
			$check = 'KO';
		}

		$this->set(array(
        	'check' => $check,
            '_serialize' => array('check')
        ));
	}

}