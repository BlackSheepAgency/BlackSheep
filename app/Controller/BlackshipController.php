<?php
App::uses('AppController', 'Controller');

class BlackshipController extends AppController {

	public function index() {
	}

	public function login() {
		$this->layout = null;

		$infos = $this->request->data;

		if($infos['username'] == 'test' && $infos['password'] == 'test') {
			echo 'ok';
		}

	}


}