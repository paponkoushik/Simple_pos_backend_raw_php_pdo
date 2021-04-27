<?php

use App\Config\Request;
use App\Config\Router;

require 'vendor/autoload.php';
require 'config/bootstrap.php';

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());