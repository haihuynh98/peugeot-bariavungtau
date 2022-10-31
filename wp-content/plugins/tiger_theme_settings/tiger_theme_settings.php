<?php
/**
 * Plugin Name:     Theme Settings
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     This is a plugin to settings theme, this only use with theme made by Tiger Studio - TigerGentlemen.
 * Author:          TigerGentlemen
 * Author URI:      https://tigergentlemen.com
 * Text Domain:     tiger_theme_settings
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Tiger_theme_settings
 */


if (!class_exists('Tiger_Theme_settings')) {

	function getTigerOption($name)
	{
		return get_option(getTigerOptionName($name));
	}

	/**
	 * @param $name
	 * @return string
	 */
	function getTigerOptionName($name): string
	{
		return 'tiger_' . $name;
	}

	class Tiger_Theme_settings
	{
		public $wp_error;
		public $tiger_theme_config;
		public $themeDIR;
		public $optionConfigName = "tiger_theme_settings_config";
		public $fileThemeConfig;

		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			$this->fileThemeConfig = get_template_directory() . '/tiger-theme-settings-config.json';
			$this->themeDIR = get_template_directory();
			$this->wp_error = new WP_Error();


			$this->tiger_theme_config = $this->getTigerThemeConfigJson();

			add_action('admin_menu', [$this, 'tiger_register_theme_settings_menu_page']);
			add_action('admin_init', [$this, 'register_tiger_plugin_settings']);
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			$themeDIR = get_template_directory();

			// check the settings config file is exists, if not exists then copy example file.
			if (!file_exists($filename = $themeDIR . '/tiger-theme-settings-config.json')) {
				$rawProductTemplateFile = fopen(__DIR__ . "/tiger-theme-settings-config.json", "r") or die("Unable to open file!");
				$readFile = fread($rawProductTemplateFile, filesize(__DIR__ . "/tiger-theme-settings-config.json"));
				fclose($rawProductTemplateFile);

				$createSingleProductFile = fopen($filename, "x");
				fwrite($createSingleProductFile, $readFile);
				fclose($createSingleProductFile);
			}
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			$themeDIR = get_template_directory();

			// check the settings config file is exists, if exists then delete the config file.
			if (file_exists($filename = $themeDIR . '/tiger-theme-settings-config.json')) {
				unlink($filename);
			}
		} // END public static function deactivate


		private function option_exists($name, $site_wide = false)
		{
			global $wpdb;
			return $wpdb->query("SELECT * FROM " . ($site_wide ? $wpdb->base_prefix : $wpdb->prefix) . "options WHERE option_name ='$name' LIMIT 1");
		}

		public function tiger_register_theme_settings_menu_page()
		{
			add_menu_page(
				__('Tiger Theme Settings', 'textdomain'),
				'Theme Settings',
				'customize',
				'tiger_theme_settings',
				[$this, 'tiger_theme_settings_page'],
				'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg>'),
				10
			);
		}

		public function loadTigerThemeConfig()
		{
			if (file_exists($this->fileThemeConfig) && $jsonConfig = file_get_contents($this->fileThemeConfig)) {
				$jsonFinal = json_decode($jsonConfig, true);
				if ($this->option_exists($this->optionConfigName)) {
					update_option($this->optionConfigName, $jsonFinal);
				} else {
					add_option($this->optionConfigName, $jsonFinal);
				}
			} elseif (!file_exists($this->fileThemeConfig) && $jsonConfig = file_get_contents(__DIR__ . '/tiger-theme-settings-config.json')) {
				$jsonFinal = json_decode($jsonConfig, true);
				if ($this->option_exists($this->optionConfigName)) {
					update_option($this->optionConfigName, $jsonFinal);
				} else {
					add_option($this->optionConfigName, $jsonFinal);
				}
			} else {
				return $this->wp_error->add('tiger_theme', __("Not found the Tiger Theme Setting config file, 'tiger-theme-settings-config.json'", "my_textdomain"));
			}
		}

		public function getTigerThemeConfigJson()
		{
			$this->loadTigerThemeConfig();

			if ($this->option_exists($this->optionConfigName)) {
				$this->tiger_theme_config = get_option($this->optionConfigName);
				return get_option($this->optionConfigName);
			} else {
				$this->loadTigerThemeConfig();
				return $this->wp_error->add('tiger_theme', __("Not found config Tiger Theme Setting in your option, pls to refresh the page to apply"));
			}
		}

		public function register_tiger_plugin_settings()
		{
			if (!$this->tiger_theme_config) {
				$this->getTigerThemeConfigJson();
			}

			foreach ($this->tiger_theme_config as $key => $tiger_config) {
				if ($tiger_config['type'] == 'section' && count($fields = $tiger_config['fields']) > 0) {
					foreach ($fields as $fKey => $field) {
						register_setting('tiger-theme-plugin-settings-group', getTigerOptionName($fKey));
					}
				}

				if ($tiger_config['type'] == 'field') {
					register_setting('tiger-theme-plugin-settings-group', getTigerOptionName($key));
				}
			}
		}

		public function tiger_theme_settings_page()
		{

			if (!$this->tiger_theme_config) {
				$this->getTigerThemeConfigJson();
			}

			?>
			<style>
				.card.card-full-width {
					width: 100% !important;
					max-width: unset !important;
				}
			</style>
			<div class="wrap">
				<h1>Tiger Theme Settings</h1>
				<p>The plugin only using with theme made by <a href="https://tigergentlemen.com">TigerGentlemen - Tiger
						Studio</a></p>
				<?php if ($this->wp_error->has_errors()):
					foreach ($this->wp_error->get_error_messages('tiger_theme') as $message):?>
						<p style="color: red"><?= $message ?><br></p>
					<?php
					endforeach;
				endif; ?>
				<?php if (count($this->tiger_theme_config) > 0): ?>
					<form method="post" action="options.php">
						<?php settings_fields('tiger-theme-plugin-settings-group'); ?>
						<?php do_settings_sections('tiger-theme-plugin-settings-group'); ?>

						<?php foreach ($this->tiger_theme_config as $key_tiger_field => $tiger_field): ?>
							<?php if ($tiger_field['type'] == 'section' && count($fields = $tiger_field['fields']) > 0): ?>
								<div class="card card-full-width">
									<h2 class="label_<?= $key_tiger_field ?>"
										id="label_<?= $key_tiger_field ?>"><?= $tiger_field['title'] ?></h2>
									<table class="form-table">

										<?php foreach ($fields as $key_field => $field):
											if ($field['type'] == 'field'):?>
												<tr valign="top">
													<th scope="row"><?= $field['title'] ?></th>
													<td>
														<?php if (isset($field['input_type']) && $field['input_type'] == 'text'): ?>
															<input type="text" class="ltr regular-text"
																   name="<?= getTigerOptionName($key_field) ?>"
																   value="<?php echo esc_attr(getTigerOption($key_field)); ?>"/>
														<?php elseif ($field['input_type'] == 'textarea'): ?>
															<textarea class="ltr regular-text" name="<?= getTigerOptionName($key_field) ?>"
																	  rows="10" cols="30"><?php echo esc_attr(getTigerOption($key_field)); ?></textarea>
														<?php else: ?>
															<input class="ltr regular-text"
																type="<?= $field['input_type'] ?>"
																   name="<?= getTigerOptionName($key_field) ?>"
																   value="<?php echo esc_attr(getTigerOption($key_field)); ?>"/>
														<?php endif; ?>
													</td>
												</tr>
											<?php endif;
										endforeach; ?>
									</table>
								</div>
							<?php elseif ($tiger_field['type'] == 'field'): ?>
								<table class="form-table">
									<tr valign="top">
										<th scope="row"><?= $tiger_field['title'] ?></th>
										<td>
											<?php if (isset($tiger_field['input_type']) || $tiger_field['input_type'] == 'text'): ?>
												<input type="text" name="<?= getTigerOptionName($key_tiger_field) ?>"
													   value="<?php echo esc_attr(getTigerOption($key_tiger_field)); ?>"/>
											<?php elseif ($tiger_field['input_type'] == 'textarea'): ?>
												<textarea name="<?= getTigerOptionName($key_tiger_field) ?>" rows="10"
														  cols="30"></textarea>
											<?php else: ?>
												<input type="<?= $tiger_field['input_type'] ?>"
													   name="<?= getTigerOptionName($key_tiger_field) ?>"
													   value="<?php echo esc_attr(getTigerOption($key_tiger_field)); ?>"/>
											<?php endif; ?>
										</td>
									</tr>
								</table>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php submit_button(); ?>

					</form>

				<?php endif;
				?>
			</div>
			<?php
		}

	}// end class

	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('Tiger_Theme_settings', 'activate'));
	register_deactivation_hook(__FILE__, array('Tiger_Theme_settings', 'deactivate'));

	// instantiate the plugin class
	$Tiger_Theme_settings = new Tiger_Theme_settings();

//
} //end if

?>
