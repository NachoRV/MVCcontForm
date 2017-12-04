<?php
include "class.conexion.php";

$con= new Conexion();


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

        $sql = "INSERT INTO `usuario`(Id_Usuario,nombre,apellido,correo,contrasentrasena, nivel) VALUES(DEFAULT,?,?,?,?,?)";
        $stmt->bind_param("sss", $nombre, $apellido, $correo,$contrasena,$nivel);
        $nombre = $this->$nombre;
        $apellido= $this->$apellidos;
        $correo= $this->$correo;
        $contrasena = $this->$contrasena;
        $nivel = $this->$nivel;
        $stmt->execute();
    
     }

     public function usuarioLogin($correo,$contrasena){

        $sql = "SELECT `Id_Usuario`, `nombre`, `apellidos`, `correo`, `cotraseña`, `nivel` FROM `usuario` WHERE `correo` ='$correo' AND `cotraseña` ='$contrasena' ";
        $stmt->bind_param("ss", $coreo, $contrasena);
        $correo = $correo;
        $contrasena = $contrasena;
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila;

     }
}

?>