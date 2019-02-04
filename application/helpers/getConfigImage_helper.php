<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('uploadImage')){
	function getConfigImage($fileName){
		$yearFolder = date('Y');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder)) {
            mkdir('././assets/uploads/articles/' . $yearFolder, 0777);
        }
        $monthFolder = date('m');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder, 0777);
        }
        $dateFolder = date('d');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder, 0777);
        }
        $folder = $yearFolder . "/" . $monthFolder . "/" . $dateFolder . "/";

        $config['upload_path']          = '././assets/uploads/articles/' . $folder;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10024;
        $config['override']             = true;

        return $config;
	}
}

?>