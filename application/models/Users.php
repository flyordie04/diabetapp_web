<?php
/**
 * Created by PhpStorm.
 * User: Mirek
 * Date: 25.11.2018
 * Time: 19:00
 */

require_once '../../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Users
{
	protected $database;
	protected $dbname = 'doctors';

	public function __construct()
	{
		$acc = ServiceAccount::fromJsonFile('../../secret/diabetapp-9579f-02b3d7ec6132.json');
		$firebase = (new Factory) -> withServiceAccount($acc) -> create();

		$this -> database = $firebase -> getDatabase();
	}

	public function get(int $userID = NULL){
		if(empty($userID) || !isset($userID)){return FALSE; }

		if($this -> database -> getReference($this->dbname)->getSnapshot()->hasChild($userID)){
			return $this -> database -> getReference($this -> dbname) -> getChild($userID) -> getValue();
		} else {
			return FALSE;
		}
	}

	public function insert(array $data) {

		if(empty($data) || !isset($data)){return FALSE; }

		foreach($data as $key => $value){
			$this -> database -> getReference() -> getChild($this -> dbname)-> getChild($key) -> set($value);
		}

		return TRUE;
	}

	public function delete(int $userID){
		if(empty($userID) || !isset($userID)){return FALSE; }

		if($this -> database -> getReference($this -> dbname) -> getSnapshot() -> hasChild($userID)){
			$this -> database -> getReference($this -> dbname) -> getChild($userID) -> remove();
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

$users = new Users();
