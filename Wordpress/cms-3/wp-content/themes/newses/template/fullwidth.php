<?php /** * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newses
 */

get_header(); 
get_template_part('index','banner'); ?>

<main id="content">
    <div class="container">
      <div class="row">
      <div class="col-md-12 mg-card-box padding-20">
        <?php while (have_posts()) : the_post();
                 if(has_post_thumbnail()) {
          if ( is_single() ) { ?>
            <figure class="post-thumbnail">
              <?php the_post_thumbnail('full'); ?>          
            </figure>
          <?php }
          else { ?>
            <figure class="post-thumbnail">
              <a href="<?php the_permalink(); ?>" >
                <?php the_post_thumbnail('full'); ?>
              </a>        
            </figure>
          <?php }
          }   
          the_content();
          newses_edit_link();
          
          if (comments_open() || get_comments_number()) :
                  comments_template();
              endif;
              
         endwhile;
      ?>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();