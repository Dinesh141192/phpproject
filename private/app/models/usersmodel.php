<?php
class UsersModel extends Model {

    function __construct() {
        parent::__construct();
    }
   //function Index(){}
    function authorizeUser($username,$password){
        $cl_username = $username;
        $cl_password = $password;
        $sql = "SELECT `hash_password`, `first_name`, `last_name` from users where email=?";
        $stmt = $this->db->prepare($sql);
        $count = $stmt->execute(Array($cl_username));
        $row = $stmt->fetch();
        $hash_password = $row[0];
        $is_authorized = false;
        if(isset($hash_password)){
            $is_authorized = password_verify($cl_password,$hash_password);
            if($is_authorized){
                $_SESSION["first_name"] = $row[1];
                $_SESSION["last_name"] = $row[2];
                $_SESSION["username"] = $cl_username;
                $update_sql = "UPDATE `users` set `last_login_date` = CURRENT_TIMESTAMP() where email = ?";
                $update_stmt = $this->db->prepare($update_sql);
                $update_stmt->execute(Array($cl_username));
            }
        }
    }
}
?>