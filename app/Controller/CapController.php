<?php
	class CapController extends AppController {

		public $uses = array('Cap');
		public $components = array('RequestHandler');

		public function index() {
			$koko = "";
		}

		public function switchCap($new_cap = 0) {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$current_cap = $this->Cap->findById($new_cap);




			$this->set(array(
            	'current_cap' => $current_cap,
	            '_serialize' => array('projects')
	        ));
		}

}