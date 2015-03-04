<?php
include_once './GruposCuentas.php';
include_once '../categoriascuentas/CategoriasCuentas.php';
include_once '../../config.php';

$id = filter_input(INPUT_GET, 'idgrupo');
echo $id;

$grup_cuenta = new GruposCuentas();
$grupid = $grup_cuenta->buscarPorId($id);

foreach ($grupid as $cat) {
     $valor_nombre_grupo = $cat['grupo'];
     $valor_titulo_superior = $cat['TituloSuperior'];
     $valor_categoria = $cat['categoria'];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo INICIO; ?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php include_once '../../menu.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="span3 well-sm"></div>
                <div class="span3 well">
                    <div class="block-content collapse in">
                        <form action="grupos_cuentas_procesar.php" method="POST">
                            <input type="text" value="editar" style="display:none" name="operacion"></input>
                            <input type="text" value=<?php echo $id; ?> style="display:none" name="id_editar"></input>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre de la categoria</th>
                                <th><input type="text" name="nombre_grupo" placeholder=<?php echo $valor_nombre_grupo; ?>></th>
                            </tr>
                            <tr>
                                <th>Nivel del grupo</th>
                                <th><input type="number" name="nivel_grupo" placeholder=<?php ?>></th>
                            </tr>
                            <tr>
                                <th>Titulo Superior</th>
                                <th>
                                    <span>Actual: <?php echo $valor_titulo_superior.'|';?></span>
                                    <span>Nuevo: </span>
                                    <select name="titulo_superior">
                                    <?php 
                                    $grup = $grup_cuenta->leerDatos();
                                    
                                    foreach ($grup as $g){
                                        echo '<option value="'.$g['idgrupo'].'">'.$g['grupo'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Categorias</th>
                                <th>
                                    <span>Actual: <?php echo $valor_categoria.'|';?></span>
                                    <span>Nuevo: </span>
                                    <select name="categoria">
                                    <?php 
                                    $cat_cuenta = new CategoriasCuentas();
                                    $cate = $cat_cuenta->leerDatos();
                                    
                                    foreach ($cate as $cat){
                                        echo '<option value="'.$cat['idcategorias'].'">'.$cat['categoria'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                        </table>
                         <div class="navbar navbar-inner block-header">
                             <input type="submit" value="      Editar     ">
                        </div>
                      </form>
                    </div>
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/gruposcuentas/grupos_cuentas_lista.php" class="btn btn-success">Volver a lista de Grupos</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
    </body>
</html>
