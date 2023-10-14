<?php

/**
 * Fired during plugin activation
 *
 * @link       https://themeansar.com/
 * @since      1.0.0
 *
 * @package    Ansar_Import
 * @subpackage Ansar_Import/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ansar_Import
 * @subpackage Ansar_Import/includes
 * @author     Themeansar <info@themeansar.com>
 */
class Ansar_Import_Activator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate() {
        $tehme_data = wp_get_theme();
        if ($tehme_data->get('Author') != 'themeansar' && $tehme_data->get('Author') != 'Themeansar' ) {
            echo '<h3>' . __('Ansar Import - This plugin requires Official <a href="https://themeansar.com/">Theme Ansar</a> Theme to be activated to work.', 'ansar-import') . '</h3>';

            //Adding @ before will prevent XDebug output
            @trigger_error(__('Ansar Import - This plugin requires Official Theme Ansar Theme to be activated to work.', 'ansar-import'), E_USER_ERROR);
            wp_die();
        }
    }

}
