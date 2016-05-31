<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //載入參數
        $this->config->load('config_qq');
    }

    public function index() {
        $this->load->view('qqlogin');
    }

    /**
     * QQ登入畫面
     */
    public function qq_login() {
        $qq_state = md5(uniqid(rand(), TRUE)); //CSRF protection
        
        //轉址QQ登入畫面
        $this->qqclass->qq_login($qq_state, $this->config->item("qq_appid"), $this->config->item("qq_scope"), $this->config->item("qq_callback")); 
    }

    /**
     * QQ登入返回
     */
    public function qq_callback() {
        $inputs = $this->input->get();
        
         //取得 access token
        $access_token = $this->qqclass->qq_callback($inputs, $this->config->item("qq_appid"), $this->config->item("qq_appkey"), $this->config->item("qq_callback"));
        
        //取得 open id
        $open_id = $this->qqclass->get_openid($inputs, $access_token);
        
        //取得用戶資料
        $user = $this->qqclass->get_user_info($access_token, $this->config->item("qq_appid"), $open_id);
        
        $data = new stdclass();
        $data->user = $user;
        $this->load->view('qqlogin', $user);
    }

}
