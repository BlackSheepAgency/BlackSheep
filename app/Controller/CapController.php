<?php
	class CapController extends AppController {

		public $uses = array('Cap');
		public $components = array('RequestHandler');

		public function index() {
			$koko = "";
		}

		public function switchCap($cap = 1) {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$current_cap = $this->Cap->findById($cap);

			$this->set(array(
            	'current_cap' => $current_cap,
	            '_serialize' => array('current_cap')
	        ));
		}

}