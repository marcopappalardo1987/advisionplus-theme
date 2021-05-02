<?php

namespace tpCore\tpTopHeader;

class topHeader{

    /**
	 * Redux options
	 * 
	 * @var Object
	 */
	protected $option;

    public function __construct(){

        /**
		 * Theme Plus Options from Redux
		 */
		$this->option = $GLOBALS["themeplus_option"];

    }

    /**
     * Options to compose the left top header
     *
     * @return void
     */
    public function tp_top_header_left(){

        switch ($this->option["tp-top-header-left"]) {
            case 'contact-info':
                $this->tp_get_top_header_contact_info();
                break;

            case 'social-links':
                echo "social links";
                break;

            case 'navigation':
                $this->tp_get_top_header_navigation();
                break;

            case 'leave-empty':
                echo "Empty space";
                break;
        }

    }

    /**
     * Options to compose the right top header
     *
     * @return void
     */
    public function tp_top_header_right(){

        switch ($this->option["tp-top-header-right"]) {
            case 'contact-info':
                $this->tp_get_top_header_contact_info();
                break;

            case 'social-links':
                echo "social links";
                break;

            case 'navigation':
                $this->tp_get_top_header_navigation();
                break;

            case 'leave-empty':
                echo "Empty space";
                break;
        }

    }

    /**
     * Get the top header contact info
     *
     * @return void
     */
    public function tp_get_top_header_contact_info(){ ?>
        <div id="tp-contant-info" class="contant-info">
        <?php
        // Place the email in the top Header Left Side
        if(!empty($this->option["tp-top-header-email"])){
            do_action('tp_before_email_top_header'); ?>
            <div id="tp-header-email" class="header-email"><i class="fas fa-envelope"></i><a href="mailto:<?php echo $this->option["tp-top-header-email"] ?>"><?php echo $this->option["tp-top-header-email"] ?></a></div>
            <?php do_action('tp_after_email_top_header'); 
        }

        // Place the phone in the top Header
        if(!empty($this->option["tp-top-header-phone"])){ 
            do_action('tp_before_phone_top_header'); ?>
            <div id="tp-header-phone" class="header-phone"><i class="fas fa-phone-alt"></i><?php echo $this->option["tp-top-header-phone"] ?></div>
            <?php do_action('tp_after_phone_top_header'); 
        }
        ?>
        </div>
        <?php
    }

    /**
     * Get the top header navigation
     *
     * @return void
     */
    public function tp_get_top_header_navigation(){ ?>
        <div id="tp-top-header-menu" class="top-header-menu"><?php
			do_action('tp_before_menu_top_header');
			wp_nav_menu(
				array(
					'theme_location' => 'top-header',
					'menu_id'        => 'top-header-menu',
					'menu_class'	 => 'tp-top-header-menu',
				)
			);
			do_action('tp_after_menu_top_header'); ?>
		</div>
        <?php
    }


}