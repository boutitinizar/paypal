<?php
require 'db.php';
require 'paniers.class.php';

$db = new db();
$panier = new panier($db);
?>