<?php
/**
 * Created by PhpStorm.
 * User: Mirek
 * Date: 25.11.2018
 * Time: 19:00
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/DiabetApp/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Users extends CI_Model
{
	protected $database;
	protected $dbname = 'doctors';

	public function __construct()
	{
		$acc = ServiceAccount::fromJsonFile('secret/diabetapp-9579f-02b3d7ec6132.json');
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

	public function insert(String $email, String $first_name, String $surname, String $city, String $place, String $phone_number) {

		if(empty($email) || !isset($email)){return FALSE; }

			$this -> database -> getReference() -> getChild($this -> dbname) -> push([
				'email' => $email,
				'first_name' => $first_name,
				'surname' => $surname,
				'city' => $city,
				'place' => $place,
				'phone_number' => $phone_number
			]);


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
