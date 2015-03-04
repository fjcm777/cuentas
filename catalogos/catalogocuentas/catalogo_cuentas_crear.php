<?php
include_once './CatalogoCuentas.php';
include_once '../gruposcuentas/GruposCuentas.php';
include_once '../../config.php';
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
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/catalogocuentas/catalogo_cuentas_listar.php" class="btn btn-success">Volver a lista de Cuentas</a>
                    </div>
                    <div class="block-content collapse in">
                        <form action="catalogo_cuentas_procesar.php" method="POST">
                            <input type="text" value="crear" style="display:none" name="operacion"></input>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre de la Cuenta</th>
                                <th><input type="text" name="cuenta_contable'"></th>
                            </tr>
                            <tr>
                                <th>Grupo de cuentas</th>
                                <th>
                                    <select name="grupo_cuentas">
                                    <?php  
                                    $grup_cuenta = new GruposCuentas();
                                    $grup = $grup_cuenta->leerDatos();
                                    
                                    foreach ($grup as $cat){
                                        echo '<option value="'.$cat['idgrupo'].'">'.$cat['grupo'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                 <th>Tipo de la cuenta</th>
                                <th>
                                    <select name="tipo_cuenta">
                                    <?php  
                                    $tipo_cuenta = new CatlogoCuentas();
                                    $tipo = $tipo_cuenta->listaTipoCuenta();
                                    
                                    foreach ($tipo as $cat){
                                        echo '<option value="'.$cat['idtipocuenta'].'">'.$cat['tipocuenta'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                        </table>
                         <div class="navbar navbar-inner block-header">
                             <input type="submit" value="      Crear     ">
                        </div>
                      </form>
                    </div>
                    <?php 
                    
                    ?>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
    </body>
</html>
