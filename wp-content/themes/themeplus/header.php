<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme_Plus
 */
namespace tpCore\tpHeader;

require_once get_template_directory() . '/inc/tp-classes/tp-core.php';
require_once get_template_directory() . '/inc/tp-classes/dynamic-style/class-dynamic-style-options.php';
require_once get_template_directory() . '/template-parts/custom-headers.php';

use tpCore\cssGenerator\headerCssGenerator;
use tpCore\themeplus;
use tpCore\tpHeader\CustomHeaders\customHeaders;

/**
 * This class returns the complete Header
 */
class get_tp_header{

	/**
	 * Redux options
	 * 
	 * @var Object
	 */
	protected $option;
	
	/**
	 * Theme Plus Core
	 * 
	 * @var mixed
	 */
	protected $theme;

	/**
	 * Object contain all the custom headers
	 *
	 * @var mixed
	 */
	protected $custom_headers;

	/**
	 * Css Generated for custom Header
	 *
	 * @var [type]
	 */
	protected $headerCssGenerator;


	protected $custom_body_classes;

	public function __construct(){

		/**
		 * Theme Plus Options from Redux
		 */
		$this->option = $GLOBALS["themeplus_option"];
		
		$this->theme = new themeplus;

		$this->get_tp_head();
		$this->get_tp_header();	

		$this->headerCssGenerator = new headerCssGenerator;
	}
	

	/**
	 * Returns the Head in html
	 *
	 * @return void
	 */
	public function get_tp_head(){ ?>

		<!-- *** Head Html *** -->
		<!doctype html>
		<html <?php language_attributes(); ?> >
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="https://gmpg.org/xfn/11">

			<?php wp_head(); ?>
		</head>

	<?php
	}

	/**
	 * Returns the Header of the theme
	 *
	 * @return void
	 */
	public function get_tp_header(){ 

		$body_classes = get_body_class();

		if($this->option['tp-show-sidebar-blog-archive'] != 'none' && in_array("blog", $body_classes)){
			$this->custom_body_classes .= ' tp-sidebar-blog-active';
		}
		?>

		<!-- *** Body Html *** -->
		<body <?php body_class('tp-body' .$this->custom_body_classes); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="site tp-site">
			<a class="tp-links skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'themeplus' ); ?></a>


			<header id="masthead" class="tp-site-header <?php echo $this->option["tp-header-layout"]?>">
				<?php 
				/**
				* Import the custom Headers
				*/
				$this->custom_headers = new customHeaders;
				
				?>

			</header>
		</div>
	<?php
	}

}

$tp_header = new get_tp_header;































