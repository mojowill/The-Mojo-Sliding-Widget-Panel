<?php
/**
 * Plugin Name: Sliding Panel
 * Plugin URI: 
 * Description: Creates a jQuery-based, fully-widgetized sliding panel.
 * Version: 1.0
 * Author: Will Wilson
 * Author URL: http:/www.mojowill.com
 *
 * Some Changes to the default styling to closely match the orignal style in Web Kreation's tutorial
 *
 * Based upon the original Sliding Panel by:
 *
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * Creates a sliding panel for use on any WordPress site. This has been tested
 * and auto-inserts itself for a few themes.  Other themes need to manually
 * call the sliding panel within the content.
 *
 * The original idea for this plugin came from Web Kreation, but the plugin has been 
 * coded from the ground up to work with many themes, handle widgets, and work 
 * along with the version of jQuery packaged with WordPress.
 * @link http://web-kreation.com/index.php/wordpress/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27
 *
 * @copyright 2011
 * @version 1.0
 * @author Will Wilson
 * @link http://
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package SlidingPanel
 */

/**
 * Make sure we get the correct directory.
 * @since 0.1
 */
if ( !defined('WP_CONTENT_URL' ) )
	define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( !defined( 'WP_CONTENT_DIR' ) )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( !defined( 'WP_PLUGIN_URL' ) )
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( !defined( 'WP_PLUGIN_DIR' ) )
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.1
 */
define( SLIDING_PANEL, WP_PLUGIN_DIR . '/sliding-panel' );
define( SLIDING_PANEL_URL, WP_PLUGIN_URL . '/sliding-panel' );

/**
 * Add actions
 * @since 0.1
 */
add_action( 'init', 'sliding_panel_register_sidebars' );
add_action( 'template_redirect', 'load_sliding_panel' );

/**
 * Loads JS and CSS if the sidebar is active and not in admin.
 * @since 0.1
 */
if ( !is_admin() && is_active_sidebar( 'sliding-panel' ) ) :
	wp_enqueue_style( 'sliding-panel', SLIDING_PANEL_URL . '/panel.css', false, 0.1, 'screen' );
	wp_enqueue_script( 'sliding-panel-js', SLIDING_PANEL_URL . '/panel.js', array( 'jquery' ), '0.1', true );
endif;

/**
 * Registers the sliding panel widget area.
 * @uses register_sidebar()
 *
 * @since 0.1
 */
function sliding_panel_register_sidebars() {
	register_sidebar( array( 'name' => __('Sliding Panel', 'sliding-panel'), 'id' => 'sliding-panel', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
}

function load_sliding_panel() {
	if ( is_admin() )
		return '';
}

/**
 * Displays the sliding panel if the widget area is active.
 * This can be manually called in the templates with:
 *	<?php if ( function_exists( 'sliding_panel' ) ) sliding_panel(); ?>
 *
 * @uses is_active_sidebar()
 * @since 0.1
 */
function get_sliding_panel() {

	if ( is_active_sidebar( 'sliding-panel' ) ) : ?>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<?php dynamic_sidebar( 'sliding-panel' ); ?>
			</div>
            
            
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="" method="post">
					<h1>Member Login</h1>
                    
					<label class="grey" for="username">Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
	            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="" method="post">
					<h1>Not a member yet? Sign Up!</h1>		
                    
                    		
					<label class="grey" for="username">Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label>A password will be e-mailed to you.</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
            
            
            
            <div class="left right">
            </div>
            
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Say Hello?</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Open Panel</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

	<?php endif;
}

?>