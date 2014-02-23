<?php
if (isset($_POST['from']) && isset($_POST['to']) && isset($_COOKIE['PHPSESSID']) && isset($_POST['timer']) &&
	is_numeric($_POST['from']) && is_numeric($_POST['to'])){

	$counter = $_POST['counter'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$timer = $_POST['timer'];

	// лучше конечно в БД, а то файл открыл, записал, закрыл.. Затратно.
	$f = fopen('games/game-'.$_COOKIE['PHPSESSID'].'.txt', 'a+');
	if ($counter == 1){
		fwrite($f, PHP_EOL."/======== NEW Game, ID: ".time()." ==========/");	
	}
	if ($to == 0 && $from == 0){ // если так, то победа!
		fwrite($f, PHP_EOL."======== VICTORY ($counter moves : $timer sec) ========".PHP_EOL);
	}
	else{ // просто ход
		fwrite($f, PHP_EOL."#$counter ($timer): $from -> $to");
	}
	fclose($f);
}
?>