<?php 
/**
PHP functions & Hooks:
*/
if (!function_exists('newses_banner_trending_posts')):
    /**
     *
     * @since newses 1.0.0
     *
     */
    function newses_banner_exclusive_posts()  { 
            if (is_front_page() || is_home()) {
                $show_flash_news_section = newses_get_option('show_flash_news_section');
            if ($show_flash_news_section): 
        ?>
                <?php
                $category = newses_get_option('select_flash_news_category');
                $number_of_posts = newses_get_option('number_of_flash_news');
                $newses_ticker_news_title = newses_get_option('flash_news_title');
				        $all_posts = newses_get_posts($number_of_posts, $category);
                $show_trending = true;
                $count = 1;
                ?>

                <div class="container mt-4 mg-padding">
                    <div class="mg-latest-news-sec">
                        <div class="mg-latest-news">
                             <div class="bn_title">
                                <h2 class="title"><i class="fa fa-spinner fa-spin text-white mr-2"></i>
                                    <?php if (!empty($newses_ticker_news_title)): ?>
                                        <?php echo esc_html($newses_ticker_news_title); ?>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <?php if(is_rtl()){ ?> 
                              <div class="mg-latest-news-slider marquee" data-direction='right' dir="ltr">
                              <?php } else { ?> 
                             <div class="mg-latest-news-slider marquee">
                                <?php }
                                if ($all_posts->have_posts()) :
                                	global $post;
                                    while ($all_posts->have_posts()) : $all_posts->the_post();
                                        ?>
                                        <?php if(is_rtl()){ ?> 
                                         <a href="<?php the_permalink(); ?>">
                                         	<span><?php the_title(); ?></span>
                                            <?php if(has_post_thumbnail()) { ?>
                                            <?php echo the_post_thumbnail(); ?>
                                            <?php } ?>
                                        </a>
                                        <?php } else { ?>  
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if(has_post_thumbnail()) { ?>
                                            <?php echo the_post_thumbnail(); ?>
                                            <?php } ?>
                                         	<span><?php the_title(); ?></span>
                                        </a>
                                        <?php }
                                        $count++;
                                    endwhile;
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Excluive line END -->
        <?php endif;
         }
    }
endif;
add_action('newses_action_banner_exclusive_posts', 'newses_banner_exclusive_posts', 10);


//Banner Tabed Section
if (!function_exists('newses_banner_3_posts')):
    /**
     *
     * @since newses 1.0.0
     *
     */
    function newses_banner_3_posts()
    { 
       $slider_3_post_category = newses_get_option('select_slider_3_post_category');
       $number_of_slider_3_posts = newses_get_option('newses_number_of_slider_3_post');
       $slider_3_all_posts = newses_get_posts($number_of_slider_3_posts, $slider_3_post_category);
       global $post;
      ?>
        <div class="row mt-3">
                  <?php if ($slider_3_all_posts->have_posts()) :
                        while ($slider_3_all_posts->have_posts()) : $slider_3_all_posts->the_post();
                        $url = newses_get_freatured_image_url($post->ID, 'full'); ?>
                  <div class="col-md-4 col-sm-4">
                    <div class="mg-blog-post-box sm shd"> 
                        <div class="mg-blog-thumb sm back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                    <a href="<?php the_permalink(); ?>" class="link-div"></a>
                            <div class="mg-blog-category"> <?php newses_post_categories(); ?> </div>
                            <?php echo newses_post_format_type($post); ?>
                        </div>
                        <article class="small minh">
                          
                          <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </article>
                      </div>
                  </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
          </div> 

    <?php }
endif;

add_action('newses_action_banner_tabbed_posts', 'newses_banner_3_posts', 10);

//Banner Advertisment
if (!function_exists('newses_banner_advertisement')):
    /**
     *
     * @since newses 1.0.0
     *
     */
    function newses_banner_advertisement()
    {

         ?>
            <div class="col-md-8 text-center-xs">
                <?php
                if (('' != newses_get_option('banner_advertisement_section'))):

                    $newses_banner_advertisement = newses_get_option('banner_advertisement_section');
                    $newses_banner_advertisement = absint($newses_banner_advertisement);
                    $newses_banner_advertisement = wp_get_attachment_image($newses_banner_advertisement, 'full');
                    $newses_banner_advertisement_url = newses_get_option('banner_advertisement_section_url');
                    $newses_banner_advertisement_url = isset($newses_banner_advertisement_url) ? esc_url($newses_banner_advertisement_url) : '#';
                    $newses_open_on_new_tab = newses_get_option('banner_advertisement_open_on_new_tab', true); 

                    ?>
                    <div class="container">
                    <div class="row align-items-center">
                    <div class="ml-auto py-2">
                            <a class="pull-right img-fluid" href="<?php echo esc_url($newses_banner_advertisement_url);?>"<?php if($newses_open_on_new_tab == true) { ?> target="_blank" <?php }  ?>">
                                <?php echo $newses_banner_advertisement; ?>
                            </a>
                    </div></div></div>
                    <?php endif; ?>
                    <!--== Top Tags ==-->
                  <div class="mg-tpt-tag-area">
                       <?php $show_popular_tags_title = newses_get_option('show_popular_tags_title');
                       $select_popular_tags_mode = newses_get_option('select_popular_tags_mode');
                       $number_of_popular_tags = newses_get_option('number_of_popular_tags');
                       newses_list_popular_taxonomies($select_popular_tags_mode, $show_popular_tags_title, $number_of_popular_tags); ?>          
                  </div>
            <!-- Trending line END -->
                  
                </div>
            <?php
    }
endif;

add_action('newses_action_banner_advertisement', 'newses_banner_advertisement', 10);

//Banner Featured Post
if (!function_exists('newses_banner_featured_posts')):
    /**
     * Ticker Slider
     *
     * @since newses 1.0.0
     *
     */
    function newses_banner_featured_posts()
    {
        $color_class = 'category-color-1';
        ?>
        <?php
        $newses_enable_featured_news = newses_get_option('show_featured_news_section');
        if ($newses_enable_featured_news):
            $newses_featured_news_title = newses_get_option('featured_news_section_title');
            $dir = 'ltr';
            if(is_rtl()){
                $dir = 'rtl';
            }
            ?>
            <div class="ta-main-banner-featured-posts featured-posts" dir="<?php echo esc_attr($dir);?>">
                <?php if (!empty($newses_featured_news_title)): ?>
                    <h4 class="header-tater1 ">
                                <span class="header-tater <?php echo esc_attr($color_class); ?>">
                                    <?php echo esc_html($newses_featured_news_title); ?>
                                </span>
                    </h4>
                <?php endif; ?>


                <div class="section-wrapper">
                    <div class="ta-double-column list-style ta-container-row clearfix">
                        <?php
                        $newses_featured_category = newses_get_option('select_featured_news_category');
                        $newses_number_of_featured_news = newses_get_option('number_of_featured_news');

                        $featured_posts = newses_get_posts($newses_number_of_featured_news, $newses_featured_category);
                        if ($featured_posts->have_posts()) :
                            while ($featured_posts->have_posts()) :
                                $featured_posts->the_post();

                                global $post;
                                $url = newses_get_freatured_image_url($post->ID, 'thumbnail');
                                ?>

                                <div class="col-3 pad float-l " data-mh="ta-feat-list">
                                    <div class="read-single color-pad">
                                        <div class="data-bg read-img pos-rel col-4 float-l read-bg-img"
                                             data-background="<?php echo esc_url($url); ?>">
                                            <img src="<?php echo esc_url($url); ?>">

                                            <span class="min-read-post-format">
                                        <?php echo newses_post_format($post->ID); ?>
                                        <?php newses_count_content_words($post->ID); ?>
                                        </span>

                                        </div>
                                        <div class="read-details col-75 float-l pad color-tp-pad">
                                            <div class="read-categories">
                                                <?php newses_post_categories(); ?>
                                            </div>
                                            <div class="read-title">
                                                <h4>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>

                                            <div class="entry-meta">
                                                <?php newses_post_meta(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

        <?php endif;
    }
endif;

add_action('newses_action_banner_featured_posts', 'newses_banner_featured_posts', 10);


//Front Page Banner
if (!function_exists('newses_front_page_banner_section')) :
    /**
     *
     * @since newses
     *
     */
    function newses_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $newses_enable_main_slider = newses_get_option('show_main_news_section');
        $select_vertical_slider_news_category = newses_get_option('select_vertical_slider_news_category');
        $vertical_slider_number_of_slides = newses_get_option('vertical_slider_number_of_slides');
        $all_posts_vertical = newses_get_posts($vertical_slider_number_of_slides, $select_vertical_slider_news_category);
        $newses_select_trending_setting = newses_get_option('newses_select_trending_setting');
        if (($newses_select_trending_setting == 'left')) {
        do_action('newses_action_front_page_trending_post');
        }
         ?>

                <div class="col-md-6">
                <div class="homemain swiper-container">
                    <div class="swiper-wrapper">
                        <?php newses_get_block('list', 'banner'); ?>
                   </div>
                  <!-- Add Arrows -->
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
                <?php do_action('newses_action_banner_tabbed_posts');?>
                </div>
                <?php do_action('newses_action_front_page_banner_sidebar_2_post'); ?>
                <?php if (($newses_select_trending_setting == 'right')) {
                  do_action('newses_action_front_page_trending_post');
                  } ?>

        <!--==/ Home Slider ==-->
        
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('newses_action_front_page_main_section_1', 'newses_front_page_banner_section', 40);


//Front Page Trending Post
if (!function_exists('newses_front_page_trending_post_section')) :
    /**
     *
     * @since newses
     *
     */
    function newses_front_page_trending_post_section()
    {
       if (is_front_page() || is_home()) {
                $trending_post_section_enable = newses_get_option('trending_post_section_enable');
            if ($trending_post_section_enable):

                $trending_category = newses_get_option('select_trending_post_category');
                $trending_post_title = newses_get_option('trending_post_title');
                $number_of_trending_posts = newses_get_option('number_of_trending_posts');
                $all_trending_posts = newses_get_posts($number_of_trending_posts, $trending_category);
                global $post;
                ?>

        <div class="col-md-3">
              <div class="recentarea wd-back">
                <?php if (!empty($trending_post_title)): ?>
                <div class="mg-sec-title st3"><h4><span class="bg"><?php echo esc_html($trending_post_title); ?></span></h4>
                </div>
                <?php endif; ?>
               <div class="recentarea-slider">
                	<?php if ($all_trending_posts->have_posts()) :
                          while ($all_trending_posts->have_posts()) : $all_trending_posts->the_post();
                          $url = newses_get_freatured_image_url($post->ID, 'thumbnail');
                      ?>
                    
                      <div class="content">
                        <?php if($url) { ?>
                        <div class="back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                          <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                      </div>
                        <?php } ?>
                        <div class="inner">
                     		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                      </div>
                    <?php  endwhile;
                           endif;
                           wp_reset_postdata();
                      ?>
                    </div>
                </div>
           </div>
        <?php endif; }
    }
endif;
add_action('newses_action_front_page_trending_post', 'newses_front_page_trending_post_section', 30);


//Front Page Banner
if (!function_exists('newses_front_page_banner_sidebar_2_post')) :
    /**
     *
     * @since newses
     *
     */
    function newses_front_page_banner_sidebar_2_post()
    {
        if (is_front_page() || is_home()) {
       $select_editorials_category = newses_get_option('select_editorials_category');
       $newses_number_of_editorials_post = newses_get_option('newses_number_of_editorials_post');
       $editiorials_all_posts = newses_get_posts($newses_number_of_editorials_post, $select_editorials_category);
       global $post;
      ?>
              <div class="col-md-3">
                  <div class="row">
                    <?php if ($editiorials_all_posts->have_posts()) :
                        while ($editiorials_all_posts->have_posts()) : $editiorials_all_posts->the_post();
                        $url = newses_get_freatured_image_url($post->ID, 'full'); ?>
                        <div class="col-md-12 col-sm-6">
                          <div class="mg-blog-post-box sm mb-4 shd">
                            <div class="mg-blog-thumb lg back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                <div class="mg-blog-category"> <?php newses_post_categories(); ?> </div>
                                <?php echo newses_post_format_type($post); ?>
                            </div>
                            <article class="small minh">
                              <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </article>
                          </div>
                        </div>
                  <?php endwhile; endif; wp_reset_postdata(); ?>
                  </div>
              </div>



<?php }
    }
endif;
add_action('newses_action_front_page_banner_sidebar_2_post', 'newses_front_page_banner_sidebar_2_post', 30);