<?php

class UserDetails extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");
        $this->view("test/test");
        $this->view("template/footer");
    } 
    function Login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $csrf_post = htmlentities($_POST["csrf_tokken"]);
            $csrf_cookie = $_COOKIE["csrf_tokken"];
            $csrf_sess = $_SESSION["csrf_tokken"];
            

            if($csrf_sess == $csrf_post && $csrf_sess == $csrf_cookie){

                $this->model("UsersModel");
                $cl_username = htmlentities($_POST["username"]);
                $cl_password = htmlentities($_POST["password"]);
                $authorize = $this->UsersModel->authorizeUser($cl_username,$cl_password);
                if($authorize){
                    header("location: /userdetails/");
    
                }else{
                    echo("Not authorized");
                }
                }else{
                    echo("bad csrf_tokken");
                }
            }else if($_SERVER["REQUEST_METHOD"] == "GET"){
                $csrf_tokken = random_int(10000,100000000);
                $_SESSION["csrf_tokken"] = $csrf_tokken;
                setcookie("csrf_tokken",$csrf_tokken);
                $this->view("main/login", array("csrf_tokken" => $csrf_tokken));

            }else{

            }
        }
        function Logout(){
            session_unset();
            session_destroy();
            $_SESSION = Array();
            // header("location: /userdetails/");
            $this->view("main/logout");
        }
    }



?>