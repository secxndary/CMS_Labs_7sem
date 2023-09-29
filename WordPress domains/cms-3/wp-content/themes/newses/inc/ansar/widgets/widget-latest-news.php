<?php
if (!class_exists('Newses_Latest_Post')) :
    /**
     * Adds Newses_Latest_Post widget.
     */
    class Newses_Latest_Post extends Newses_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newses-categorised-posts-title', 'newses-posts-number', 'newses-excerpt-length');
            $this->select_fields = array('newses-select-category', 'newses-show-excerpt');

            $widget_ops = array(
                'classname' => 'mg-posts-sec mg-posts-modul-6',
                'description' => __('Displays posts from selected category in single column.', 'newses'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('newses_latest_post', __('AR: Latest News Post', 'newses'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::newses_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */

            $title = apply_filters('widget_title', $instance['newses-categorised-posts-title'], $instance, $this->id_base);
            $category = isset($instance['newses-select-category']) ? $instance['newses-select-category'] : '0';
            $show_excerpt = isset($instance['newses-show-excerpt']) ? $instance['newses-show-excerpt'] : 'true';
            $excerpt_length = 25;
            $number_of_posts = 5;

            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title) || !empty($subtitle)): ?>
             <!-- mg-posts-sec mg-posts-modul-6 -->
            <div class="mg-posts-sec mg-posts-modul-6  wd-back">
                <!-- mg-sec-title -->
                <div class="mg-sec-title st3">
                <?php if (!empty($title)): ?>
                    <h4><span class="bg"><?php echo esc_html($title); ?></span></h4>
                <?php endif; ?>
                </div>
                <!-- // mg-sec-title -->
                <?php endif; ?>
                <?php
                $all_posts = newses_get_posts($number_of_posts, $category);
                ?>
                <!-- mg-posts-sec-inner -->
                <div class="mg-posts-sec-inner row">
                    <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            global $post;
                            $url = newses_get_freatured_image_url($post->ID, 'newses-medium'); ?>
                    <div class="d-md-flex w-100 mg-posts-sec-post mb-4">
                            <div class="col-12 col-md-6">
                                <div class="mg-blog-thumb back-img md" style="background-image: url('<?php echo esc_url($url); ?>');">
                                    <div class="mg-blog-category"> <?php newses_post_categories(); ?> </div>
                                    <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                    <span class="post-form"><i class="fa fa-camera"></i></span>
                                </div> 
                            </div>
                        <div class="mg-sec-top-post col">
                            <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php newses_post_meta(); ?>
                                            <?php if ($show_excerpt != 'false'): ?>
                                    <div class="mg-content overflow-hidden">
                                        <?php if (absint($excerpt_length) > 0) : ?>
                                            <?php
                                                $excerpt = newses_get_excerpt($excerpt_length, get_the_content());
                                                echo wp_kses_post(wpautop($excerpt)); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
                </div> <!-- // mg-posts-sec-inner -->
            </div> <!-- // mg-posts-sec block_6 -->
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $options = array(
                'true' => __('Yes', 'newses'),
                'false' => __('No', 'newses')

            );

            $categories = newses_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newses_generate_text_input('newses-categorised-posts-title', 'Title', 'Latest News');
                echo parent::newses_generate_select_options('newses-select-category', __('Select category', 'newses'), $categories);

                echo parent::newses_generate_select_options('newses-show-excerpt', __('Show excerpt', 'newses'), $options);



            }

            //print_pre($terms);


        }

    }
endif;