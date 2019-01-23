<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index(){
        $this->load->view('dashboard');
    }
    
	public function register()
	{
		$this->load->view('user/register');
    }
    
    public function getToken_post($data)
    {
        $tokenData['token'] = AUTHORIZATION::generateToken($data);
        // $this->set_response($tokenData, REST_Controller::HTTP_OK);
    }
    
    public function login()
    {

        $user = array();
        $user['username'] = $this->post('username');
        $user['password'] = md5($this->post('password'));
        $users = $this->UsersModel->getByUsernameAndPassword($user);
        if($users){
            $tokenData = array();
            $tokenData['userId'] =  $user['userId'];
            $tokenData['roleId'] =  $user['roleId'];
            $getToken = $this->getToken_post($tokenData);

            if($getToken && $users){
                $auth = array(
                    'userId'  => $getToken['userId'],
                    'roleId' => $getToken['roleId'],
                    'token' => $getToken['token']
                );
                $this->session->set_userdata($auth);
                $decodedToken = AUTHORIZATION::validateToken($getToken);
                if ($decodedToken != false) {
                    $this->session->set_flashdata('success', 'Success login!');
                    $this->view('dashboard');
                    return;
                }
            }

            $this->session->set_flashdata('error', 'Token expired');
            redirect('/', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Failed login!');
            redirect('/', 'refresh');
        }
    }
}