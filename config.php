<?php

// define('INCLUDE_PATH', 'http:/localhost/DesafioJornal/');

// define('INCLUDE_PATH', "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?'));

if ($_SERVER['SERVER_NAME'] === 'localhost') {
  define('INCLUDE_PATH', "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
} else {
  define('INCLUDE_PATH', "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?'));
}
