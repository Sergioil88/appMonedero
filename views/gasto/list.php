<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title><?= APP_NAME ?></title>
		
		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?= APP_NAME ?>">
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
            'Facturas'=> '../factura/list',
            'Lista de gastos'=> null]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
		
		<main>
        <h2>Lista de gastos</h2>
        <div class='derecha'>
                    <a class='button' href='/gasto/create'>Nuevo tipo</a>
                    <br>
                    <?= $paginator->stats()?>
        </div>
        <table>
            <tr>
                <th>Tipos de Gastos</th>
            </tr>
            <?php foreach($gastos as $gasto){ ?>
                <tr>
                    <td><?=$gasto->categoria?></td>
                    <td>
                        <a href='edit/<?=$gasto->id?>'>
                        Modificar</a>
                    </td>
                    <td>
                        <a href='delete/<?=$gasto->id?>'>
                        Borrar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?= $paginator->ellipsisLinks() ?>
		</main>
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>