<?php
	namespace App\Controller;

	class Logic {
		public $user = null;      //App\Controller\User object
		protected $db = null;     //App\Model\DataBase object
		protected $client = null; //UtopiaLib\Client object

		public function __construct() {
			//
		}

		public function setdb($db) {
			$this->db = &$db;
		}

		public function setUser($user): void {
			$this->user = &$user;
		}

		public function initClient(): bool {
			//TODO: add host url check
			$this->client = new \UtopiaLib\Client(
				getenv('api_token'),
				getenv('api_host'),
				getenv('api_port')
			);
			return $this->client->checkClientConnection();
		}

		public function getPlaygroundData(): array {
			if($this->client == null) {
				$this->initClient();
			}
			$network_connections = $this->client->getNetworkConnections();
			return [
				'balance' => $this->client->getBalance(),
				'network' => [
					'connections' => count($network_connections),
					'peers'       => $network_connections['summary']['peers_connected']+0,
					'known_peers' => $network_connections['summary']['known_peers']+0,
				],
				'account' => $this->client->getOwnContact()
			];
		}
	}
