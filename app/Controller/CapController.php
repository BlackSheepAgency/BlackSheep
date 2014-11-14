<?php
	class CapController extends AppController {

		public $uses = array('Cap', 'Pseudo', 'Publication');
		public $components = array('RequestHandler');

		public function index() {

		}

		public function landing() {
		}

		public function switchCap($cap = 1) {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$check = 'OK';

			$current_cap = $this->Cap->findById($cap);

			if(count($current_cap) === 0) {
				$check = 'KO';
			} else {
				$c = 0;
				while($current_cap['Cap']['validated'] != 1) {
					$current_cap = $this->Cap->findById($cap+1);
					$c++;
				}

				$cap = $cap + $c;

				$current_cap['number'] = $cap + $c;
			}

			$this->set(array(
            	'current_cap' => $current_cap,
            	'check' => $check,
	            '_serialize' => array('current_cap', 'check')
	        ));
		}

		public function addPseudo($name = '') {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$check_pseudo = $this->Pseudo->find('all');

			$check = 'OK';

			foreach($check_pseudo as $this_pseudo) {
				if($name === $this_pseudo['Pseudo']['name']) {
					$check = 'KO';
					continue; 
				}
			}

			if($name !== '' && $check === 'OK') {
				$this->Pseudo->save(array(
					'name' => $name
				));
			} else {
				$check = 'KO';
			}

			$this->set(array(
            	'check' => $check,
	            '_serialize' => array('check')
	        ));
		}


		public function getPublications() {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$publications = $this->Publication->find('all');

			$this->set(array(
            	'publications' => $publications,
	            '_serialize' => array('publications')
	        ));
		}

		public function addPublication($pseudo = '', $url = '', $comment = '') {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$url = 'img/'.$url;

			$check = 'OK';

			if($name !== '' && $url !== '') {
				$this->Publication->save(array(
					'pseudo' => $pseudo,
					'picture' => $url,
					'comment' => $comment
				));
			} else {
				$check = 'KO';
			}

			$this->set(array(
            	'check' => $check,
	            '_serialize' => array('check')
	        ));
		}

		public function addCap($proposition = '') {
			$this->RequestHandler->renderAs($this, 'json');
			$this->layout = null;

			$check = 'OK';

			if($proposition !== '' && $check === 'OK') {
				$this->Cap->save(array(
					'text' => $proposition,
					'validated' => 0
				));
			} else {
				$check = 'KO';
			}

			$this->set(array(
            	'check' => $check,
	            '_serialize' => array('check')
	        ));
		}

	}


