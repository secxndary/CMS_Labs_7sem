<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Digital Agency 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-digital-agency' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-digital-agency' );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-digital-agency' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-digital-agency' ) );
		?>
	</a>
</div><!-- .site-info -->