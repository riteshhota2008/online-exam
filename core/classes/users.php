<?php

class Users{
	private $db;

	public function __construct($database){
		$this->db=$database;
	}


	/**
	 * [user_exists description]
	 * @param  [string] $username [paramerts passsed from the validation page]
	 * @return [boolean]           [returns true if the username is already there in the database]
	 */
	public function user_exists($username){
		$query=$this->db->prepare("select count('user_name') from `user` where `user_name`=?");
		$query->bindValue(1,$username);

		try{
			$query->execute();
			$rows=$query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	 * [email_exists description]
	 * @param  [string] $email [email address]
	 * @return [boolean]        [true if email is there in thd database]
	 */
	public function email_exists($email){
		$query=$this->db->prepare("select count('email') from `user` where `email`=?");
		$query->bindValue(1,$email);

		try{
			$query->execute();
			$rows=$query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}
	}


	/**
	 * @param  [string] $username [user name]
	 * @param  [string] $password [pass word]
	 * @param  [string] $email    [email]
	 * @return [void]           [empty]
	 */
	public function register($username,$password,$email){
		$password = md5($password);
		$hash     = sha1($username + microtime());
		$query    = $this->db->prepare("insert into `user` values(?,?,?,?,?)");
		$query->bindValue(1,$username);
		$query->bindValue(2,$email);
		$query->bindValue(3,$password);
		$query->bindValue(4,$hash);
		$query->bindValue(5,'0');
		try{
			$query->execute();	
			mail($email, 'Please activate your account', "Hello " .
				$username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\n
				http://riteshhota.16mb.com//activate.php?email=" . $email . "&hash=" .
				$hash . "\r\n\r\n-- Ritesh","From: ritesh@admin.com");
			$nested_query=$this->db->prepare('insert into user_profile (`user_name`,`email`) values (?,?)');
			$nested_query->bindValue(1,$username);
			$nested_query->bindValue(2,$email);
			$nested_query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	 * [this function activates the user account after the user click on the link which
	 * was sent it the mail]
	 * @param  [type] $email [description]
	 * @param  [type] $hash  [description]
	 * @return [type]        [description]
	 */
	public function activate($email,$hash){
		$query=$this->db->prepare("select count('user_name') from `user` where `email`=? and `hash`=? and `confirmed`=?");
		$query->bindValue(1,$email);
		$query->bindValue(2,$hash);
		$query->bindValue(3,'0');
		try {
			$query->execute();
			$rows=$query->fetchColumn();
			if($rows == 1){
				$nested_query=$this->db->prepare('update `user` set `confirmed`=? where `email`=?');
				$nested_query->bindValue(1,1);
				$nested_query->bindValue(2,$email);
				$nested_query->execute();
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	/**
	 * [login used for verifying the user entered details for login ]
	 * @param  [string] $username [username]
	 * @param  [string] $password [password]
	 * @return [boolean]           [boolean]
	 */
	public function login($username,$password){
		$query=$this->db->prepare('select `password` from `user` where `user_name`=?');
		$query->bindValue(1,$username);
		try {
			$query->execute();
			$record=$query->fetch();
			$stored_password=$record['password'];

			if($stored_password==md5($password)){
				return $username;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}


	}

	/**
	 * [is_email_confirmed used for confirming whether the email is registerd or not ]
	 * @param  [type]  $username [description]
	 * @return boolean           [description]
	 */
	public function is_email_confirmed($username){
		$query=$this->db->prepare('select count(`user_name`) from `user` where `user_name`=? and `confirmed`=? ');
		$query->bindValue(1,$username);
		$query->bindValue(2,1);

		try {
			$query->execute();
			$rows=$query->fetchColumn();

			if($rows==1){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	/**
	 * [userData description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function userData($username){
		$query = $this->db->prepare("SELECT * FROM `user_profile` WHERE `user_name`= ?");
		$query->bindValue(1, $username);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){
			die($e->getMessage());
		}

	}

	/**
	 * [updateUserData description]
	 * @param  [type] $username   [description]
	 * @param  [type] $first_name [description]
	 * @param  [type] $last_name  [description]
	 * @param  [type] $birth      [description]
	 * @param  [type] $gender     [description]
	 * @return [type]             [description]
	 */
	public function updateUserData($username,$first_name,$last_name,$birth,$gender,$photopath){
		$query = $this->db->prepare('update `user_profile` set `first_name`=?, `last_name`=?,`birth`=?,`gender`=? ,`photo`=? where `user_name`=? ');
		$query->bindValue(1,$first_name);
		$query->bindValue(2,$last_name);
		$query->bindValue(3,$birth);
		$query->bindValue(4,$gender);
		$query->bindValue(5,$photopath);
		$query->bindValue(6,$username);
		try{

			$query->execute();

			$rows=$query->fetchColumn();

			if($rows==1){
				return true;
			}else{
				return false;
			}

		} catch(PDOException $e){
			die($e->getMessage());
		}
		
	}

	/**
	 * [resetPassword description]
	 * @param  [type] $username    [description]
	 * @param  [type] $oldpassword [description]
	 * @param  [type] $newpassword [description]
	 * @return [type]              [description]
	 */




    /**
     * [updateUserData description]
     * @param  [type] $username   [description]
     * @param  [type] $first_name [description]
     * @param  [type] $last_name  [description]
     * @param  [type] $birth      [description]
     * @param  [type] $gender     [description]
     * @return [type]             [description]
     */
    public function update_answers($username,$question_1){
        $query = $this->db->prepare('update `user_profile` set `question_1`=? where `user_name`=? ');
        $query->bindValue(1,$question_1);
/*        $query->bindValue(2,$last_name);
        $query->bindValue(3,$birth);
        $query->bindValue(4,$gender);
        $query->bindValue(5,$photopath);
*/        $query->bindValue(2,$username);
        try{

            $query->execute();

            $rows=$query->fetchColumn();

            if($rows==1){
                return true;
            }else{
                return false;
            }

        } catch(PDOException $e){
            die($e->getMessage());
        }

    }

    /**
     * [resetPassword description]
     * @param  [type] $username    [description]
     * @param  [type] $oldpassword [description]
     * @param  [type] $newpassword [description]
     * @return [type]              [description]
     */







	public function resetPassword($username,$oldpassword,$newpassword){
		$query=$this->db->prepare('select `password` from `user` where `user_name`=?');
		$query->bindValue(1,$username);
		try {
			$query->execute();
			$record=$query->fetch();
			$stored_password=$record['password'];
			if($stored_password==md5($oldpassword)){
				$nested_query=$this->db->prepare('update `user` set `password`=? where `user_name`=?');
				$nested_query->bindValue(1,md5($newpassword));
				$nested_query->bindValue(2,$username);
				$nested_query->execute();
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
	 * [sendPassResetMail description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function sendPassResetMail($username){
		$query=$this->db->prepare('select `email`,`hash` from `user` where user_name=?');
		$query->bindValue(1,$username);
		try {
			$query->execute();
			$data=$query->fetch();
			mail($data['email'], 'Reset Password', "Hello " .
				$username. ", Please visit the link below to reset your password:\r\n\r\n
				http://www.ashish.com/login/forgotpassact.php?email=" . $data['email'] . "&hash=" . 
				$data['hash'] ."\r\n\r\n-- team Ashish","From: admin@ashish.com");
			
		}catch(PDOException $e) {
			die($e->getMessage());
		}

	}

	/**
	 * [resetForgotPass description]
	 * @param  [type] $email       [description]
	 * @param  [type] $hash        [description]
	 * @param  [type] $newpassword [description]
	 * @return [type]              [description]
	 */
	public function resetForgotPass($email,$hash,$newpassword){
		$query=$this->db->prepare('select `hash` from `user` where `email`=?');
		$query->bindValue(1,$email);
		try {
			$query->execute();
			$data=$query->fetchColumn();
			if($hash===$data){
				$nested_query=$this->db->prepare('update `user` set `password`=? where `email`=?');
				$nested_query->bindValue(1,md5($newpassword));
				$nested_query->bindValue(2,$email);
				$nested_query->execute();
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e) {
			$e->getMessage();
		}
	}




}


?>