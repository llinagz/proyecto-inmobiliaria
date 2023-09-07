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
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }

    public function guardar(){
        if($this->id){
            //actualizar
            $this->actualizar();
        }else{
            //creando un nuevo registro
            return $this->crear();
        }
    }

    public function crear(){
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

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        //Va al objeto en memoria y va uniendo atributos con valores.
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE propiedades SET "; 
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado){
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
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
        //Elimina la imagen previa. Revisamos que exista y tenga un valor.
        if(isset($this->id)){
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen para tener la ref y guardarla en la BD
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Elimina el archivo
    public function borrarImagen(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
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

    //Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Busca un registro por su id
    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE id={$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar BD
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while($registro = $resultado -> fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
    
        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        //Clase padre, una nueva propiedad
        $objeto = new self;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            //Revisa de un objeto que una propiedad/atributo exista
            if(property_exists($this, $key) && !is_null($value)){
                //Es una variable no una propiedad
                $this->$key = $value;
            }
        }
    }
}