<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:image" content="http://hamoi.maramygin.ru/hanoi.png">
		<meta property="og:image:type" content="image/png">

        <title>Онлайн игра Ханойские башни</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.min.css" />
		<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.0/jquery.mobile.min.css" /> -->
		<link rel="stylesheet" href="hanoi.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
        	<div class="row">

				<div class="well header">
					<h1>Ханойские башни</h1>
					<p class="small">Ханойская башня является одной из популярных головоломок XIX века. Даны три стержня, на один из которых нанизаны восемь колец, причем кольца отличаются размером и лежат меньшее на большем. Задача состоит в том, чтобы перенести пирамиду из колец за наименьшее число ходов на другой стержень. За один раз разрешается переносить только одно кольцо, причём нельзя класть большее кольцо на меньшее.</p>
					<p><a target="_blank" href="http://ru.wikipedia.org/wiki/%D0%A5%D0%B0%D0%BD%D0%BE%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D0%B1%D0%B0%D1%88%D0%BD%D1%8F">Ханойская башня на Wikipedia</a></p>
				</div>

				<table class="table" data-type="Hanoi">
					<tbody>
						<tr>
							<td class="tower" data-type="tower">
								<table class="column-wrapper">
									<tbody data-type="column" data-num="1">
									</tbody>
								</table>
							</td>
							<td class="tower" data-type="tower">
								<table class="column-wrapper">
									<tbody data-type="column" data-num="2">
									</tbody>
								</table>
							</td>
							<td class="tower" data-type="tower">
								<table class="column-wrapper">
									<tbody data-type="column" data-num="3">
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<div class="well">
									<div>Счетчик шагов: <span data-type="counter">0</span></div>
									<div>Таймер: <span data-type="timer">0</span> сек</div>
								</div>
							</td>
							<td colspan="2">
								<div class="alert alert-success victory" data-type="victory">
									<p>ВИКТОРИЯ!</p>
									<div data-type="share" id="ya_share"></div> 
								</div>
								<div class="row text-center">
								<div class="form-group controls">
									<label for="inputblocks-Count" class="col-xs-6 col-sm-4 control-label">Количество колец:</label>
									<div class="col-xs-6 col-sm-4">
										<select name="blocks-count" id="inputblocks-Count" class="form-control text-center">
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-4">
										<button type="button" class="btn btn-default btn-success" id="hanoi-start">Начать заново</button>
									</div>
								</div>
								</div>
							</td>
							<td>
								
							</td>
						</tr>
					</tbody>
				</table>

			</div>
        	<div class="row">
        		<div class="well well-sm"><a href="https://bitbucket.org/cslstudio/hanoi">bitbucket.org</a> | <a href="https://github.com/kerstvo/hanoi">github.com</a></div>
        	</div>
        </div>        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script> -->
        <!-- <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.0/jquery.mobile.min.js"></script> -->
		<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
		<script type="text/javascript" src="hanoi.js"></script>
    </body>
</html>