<?php
	namespace App\Controller;

	class Handler {
		public $logic = null;    //App\Controller\Logic object
		public $user  = null;    //App\Controller\User object
		public $renderT = null;  //App\Controller\Render object
		public $last_error = ''; //string

		private $db      = null; //App\Model\DataBase object
		private $enviro  = null; //App\Model\Environment object

		public function __construct() {
			$this->enviro  = new \App\Model\Environment();
			$this->db      = new \App\Model\DataBase();
			$this->logic   = new \App\Controller\Logic();
			$this->user    = new \App\Controller\User();
			$this->renderT = new \App\Controller\Render([]);
			
			$this->logic->setdb($this->db);
			$this->user->setdb($this->db);
			$this->logic->setUser($this->user);
		}

		public function render($data = []) {
			$this->renderT = new \App\Controller\Render($data);
			$this->renderT->twigRender();
		}
	}
