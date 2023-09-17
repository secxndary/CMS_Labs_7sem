<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header(); ?>
<main id="content" class="single-class">
<div class="container"> 
      <!--row-->
      <div class="row">
        <!--col-lg-->
        <?php   $blogarise_single_page_layout = get_theme_mod('blogarise_single_page_layout','single-align-content-right');
            if($blogarise_single_page_layout == "single-align-content-left") { ?>
        	<aside class="col-lg-3">
            	<?php get_sidebar();?>
        	</aside>
        <?php } ?>
		<?php if($blogarise_single_page_layout == "single-align-content-right"){ ?>
			<div class="col-lg-9">
		<?php } elseif($blogarise_single_page_layout == "single-align-content-left") { ?>
        	<div class="col-lg-9">
		<?php } elseif($blogarise_single_page_layout == "single-full-width-content") { ?>
			<div class="col-lg-12">
    	<?php } ?>
          <?php if(have_posts())
            {
          while(have_posts()) { the_post(); ?>
            <div class="bs-blog-post single"> 
              <div class="bs-header">
                <?php $blogarise_single_post_category = esc_attr(get_theme_mod('blogarise_single_post_category','true'));
                  if($blogarise_single_post_category == true){ ?>
                      <div class="bs-blog-category justify-content-start">
                      <?php blogarise_post_categories(); ?>
                      </div>
                <?php } ?>
                 <h1 class="title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => esc_html_e('Permalink to: ','blogarise'),'after'  => '') ); ?>">
                  <?php the_title(); ?></a>
                </h1>

                <div class="bs-info-author-block">
                  <div class="bs-blog-meta mb-0"> 
                  <?php $blogarise_single_post_admin_details = esc_attr(get_theme_mod('blogarise_single_post_admin_details','true'));
                  if($blogarise_single_post_admin_details == true){ ?>
                  <span class="bs-author"><a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a> <?php esc_html_e('By','blogarise'); ?>
                     <a class="ms-1" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></span>
                <?php } ?>
                    
                    <?php $blogarise_single_post_date = esc_attr(get_theme_mod('blogarise_single_post_date','true'));
                    if($blogarise_single_post_date == true){ blogarise_date_content(); } ?>
                    <?php $blogarise_single_post_tag = esc_attr(get_theme_mod('blogarise_single_post_tag','true'));
                    if($blogarise_single_post_tag == true){
                    $tag_list = get_the_tag_list();
                    if($tag_list){ ?>
                    <span class="tag-links">
                      <a href="<?php the_permalink(); ?>"><?php the_tags("#" , ", #", ' ', ''); ?></a>
                    </span>
                    
                  <?php } } ?>
                  </div>
                </div>
              </div>
              <?php
              $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
              if($single_show_featured_image == true) {
              if(has_post_thumbnail()){
              echo '<a class="bs-blog-thumb" href="'.esc_url(get_the_permalink()).'">';
              the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
              echo '</a>';
               } }?>
              <article class="small single">
                <?php the_content(); ?>
                <?php blogarise_edit_link(); ?>
                <?php  blogarise_social_share_post($post); ?>
                <div class="clearfix mb-3"></div>
                <?php
                $prev =  (is_rtl()) ? " fa-angle-double-right" : " fa-angle-double-left";
                $next =  (is_rtl()) ? " fa-angle-double-left" : " fa-angle-double-right";
            the_post_navigation(array(
                'prev_text' => '<div class="fa' .$prev.'"></div><span></span> %title ',
                'next_text' => ' %title <div class="fa' .$next.'"></div><span></span>',
                'in_same_term' => true,
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="single-nav-links">',
                'after' => '</div>',
            ));
            ?>
              </article>
            </div>
          <?php } ?>

           <?php $blogarise_enable_single_admin_details = esc_attr(get_theme_mod('blogarise_enable_single_admin_details','true'));
            if($blogarise_enable_single_admin_details == true) { ?>
           <div class="bs-info-author-block py-4 px-3 mb-4 flex-column justify-content-center text-center">
            <a class="bs-author-pic mb-3" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a>
                <div class="flex-grow-1">
                  <h4 class="title"><?php esc_html_e('By','blogarise'); ?> <a href ="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                  <p><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
             <?php } ?>
            <?php $blogarise_enable_related_post = esc_attr(get_theme_mod('blogarise_enable_related_post','true'));
                  $blogarise_enable_single_post_category = get_theme_mod('blogarise_enable_single_post_category','true');
                  $blogarise_enable_single_post_date = get_theme_mod('blogarise_enable_single_post_date','true');
                                if($blogarise_enable_related_post == true){
                            ?>
              <div class="py-4 px-3 mb-4 bs-card-box">
                        <!--Start bs-realated-slider -->
                        <div class="bs-widget-title  mb-3">
                            <!-- bs-sec-title -->
                            <?php $blogarise_related_post_title = get_theme_mod('blogarise_related_post_title', esc_html__('Related Post','blogarise'))?>
                            <h4 class="title"><?php echo esc_html($blogarise_related_post_title);?></h4>
                        </div>
                        <!-- // bs-sec-title -->
                      <div class="related-post">
                        <div class="row">
                          <!-- featured_post -->
                          <?php global $post;
                                  $categories = get_the_category($post->ID);
                                  $number_of_related_posts = 3;

                                  if ($categories) {
                                  $cat_ids = array();
                                  foreach ($categories as $category) $cat_ids[] = $category->term_id;
                                  $args = array(
                                  'category__in' => $cat_ids,
                                  'post__not_in' => array($post->ID),
                                  'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                                  'ignore_sticky_posts' => 1
                                   );
                                  $related_posts = new wp_query($args);
                                  while ($related_posts->have_posts()) {
                                  $related_posts->the_post();
                                  global $post;
                                  $url = blogarise_get_freatured_image_url($post->ID, 'blogarise-featured');
                                  ?>
                                  <!-- blog -->
                                  <div class="col-md-4">
                                  <div class="bs-blog-post three md back-img bshre mb-md-0" <?php if(has_post_thumbnail()) { ?>
                            style="background-image: url('<?php echo esc_url($url); ?>');" <?php } ?>>
                                    <a class="link-div" href="<?php the_permalink(); ?>"></a>
                                    <div class="inner">
                                      <?php if($blogarise_enable_single_post_category == true) { ?>
                                      <div class="bs-blog-category">
                                        <?php blogarise_post_categories(); ?> 
                                      </div>
                                      <?php } ?>
                                      <?php $blogarise_enable_single_post_admin_details = esc_attr(get_theme_mod('blogarise_enable_single_post_admin_details','true')); ?>
                                      <h4 class="title sm mb-0"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>">
                                              <?php the_title(); ?></a> </h4> 
                                      <div class="bs-blog-meta">
                                        <?php if($blogarise_enable_single_post_admin_details == true) { blogarise_author_content(); } ?>
                                        <?php if($blogarise_enable_single_post_date == true) { ?>
                                           <?php blogarise_date_content(); ?>
                                        <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                <!-- blog -->
                                    <?php }
                }
                wp_reset_postdata();
                ?>
                            </div>
                          </div>
                    </div>
                    <!--End bs-realated-slider -->
                  <?php } } $blogarise_enable_single_post_comments = esc_attr(get_theme_mod('blogarise_enable_single_post_comments',true));
                  if($blogarise_enable_single_post_comments == true) {
                  if (comments_open() || get_comments_number()) :
                  comments_template();
                  endif; } ?>
      </div>
       <?php if($blogarise_single_page_layout == "single-align-content-right") { ?>
      <!--sidebar-->
          <!--col-lg-3-->
            <aside class="col-lg-3">
                  <?php get_sidebar();?>
            </aside>
          <!--/col-lg-3-->
      <!--/sidebar-->
      <?php } ?>
    </div>
    <!--/row-->
</div>
<!--/container-->
</main> 
<?php get_footer(); ?>