<?php
App::uses('AppController', 'Controller');

class ForumController extends AppController {
	public $uses = array('Publication', 'Message');

	public function index() {

		$publications = $this->Publication->find('all', array(
			'conditions' => array(
				'show' => 1
			)
		));

		$tweet = $this->Message->find('all', array(
			'conditions' => array(
				'show' => 1,
				'type' => 'tweet'
			)
		));

		$facebook = $this->Message->find('all', array(
			'conditions' => array(
				'show' => 1,
				'type' => 'facebook'
			)
		));

		$this->set(array(
        	'publications' => $publications,
        	'facebook' => $facebook,
        	'tweet' => $tweet,
            '_serialize' => array('publications, facebook, tweet')
        ));
	}

}