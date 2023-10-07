<?php
/**
 * Recommended Plugins Panel
 *
 * @package Newses
 */
?>
<div id="recommended-plugins-panel" class="panel-left">
	<?php 
	$newses_free_plugins = array(

		'shortbuild' => array(
		    'name'     	=> 'Shortbuild',
			'slug'     	=> 'shortbuild',
			'filename' 	=> 'shortbuild.php',
		),

		'one-click-demo-import' => array(
		    'name'     	=> 'Ansar Import',
			'slug'     	=> 'ansar-import',
			'filename' 	=> 'ansar-import.php',
		),
	);
	if( !empty( $newses_free_plugins ) ) { ?>
		<div class="recomended-plugin-wrap">
		<?php
		foreach( $newses_free_plugins as $newses_plugin ) {
			$info 		= newses_call_plugin_api( $newses_plugin['slug'] ); ?>
			<div class="recom-plugin-wrap w-2-col">
				<div class="plugin-title-install clearfix">
					<span class="title">
						<?php echo esc_html( $newses_plugin['name'] ); ?>	
					</span>
					
					<?php if($newses_plugin['slug'] == 'shortbuild') : ?>
					<p><?php esc_html_e('To display Newses Frontpage widget, please install the','newses'); ?>
					<a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/shortbuild/' ); ?>"><?php esc_html_e( 'Shortbuild plugin', 'newses' ); ?></a><?php esc_html_e(' then go to Widgets menu under Appearance and drag wigdet in Front-page content Section','newses'); ?></p>
					<?php endif; ?>


					<?php if($newses_plugin['slug'] == 'ansar-import') : ?>
					<p><?php echo esc_html( 'First of install and activate', 'newses' ); ?></h3>
					<a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/ansar-import/' ); ?>"><?php esc_html_e( 'Ansar Import Plugin', 'newses' ); ?></a>
					<?php echo esc_html('then install and activate','newses'); ?>
					<?php echo esc_html(' After that, import sample demo content, visit Ansar Demo Importer Data menu under Appearance.', 'newses'); ?></p>


					<?php endif; ?>



					<?php echo '<div class="button-wrap">';
					echo Newses_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $newses_plugin['slug'] );
					echo '</div>';
					?>
				</div>
			</div>
			</br>
			<?php
		} ?>
		</div>
	<?php
	} ?>
</div>