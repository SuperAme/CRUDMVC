<?php 
    class pages extends Controller{
        public function __construct(){
            //echo "Controlador paginas cargado";
            //$this->articuloModelo = $this->modelo('Articulo');
            $this->usuarioModelo = $this->modelo('Usuario');
        }
        public function index(){
            //$articulos = $this->articuloModelo->obtenerArticulos();
            //Obtener los usuarios
            $usuarios = $this->usuarioModelo->obtenerUsuarios();
                
            $datos = [
                'usuarios' => $usuarios,
                
            ];
            $this->view('pages/ini',$datos);
        }
        public function agregar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
            ];
                if($this->usuarioModelo->agregarUsuario($datos)){
                    redireccionar('/pages');
                }else{
                    die('Algo salio mal');
                }
            }else{
                $datos =[
                    'nombre' => '',
                    'email' => '',
                    'telefono' => ''
                ];
                $this->view('pages/agregar',$datos);
            }
            
        }
        public function editar($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_usuario' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                ];
                if($this->usuarioModelo->actualizarUsuario($datos)){
                    redireccionar('/pages');
                }else{
                    die('Algo salio mal');
                }
            }else{
                //obtener informacion de usuario desde el modelo
                $usuario = $this->usuarioModelo->obtenerUsuarioId($id);
                $datos =[
                    'id_usuario' => $usuario->id_usuario,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'telefono' => $usuario->telefono
                ];
                $this->view('pages/editar',$datos);
            }
        }
        public function borrar($id){
            //obtener informacion de usuario desde el modelo
                $usuario = $this->usuarioModelo->obtenerUsuarioId($id);
                $datos =[
                    'id_usuario' => $usuario->id_usuario,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'telefono' => $usuario->telefono
                ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_usuario' => $id                    
                ];
                if($this->usuarioModelo->borrarUsuario($datos)){
                    redireccionar('/pages');
                }else{
                    die('Algo salio mal');
                }
            }
            
            $this->view('pages/borrar',$datos);
        }
        
        
    }
?>