<?php
//todo on fait la deconnexion du user
session_start();
unset($_SESSION['user']);
session_destroy();
header('Location: /accueil');
exit;
