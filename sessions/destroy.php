<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
session_destroy();
redirect_to("../index.php");
?>
