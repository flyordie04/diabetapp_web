<?php

use Kreait\Firebase\ServiceAccount;

class Firebase
{
	public $instance;

	private $_currentUser;

	public function __construct()
	{
		$serviceAccount = ServiceAccount::fromJsonFile(FCPATH.'secret/diabetapp-9579f-02b3d7ec6132.json');
		$this->instance = (new \Kreait\Firebase\Factory())
			->withServiceAccount($serviceAccount)
			->create();
	}

	/**
	 * @return \Kreait\Firebase\Auth\UserRecord|null
	 */
	public function getCurrentUser()
	{
		if($this->_currentUser === null)
		{
			if(isset($_SESSION['userToken']))
			{
				try
				{
					$verifiedIdToken = $this->instance->getAuth()->verifyIdToken($_SESSION['userToken']);
					$uid = $verifiedIdToken->getClaim('sub');
					$this->_currentUser = $this->instance->getAuth()->getUser($uid);
				}
				catch (Exception $e)
				{

				}
			}
		}

		return $this->_currentUser;
	}
}
