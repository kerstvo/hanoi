<?php
die(print_r($_SERVER));
if (isset($_POST['from']) && isset($_POST['to']) &&
	is_numeric($_POST['from']) && is_numeric($_POST['to'])){
	$f = fopen('game-', 'a+');

}

?>