<?php
    class AuthController{
        /**
         * Funcion que redirige a la vista del login
         */
        public function login(){
            echo $GLOBALS['twig']->render('auth/login.twig');
        }

        /**
         * Funcion que redirige a la vista del register
         */
        public function register(){
            echo $GLOBALS['twig']->render('auth/register.twig');
        }

        /**
         * Funcion que redirige a la vista del home
         */
        public function home(){
            if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'){
                echo $GLOBALS['twig']->render('home.twig',
                    ['mensaje' => 
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Registro completado
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                        ]
                );
            }elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'){
                echo $GLOBALS['twig']->render('home.twig',
                    ['mensaje' => 
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Error en el registro
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                        ]
                );
            }else{
                echo $GLOBALS['twig']->render('home.twig');
            }
        }

        /**
         * Funcion que realiza el login de usuario con su correspondiente validacion
         */
        public function doLogin(){
            // Identificar al usuario
			// Consulta a la base de datos
			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			$identity = $user->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				header("Location:".base_url.'auth/home');
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
				header("Location:".base_url.'auth/login');
			}
        }

        /**
         * Funcion que realiza el registro de usuario 
         */
        public function doRegister(){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			
			if($nombre && $apellidos && $email && $password){
				$user = new User();
				$user->setNombre($nombre);
				$user->setApellidos($apellidos);
				$user->setEmail($email);
				$user->setPassword($password);
				$save = $user->save();
				if($save){
					$_SESSION['register'] = "complete";
					header("Location:".base_url.'auth/login');
				}else{
					$_SESSION['register'] = "failed";
					header("Location:".base_url.'auth/register');
				}
			}else{
				$_SESSION['register'] = "failed";
				header("Location:".base_url.'auth/register');
			}
        }

        /**
         * Funcion que realiza el logout del usuario
         */
        public function logout(){
            if(isset($_SESSION['identity'])){
                unset($_SESSION['identity']);
            }
            
            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']);
            }
            
            header("Location:".base_url.'index/index');
        }
    }
?>