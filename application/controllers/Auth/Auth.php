<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index(){
        $user = array();
        $user['username'] = $this->input->post('username');
        $user['password'] = md5($this->input->post('password'));
        $user = $this->UsersModel->getByUsernameAndPassword($user);
        if(count($user)>0){
            $tokenData = array();
            $tokenData['id'] =  $user[0]['id'];
            $tokenData['roleId'] =  $user[0]['role_id'];
            $tokenData['username'] = $user[0]['username'];
            $getToken = $this->getToken_post($tokenData);
            // print_r($getToken);
            // die();

            if($getToken && $user){
                $auth = array(
                    'id'  => $tokenData['id'],
                    'username' => $tokenData['username'],
                    'roleId' => $tokenData['roleId'],
                    'token' => $getToken
                );
                $this->session->set_userdata($auth);
                $decodedToken = AUTHORIZATION::validateToken($getToken);
                if ($decodedToken != false) {
                    $this->session->set_flashdata('success', 'Success login!');
                    redirect(base_url('dashboard'), 'refresh');
                }
            }

            $this->session->set_flashdata('error', 'Token expired');
            redirect(base_url(), 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Failed login!');
            redirect(base_url(), 'refresh');
        }
    }
    
	public function register()
	{
		$this->load->view('user/register');
    }
    
    public function getToken_post($data)
    {
        return $tokenData['token'] = AUTHORIZATION::generateToken($data);
        // $this->set_response($tokenData, REST_Controller::HTTP_OK);
    }

    public function logout(){
        unset(
            $_SESSION['userId'],
            $_SESSION['roleId'],
            $_SESSION['token']
        );
        redirect(base_url(), 'refresh');
    }
}