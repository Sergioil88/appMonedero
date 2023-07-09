<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Editar- <?= APP_NAME ?></title>
		
		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Portada en <?= APP_NAME ?>">
		<meta name="author" content="Robert Sallent">
		
		<!-- FAVICON -->
		<link rel="shortcut icon" href="favicon.ico" type="image/png">	
		
		<!-- CSS -->
		<?= (TEMPLATE)::getCss() ?>
	</head>
	<body>
		<?= (TEMPLATE)::getLogin() ?>
		<?= (TEMPLATE)::getHeader('Portada') ?>
		<?= (TEMPLATE)::getMenu() ?>
        <?= (TEMPLATE)::getBreadCrumbs([
                'Lista de Gastos'=> "/gasto/list",
                'Editar Gastos'=> null
                ]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
		
		<main>
        <h2>Editar categoría</h2>
        <form method="POST" action="/gasto/update/<?=$gasto->id?>">
        <p>Estás modificando la categoría <?=$gasto->categoria?> a:  <input type="text" name="categoria" required> </p>
        <br>
        <input class="button" type="submit" name="modificar" value="Modificar">
        <input class="button" type="reset" value="Reset">
        </form>
		</main>
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>
