<?php
$blogclientoneID = get_theme_mod( 'blog_clients_one','' );
$blogclienttwoID = get_theme_mod( 'blog_clients_two','' );       
$blogclientthreeID = get_theme_mod( 'blog_clients_three','' );
$blogclientfourID = get_theme_mod( 'blog_clients_four','' );
$blogclientfiveID = get_theme_mod( 'blog_clients_five','' );
$blogclientsixID = get_theme_mod( 'blog_clients_six','' );


$client_array = array();
$has_client = false;
if( !empty( $blogclientoneID ) ){
	$blog_client_one  = wp_get_attachment_image_src( $blogclientoneID,'bosa-420-300');
 	if ( is_array(  $blog_client_one ) ){
 		$has_client = true;
   	 	$blog_client_one = $blog_client_one[0];
   	 	$client_array['image_one'] = array(
			'ID' => $blog_client_one,
		);	
  	}
}
if( !empty( $blogclienttwoID ) ){
	$blog_client_two = wp_get_attachment_image_src( $blogclienttwoID,'bosa-420-300');
	if ( is_array(  $blog_client_two ) ){
		$has_client = true;	
        $blog_client_two = $blog_client_two[0];
        $client_array['image_two'] = array(
			'ID' => $blog_client_two,
		);	
  	}
}
if( !empty( $blogclientthreeID ) ){	
	$blog_client_three = wp_get_attachment_image_src( $blogclientthreeID,'bosa-420-300');
	if ( is_array(  $blog_client_three ) ){
		$has_client = true;
      	$blog_client_three = $blog_client_three[0];
      	$client_array['image_three'] = array(
			'ID' => $blog_client_three,
		);	
  	}
}
if( !empty( $blogclientfourID ) ){	
	$blog_client_four = wp_get_attachment_image_src( $blogclientfourID,'bosa-420-300');
	if ( is_array(  $blog_client_four ) ){
		$has_client = true;
      	$blog_client_four = $blog_client_four[0];
      	$client_array['image_four'] = array(
			'ID' => $blog_client_four,
		);	
  	}
}
if( !empty( $blogclientfiveID ) ){	
	$blog_client_five = wp_get_attachment_image_src( $blogclientfiveID,'bosa-420-300');
	if ( is_array(  $blog_client_five ) ){
		$has_client = true;
      	$blog_client_five = $blog_client_five[0];
      	$client_array['image_five'] = array(
			'ID' => $blog_client_five,
		);	
  	}
}
if( !empty( $blogclientsixID ) ){	
	$blog_client_six = wp_get_attachment_image_src( $blogclientsixID,'bosa-420-300');
	if ( is_array(  $blog_client_six ) ){
		$has_client = true;
      	$blog_client_six = $blog_client_six[0];
      	$client_array['image_six'] = array(
			'ID' => $blog_client_six,
		);	
  	}
}

if( !get_theme_mod( 'disable_clients_section', true ) && $has_client ){ ?>
	<section class="section-client-area">
		<div class="client-content-wrap">
			<div class="section-title-wrap text-center">
				<h2 class="section-title">
					<?php echo esc_html( get_theme_mod( 'clients_tagline', '' ) ); ?>
				</h2>
			</div>
			<div class="row">
				<?php foreach( $client_array as $each_client ){ ?>
					<div class="col-6 col-sm-4 col-md-2">
						<article class="client-item">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_client['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
