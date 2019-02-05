<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('uploadImage')){
	function getConfigImage($fileName){
        $yearFolder = date('Y');
        if(!is_dir('././assets/uploads/'.$fileName.'/'.$yearFolder)) {
            mkdir('././assets/uploads/'.$fileName.'/'.$yearFolder, 0777, true);
        }
        $monthFolder = date('m');
        if(!is_dir('././assets/uploads/'.$fileName.'/'.$yearFolder."/".$monthFolder)) {
            mkdir('assets/uploads/'.$fileName.'/'.$yearFolder."/".$monthFolder, 0777, true);
        }
        $dateFolder = date('d');
        if(!is_dir('././assets/uploads/'.$fileName.'/'.$yearFolder."/".$monthFolder."/".$dateFolder)) {
            mkdir('assets/uploads/'.$fileName.'/'.$yearFolder."/".$monthFolder."/".$dateFolder, 0777, true);
        }
        $folder = $yearFolder . "/" . $monthFolder . "/" . $dateFolder . "/";

        $config['upload_path']          = '././assets/uploads/'.$fileName."/". $folder;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10024;
        $config['override']             = true;

        return $config;
	}
}

?>