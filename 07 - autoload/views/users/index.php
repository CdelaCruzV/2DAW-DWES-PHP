<?php
    require_once("../../../vendor/autoload.php");
    require_once('../../../config/parameters.php');
    require_once('../../../dao/UserDAO.php');

    
    $loader = new \Twig\Loader\FilesystemLoader('../../templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render(
        'users/index.twig', 
        ['users' => UserDAO::getAll()]
    );
?>