<?php

abstract class Model {

    protected $db;

    function __construct() {

        global $app;
        //echo("Model");
        $this->db = $app->db;

    }

}

?>