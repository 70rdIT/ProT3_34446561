<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
Use CodeIgniter\Controller;
class Login_controller extends BaseController

{
    public function index()
    {
        helper(['form', 'url']);
        $dato['titulo'] = 'Login';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');

    }
    public function auth()
    {
        helper(['form', 'url']);
        $session = session();
        $model = new usuario_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $ba=$data['baja'];
            if ($ba=='SI'){
                $session->setFlashdata('msg', 'El usuario esta dado de baja');
                return redirect()->to('/login');
            }
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){

                $ses_data = [
                    'id_usuario'       => $data['id_usuario'],
                    'nombre'     => $data['nombre'],
                    'apellido'     => $data['apellido'],
                    'usuario'     => $data['usuario'],
                    'email'     => $data['email'],
                    'perfil_id'     => $data['perfil_id'],
                    'logged_in'     => TRUE
                    ];
                $session->set($ses_data);
                session()->setFlashdata('msg', 'Bienvenido');
               
                
                return redirect()->to(base_url('/panel'));
                //return redirect()->to('/');
            }else{
                $session->setFlashdata('msg', 'Contraseña Incorrecta');
                return redirect()->to(base_url('/login'));
               
            }
        }else{
            $session->setFlashdata('msg', 'no existe el correo o es incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}