<?php
    session_start();
    
    session_destroy();
    unset($_SESSION['auth']);

    $_SESSION['flash']['success'] = "vous êtes maintenant déconnecté";
    header('Location: login.php');