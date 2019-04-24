<?php

namespace App\Controllers\Auth;

use Controller;
use Ninja\Auth;
use App\Middlewares\IsGuest;
use App\Middlewares\IsAuth;
use App\Models\User;

class AuthController extends Controller {

    public function register() {

        new IsGuest;

        if($_SERVER['REQUEST_METHOD']=='POST') {

            $data = [
                'name'=> $_POST['name'],
                'email'=> $_POST['email'],
                'password'=> $_POST['password'],
                'confirm_password'=> $_POST['confirm_password'],
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            if(empty($data['name']))
                $data['name_error'] = 'Please enter Name';

            if(empty($data['email']))
                $data['email_error'] = 'Please enter Email';
            else if(User::checkEmail($data['email']))
                $data['email_error'] = 'Email is already taken';

            if(empty($data['password']))
                $data['password_error'] = 'Please enter password';
            else if(strlen($data['password'])<6)
                $data['password_error'] = 'Password length should be more than 6';

            if(empty($data['confirm_password'])) 
                $data['confirm_password_error'] = 'Please enter confirm password';
            else if($data['password'] != $data['confirm_password'])
                $data['confirm_password_error'] = 'Password and Confirm Password are not same';

            if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error']) ) {
                
                User::create([
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'password' => password_hash($data['password'], PASSWORD_DEFAULT)
                ]);

                redirect('auth/login');
            }
            else    
                $this->view('auth/registerpage',$data);

        } else {

            $data = [
                'name'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'name_error'=>'',
                'email_error'=>'',
                'password_error'=>'',
                'confirm_password_error'=>''
            ];

            $this->view('auth/registerpage',$data);
        }
    }

    public function login() {

        new IsGuest;

        if($_SERVER['REQUEST_METHOD']=='POST') {

            $data = [
                'email'=> $_POST['email'],
                'password'=> $_POST['password'],
                'email_error'=>'',
                'password_error'=>'',
            ];    
            
            if(empty($data['email']))
                $data['email_error'] = 'Please enter Email';
            else if(!User::checkEmail($data['email']))
                $data['email_error'] = 'No Acount Found with this email';

            if(empty($data['password']))
                $data['password_error'] = 'Please enter Password';

            if(empty($data['email_error']) && empty($data['password_error'])) {
                if(User::validate($data['email'],$data['password'])) {
                    redirect('dashboard');
                } else {
                    $data['password_error'] = 'Password is not matched';
                }
            }    

            $this->view('auth/loginpage',$data);

        } else {

            $data = [
                'email'=>'',
                'password'=>'',
                'email_error'=>'',
                'password_error'=>'',
            ];

            $this->view('auth/loginpage',$data);
        }
    }

    public function logout() {

        new IsAuth;

        if($_SERVER['REQUEST_METHOD']!='POST')
            die('INVALID METHOD' . $_SERVER['REQUEST_METHOD'] .' USED . POST REQUIRED');
        else {
            Auth::deAuth();
            redirect('/');
        }
    }
}