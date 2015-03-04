<?php
include_once '../../config.php';
require_once '../../Conexion.php';
require_once '../MetodosCatalogos.php';

class GruposCuentas implements MetodosCatalogos{
    public$grupo;
    public $nivel;
    private $idTitulossuperior;
    private $idcategorias;
    
    private $leer_grupocuenta;
    private $grupocuenta;

    public function __construct() {
        
    }
    
    public function getGrupo() {
        return $this->grupo;
    }
    
    public function getNivel() {
        return $this->nivel;
    }
    
    public function getIdCategorias() {
        return $this->idcategorias;
    }
    
    public function getIdTitulosSuperior() {
        return $this->idTitulossuperior;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }
    
     public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
    
     public function setIdCategorias($idcategorias) {
        $this->idcategorias = $idcategorias;
    }
    
     public function setIdTitulosSuperior($idTitulossuperior) {
        $this->idTitulossuperior = $idTitulossuperior;
    }
    
     public function leerDatos() {
        $conecta = Conexion::open();
        try {
            $consulta_grupo_cuentas = "SELECT * FROM grupos_cuentas_view WHERE estado = 1 ";
            $lista_grupo_cuentas = $conecta->query($consulta_grupo_cuentas) or trigger_error($conecta->error."[$consulta_grupo_cuentas]");
            while ($fila_grupo_cuenta = $lista_grupo_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->leer_grupocuenta[] = $fila_grupo_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->leer_grupocuenta;
        
    }
    
    public function activarRegistro($id) {
        $conecta = Conexion::open();
            try{
                $editar_grupos_cuentas = "UPDATE gruposcuentas SET estado = 1 WHERE idgruposcuentas =$id";
                $conecta->query($editar_grupos_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
    }
    
     public function desactivarRegistro($id) {
         $conecta = Conexion::open();
            try{
                $editar_grupos_cuentas = "UPDATE gruposcuentas SET estado = 0 WHERE idgruposcuentas =$id";
                $conecta->query($editar_grupos_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }    
    }

    public function buscarPorId($id) {
        $conecta = Conexion::open();
        try {
            $consulta_id_grupo_cuentas = "SELECT * FROM grupos_cuentas_view WHERE idgrupo = $id";
            $lista_id_grupo_cuentas = $conecta->query($consulta_id_grupo_cuentas);
            while ($fila_grupo_cuenta = $lista_id_grupo_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->grupocuenta[] = $fila_grupo_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->grupocuenta;
        
    }

    public function crearRegistro($grup_cuenta) {
        $conecta = Conexion::open();
            try{
                $crear_grupo_cuentas = "INSERT INTO gruposcuentas(grupo,nivel,idTitulossuperior,idcategorias,estado) VALUES ('$grup_cuenta->grupo',$grup_cuenta->nivel,$grup_cuenta->idTitulossuperior,$grup_cuenta->idcategorias,1)";
                $conecta->query($crear_grupo_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
        
    }

    public function editarRegistro($grup_cuenta, $id) {
        $conecta = Conexion::open();
            try{
                $editar_grupo_cuentas = "UPDATE gruposcuentas SET grupo = '$grup_cuenta->grupo',nivel = $grup_cuenta->nivel,idTitulossuperior = $grup_cuenta->idTitulossuperior,idcategorias = $grup_cuenta->idcategorias WHERE idgruposcuentas =$id";
                $conecta->query($editar_grupo_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
    }

    public function leerDatosInactivos() {
        $conecta = Conexion::open();
        try {
            $consulta_grupo_cuentas = "SELECT * FROM grupos_cuentas_view WHERE estado = 0";
            $lista_grupo_cuentas = $conecta->query($consulta_grupo_cuentas) or trigger_error($conecta->error."[$consulta_grupo_cuentas]");
            while ($fila_grupo_cuenta = $lista_grupo_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->grupocuenta[] = $fila_grupo_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->grupocuenta;
        
    }
    
}