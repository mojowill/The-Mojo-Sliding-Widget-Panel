<?php
/**
 * Plugin Name: The Mojo Sliding Widget Panel
 * Plugin URI: http://www.mojowill.com/developer/wordpress-jquery-sliding-widget-panel/
 * Description: Creates a jQuery-based, fully-widgetized sliding panel.
 * Version: 1.0.3
 * Author: mojowill
 * Author URL: http:/www.mojowill.com
 *
 * Some Changes to the default styling to closely match the orignal style in Web Kreation's tutorial
 *
 * Based upon the original Sliding Panel by:
 *
 * Justin Tadlock
 * http://justintadlock.com
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
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

/**
 * Define constant paths to the plugin folder.
 * @since 1.0.2
 */
if ( ! defined( 'SLIDING_PANEL_URL' ) )
	define( 'SLIDING_PANEL_URL', plugin_dir_url( __FILE__) );

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

function mojo_sliding_scripts() {
	if ( !is_admin() && (is_active_sidebar( 'left-sliding-panel' ) || is_active_sidebar( 'middle-sliding-panel') || is_active_sidebar('right-sliding-panel') ) ) :
		wp_enqueue_style( 'sliding-panel', SLIDING_PANEL_URL . 'panel.css', false, null, 'screen' );
		wp_enqueue_script( 'sliding-panel-js', SLIDING_PANEL_URL . 'panel.js', array( 'jquery' ), NULL, true );
	endif;

}

add_action( 'init', 'mojo_sliding_scripts' );
/**
 * Registers the sliding panel widget area.
 * @uses register_sidebar()
 *
 * @since 0.1
 */
function sliding_panel_register_sidebars() {
	register_sidebar( array( 
		'name' => 'Left Sliding Panel', 
		'id' => 'left-sliding-panel',
		'description' => 'Appears in the sliding panel on the left hand side',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 
		'after_widget' => '</div></div>', 
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>' ) );
	register_sidebar( array( 
		'name' => 'Middle Sliding Panel', 
		'id' => 'middle-sliding-panel',
		'description' => 'Appears in the sliding panel in the middle',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 
		'after_widget' => '</div></div>', 
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>' ) );
	register_sidebar( array( 
		'name' => 'Right Sliding Panel', 
		'id' => 'right-sliding-panel',
		'description' => 'Appears in the sliding panel on the right hand side',
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 
		'after_widget' => '</div></div>', 
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>' ) );
	
}

function load_sliding_panel() {
	if ( is_admin() )
		return '';
}

function get_sliding_panel() {

	if ( is_active_sidebar( 'left-sliding-panel' ) || is_active_sidebar( 'middle-sliding-panel') || is_active_sidebar( 'right-sliding-panel') ) : ?>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<?php dynamic_sidebar( 'left-sliding-panel' ); ?>
			</div>
            
            
			<div class="left">
				<?php dynamic_sidebar( 'middle-sliding-panel' ); ?>
			</div>
			<div class="left right">			
				<?php dynamic_sidebar( 'right-sliding-panel' ); ?>
			</div>
            
            
            
            <div class="left right">
            </div>
            
		</div>
	</div>

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Welcome</li>
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