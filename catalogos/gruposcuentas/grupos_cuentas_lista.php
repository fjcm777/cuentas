<!DOCTYPE html>
<!-- inicio 17/02/2015 -->
<?php
include_once './GruposCuentas.php';

$grup_cuenta = new GruposCuentas();
$grup = $grup_cuenta->leerDatos();
         
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
                    <h4><center>Lista de grupos de cuentas</center></h4>
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/gruposcuentas/grupos_cuentas_crear.php" class="btn btn-success">Crear Nuevo Grupo de Cuentas</a>
                        <a href="<?php echo INICIO;?>catalogos/gruposcuentas/grupos_cuentas_lista_inactivos.php" class="btn btn-success">Lista Grupos Inactivos</a>
                    </div>
                    <div class="block-content collapse in"> 
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Grupo</th>
                                <th>Titulo Superior</th>
                                <th>Categoria</th>
                                <th colspan="2">Acción</th>
                            </tr>
                            <?php
                            
                            if(!empty($grup)){
                            foreach ($grup as $cat) {
                                $id = $cat['idgrupo'];
                                echo"
                        <tr>
                        <td>" . $cat['idgrupo'] . "</td>
                        <td>" . $cat['grupo'] . "</td>
                        <td>" . $cat['TituloSuperior'] . "</td>
                        <td>" . $cat['categoria'] . "</td>
                        <td>" . '<a href="grupos_cuentas_editar.php?idgrupo='. $id .'">Editar</a> ' . "</td>
                        <td>" . '<a href="grupos_cuentas_procesar.php?idgrupo='. $id .'&operacion=inactivar">Inactivar</a>' . "</td>
                        </tr>";
                            }}else{?>
                               
                        </table>
                    </div>
                     <?php echo '<h4>No se encontraron categorias de cuentas</h4>';
                            }
                                                       
                            ?>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
        <script src="<?php echo INICIO;?>js/categoria_cuentas_inactivar.js"></script>
    </body>
</html>
