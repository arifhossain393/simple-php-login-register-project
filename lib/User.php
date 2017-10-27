<?php 
	include_once 'Session.php';
	include_once 'Database.php';

	
	class User 
	{
	   private $db;
	    public function __construct()
	    {
	        $this->db = new Database();
	    }

	    public function userRegestation($data){

	    	$name = $data['name'];
	    	$username = $data['username'];
	    	$email = $data['email'];
	    	$password = $data['password'];

	    	$chkemail = $this->checkEmail($email);

	    	if ($name == "" || $username == "" || $email == "" || $password == "") {
	    		
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong>Field not be empty</div>";
	    		return $msg;
	    	}
	    	if (strlen($username) < 3) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong>Username too much short.</div>";
	    		return $msg;
	    	}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong> UserName must only contain ulphanumirical, dashes and underscore.</div>";
	    		return $msg;
	    	}

	    	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
	    		$msg ="<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
				return $msg;
	    	}

	    	if ($chkemail == true) {
	    		$msg ="<div class='alert alert-danger'><strong>Error !</strong>This email already exists</div>";
				return $msg;
	    	}

	    	$password = md5($data['password']);

	    	$sql = "INSERT INTO p_tbl (name, username, email, password) VALUES (:name, :username, :email, :password)";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':name', $name);
	    	$query->bindvalue(':username', $username);
	    	$query->bindvalue(':email', $email);
	    	$query->bindvalue(':password', $password);
	    	$result = $query->execute();

	    	if ($result) {
	    		$msg ="<div class='alert alert-success'>You have been register</div>";
				return $msg;
	    	}else {
	    		$msg ="<div class='alert alert-danger'><strong>Sorry !</strong>you are not register</div>";
				return $msg;
	    	}

	    }

	    private function checkEmail($email){
	    	$sql = "SELECT email FROM p_tbl WHERE email = :email";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':email', $email);
	    	$query->execute();

	    	if($query->rowCount() > 0){
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }

	    private  function getLoginUser($email, $password){
	    	$sql = "SELECT * FROM p_tbl WHERE email = :email AND password = :password LIMIT 1";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':email', $email);
	    	$query->bindvalue(':password', $password);
	    	$query->execute();
	    	$result = $query->fetch(PDO::FETCH_OBJ);
	    	return $result;
	    }

	    public function userLogin($data){

	    	$email = $data['email'];
	    	$password = md5($data['password']);

	    	

	    	if ($email == "" || $password == "") {
	    		
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong>Field not be empty</div>";
	    		return $msg;
	    	}
	    	
	    	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
	    		$msg ="<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
				return $msg;
	    	}

	    	$result = $this->getLoginUser($email, $password);

	    	if ($result) {
	    		Session::init();
	    		Session::set("login", true);
	    		Session::set("id", $result->id);
	    		Session::set("name", $result->name);
	    		Session::set("username", $result->username);
	    		Session::set("email", $result->email);
	    		Session::set("loginmsg", "<div class='alert alert-success'>Success fully Login</div>");
	    		header("Location: index.php");
	    	}else {
	    		$msg ="<div class='alert alert-danger'>data not found</div>";
				return $msg;
	    	}
	    	
	    }

	    public function getUserData(){
	    	$sql = "SELECT * FROM p_tbl ORDER BY id DESC";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->execute();
	    	$result = $query->fetchAll();
	    	return $result;
	    }

	     public function getProfileId($id){
	    	$sql = "SELECT * FROM p_tbl WHERE id = :id LIMIT 1";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':id', $id);
	    	$query->execute();
	    	$result = $query->fetch(PDO::FETCH_OBJ);
	    	return $result;
	    }

	    public function userUpdateData($id, $data){
	    	$name = $data['name'];
	    	$username = $data['username'];
	    	$email = $data['email'];

	    	if ($name == "" || $username == "" || $email == "") {
	    		
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong>Field not be empty</div>";
	    		return $msg;
	    	}
	    	if (strlen($username) < 3) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong>Username too much short.</div>";
	    		return $msg;
	    	}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong> UserName must only contain ulphanumirical, dashes and underscore.</div>";
	    		return $msg;
	    	}

	    	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
	    		$msg ="<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
				return $msg;
	    	}

	    	
	    	$sql = "UPDATE p_tbl SET name = :name, username = :username, email = :email WHERE id = :id";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':name', $name);
	    	$query->bindvalue(':username', $username);
	    	$query->bindvalue(':email', $email);
	    	$query->bindvalue(':id', $id);
	    	$result = $query->execute();

	    	if ($result) {
	    		$msg ="<div class='alert alert-success'>update successfully</div>";
				return $msg;
	    	}else {
	    		$msg ="<div class='alert alert-danger'><strong>Sorry !</strong>update unsuccessfully</div>";
				return $msg;
	    	}
	    }

	    private function CheckPasssword($id, $old_pass){
	    	$password = md5($old_pass);
	    	$sql = "SELECT password FROM p_tbl WHERE id = :id AND password = :password";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':id', $id);
	    	$query->bindvalue(':password', $password);
	    	$query->execute();

	    	if($query->rowCount() > 0){
	    		return true;
	    	}else {
	    		return false;
	    	}
	    }

	    public function userUpdatePass($id, $data){

	    	$old_pass = $data['old_password'];
	    	$new_pass = $data['password'];

	    	$chk_pass = $this->CheckPasssword($id, $old_pass);

	    	if ($old_pass == '' || $new_pass == '') {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong> Field must not be empty</div>";
	    		return $msg;
	    	}

	    	if ($chk_pass == false) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong> Password not exists</div>";
	    		return $msg;
	    	}
	    	if (strlen($new_pass) < 6) {
	    		$msg = "<div class='alert alert-danger'><strong>Error!</strong> Password is too much short</div>";
	    		return $msg;
	    	}

	    	$password = md5($new_pass);
	    	$sql = "UPDATE p_tbl SET password = :password WHERE id = :id";
	    	$query = $this->db->pdo->prepare($sql);
	    	$query->bindvalue(':password', $password);
	    	$query->bindvalue(':id', $id);
	    	$result = $query->execute();

	    	if ($result) {
	    		$msg ="<div class='alert alert-success'>successfully update password</div>";
				return $msg;
	    	}else {
	    		$msg ="<div class='alert alert-danger'><strong>Sorry !</strong>rong password</div>";
				return $msg;
	    	}

	    }

	   
	}

?>