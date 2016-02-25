<?php
session_start();
$url = pathinfo($_SERVER['PHP_SELF']);
$archivo = substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'], '/', 1) + 1);

if (!isset($_SESSION['userusername'])) {
	
	
}