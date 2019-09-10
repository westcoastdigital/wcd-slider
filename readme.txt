=== WCD Hero Slider ===
Contributors: westcoastdigital
Donate link: https://www.paypal.com/paypalme/jonmather
Tags: generatepress, slider, header, hero
Requires at least: 5.1
Tested up to: 5.2
Requires PHP: 7.2
Stable tag: 4.3
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
 
Add a simple slider to your site using the following shortcode [slider fade="true" infinite="true" transition="300" speed="3000" nav="dots" autoplay="false"] (this example shows the defaults, and if using defaults you do not need to use the attribute). Options for nav are dots, arrows or numbers. Speed and Transition are in m/s and the others are either true or false.

== Description ==
 
Add a simple slider to your site using the following shortcode [slider fade="true" infinite="true" speed="300" nav="dots" autoplay="false"] (this example shows the defaults, and if using defaults you do not need to use the attribute). Options for nav are dots, arrows or numbers. Speed is in m/s and the others are either true or false.

= Shortcode Attributes =
fade = "true" (allows you to fade in/out the slide changes or have them slide right to left if false)
infinite = "true" (allows you to have the slide loop through all slides, set to false and the user will have to scroll previous at end of slides, or next at start)
transition = "300" (this is the slide transition speed in m/s so 1000 is 1 second)
speed = "3000" (this is the slide autoplay speed in m/s so 3000 is 3 seconds)
nav="dots" (this is the slide navigation, you can choose between dots, arrows or numbers)
autoplay="false" (this allows the slides to automativally slide without needing interaction)

== Changelog ==
 
= 0.1 =
* Release
 
= 0.2 =
* Fixed full screen height
 
= 0.5 =
* Added full GP Header Element control support
 
= 0.6 =
* Wrapped conditionals to ensure GP and Elements are active
 
= 0.7 =
* Added autoplay support.
 
= 0.8 =
* Fixed spelling error bug.
* Changed Speed to slide speed
* Added Transition to set the fade/animation speed
 
== Upgrade Notice ==
 
= 0.8 =
This version adds a bug fix and correctly applies speed and transition effects
 
= 0.7 =
This version adds autoplay support

== Contributors ==
This plugin was commissioned and made possible thanks to [Venture Industries Online](https://ventureindustriesonline.com/) and developed by [West Coast Digital](https://westcoastdigital.com.au).
The plugin makes use of [Slick by Ken Wheeler](http://kenwheeler.github.io/slick/) for the slider controls