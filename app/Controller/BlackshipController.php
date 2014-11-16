<?php
App::uses('AppController', 'Controller');

class BlackshipController extends AppController {

	public $uses = array('Cap', 'Pseudo', 'Publication');
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