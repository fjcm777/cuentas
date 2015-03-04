<?php

require_once './CatalogoCuentas.php';

$cata_cuenta = new CatlogoCuentas();

$get = filter_input(INPUT_GET, 'operacion');
$post = filter_input(INPUT_POST, 'operacion');

if(!empty($get)){
    $operacion = $get;
}else if(!empty ($post)){
    $operacion = $post;
}

switch($operacion){
    
    case 'inactivar':
    $id_cuenta = filter_input(INPUT_GET, 'idcuenta');
    if(!empty($id_cuenta)){
        $cata_cuenta->desactivarRegistro($id_cuenta);
        
        echo $id_cuenta; 
        //header("Location: catalogo_cuentas_lista.php");
     }   
     break;
     
     case 'activar':
    $id_cuenta = filter_input(INPUT_GET, 'idcuenta');
    if(!empty($id_cuenta)){
        $cata_cuenta->activarRegistro($id_cuenta);
        
        header("Location: catalogo_cuentas_lista_inactivos.php");
     }   
     break;
     
      case 'crear':
          
      $cata_cuenta->setCuentaContable(filter_input(INPUT_POST, 'cuenta_contable'));
      $cata_cuenta->setIdGruposCuentas(filter_input(INPUT_POST, 'grupo_cuentas'));
      $cata_cuenta->setIdTipoCuenta(filter_input(INPUT_POST, 'tipo_cuenta'));
        
         if(isset($cata_cuenta)){
              $cata_cuenta->crearRegistro($cata_cuenta);
              
        header("Location: catalogo_cuentas_lista.php");
                     }else{echo 'not';}
     break;
     
     case'editar':
         
     $cata_cuenta->setCuentaContable(filter_input(INPUT_POST, 'cuenta_contable'));
     $cata_cuenta->setIdGruposCuentas(filter_input(INPUT_POST, 'grupo_cuentas'));
     $cata_cuenta->setIdTipoCuenta(filter_input(INPUT_POST, 'tipo_cuenta'));
     $id = filter_input(INPUT_POST, 'id_editar');
     
      if (isset($cata_cuenta)&& isset($id)) {  
          
        $cata_cuenta->editarRegistro($cata_cuenta,$id);
        
                      
        header("Location: catalogo_cuentas_lista.php");
      }
      
    break;
}