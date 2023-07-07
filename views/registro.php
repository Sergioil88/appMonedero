<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>LogIn - <?= APP_NAME ?></title>
		
		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="LogIn en <?= APP_NAME ?>">
		<meta name="author" content="Robert Sallent">
		
		<!-- FAVICON -->
		<link rel="shortcut icon" href="favicon.ico" type="image/png">	
		
		<!-- CSS -->
		<?= (TEMPLATE)::getCss() ?>
	</head>
	<body>
		<?= (TEMPLATE)::getLogin() ?>
		<?= (TEMPLATE)::getHeader('Registro de User') ?>
		<?= (TEMPLATE)::getMenu() ?>
		<?= (TEMPLATE)::getBreadCrumbs(["Registro" => null]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
		
		<main>
			<section class="flex-container">
    			<div class="flex1"> </div>
        		<form class="flex2" method="POST" autocomplete="off" id="loginForm" action="/registro/add">
    				<div style="margin: 10px;">
            			<label>Nombre:</label>
            			<input type="text" name="displayname" id="email" required>
            			<br>
            			<label >Password:</label>
            			<input type="password" name="password" required>
						<br>
            			<label >Telefono:</label>
            			<input type="text" name="phone"  required>
						<br>
						<label >Email:</label>
            			<input type="email" name="email"  required>
        			</div>
        			
        			<div class="centrado">
        				<input type="submit" class="button" name="registro" value="LogIn">
        			</div>
        			
        		</form>
        		<div class="flex1"> </div>
    		</section>
    		
		</main>
		
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>

