<?php
/**
 * Themeplus Core
 */

namespace tpCore;

class themeplus {

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

	public function tp_get_primary_menu(){ ?>
		<div id="tp-navigation" class="row">
			<nav id="site-navigation" class="main-navigation col-md-12">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'themeplus' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'	 => 'tp-primary-menu',
					)
				);
				?>
			</nav>
		</div>
	<?php }

	/**
	 * Get the website logo
	 *
	 * @return void
	 */
	public function tp_get_logo(){ ?>

		<div id="tp-header-logo" class="row">
			<div class="tp-logo col-md-12">
			<?php 
					
			if ( is_front_page() && is_home() ) :
				?>
				<div class="tp-logo-default">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="tp-standard-logo" src="<?php if(isset($this->option['tp-logo']['url'])){ echo $this->option['tp-logo']['url']; } ?>" srcset="<?php if(isset($this->option["tp-logo"]["url"])){ echo $this->option["tp-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-logo-retina"]["url"])){ echo $this->option["tp-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-logo"]["width"])){ echo $this->option["tp-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-logo"]["height"])){ echo $this->option["tp-logo"]["height"]; } ?>">
						<img class="tp-sticky-logo" src="<?php if(isset($this->option["tp-sticky-logo"]["url"])){ echo $this->option["tp-sticky-logo"]["url"]; } ?>" srcset="<?php if(isset($this->option["tp-sticky-logo"]["url"])){ echo $this->option["tp-sticky-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-sticky-logo-retina"]["url"])){ echo $this->option["tp-sticky-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-sticky-logo"]["width"])){ echo $this->option["tp-sticky-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-sticky-logo"]["height"])){ echo $this->option["tp-sticky-logo"]["height"]; } ?>">
						<img class="tp-mobile-logo" src="<?php if(isset($this->option["tp-mobile-logo"]["url"])){ echo $this->option["tp-mobile-logo"]["url"]; } ?>" srcset="<?php if(isset($this->option["tp-mobile-logo"]["url"])){ echo $this->option["tp-mobile-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-mobile-logo-retina"]["url"])){ echo $this->option["tp-mobile-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-mobile-logo"]["width"])){ echo $this->option["tp-mobile-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-mobile-logo"]["height"])){ echo $this->option["tp-mobile-logo"]["height"]; } ?>">
					</a>
				</div>
				<?php
			else :
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="tp-standard-logo" src="<?php if(isset($this->option['tp-logo']['url'])){ echo $this->option['tp-logo']['url']; } ?>" srcset="<?php if(isset($this->option["tp-logo"]["url"])){ echo $this->option["tp-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-logo-retina"]["url"])){ echo $this->option["tp-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-logo"]["width"])){ echo $this->option["tp-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-logo"]["height"])){ echo $this->option["tp-logo"]["height"]; } ?>">
						<img class="tp-sticky-logo" src="<?php if(isset($this->option["tp-sticky-logo"]["url"])){ echo $this->option["tp-sticky-logo"]["url"]; } ?>" srcset="<?php if(isset($this->option["tp-sticky-logo"]["url"])){ echo $this->option["tp-sticky-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-sticky-logo-retina"]["url"])){ echo $this->option["tp-sticky-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-sticky-logo"]["width"])){ echo $this->option["tp-sticky-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-sticky-logo"]["height"])){ echo $this->option["tp-sticky-logo"]["height"]; } ?>">
						<img class="tp-mobile-logo" src="<?php if(isset($this->option["tp-mobile-logo"]["url"])){ echo $this->option["tp-mobile-logo"]["url"]; } ?>" srcset="<?php if(isset($this->option["tp-mobile-logo"]["url"])){ echo $this->option["tp-mobile-logo"]["url"]; } ?> 1x, <?php if(isset($this->option["tp-mobile-logo-retina"]["url"])){ echo $this->option["tp-mobile-logo-retina"]["url"]; } ?> 2x" alt="<?php echo get_bloginfo( 'name' ) ?>" width="<?php if(isset($this->option["tp-mobile-logo"]["width"])){ echo $this->option["tp-mobile-logo"]["width"]; } ?>" height="<?php if(isset($this->option["tp-mobile-logo"]["height"])){ echo $this->option["tp-mobile-logo"]["height"]; } ?>">
					</a>
				<?php
			endif;

			?>
			</div>
		</div>
	
	<?php }


	/**
	 * Convert Background color from HEX to RGB
	 *
	 * @param String $backgroud_color
	 * @param String $background_opacity
	 * @param String $css_selctor
	 * @return void
	 */
   public function background_color_css($backgroud_color, $background_opacity, $css_selctor){

		if(isset($background_opacity)){
				
			$color_hex = $backgroud_color;
			$color_rgb = 'rgb('.hexdec(substr($color_hex,1,2)).', '.hexdec(substr($color_hex,3,2)).', '.hexdec(substr($color_hex,5,2)).', '.$background_opacity.')';

			$css_result = $css_selctor .'{background-color: '.$color_rgb.';}';
		}

		return $css_result;
   }

}
