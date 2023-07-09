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
                'Borrar'=> null
                ]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
		
		<main>
        <h2>Borrar categoria: </h2>
        <form method="POST" action="/gasto/destroy/<?=$gasto->id?>">
        <label>Estás seguro que quiere eliminar la categoría: <b><?=$gasto->categoria?></b> </label>

        <input class="buttonrojo" type="submit" name="destroy" value="Sí">
        <input class="button" type="submit" formaction="/gasto/list" value="No">
        </form>
		</main>
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>

