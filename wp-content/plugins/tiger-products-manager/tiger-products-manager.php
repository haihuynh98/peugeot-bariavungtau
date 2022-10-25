<?php
/**
 * Plugin Name:     Tiger Products Manager
 * Description:     This is management product plugin.
 * Author:          TigerGentlemen
 * Author URI:      https://tigergentlemen.com
 * Text Domain:     tiger-products-manager
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Tiger_Products_Manager
 */

if(!class_exists('Tiger_Products_Manager'))
{
	class Tiger_Products_Manager
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Register custom post types
			require_once(sprintf("%s/post-types/product.php", dirname(__FILE__)));
//			$Post_Type_Template = new Post_Type_Template();

			// register actions
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{

			$themeDIR = get_template_directory();

			$rawProductTemplateFile = fopen(dirname(__FILE__)."/templates/single-product.php", "r") or die("Unable to open file!");
			$readFile =  fread($rawProductTemplateFile,filesize(dirname(__FILE__)."/templates/single-product.php"));
			fclose($rawProductTemplateFile);

			$createSingleProductFile = fopen($themeDIR."/single-product.php", "x");
			fwrite($createSingleProductFile, $readFile);
			fclose($createSingleProductFile);

			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate
	} // END class Tiger_Products_Manager
} // END if(!class_exists('Tiger_Products_Manager'))

if(class_exists('Tiger_Products_Manager'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('Tiger_Products_Manager', 'activate'));
	register_deactivation_hook(__FILE__, array('Tiger_Products_Manager', 'deactivate'));

	// instantiate the plugin class
	$Tiger_Products_Manager = new Tiger_Products_Manager();
}
