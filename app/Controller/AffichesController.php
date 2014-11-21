<?php
App::uses('AppController', 'Controller');

class AffichesController extends AppController {
	public $uses = array('Affiche');

	public function index() {
		$affiches = $this->Affiche->find('all');

		$this->set(array(
        	'affiches' => $affiches,
            '_serialize' => array('affiches')
        ));
	}

}