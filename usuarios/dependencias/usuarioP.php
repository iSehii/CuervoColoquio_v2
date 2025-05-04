<?php

ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
class DBP{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = getenv('DB_HOST');
        $this->db       = getenv('DB_NAME');
        $this->user     = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
class UsuarioP extends DBP {
    private $nombre;
    private $ApellidoP;
    private $ApellidoM;
    private $Genero;
    private $Correo;
    private $Matricula;
    private $Foto;
    private $id_rol;
    private $id_usuario;
    private $telefono;
    private $Fecha_creacion;
    private $Fecha_modificacion;
    private $Activo;
    private $Fecha_nacimiento;

    public function setUser($id_usuario){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE id_usuario = :id_usuario');
        $query->execute(['id_usuario' => $id_usuario]);
        
        foreach ($query as $Usuario) {
            $this->id_usuario = $Usuario['id_usuario'];
            $this->nombre = $Usuario['Nombre'];
            $this->ApellidoP = $Usuario['Apellido_paterno'];
            $this->ApellidoM = $Usuario['Apellido_materno'];
            $this->Genero = $Usuario['Genero'];
            $this->Correo = $Usuario['Correo'];
            $this->Matricula = $Usuario['Matricula'];
            $this->Foto = $Usuario['Foto'];
            $this->id_rol = $Usuario['id_rol'];
            $this->telefono = $Usuario['Telefono'];
            $this->Fecha_creacion = $Usuario['Fecha_creacion'];
            $this->Fecha_modificacion = $Usuario['Fecha_modificacion'];
            $this->Activo = $Usuario['Activo'];
            $this->Fecha_nacimiento = $Usuario['Fecha_nacimiento'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidoPaterno() {
        return $this->ApellidoP;
    }
    
    public function getApellidoMaterno() {
        return $this->ApellidoM;
    }
    
    public function getGenero() {
        return $this->Genero;
    }
    
    public function getCorreo() {
        return $this->Correo;
    }
    
    public function getMatricula() {
        return $this->Matricula;
    }
    
    public function getFoto() {
        return $this->Foto;
    }
    
    public function getIdRol() {
        if ($this->id_rol == 1) {
            $id_rol = "Administrador";
        } else if ($id_rol == 2) {
            $id_rol = "Docente";
        } else {
            $id_rol = "Alumno";
        }
        return $id_rol;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function getFechaCreacion() {
        return $this->Fecha_creacion;
    }
    
    public function getFechaModificacion() {
        return $this->Fecha_modificacion;
    }
    
    public function getActivo() {
        if ($this->Activo == 1) {
            $Activo = "Activo";
        } else {
            $Activo = "Inactivo";
        }
        return $Activo;
    }
    
    public function getFechaNacimiento() {
        return $this->Fecha_nacimiento;
    }
    public function getIdUsuario() {
        return $this->id_usuario;
    }
}

?>