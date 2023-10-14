<?php
$blogprojectoneID = get_theme_mod( 'blog_project_one','');
$blogprojecttwoID = get_theme_mod( 'blog_project_two','');       
$blogprojectthreeID = get_theme_mod( 'blog_project_three','');

$project_array = array();
$has_project = false;
if( !empty( $blogprojectoneID ) ){
	$blog_project_one  = wp_get_attachment_image_src( $blogprojectoneID,'bosa-420-300');
 	if ( is_array(  $blog_project_one ) ){
 		$has_project = true;
   	 	$blog_project_one = $blog_project_one[0];
   	 	$project_array['image_one'] = array(
			'ID' => $blog_project_one,
		);	
  	}
}
if( !empty( $blogprojecttwoID ) ){
	$blog_project_two = wp_get_attachment_image_src( $blogprojecttwoID,'bosa-420-300');
	if ( is_array(  $blog_project_two ) ){
		$has_project = true;	
        $blog_project_two = $blog_project_two[0];
        $project_array['image_two'] = array(
			'ID' => $blog_project_two,
		);	
  	}
}
if( !empty( $blogprojectthreeID ) ){	
	$blog_project_three = wp_get_attachment_image_src( $blogprojectthreeID,'bosa-420-300');
	if ( is_array(  $blog_project_three ) ){
		$has_project = true;
      	$blog_project_three = $blog_project_three[0];
      	$project_array['image_three'] = array(
			'ID' => $blog_project_three,
		);	
  	}
}

if( !get_theme_mod( 'disable_projects_section', true ) && $has_project ){ ?>
	<section class="section-project-area">
		<div class="project-content-wrap">
			<div class="row">
				<?php foreach( $project_array as $each_project ){ ?>
					<div class="col-sm-4">
						<article class="project-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_project['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
