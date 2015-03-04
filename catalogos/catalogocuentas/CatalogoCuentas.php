<?php

include_once '../../config.php';
require_once '../../Conexion.php';
require_once '../MetodosCatalogos.php';

class CatlogoCuentas implements MetodosCatalogos{
    private $idcuentacontable;
    private $cuentacontable;
    private $idgruposcuentas;
    private $idtipocuenta;
    
    private $con;


    public function __construct() {
        $this->con = Conexion::open();
    }
    
    
    public function setCuentaContable($cuentacontable){
        $this->cuentacontable = $cuentacontable;
    }
    
    public function setIdGruposCuentas($idgruposcuentas){
        $this->idgruposcuentas = $idgruposcuentas;
    }
    
    public function setIdTipoCuenta($idtipocuenta){
        $this->idtipocuenta = $idtipocuenta;
    }
    
    public function getCuentaContable(){
        return $this->cuentacontable;
    }
    
    public function getIdGruposCuentas(){
        return $this->idgruposcuentas;
    }
    
    public function getIdTipoCuenta(){
        return $this->idtipocuenta;
    }
    
    
    public function activarRegistro($id) {
        try{
                $activar_cuentas = "UPDATE catalogocuentas SET estado = 1  WHERE idcuentacontable =$id";
                $this->con->query($activar_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
        
    }

    public function buscarPorId($id) {
        try{
            $query_listar="SELECT * FROM catalogo_cuentas_view WHERE idcuentacontable = $id";
            $lista_catalogo_cuentas = $this->con->query($query_listar);
        }catch (Exception $e){
            echo $e->getTraceAsString();
        }
        return $lista_catalogo_cuentas;
        
    }

    public function crearRegistro($cata_cuentas) {
        try{
            $query_crear="INSERT INTO catalogocuentas(cuentacontable,idgruposcuentas,idtipocuenta,estado) VALUES('$cata_cuentas->cuentacontable',$cata_cuentas->idgruposcuentas,$cata_cuentas->idtipocuenta,1)";
            $this->con->query($query_crear);
        }catch (Exception $e){
            echo $e->getTraceAsString();
        }
        
        
    }

    public function desactivarRegistro($id) {
        try{
                $desactivar_cuentas = "UPDATE catalogocuentas SET estado = 0 WHERE idcuentacontable =$id";
                $this->con->query($desactivar_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
        
    }

    public function editarRegistro($cata_cuentas, $id) {
         try{
                $editar_cuentas = "UPDATE catalogocuentas SET cuentacontable = '$cata_cuentas->cuentacontable',idgruposcuentas = $cata_cuentas->idgruposcuentas,idtipocuenta = $cata_cuentas->idtipocuenta WHERE idcuentacontable =$id";
                $this->con->query($editar_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
        
    }

    public function leerDatos() {
        try{
            $query_listar="SELECT * FROM catalogo_cuentas_view WHERE estado = 1";
            $lista_catalogo_cuentas = $this->con->query($query_listar);
        }catch (Exception $e){
            echo $e->getTraceAsString();
        }
        return $lista_catalogo_cuentas;
    }

    public function leerDatosInactivos() {
        try{
            $query_listar="SELECT * FROM catalogo_cuentas_view WHERE estado = 0";
            $lista_catalogo_cuentas = $this->con->query($query_listar);
        }catch (Exception $e){
            echo $e->getTraceAsString();
        }
        return $lista_catalogo_cuentas;
    }
    
   public function listaTipoCuenta() {
        try{
            $query_listar="SELECT * FROM tipocuenta WHERE idtipocuenta > 0";
            $lista_tipo_cuenta = $this->con->query($query_listar);
        }catch (Exception $e){
            echo $e->getTraceAsString();
        }
        return $lista_tipo_cuenta;
    }
}