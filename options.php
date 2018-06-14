<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'qohelet'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise-2.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => esc_html__( 'Left aligned', 'qohelet' ),
		'center' => esc_html__( 'Center aligned', 'qohelet' ),
		'right' => esc_html__( 'Right aligned', 'qohelet' )
	);

	// Number of shop products
	$shop_products_settings = array(
		'4' => esc_html__( '4 Products', 'qohelet' ),
		'8' => esc_html__( '8 Products', 'qohelet' ),
		'12' => esc_html__( '12 Products', 'qohelet' ),
		'16' => esc_html__( '16 Products', 'qohelet' ),
		'20' => esc_html__( '20 Products', 'qohelet' ),
		'24' => esc_html__( '24 Products', 'qohelet' ),
		'28' => esc_html__( '28 Products', 'qohelet' )
	);

	$options = array();

	$options[] = array(
		'name' => esc_html__( 'Basic Settings', 'qohelet' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Background', 'qohelet' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'qohelet' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'qohelet' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'qohelet' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'qohelet' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'qohelet' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'qohelet'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'qohelet'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'qohelet' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'qohelet' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'MeWe', 'qohelet' ),
		'desc' => esc_html__( 'Enter your MeWe URL.', 'qohelet' ),
		'id' => 'social_mewe',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Google+', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Google+ URL.', 'qohelet' ),
		'id' => 'social_googleplus',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'qohelet' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'qohelet' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'SlideShare', 'qohelet' ),
		'desc' => esc_html__( 'Enter your SlideShare URL.', 'qohelet' ),
		'id' => 'social_slideshare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Dribbble', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Dribbble URL.', 'qohelet' ),
		'id' => 'social_dribbble',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Tumblr', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Tumblr URL.', 'qohelet' ),
		'id' => 'social_tumblr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'qohelet' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'qohelet' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Bitbucket', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Bitbucket URL.', 'qohelet' ),
		'id' => 'social_bitbucket',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Foursquare', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Foursquare URL.', 'qohelet' ),
		'id' => 'social_foursquare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'qohelet' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'qohelet' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'qohelet' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'qohelet' ),
		'id' => 'social_flickr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'qohelet' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'qohelet' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'RSS', 'qohelet' ),
		'desc' => esc_html__( 'Enter your RSS Feed URL.', 'qohelet' ),
		'id' => 'social_rss',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced settings', 'qohelet' ),
		'type' => 'heading' );

	$options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'qohelet' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'qohelet' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => esc_html__( 'Footer Background Color', 'qohelet' ),
		'desc' => esc_html__( 'Select the background color for the footer.', 'qohelet' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => esc_html__( 'Footer Content', 'qohelet' ),
		'desc' => esc_html__( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'qohelet' ),
		'id' => 'footer_content',
		'std' => qohelet_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => esc_html__( 'Footer Content Position', 'qohelet' ),
		'desc' => esc_html__( 'Select what position you would like the footer content aligned to.', 'qohelet' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	if( qohelet_is_woocommerce_active() ) {
		$options[] = array(
		'name' => esc_html__( 'WooCommerce settings', 'qohelet' ),
		'type' => 'heading' );

		$options[] = array(
			'name' => esc_html__('Shop sidebar', 'qohelet'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Shop page', 'qohelet'),
			'id' => 'woocommerce_shopsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__('Products sidebar', 'qohelet'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Single Product page', 'qohelet'),
			'id' => 'woocommerce_productsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Cart, Checkout & My Account sidebars', 'qohelet' ),
			'desc' => esc_html__( 'The &lsquo;Cart&rsquo;, &lsquo;Checkout&rsquo; and &lsquo;My Account&rsquo; pages are displayed using shortcodes. To remove the sidebar from these Pages, simply edit each Page and change the Template (in the Page Attributes Panel) to the &lsquo;Full-width Page Template&rsquo;.', 'qohelet' ),
			'type' => 'info' );

		$options[] = array(
			'name' => esc_html__('Shop Breadcrumbs', 'qohelet'),
			'desc' => esc_html__('Display the breadcrumbs on the WooCommerce pages', 'qohelet'),
			'id' => 'woocommerce_breadcrumbs',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Shop Products', 'qohelet' ),
			'desc' => esc_html__( 'Select the number of products to display on the shop page.', 'qohelet' ),
			'id' => 'shop_products',
			'std' => '12',
			'type' => 'select',
			'class' => 'mini',
			'options' => $shop_products_settings );

	}

	return $options;
}

add_action( 'optionsframework_after','qohelet_options_display_sidebar' );

/**
 * dewi admin sidebar
 */
function qohelet_options_display_sidebar() { 
        // replaceable variables
        $ocws_theme_screenshot_thumb = "screenshot400.png";
        $mycurtheme = wp_get_theme();
        $ocws_theme_op_text = $mycurtheme->get('Description');
        // $ocws_theme_op_text = "<p><strong>Qohelet</strong> is a fully responsive theme for Wordpress. It has been built on the shoulders of giants, utilizing a number of other technologies, such as: 1. The Quark starter theme by Anthony Horton. 2. Quark is in turn built upon Underscores by Automattix. 3. Quark utilizes Normalize, Modernizr and Options Framework. 4. Many other smaller amounts of other technologies have been incorporated, so that I did not re-invent the wheel.</p>";
        $ocws_theme_op_header = "About ".$mycurtheme->get('Name');
        
	 ?>
        <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="ocws_postbox">
	    		<h3><?php esc_attr_e( $ocws_theme_op_header, 'qohelet' ); ?></h3>
                        <img src="<?php echo get_stylesheet_directory_uri().'/assets/'.$ocws_theme_screenshot_thumb; ?>" style="margin-right:auto; margin-left:auto; width:300px;" />
      			<div class="ocws_inside_box"> 
                            <?php echo $ocws_theme_op_text; ?>
	      			
      			</div><!-- ocws_inside_box -->
	    	</div><!-- .ocws_postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
        
        
<?php
}
?>
