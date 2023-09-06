<?php

namespace App;

class Propiedad{

    //Base de datos. No requerimos crear diferentes instancias, por eso la hacemos static.
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    //Erorres o validacion
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    //Definir la conexion a la Base de datos
    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar(){

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //Con la funcion join convertimos a string un arreglo (array_keys($atributos)).
        //El primer parametro es el separador, y el segundo el array que queremos convertir.
        $columnas = join(', ',array_keys($atributos));
        $filas = join("', '",array_values($atributos));
        
        //Consulta para insertar datos
        $query = "INSERT INTO propiedades($columnas) VALUES ('$filas')";

        $resultado = self::$db->query($query);
        
        return $resultado;
    }

    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue; //Cuando se cumpla esa condicion, ignoralo y vete al siguiente elemento del foreach
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Asignar al atributo de imagen el nombre de la imagen para tener la ref y guardarla en la BD
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Validacion
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if(!$this->titulo ){
            self::$errores[] = "Debes añadir un título";
        }
      
        if(!$this->precio ){
        self::$errores[] = "El precio es obligatorio";
        }
    
        if(strlen($this->descripcion) < 50 ){
        self::$errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }
    
        if(!$this->habitaciones){
        self::$errores[] = "El numero de habitaciones es obligatorio";
        }
    
        if(!$this->wc){
        self::$errores[] = "El numero de baños es obligatorio";
        }
    
        if(!$this->estacionamiento){
        self::$errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }
    
        if(!$this->vendedores_id){
        self::$errores[] = "Elige un vendedor";
        }
    
        if(!$this->imagen){
        self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }
}