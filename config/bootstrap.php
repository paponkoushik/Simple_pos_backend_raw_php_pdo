<?php

use App\Config\App;
use App\Config\Database\Connection;
use App\Config\Database\QueryBuilder;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));