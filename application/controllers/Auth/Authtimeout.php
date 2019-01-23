<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;
/*
 * Changes:
 * 1. This project contains .htaccess file for windows machine.
 *    Please update as per your requirements.
 *    Samples (Win/Linux): http://stackoverflow.com/questions/28525870/removing-index-php-from-url-in-codeigniter-on-mandriva
 *
 * 2. Change 'encryption_key' in application\config\config.php
 *    Link for encryption_key: http://jeffreybarke.net/tools/codeigniter-encryption-key-generator/
 * 
 * 3. Change 'jwt_key' in application\config\jwt.php
 * 3. Change 'token_timeout' in application\config\jwt.php
 *
 */
class Authtimeout extends REST_Controller
{
    /**
     * URL: http://localhost/CodeIgniter-JWT-Sample/authtimeout/token
     * Method: GET
     */
    public function getToken_post()
    {
        $tokenData = array();
        /* Date helper
        * https://www.codeigniter.com/user_guide/helpers/date_helper.html
        * Added helper "date" in application\config\autoload.php line 92
        * Notice - 'timestamp' is part of $tokenData
        */
        $tokenData = array();
        $tokenData['userId'] = $this->post('userId');
        $tokenData['roleId'] = $this->post('roleId');
        $tokenData['clientId'] = $this->post('clientId');
        $tokenData['clientSecret'] = $this->post('clientSecret');
        $tokenData['timestamp'] = now();
        $output['token'] = AUTHORIZATION::generateToken($tokenData);
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    /**
     * URL: http://localhost/CodeIgniter-JWT-Sample/authtimeout/token
     * Method: POST
     * Header Key: Authorization
     * Value: Auth token generated in GET call
     */
    public function login_post()
    {
        $headers = $this->input->request_headers();
        if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
            //TODO: Change 'token_timeout' in application\config\jwt.php
            $decodedToken = AUTHORIZATION::validateTimestamp($headers['Authorization']);
            // return response if token is valid
            if ($decodedToken != false) {
                $this->set_response($decodedToken, REST_Controller::HTTP_OK);
                return;
            }
        }
        $response['status'] = REST_Controller::HTTP_UNAUTHORIZED;
        $response['message'] = 'failure';
        $response['display_message'] = 'Token expired';
        $response['data'] = [];
        $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
    }
}