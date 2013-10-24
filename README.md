WP-Settings-API-Demo
====================

A short demonstration of how to use the WordPress Settings API.

The WordPress Settings API is the preferred method of including custom form elements on either existing or custom WP admin pages. Without using this API, you would need to write code that would process the form submission and enter the user data into the ddatabase. The WPSA does this for you. You register a setting, and when a form is submitted, the data is automatically added to the wp_options table through the 'name' parameter of register_settings function.

Resources:

Diagram: http://mageemedia.net/wp-content/uploads/2013/10/settings-api-diagram.jpg

Codex: http://codex.wordpress.org/Settings_API

WP Tuts: http://wp.tutsplus.com/tutorials/theme-development/the-complete-guide-to-the-wordpress-settings-api-part-1/

Regular Expressions: http://gskinner.com/RegExr/


