<?php

namespace App\Controllers;

class phpinfo extends BaseController {
    public function index() {
        echo phpinfo();
    }
}