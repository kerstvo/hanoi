<?php
if (isset($_POST['from']) && isset($_POST['to']) && isset($_COOKIE['PHPSESSID']) &&
	is_numeric($_POST['from']) && is_numeric($_POST['to'])){

	$counter = $_POST['counter'];
	$from = $_POST['from'];
	$to = $_POST['to'];

	// лучше конечно в БД, а то файл открыл, записал, закрыл.. Затратно.
	$f = fopen('game-'.$_COOKIE['PHPSESSID'].'.txt', 'a+');
	if ($counter == 1){
		fwrite($f, PHP_EOL.PHP_EOL."/======== NEW Game, ID: ".time()." ==========/");	
	}
	fwrite($f, PHP_EOL."#".$counter.": ".$from.' -> '.$to);
	fclose($f);
}
?>