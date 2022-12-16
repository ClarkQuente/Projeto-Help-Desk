<?php
    /* WITHOUT SECURITY SYSTEM
    require('../../../app_help_desk/valida_login.php');
    */

    session_start();

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuariosManager = array(
        array(
            'id' => 1,
            'email' => 'adm@teste.com',
            'password' => '12345',
            'perfil_id' => 1
        ),
        array(
            'id' => 2,
            'email' => 'user@teste.com',
            'password' => '12345',
            'perfil_id' => 2
        )
    );

    $id = null;
    $profileId = null;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $isAuthenticated = false;
    foreach($usuariosManager as $account) {
        if($account['email'] == $email && $account['password'] == $password) {
            $isAuthenticated = true;
            $id = $account['id'];
            $profileId = $account['perfil_id'];
            break;
        }
    }

    if($isAuthenticated) {
        $_SESSION['id'] = $id;
        $_SESSION['profileId'] = $profileId;
        header('Location: ../home.php');
    }
    else header('Location: ../index.php?error=401');
?>