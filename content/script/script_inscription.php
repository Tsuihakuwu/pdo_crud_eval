<?php
    $usr = (isset($_POST['username']) && $_POST['username'] != "") ? $_POST['username'] : Null;
    $mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
    $pwd = (isset($_POST['passwd']) && $_POST['passwd'] != "") ? $_POST['passwdurl'] : Null;
    $pwdv = (isset($_POST['passwd_v']) && $_POST['passwd_v'] != "") ? $_POST['passwd_v'] : Null;

    $ctrl_err = array(0,0,0,0);

    //Controle nom d'utilisateur condition 6 caractères
    if ($usr==Null) {
        $ctrl_err[0]=1;
    }
    //Controle mail format mail avec regex
    if ($mail==null){
        $ctrl_err[1]=1;
    }
    //Controle password à la main sans regex
    if ($pwd==null){
        $ctrl_err[2]=1;
    }
    //Verification password
    if ($pwdv==null){
        $ctrl_err[3]=1;
    }
?>