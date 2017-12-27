<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','formacion');
/*
define('DB_HOST','mysql508int.srv-hostalia.com');
define('DB_USER','u5167132_nacho');
define('DB_PASS','nachoroyo_22');
define('DB_NAME','db5167132_formacion');*/
require('../../core/models/class.conexion.php');
$con = new Conexion();

class Usuario{


     
    private $Id_Usuario;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasena;
    private $nivel;

    public function __construct(){
         
      /*  $this->$Id_Usuario = "";
        $this->$nombre = "";
        $this->$apellidos = "";
        $this->$correo = "";
        $this->$contrasena = "";
        $this->$nivel ="";*/

     }
     public function setId_Usuario($Id_Usuario){

        $this->$Id_Usuario = $Id_Usuario;

     }
     public function setNombre($nombre){

        $this->$nombre = $nombre;

     }
     public function setApeliidos($apellidos){

        $this->$apellidos = $apellidos;

     }
     public function setCorreo($correo){

        $this->$correo = $correo;

     }
     public function setContrasena($contrasena){

        $this->$contrasena = $contrasena;

     }
     public function setNivel($nivel){

        $this->$nivel = $nivel;

     }

     public function getId_usuario(){
            return $this->$Id_Usuario;
     }
      public function getNombre (){
            return $this->$nombre;
     }
      public function getApellidos(){
            return $this->$apellidos;
     }
      public function getCorreo(){
            return $this->$correo;
     }
      public function getContrasena(){
            return $this->$Contrasena;
     }
      public function getNivel(){
            return $this->$nivel;
     }

     public function agregarUsuario(){
      $con = new Conexion();
        $sql = "INSERT INTO `usuario`(Id_Usuario,nombre,apellido,correo,contrasentrasena, nivel) VALUES(DEFAULT,?,?,?,?,?)";
        $stmt = $con->prepare($sql); 
        $stmt->bind_param("sss", $nombre, $apellido, $correo,$contrasena,$nivel);
        $nombre = $this->$nombre;
        $apellido= $this->$apellidos;
        $correo= $this->$correo;
        $contrasena = $this->$contrasena;
        $nivel = $this->$nivel;
        $stmt->execute();
    
     }

     public function usuarioLogin($correo,$contrasena){

      $con = new Conexion();  
        $sql =  'SELECT * FROM usuario WHERE correo =? AND cotraseña =?';
        $stmt = $con->prepare($sql);     
        $stmt->bind_param("ss", $correo1, $contrasena1);
        
        $correo1 = $correo;
        $contrasena1 = $contrasena;
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();

     
      return $fila;

     }
}

?>