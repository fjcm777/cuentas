<?php
include_once './GruposCuentas.php';
include_once '../categoriascuentas/CategoriasCuentas.php';
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
                        <a href="<?php echo INICIO;?>catalogos/gruposcuentas/grupos_cuentas_lista.php" class="btn btn-success">Volver a lista de Cuentas</a>
                    </div>
                    <div class="block-content collapse in">
                        <form action="grupos_cuentas_procesar.php" method="POST">
                            <input type="text" value="crear" style="display:none" name="operacion"></input>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre del Grupo</th>
                                <th><input type="text" name="nombre_grupo"></th>
                            </tr>
                            <tr>
                                <th>Nivel del Grupo</th>
                                <th><input type="text" name="nivel_grupo"></th>
                            </tr>
                            <tr>
                                <th>Titulo Superior</th>
                                <th>
                                    <select name="titulo_superior">
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
                                 <th>Categoria</th>
                                <th>
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
