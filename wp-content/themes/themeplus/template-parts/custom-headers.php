<?php
namespace tpCore\tpHeader\CustomHeaders;

require_once get_template_directory() . '/inc/tp-classes/tp-core.php';
require_once get_template_directory() . '/inc/tp-classes/class-tp-top-header.php';
use tpCore\themeplus;
use tpCore\tpTopHeader\topHeader;


class customHeaders{

	/**
	 * Redux options
	 * 
	 * @var object
	 */
    protected $option;

	/**
	 * Theme Plus Core
	 * 
	 * @var mixed
	 */
	protected $theme;

	/**
	 * Theme Top Header
	 * 
	 * @var mixed
	 */
	protected $top_header;

	public function __construct(){

		/**
		 * Theme Plus Options from Redux
		 */
		$this->option = $GLOBALS["themeplus_option"];

		/**
         * Theme Plus Core
         */
        $this->theme = new themeplus;

		/**
         * Theme Plus Core
         */
        $this->top_header = new topHeader;

		if(isset($this->option["tp-top-header-show"]) && $this->option["tp-top-header-show"]==1 ){
			echo $this->get_tp_top_header();
		}

		if(isset($this->option["tp-header-layout"]) && $this->option["tp-header-layout"]=='header1'){
			echo $this->get_tp_header1();
		}
		elseif(isset($this->option["tp-header-layout"]) && $this->option["tp-header-layout"]=='header2'){
			echo $this->get_tp_header2();
		}

	}

	/**
	 * Returns the Top Header
	 *
	 * @return void
	 */
	public function get_tp_top_header(){ 
		$this->option = $GLOBALS["themeplus_option"]; 
		
		do_action('tp_before_top_header'); ?>
  
		<div id="tp-top-header-container" class="top-header-container">
			<div id="tp-top-header" class="top-header row">
			  
			  	<!-- Place the top Header left -->
				<div id="tp-top-header-left" class="col-md-6">

					<!-- Get Top Header Left -->
					<?php 
					$this->top_header->tp_top_header_left();
					?>

				</div>

				<!-- Place the top Header right -->
				<div id="tp-top-header-right" class="col-md-6">

					<!-- Get Top Header Right -->
					<?php 
					$this->top_header->tp_top_header_right();
					?>
					
				</div>
			</div>
		</div>

		<?php do_action('tp_after_top_header');
	 }

	/**
	 * Returns Custom Header 1
	 *
	 * @return void
	 */
	public function get_tp_header1(){

		//Get Logo Header
		echo $this->theme->tp_get_logo();
		//Get primary menu
		echo $this->theme->tp_get_primary_menu();

	}

	/**
	 * Returns Custom Header 2
	 *
	 * @return void
	 */
	public function get_tp_header2(){
		echo 'CoomingSoon';
	}

}







?>

