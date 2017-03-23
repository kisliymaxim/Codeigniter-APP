<?php

if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

require_once( APPPATH.'/libraries/smarty/libs/Smarty.class.php' );

class Smartyci extends Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->caching = 0;
        $this->setTemplateDir( APPPATH . 'views' );
        $this->setCompileDir( APPPATH . 'tpl/templates_c' );
        $this->setConfigDir( APPPATH . 'tpl/configs' );
        $this->setCacheDir( APPPATH . 'tpl/cache' );
    }

    //if specified template is cached then display template and exit, otherwise, do nothing.
    public function useCached( $tpl, $cacheId = null )
    {
        if ( $this->isCached( $tpl, $cacheId ) )
        {
            $this->display( $tpl, $cacheId );
            exit();
        }
    }
}