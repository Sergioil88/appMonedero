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

        <?= (TEMPLATE)::getBreadCrumbs(['Lista de facturas'=> null]) ?>
		<?= (TEMPLATE)::getFlashes() ?>
        <div class='derecha'>
        <a class="button" href="/gasto/list">Administrar tipos de gastos</a>
        </div>
		<main>
        <h2>Lista de Facturas</h2>
        <div class='derecha'>
                    <a class='button' href='/factura/create'>Nueva Factura</a>
                    <br>
                    <?= $paginator->stats()?>
        </div>
        <table>
            <?php $total=0;?>
            <tr>
                <th>Categoría</th><th>Importe</th><th>Hora</th><th>Fecha</th>
            </tr>
            <?php foreach($facturas as $factura){ ?>
                <tr>
                    <td><?php
                    foreach($gastos as $gasto)
                        if($gasto->id==$factura->idGasto)
                                echo $gasto->categoria;
                    ?></td>
                    <td><?php echo "$factura->importe";
                    $total+= $factura->importe;                  
                    ?></td>
                    <td><?=$factura->fecha?></td>
                    <td><?=$factura->hora?></td>
                    <td>
                        <a href='edit/<?=$factura->id?>'>
                        Modificar</a>
                    </td>
                    <td>
                        <a href='delete/<?=$factura->id?>'>
                        Borrar</a>
                    </td>
                </tr>
            <?php } 
            ?>
        </table>
        <br>
        <?php  echo "Total: $total";?>
        <?= $paginator->ellipsisLinks() ?>
		</main>
		<?= (TEMPLATE)::getFooter() ?>
	</body>
</html>