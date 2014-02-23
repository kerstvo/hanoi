
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.min.css" />
		<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.0/jquery.mobile.min.css" /> -->
		<link rel="stylesheet" href="hanoy.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


		<table class="table" data-type="Hanoy">
			<tbody>
				<tr>
					<td class="tower" data-type="tower">
						<div class="stick"></div>

						<table class="column-wrapper">
							<tbody data-type="column" data-num="1">
							</tbody>
						</table>
						<!-- <div class="circles-container"></div> -->
					</td>
					<td class="tower" data-type="tower">
						<div class="stick"></div>

						<table class="column-wrapper">
							<tbody data-type="column" data-num="2">
							</tbody>
						</table>
						<!-- <div class="circles-container"></div> -->
					</td>
					<td class="tower" data-type="tower">
						<div class="stick"></div>

						<table class="column-wrapper">
							<tbody data-type="column" data-num="3">
							</tbody>
						</table>
						<!-- <div class="circles-container" data-type="column"></div> -->
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="well">
							Счетчик шагов: <span data-type="counter">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="container">
						<div class="row text-center">
						<div class="form-group controls">
							<label for="inputCircles-Count" class="col-xs-6 col-sm-4 control-label">Количество колец:</label>
							<div class="col-xs-6 col-sm-4">
								<select name="circles-count" id="inputCircles-Count" class="form-control text-center">
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
								<button type="button" class="btn btn-default btn-success" id="hanoy-start">Начать заново</button>
							</div>
						</div>
						</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

       	<!-- <div class="container" data-type="Hanoy">
        	<div class="row">
        		<div class="col-xs-4">
        			<div class="column"></div>
					<div class="circles-container" data-type="column"></div>
        		</div>
        		<div class="col-xs-4">
        			<div class="column"></div>
					<div class="circles-container" data-type="column"></div>
        		</div>
        		<div class="col-xs-4">
        			<div class="column"></div>
					<div class="circles-container" data-type="column"></div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-6 col-sm-offset-3 text-center"> 
					<div class="form-group controls">
						<label for="inputCircles-Count" class="col-xs-4 control-label">Количество колец:</label>
						<div class="col-xs-4">
							<select name="circles-count" id="inputCircles-Count" class="form-control text-center">
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-default btn-success" id="hanoy-start">Начать заново</button>
						</div>
					</div>
        		</div>
        	</div>
        </div> -->

        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.0/jquery.mobile.min.js"></script> -->
		<script type="text/javascript" src="hanoy.js"></script>
    </body>
</html>