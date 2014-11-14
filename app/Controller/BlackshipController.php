<?php
App::uses('AppController', 'Controller');

class BlackshipController extends AppController {

	public $uses = array('Cap', 'Pseudo', 'Publication');
	public $components = array('RequestHandler');

	public function index() {
	}

	public function login() {
		$this->layout = null;

		$infos = $this->request->data;

		if($infos['username'] == 'test' && $infos['password'] == 'test') {
			$this->response->location('/BlackSheep/Blackship/cap');
		}

	}

	public function cap() {
		$this->layout = null;

		$cap_unvalid = $this->Cap->find('all', array(
				"conditions" => array(
					'Cap.validated' => 0
				)
			)
		);

		$this->set(array(
        	'cap_unvalid' => $cap_unvalid,
            '_serialize' => array('cap_unvalid')
        ));
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

}