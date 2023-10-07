<?php
$newses_slider_category = newses_get_option('select_slider_news_category');
$newses_number_of_slides = newses_get_option('number_of_slides');
$newses_all_posts_main = newses_get_posts($newses_number_of_slides, $newses_slider_category);
$newses_count = 1;

if ($newses_all_posts_main->have_posts()) :
    while ($newses_all_posts_main->have_posts()) : $newses_all_posts_main->the_post();

        global $post;
        $newses_url = newses_get_freatured_image_url($post->ID, 'newses-slider-full');

        ?>
                
                  <!-- item -->
                    <div class="swiper-slide">
                            <div class="mg-blog-post-3 lg back-img"  <?php if (!empty($newses_url)): ?> style="background-image: url('<?php echo esc_url($newses_url); ?>');" <?php endif; ?> >
                              <div class="mg-blog-inner">
                                  <div class="mg-blog-category"> <?php newses_post_categories(); ?> </div>
                                  <?php echo newses_post_format_type($post); ?>
                                  <h4 class="title lg"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                  <?php newses_post_meta(); ?>
                              </div>
                               <a href="<?php the_permalink(); ?>" class="link-div"></a>
                          </div>
                      </div>
                      <!-- /item -->

    <?php
    endwhile;
endif;
wp_reset_postdata();
?>