=== The Mojo Sliding Widget Panel ===
Contributors: mojowill
Donate link: http://www.mojowill.com/
Tags: jquery, widget, slider
Requires at least: 3.2
Tested up to: 3.3.1
Stable tag: trunk

A jQuery powered sliding widget area for the top of your Wordpress site.

== Description ==

The Mojo Sliding Widget Panel plugin adds a panel that opens and closes to the top of your WordPress-powered blog. If you're in need of an area to house more content yet not get in the way, this is the ideal plugin.

The plugin is built off the wonderful jQuery library and is fully widgetized, so you can add any content you want. If you want a login form. Add it. If you want welcome text. No problem. Category list? You're covered.

I found a 0.1 version of this plugin after trying to code one from exactly the same tutorial. After battling with jQuery conflicts I found this one. However it lacked all the visual style of the original tutorial which is what I really wanted so I decided to make the changes do some tidy up work and republish.

Based upon the original Sliding Panel by [Justin Tadlock] (http://justintadlock.com "Justin Tadlock")
 
The original idea for this plugin came from Web Kreation, but the plugin has been coded from the ground up to work with many themes, handle widgets, and work along with the version of jQuery packaged with WordPress. [link] (http://web-kreation.com/index.php/wordpress/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27 "Original Idea")

= Features =
* Uses built in Wordpress jQuery.
* Uses widgets so content can be literally anything!
* Simple to modify (via css)

== Installation ==

Installation is simple, just like every other Wordpress plugin. 

Either:

1. Download and unzip the plugin to your local machine.
2. Upload `the-mojo-sliding-widget-panel` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress

Or:

1. Goto Add New Plugin in your Wordpress Dashboard.
2. Search for 'Mojo Toolbox'
3. Click 'Install Now' and follow the instructions.


For both methods you will need to add a single line of code to your themes header.php

Just inside the body tags add
`<?php if ( function_exists( 'get_sliding_panel' ) ) get_sliding_panel(); ?>`

== Frequently Asked Questions ==

= How do I get involved in the development? =

Check out the Other Notes section for more info.

== Changelog ==

= 1.0.3 =
* Some fixes and tidy ups.

= 1.0.2 =
* Fixing path and URL constants

= 1.0.1 =
* Small fix to sidebar calls

= 1.0 =
* First release

== Developer Notes ==

If you would like to follow the development of the plugin or get involved please either drop by my [website](http://www.mojowill.com "Mojo Will") or the project [GitHub page](https://github.com/mojowill/The-Mojo-Sliding-Widget-Panel "GitHub").