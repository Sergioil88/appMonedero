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
                    <a class='button' href='/beneficio/create'>Nuevo Beneficio</a>
                    <br>
                    <?= $paginator->stats()?>
        </div>
        <table>
            <tr>
                <th>Lista de Beneficios</th>
            </tr>
            <?php foreach($beneficios as $beneficio){ ?>
                <tr>
                    <td><?=$beneficio->categoria?></td>
                    <td>
                        <a href='edit/<?=$beneficio->id?>'>
                        Modificar</a>
                    </td>
                    <td>
                        <a href='delete/<?=$beneficio->id?>'>
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