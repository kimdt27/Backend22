<?php
class LoginUser
{
    public $message;
    public function __construct($username, $password)
    {
        $db = new DbCon();
        $user = trim($username);
        $pass = trim($password);
        $query = $db->dbCon->prepare("SELECT id, user, pass FROM users WHERE user = '{$user}' LIMIT 1");
        if($query->execute()){
            $found_user = $query->fetchAll();
            if (count($found_user)==1){
                if(password_verify($pass, $found_user[0]['pass'])){
                    $_SESSION['user_id'] = $found_user[0]['id'];
                    $_SESSION['user'] = $found_user[0]['user'];
                    $redirect = new Redirector("frontpage.php");
                } else {
                    // username/password combo was not found in the database
                    $this->message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
                }
            }else{
                $this->message = "No such Username in the database.<br />
				Please make sure your caps lock key is off and try again.";
            }
        }
    }
}