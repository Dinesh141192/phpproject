<?php
//echo(password_hash("4321",PASSWORD_DEFAULT));
    require(__DIR__ . '/private/core/app.php');

    //print_r("1");
    $app = new App();
    //print_r("3");

    $app->configure();

    $app->load();

    $app->start();

?>