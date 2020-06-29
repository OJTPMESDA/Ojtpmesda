<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
    {	
        parent::__construct();
    }

    protected function _uploadFiles($dir)
    {
    	$config['upload_path']      = $dir;
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $post_image = null;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $post_image = $dir.'/'.$_FILES['userfile']['name']; 
        }

        return $post_image;
    }

    protected function _mkdir($dir)
    {
    	if (!empty($dir)) {
    		if(!is_dir($dir)) {
	            mkdir($dir, 0755, TRUE);
	        }

	        return $dir;
    	}
    }

    /**
     * Password hashing
     * @link https://www.php.net/manual/en/function.password-hash.php
     * @param string $email
     * @return bool
     */
	public function _password_hash($password) {

		$options = ['cost' => 12];

		$hash = password_hash($password, PASSWORD_BCRYPT, $options);

		return $hash;

	}

    /**
     * Password Verify
     * @link https://www.php.net/manual/en/function.password-verify.php
     * @param string $password
     * @param string $hash
     * @return bool
     */
	public function _password_verify($password,$hash) {

		$verified = password_verify($password, $hash);

		return $verified;

	}
}