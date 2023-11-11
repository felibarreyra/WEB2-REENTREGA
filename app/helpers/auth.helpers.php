<?php

class AuthHelper {

    //verifico que no se cree mas de una sesion
    /*public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
*/

    public static function login($user) {
        //inicio la sesion
        //AuthHelper::init();
        session_start();
        //en el arreglo session guardo los datos de las credenciales del usuario [username, id]
        $username = $_SESSION['user'] = $user->username;
        $logged =$_SESSION['logged'] = true; 
        $rol = $_SESSION['rol'] = $user->rol; 

        return $username . $logged . $rol;
       
    }

    public static function logout() {
        //inicio la session
        //AuthHelper::init();
        //session_start();
        //destruyo la session
        session_destroy();
        header('Location: ' . BASE_URL . 'home');

    }

    public static function verify() {
        //AuthHelper::init();
        session_start();
        //si no hay una session seteada
        if (!isset($_SESSION['user'])) {
            //envio al home
            header('Location: ' . BASE_URL . 'home');
            die();
        }
    }
}


