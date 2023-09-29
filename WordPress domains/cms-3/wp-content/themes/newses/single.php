<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header(); ?>
<!--==================== Newses breadcrumb section ====================-->
<!-- =========================
     Page Content Section      
============================== -->
<main id="content">
    <!--container-->
    <div class="container">
      <!--row-->
      <div class="row">
        <div class="col-md-12">
          <div class="mg-header mb-30">
            <?php if(have_posts())
            {
          while(have_posts()) { the_post(); ?>
            <?php $newses_single_post_category = esc_attr(get_theme_mod('newses_single_post_category','true'));
                  if($newses_single_post_category == true){ ?>
                <div class="mg-blog-category mb-1"> 
                      <?php newses_post_categories(); ?>
                </div>
                <?php } ?>
                  <h1 class="title"><?php the_title(); ?></h1>
                  <?php
                  $tags = get_the_tags();
                  $newses_single_post_admin_details = esc_attr(get_theme_mod('newses_single_post_admin_details','true'));
                  $newses_single_post_date = esc_attr(get_theme_mod('newses_single_post_date','true'));
                  $newses_single_post_tag = esc_attr(get_theme_mod('newses_single_post_tag','true'));
                   if (($newses_single_post_admin_details == true) || ($newses_single_post_date == true) || ($newses_single_post_tag == true)) { ?>
              <div class="media mg-info-author-block"> 
                  <?php if($newses_single_post_admin_details == true){ ?>
                   <a class="mg-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
                <?php } ?>
                  <div class="media-body">
                    <?php if($newses_single_post_admin_details == true){ ?>
                    <h4 class="media-heading"><span><?php esc_html_e('By','newses'); ?></span><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                    <?php } ?>
                    <?php if($newses_single_post_date == true){ ?>
                    <span class="mg-blog-date"><i class="fa fa-clock-o"></i> 
                      <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('j,')); ?> <?php echo esc_html(get_the_date('Y')); ?></span>
                    <?php }
                    if($newses_single_post_tag == true){
                    $tag_list = get_the_tag_list();
                    if($tag_list){ ?>
                    <span class="newses-tags"><i class="fa fa-tag"></i>
                      <?php $keys = array_keys($tags);
                       foreach ($tags as $key => $tag) {
                          $tag_link = get_tag_link($tag->term_id);
                          if ($key === end($keys)) {
                            echo '<a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>';
                          } else {
                            echo ' <a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>, ';
                          }
                        }  ?>
                    </span>
                  <?php } } ?>
                  </div>
                </div>
              <?php } } } ?>
            </div>
        </div>
        <!--col-md-->
        <?php 
                    $newses_single_page_layout = get_theme_mod('newses_single_page_layout','single-align-content-right');
                    if($newses_single_page_layout == "single-align-content-left")
                    { ?>
                    <aside class="col-md-3">
                        <?php get_sidebar();?>
                    </aside>
                    <?php } ?>
                    <?php if($newses_single_page_layout == "single-align-content-right"){
                    ?>
                    <div class="col-md-9">
                    <?php } elseif($newses_single_page_layout == "single-align-content-left") { ?>
                    <div class="col-md-9">
                    <?php } elseif($newses_single_page_layout == "single-full-width-content") { ?>
                     <div class="col-md-12">
                     <?php } ?>
		      <?php while (have_posts()) : the_post(); ?>
            <div class="mg-blog-post-box"> 
              <?php
              $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
              if($single_show_featured_image == true) {
              if(has_post_thumbnail()){
              echo the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
               } }?>
              <article class="small single p-3">
                <?php the_content(); ?>
                <?php newses_edit_link(); ?>
                <?php  newses_social_share_post($post); ?>
                <?php wp_link_pages(array(
                'before' => '<div class="single-nav-links">',
                'after' => '</div>',
                ));
                ?>
                <div class="clearfix mb-3"></div>
                <?php
                $prev =  (is_rtl()) ? "left" : "right";
                $next =  (is_rtl()) ? "right" : "left";
            the_post_navigation(array(
                'prev_text' => '%title <div class="fa fa-angle-double-'.$prev.'"></div><span></span>',
                'next_text' => '<div class="fa fa-angle-double-'.$next.'"></div><span></span> %title',
                'in_same_term' => true,
            ));
            ?>
              </article>

              

            </div>
            <div class="clearfix mb-4"></div>
            <?php $newses_enable_single_post_admin_details = esc_attr(get_theme_mod('newses_enable_single_post_admin_details',true));
            if($newses_enable_single_post_admin_details == true) { ?>
           <div class="media mg-info-author-block">
            <?php  ?>
            <a class="mg-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a>
                <div class="media-body">
                  <h4 class="media-heading"><?php esc_html_e('By','newses'); ?> <a href ="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                  <p><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
            <?php } ?>
            <?php $newses_enable_related_post = esc_attr(get_theme_mod('newses_enable_related_post','true'));
                                if($newses_enable_related_post == true){
                            ?>
              <div class="wd-back">
                        <!--Start mg-realated-slider -->
                        <div class="mg-sec-title st3">
                            <!-- mg-sec-title -->
                            <?php $newses_related_post_title = get_theme_mod('newses_related_post_title', esc_html__('Related Post','newses'))?>
                            <h4><span class="bg"><?php echo esc_html($newses_related_post_title);?></span></h4>
                        </div>
                        <!-- // mg-sec-title -->
                           <div class="small-list-post row">
                                <!-- featured_post -->
                                  <?php
                                  global $post;
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
                                  ?>
                                  <?php $url = newses_get_freatured_image_url($post->ID, 'full'); ?>
                                    <!-- blog -->
                                  <div class="small-post media col-md-6 col-sm-6 col-xs-12">
                                    <div class="img-small-post back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                      <a href="<?php echo esc_url(get_the_permalink())?>" class="link-div"></a>
                                    </div>
                                    <div class="small-post-content media-body">
                                      <?php $newses_enable_single_post_category = esc_attr(get_theme_mod('newses_enable_single_post_category','true'));

                                            if($newses_enable_single_post_category == true){ ?>
                                            <div class="mg-blog-category"> <?php newses_post_categories(); ?>
                                          </div> <?php } ?>
                                        <!-- small-post-content -->
                                        <h5 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>">
                                              <?php the_title(); ?></a></h5>
                                        <!-- // title_small_post -->
                                           <div class="mg-blog-meta"> 
                                            <?php $newses_enable_single_post_date = esc_attr(get_theme_mod('newses_enable_single_post_date','true'));
                                                if($newses_enable_single_post_date == true){
                                            ?>
                                              <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>">
         									<?php echo esc_html(get_the_date('M j, Y')); ?></a></span>
                                            <?php } $newses_enable_single_post_author = esc_attr(get_theme_mod('newses_enable_single_post_author','true'));
                                              if($newses_enable_single_post_author == true) {?>
                                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <i class="fa fa-user-circle-o"></i> <?php the_author(); ?></a>
                                            <?php } ?> 
                                            <?php edit_post_link( __( 'Edit', 'newses' ), '<span class="post-edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
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
                    <!--End mg-realated-slider -->
          <?php } $newses_enable_single_post_comments = esc_attr(get_theme_mod('newses_enable_single_post_comments',true));
         if($newses_enable_single_post_comments == true) {
                  if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; } endwhile; // End of the loop.
          ?>

      </div>
       <?php if($newses_single_page_layout == "single-align-content-right") { ?>
      <!--sidebar-->
          <!--col-md-3-->
            <aside class="col-md-3">
                  <?php get_sidebar();?>
            </aside>
          <!--/col-md-3-->
      <!--/sidebar-->
      <?php } ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>