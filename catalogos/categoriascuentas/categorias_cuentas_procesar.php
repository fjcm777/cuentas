<?php

include_once './CategoriasCuentas.php';

$cat_cuenta = new CategoriasCuentas();
$cate = $cat_cuenta->leerDatos();

$post = filter_input(INPUT_POST, 'operacion'); 
$get = filter_input(INPUT_GET, 'operacion');

if(!empty($get)){
    $operacion = $get;
    
}else if(!empty($post)){
    $operacion = $post;
}

switch($operacion){
    case 'inactivar':
    $id_categoria = filter_input(INPUT_GET, 'idcategorias');
    if(!empty($id_categoria)){
        $cat_cuenta = new CategoriasCuentas();
        $cat_cuenta->activarDesactivarCatalogo($id_categoria);
        
        header("Location: categorias_cuentas_lista.php");
     }   
     break;
     
      case 'crear':
      $nombre_categoria = filter_input(INPUT_POST, 'nombre_categoria');
      $estructura_base = filter_input(INPUT_POST, 'estructura_base');

         if(isset($nombre_categoria)&& !empty($nombre_categoria)&& isset($estructura_base) && !empty($nombre_categoria)){
              $cat_cuenta = new CategoriasCuentas();
              $cat_cuenta->crearRegistro($nombre_categoria,$estructura_base);
                        
               header("Location: categorias_cuentas_lista.php");
                     }
     break;
     
     case'editar':
     $nombre_categoria = filter_input(INPUT_POST, 'nombre_categoria');
     $estructura_base = filter_input(INPUT_POST, 'estructura_base');
     $id = filter_input(INPUT_POST, 'id_editar');

                    
     $cat_cuenta = new CategoriasCuentas();
     $cat_cuenta->editarRegistro($id,$nombre_categoria,$estructura_base);
                        
     header("Location: categorias_cuentas_lista.php");
                    
    break;
     
    
}



