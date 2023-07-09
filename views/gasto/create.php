<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Creación- <?= APP_NAME ?></title>
		
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
                'Tipos de gastos'=> 'gastos/list',
                'Nueva categoria'=> null
                ]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
		
		<main>
        <h2>Nuevo gasto</h2>
        <form method="POST" action="/gasto/save">
        <label>Categoria del gasto: </label>
        <input type="text" name="categoria" required>
        <input class="button" type="submit" name="añadir" value="Añadir">
        <input class="button" type="reset" value="Reset">
        </form>
		</main>
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>

