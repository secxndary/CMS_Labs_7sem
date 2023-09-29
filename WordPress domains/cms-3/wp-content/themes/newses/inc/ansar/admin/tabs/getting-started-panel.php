<?php
/**
 * Getting Started Panel.
 *
 * @package Newses
 */
?>
<div id="getting-started-panel" class="panel-left visible">
    <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Demo Content', 'newses' ); ?></h4>
		<a class="recommended-actions hyperlink" href="#actions"><?php esc_html_e( 'Demo Content', 'newses' ); ?></a>
    </div> 
    <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Newses Documentation', 'newses' ); ?></h4>
        
        <a href="<?php echo esc_url( __( 'https://docs.themeansar.com/docs/newses/', 'newses' ) ); ?>" class="hyperlink" title="<?php esc_attr_e( 'Newses Support', 'newses' ); ?>"><?php esc_html_e( 'Documentation', 'newses' ); ?></a>
    </div>
   <div class="panel-aside panel-column">
        <h4><?php esc_html_e( 'Go to the Customizer', 'newses' ); ?></h4>
        <a class="button button-primary" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'newses' ); ?>"><?php esc_html_e( 'Go to the Customizer', 'newses' ); ?></a>
    </div>
</div>