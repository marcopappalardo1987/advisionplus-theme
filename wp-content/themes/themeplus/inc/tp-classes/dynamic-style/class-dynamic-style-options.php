<?php

namespace tpCore\cssGenerator;

require_once get_template_directory() . '/inc/tp-classes/tp-core.php';
use tpCore\themeplus;

/**
 * This class generates all the css code for the Header dynamically.
 */
class headerCssGenerator{

    /**
	 * Redux options
	 * 
	 * @var object
	 */
    protected $option;
    
    /**
	 * Theme Plus Core
	 * 
	 * @var object
	 */
	protected $theme;

    public function __construct(){

		/**
		 * Theme Plus Options from Redux
		 */
        $this->option = $GLOBALS["themeplus_option"];
        
        /**
         * Theme Plus Core
         */
        $this->theme = new themeplus;
        
        $this->global_style_options();
        $this->header_style_options();
        $this->dynamic_css_generation();
    }


    protected $css_global;
    protected $css_header;

    /**
     * This method sets all the conditions to generate the css dynamically for global elements layout
     *
     * @return void
     */
    public function global_style_options(){
        $this->css_global = null;
        
        //Global site width
        if(isset($this->option["tp-site-width"])){
            $this->css_global .= '#tp-top-header, .tp-logo, .tp-main, .site-info, #site-navigation, #tp-header-logo, .tp-entry-content, .tp-entry-footer, .tp-title-bar-page, body.single-post article, body.single-post #comments {width: 100%; max-width: '.$this->option["tp-site-width"].'; margin: auto;';
            if($this->css_global .= $this->option["tp-site-padding"]["padding-right"] == '' || $this->option["tp-site-padding"]["padding-left"] == ''){
                $this->css_global .= 'padding: 0px 15px;';
            }
            $this->css_global .= '}';
        }

        return($this->css_global);
    }

    /**
     * This method sets all the conditions to generate the css dynamically for the header layout
     *
     * @return void
     */
    public function header_style_options(){
        $this->css_header = null;

        //Top Header Background
        if(isset($this->option["tp-top-header-background"])){
            $this->css_header .= $this->theme->background_color_css($this->option["tp-top-header-background"]["background-color"], $this->option["tp-top-header-background-opacity"], '.tp-site-header #tp-top-header-container');
        }

        //Logo Align
        if(isset($this->option["tp-logo-align"])){
            if($this->option["tp-logo-align"]=='right'){
                $this->css_header .= '.tp-logo-default {float: right;}';
            }
            elseif($this->option["tp-logo-align"]=='center'){
                $this->css_header .= '.tp-logo-default {max-width: max-content; margin: auto;}';
            }
            else{}
        }

        //Primary Menu Height 
        if(isset($this->option["tp-primary-menu-height"])){
            $this->css_header .= '#site-navigation > div {height: '.$this->option["tp-primary-menu-height"].';'; 
                if($this->option["tp-primary-menu-vertical-align"]){
                    $this->css_header .= 'display: table-cell; vertical-align: '.$this->option["tp-primary-menu-vertical-align"].';}';
                }               
        }

        //Primary Menu Padding Right
        if(isset($this->option["tp-primary-menu-right-padding"])){
            $this->css_header .= '#primary-menu li {padding-right: '.$this->option["tp-primary-menu-right-padding"].'px;}';
            $this->css_header .= '#primary-menu li:last-child {padding-right: 0px;}';
        }

        //Top Header Menu Padding Right
        if(isset($this->option["tp-top-header-menu-right-padding"])){
            $this->css_header .= '#top-header-menu li {padding-right: '.$this->option["tp-top-header-menu-right-padding"].'px;}';
            $this->css_header .= '#top-header-menu li:last-child {padding-right: 0px;}';
        }
        
        return($this->css_header);
    }

    /**
     * This method sets all the conditions to generate the css dynamically for global elements layout
     *
     * @return void
     */
    public function blog_archive_style_options(){
        $this->css_blog = null;
        
        //Global site width
        $this->body_classes = get_body_class();

        if($this->option['tp-show-sidebar-blog-archive'] != 'none' && in_array("blog", $this->body_classes)){
			$this->css_blog .= '.tp-sidebar-blog-active .tp-main {display: flex;}';
		}

        return($this->css_blog);
    }


    /**
     * Url of the file where the css code will be written.
     *
     * @var string
     */
    public $options_header_css;

    /**
     * Code css generated.
     *
     * @var mixed
     */
    public $css;

    /**
     * File where the css code is inserted.
     *
     * @var resource
     */
    public $file;

    /**
     * This method writes a css file for the theme header
     *
     * @return void
     */
    public function dynamic_css_generation(){
        $this->options_header_css = get_template_directory() . '/assets/public/css/options-header.css';
        $this->css  = $this->global_style_options();
        $this->css .= $this->header_style_options();
        $this->css .= $this->blog_archive_style_options();

        $this->file = fopen($this->options_header_css,"w+");
        return fwrite($this->file,$this->css);
        fclose($this->file);
    }
    
}