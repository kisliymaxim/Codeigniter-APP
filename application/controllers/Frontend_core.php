<?php

class Frontend_core extends CI_Controller {

    public $userdata = null;
    public $frontend_tpl = 'frontend';
    public $service_email = 'kisliymaxim@kisliymaxim.zzz.com.ua';
    public $navbar_tpl = 'navbar';

    public function __construct() {
        parent::__construct();
        session_start();

        if (isset($_SESSION['uid']))
            $this->userdata = $this->User->get_user($_SESSION['uid']);
        else
            $this->userdata = null;

        $this->assign_vars();
    }

    //Generate page
    protected function showall($tpl,$page_title = false) {
        if ($this->userdata != null) {
            $this->smarty->assign('userdata', $this->userdata);

            $this->smarty->assign('uid', $_SESSION['uid']);
            $this->smarty->assign('user_initial', $this->upFirstLetter($this->userdata['firstname']).' '.mb_substr($this->upFirstLetter($this->userdata['lastname']),0,1,"UTF-8").'.');
        }

        if($page_title)
            $this->smarty->assign('page_title', $page_title);
        else
        $this->smarty->assign('page_title', 'Codeonward - Страница');

        $this->smarty->assign('navbar', $this->smarty->fetch($this->navbar_tpl.'.tpl'));
        $this->smarty->assign('content', $this->smarty->fetch($tpl.'.tpl'));

        $this->smarty->display($this->frontend_tpl.'.tpl');
    }

    //attach config url
    protected function assign_vars() {
        $this->smarty->assign('base_url', config_item('base_url'));
        $this->smarty->assign('img_url', config_item('img_url'));
        $this->smarty->assign('upl_url', config_item('upl_url'));
        $this->smarty->assign('css_url', config_item('css_url'));
        $this->smarty->assign('js_url', config_item('js_url'));
    }

    //Check login-staus user
    public function check_user(){
        if (!isset($_SESSION['uid'])){
            header('HTTP/1.1 301 Moved Permanently');
            header('location: ' . config_item('base_url') . 'page404');
            exit();
        }                        
    }

    //Set First letter up
    public function upFirstLetter($stri) {
        if ($stri{0} >= "\xc3")
            return (($stri{1} >= "\xa0") ? ($stri{0} . chr(ord($stri{1}) - 32)) : ($stri{0} . $stri{1})) . substr($stri, 2);
        else
            return ucfirst($stri);
    }
}