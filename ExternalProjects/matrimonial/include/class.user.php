<?php
session_start();
include "db_config.php";

	class User{

		public $db;

		public function __construct(){
			$this->db = new mysqli(servername, username, password, dbname);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($name,$username,$email,$password,$vcaste,$vstate,$vcity,$description){

			$password = md5($password);
			$sql="SELECT * FROM users WHERE uname='$username' OR uemail='$email'";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
//INSERT INTO `u268998878_matri`.`users` (`uid`, `fname`, `lname`, `uname`, `upass`, `fullname`, `uemail`, `caste`, `state`, `city`, `image`, `desc`) VALUES (NULL, '$abhijit', '$lastname', '$name', '$password', '$name', '$vcaste', '$vstate', '$vcity', '', '$description');

				                            $sql1="INSERT INTO users SET $uname='$username', upass='$password', fullname='$name', uemail='$email', caste='$vcaste', state='$vstate', city='$vcity', desc='$description'>";
				                            $result = mysqli_query($this->db,$sql1)  or die(mysqli_connect_errno()."Data cannot inserted");
	                                                    $sql3="SELECT uid from users WHERE uemail='$email' or uname='$username' and upass='$password'";
                                                            $result2 = mysqli_query($this->db,$sql3);
                                                            $varu = mysqli_fetch_array($result2);
                                                            $count_row = $result2->num_rows;
                                                            if ($count_row == 1) {
                    	                                                                         $_SESSION['login'] = true;
	                                                                                         $_SESSION['no'] = $varu['uid'];
	                                                                                         return true;
	                                                                                       }
	                                                    else{
			                                             return false;
			                                           }
    	                                                  }
        		return $result;}

		/*** for login process ***/
		public function check_login($emailusername, $password){

        	$password = md5($password);
			$sql2="SELECT uid from users WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($uid){
    		$sql3="SELECT fullname FROM users WHERE uid = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>