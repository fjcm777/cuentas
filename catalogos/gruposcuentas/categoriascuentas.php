<?php
include_once '../../config.php';
require_once '../../Conexion.php';
require_once '../MetodosCatalogos.php';

class GruposCuentas implements MetodosCatalogos{
    
    public function activarDesactivarCatalogo($var1) {
        
    }

    public function buscarPorId($var1) {
        
    }

    public function crearRegistro($var1) {
        
    }

    public function editarRegistro($var1, $var2) {
        
    }

    public function leerDatos() {
        $conecta = new Conexion();
        try{
            $consulta_grupos_cuentas = "SELECT * FROM ";
            
        }catch(Exception $exc){
            echo $exc->getTraceAsString();
        }
    }

}