<?php

include_once './GruposCuentas.php';


$grup_cuenta = new GruposCuentas();

$post = filter_input(INPUT_POST, 'operacion'); 
$get = filter_input(INPUT_GET, 'operacion');

if(!empty($get)){
    $operacion = $get;
    
}else if(!empty($post)){
    $operacion = $post;
}

switch($operacion){
    
    case 'inactivar':
    $id_grupo = filter_input(INPUT_GET, 'idgrupo');
    if($id_grupo!= NULL){
        $grup_cuenta->desactivarRegistro($id_grupo);
        
        header("Location: grupos_cuentas_lista.php");
     }   
     break;
     
     case 'activar':
    $id_grupo = filter_input(INPUT_GET, 'idgrupo');
    if(!empty($id_grupo)){
        $grup_cuenta->activarRegistro($id_grupo);
        
        header("Location: grupos_cuentas_lista_inactivos.php");
     }   
     break;
     
      case 'crear':
          
      $grup_cuenta->setGrupo(filter_input(INPUT_POST, 'nombre_grupo'));
      $grup_cuenta->setNivel(filter_input(INPUT_POST, 'nivel_grupo'));
      $grup_cuenta->setIdCategorias(filter_input(INPUT_POST, 'categoria'));
      $grup_cuenta->setIdTitulosSuperior(filter_input(INPUT_POST, 'titulo_superior'));
        
      echo $grup_cuenta->getGrupo();
      echo $grup_cuenta->getNivel();
      echo $grup_cuenta->getIdCategorias();
      echo $grup_cuenta->getIdTitulosSuperior();
         if(isset($grup_cuenta)){
              $grup_cuenta->crearRegistro($grup_cuenta);
              
        header("Location: grupos_cuentas_lista.php");
                     }
     break;
     
     case'editar':
         
     $grup_cuenta->setGrupo(filter_input(INPUT_POST, 'nombre_grupo'));
     $grup_cuenta->setNivel(filter_input(INPUT_POST, 'nivel_grupo'));
     $grup_cuenta->setIdCategorias(filter_input(INPUT_POST, 'categoria'));
     $grup_cuenta->setIdTitulosSuperior(filter_input(INPUT_POST, 'titulo_superior'));
     $id = filter_input(INPUT_POST, 'id_editar');
     
     echo $id;
     echo $grup_cuenta->getGrupo().'<br>'.$grup_cuenta->getIdCategorias().'<br>'.$grup_cuenta->getIdTitulosSuperior().'<br>'.$grup_cuenta->getNivel();
     
      if (isset($grup_cuenta)&& isset($id)) {  
          
        $grup_cuenta->editarRegistro($grup_cuenta,$id);
        
        header("Location: grupos_cuentas_lista.php");
      }
      
    break;
     
    
}