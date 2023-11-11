<?php

class AuthView {

    public function register() {
        require_once 'templates/form_register.phtml';
    }

    public function login() {
        require_once 'templates/form_login.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
?>
