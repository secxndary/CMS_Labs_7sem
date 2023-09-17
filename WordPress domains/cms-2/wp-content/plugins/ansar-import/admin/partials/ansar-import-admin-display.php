<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://themeansar.com/
 * @since      1.0.0
 *
 * @package    Ansar_Import
 * @subpackage Ansar_Import/admin/partials
 */
?>
<?php
$tehme_data = wp_get_theme();

if ($tehme_data->get('Author') != 'themeansar' && $tehme_data->get('Author') != 'Themeansar') {
    echo '<h3>' . __('Ansar Import - This plugin requires Official <a href="https://themeansar.com/">Theme Ansar</a> Theme to be activated to work.', 'ansar-import') . '</h3>';

    //Adding @ before will prevent XDebug output
    @trigger_error(__('Ansar Import - This plugin requires Official Theme Ansar Theme to be activated to work.', 'ansar-import'), E_USER_ERROR);
    wp_die();
}
?>

<div class="wrap">
    <div class="ansar-import-wrap">
    <a href="https://themeansar.com" target="_blank">
            <img class="ansar_logo" src="<?php echo plugin_dir_url( __FILE__ ) . 'image/logo.png'; ?>"  alt="Themeansar">
    </a>
    <h1 class="ansar-heading"><?php esc_html_e('Ansar Import - One Click Demo Import', 'ansar-import') ?></h1>
    <p class="ansar-desc"><?php esc_html_e('Just Click a Import button and Install a Demo', 'ansar-import') ?></p>
    </div>
</h1>




    <!-- This file should primarily consist of HTML with a little bit of PHP. -->
    <?php
    $cat_data = wp_remote_get(esc_url_raw('https://demos.themeansar.com/wp-json/wp/v2/categories'));
    $cat_data_body = wp_remote_retrieve_body($cat_data);
    $all_categories = json_decode($cat_data_body, TRUE);


    //print_r($all_demos);
    $theme_data = wp_get_theme();
    $theme_name = $theme_data->get('Name');
    $theme_slug = $theme_data->get('TextDomain');

    $theme_data_api = wp_remote_get(esc_url_raw("https://demos.themeansar.com/wp-json/wp/v2/demos/?orderby=menu_order&order=asc&search=%27" . urlencode($theme_name) . "%27"));
    $theme_data_api_body = wp_remote_retrieve_body($theme_data_api);
    $all_demos = json_decode($theme_data_api_body, TRUE);

    $present_cat = array();
    $present_cat = array_values(array_unique($present_cat));


    if (count($all_demos) == 0) {
        wp_die('This theme is not supported yet!');
    }

    //print_r($theme_data_api);
    foreach ($all_demos as $demo) {
        foreach ($demo['categories'] as $in_cat) {
            // echo $in_cat.'<br>';
            array_push($present_cat, $in_cat);
        }
    }

    $present_cat = array_values(array_unique($present_cat));
    ?>

    <hr class="wp-header-end">
    <div class="theme-browser rendered demo-ansar-container">
        <div class="themes wp-clearfix">
            <!-- Filter Controls -->
            <div uk-filter="target: .js-filter">

                <ul class="uk-subnav uk-subnav-pill">
                    <li class="uk-active" uk-filter-control><a href="#">All</a></li>
                    <?php
                    foreach ($all_categories as $category) {

                        if (in_array($category['id'], $present_cat)) {
                            ?>
                            <li uk-filter-control="[data-color*='cat_<?php echo esc_html($category['id']); ?>']"><a href="#"><?php echo esc_attr($category['name']); ?></a></li>

                            <?php
                        }
                    }
                    ?>


                </ul>

                <div class="js-filter grid-wrap">
                    <?php
                    //  print_r($all_demos);
                    foreach ($all_demos as $demo) {
                        ?>
                        <div class="ansar-inner-box" data-color="<?php
                        foreach ($demo['categories'] as $in_cat) {
                            echo "cat_" . $in_cat . " ";
                        }
                        ?>">
                            <!-- product -->
                            <div class="uk-card theme" style="width: 100%;" tabindex="0">
                                <div class="theme-screenshot">
                                    <?php if ($theme_name != $demo['theme_name']) { ?>
                                        <span class="ribbon pro">
                                            <?php esc_html_e('Pro','ansar-import'); ?>
                                        </span>
                                        <?php } else { ?>
                                        <span class="ribbon">
                                            <?php esc_html_e('Free','ansar-import'); ?>
                                        </span>
                                    <?php } ?>
                                    <img src="<?php echo esc_url($demo['preview_url']); ?>" >
                                </div>
                                <span class="more-details btn-preview" data-id="<?php echo $demo['id']; ?>" data-live="<?php  if(get_option( 'ansar_demo_installed' )== $demo['id']){ echo 1; }?>" data-toggle="modal" data-target="#AnsardemoPreview"><?php esc_html_e('Preview','ansr-import'); ?></span>
                                <div class="theme-author"><?php esc_html_e('By Themeansar','ansar-import'); ?> </div>
                                <div class="theme-id-container">
                                    <h2 class="theme-name" id=""><?php echo esc_attr($demo['title']['rendered']); ?></h2>
                                    <div class="theme-actions">
                                        <?php if ($theme_name != $demo['theme_name']) {
                                            ?>
                                            <a class="button activate" target="_new" href="<?php echo esc_url($demo['pro_link']); ?>" >
                                                <?php esc_html_e('Buy Now','ansar-import'); ?></a>
                                        <?php } else {
              
                                            ?>
                                            <a class="button activate live-btn-<?php echo $demo['id']; ?> <?php  if(get_option( 'ansar_demo_installed' )!= $demo['id']){ echo "uk-hidden"; }?> " target="_new" data-id="<?php echo $demo['id']; ?>"  href="<?php echo home_url(); ?>">Live Preview</a>
                                            <button type="button" class="<?php  if(get_option( 'ansar_demo_installed' )== $demo['id']){ echo "uk-hidden"; }?> button activate btn-import btn-import-<?php echo $demo['id']; ?>" href="#" data-id="<?php echo $demo['id']; ?>"><?php esc_html_e('Import','ansar-import'); ?></button>
                                            <?php }  ?>
                                        <a class="button button-primary load-customize hide-if-no-customize btn-preview" data-id="<?php echo $demo['id']; ?>" data-toggle="modal" data-target="#AnsardemoPreview" href="#"><?php esc_html_e('Preview','ansar-import'); ?></a>

                                    </div>
                                </div>    
                            </div>
                            <!-- /product -->
                        </div>

                        <?php
                    }
                    ?>


                </ul>

            </div>



            <!-- /product -->


        </div>
    </div>
</div>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->




<!-- Modal -->
<div id="AnsardemoPreview" tabindex="-1" class="uk-modal-full" uk-modal>
    <!-- main include -->   
    <div class="theme-install-overlay wp-full-overlay expanded iframe-ready" style="display: block;">
        <div class="wp-full-overlay-sidebar">
            
            <div class="wp-full-overlay-header">
                <button class="close-full-overlay"><span class="screen-reader-text"><?php esc_html_e('Close', 'ansar-import'); ?></span></button>
                <a class="button activate preview-live-btn uk-hidden" target="_new"  href="<?php echo home_url(); ?>"> <?php esc_html_e('Live Preview','ansar-import'); ?></a>
                <button type="button" class="button button-primary import-priview activate btn-import" href="#" data-id="0"><?php esc_html_e('Import', 'ansar-import'); ?></button>
                <a class="button activate preview-buy uk-hidden" target="_new" href="#" ><?php esc_html_e('Buy Now', 'ansar-import'); ?></a>
            </div>

            <div class="wp-full-overlay-sidebar-content">
                <div class="install-theme-info">
                    <h3 class="theme-name"> <?php echo esc_html_e($theme_data->get('Name')); ?> </h3>
                    <span class="theme-by"><?php esc_html_e('By', 'ansar-import'); ?> <?php echo esc_attr($theme_data->get('Author')); ?> </span>
                    <img class="theme-screenshot" src="" alt="">
                    <div class="theme-details">
                        <div class="theme-version"><?php echo esc_html_e($theme_data->get('Version')); ?></div>
                        <div class="theme-description"><?php echo esc_html_e($theme_data->get('Description')); ?></div>
                    </div>
                </div>
            </div>
            <div class="wp-full-overlay-footer">

                <button type="button" class="collapse-sidebar button" aria-expanded="true" aria-label="Collapse Sidebar">
                    <span class="collapse-sidebar-arrow"></span>
                    <span class="collapse-sidebar-label"><?php esc_html_e('Collapse', 'ansar-import'); ?></span>
                </button>
                <div class="devices-wrapper">
                    <div class="devices">
                        <button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
                            <span class="screen-reader-text"><?php esc_html_e('Enter desktop preview mode', 'ansar-import'); ?><?php esc_html_e('Collapse', 'ansar-import'); ?></span>
                        </button>
                        <button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
                            <span class="screen-reader-text"><?php esc_html_e('Enter tablet preview mode', 'ansar-import'); ?></span>
                        </button>
                        <button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile">
                            <span class="screen-reader-text"><?php esc_html_e('Enter mobile preview mode', 'ansar-import'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="wp-full-overlay-main">
            <iframe id="theme_preview" src="#" title="Preview"></iframe> 
        </div>
    </div>
    <!-- main include -->   

</div>
<!-- Modal preview  End -->

<div id="Confirm" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><?php esc_html_e('Confirmation', 'ansar-import'); ?></h2>
        </div>
        <div class="uk-modal-body">
            <div class="demo-import-confirm-message"><?php echo sprintf('Importing demo data will ensure that your site will look similar as theme demo. It makes you easy to modify the content instead of creating them from scratch. Also, consider before importing the demo: <ol><li class="warning">Importing the demo on the site if you have already added the content is highly discouraged.</li> <li>You need to import demo on fresh WordPress install to exactly replicate the theme demo.</li> <li>It will install the required plugins as well as activate them for installing the required theme demo within your site.</li> <li>Copyright images will get replaced with other placeholder images.</li> <li>None of the posts, pages, attachments or any other data already existing in your site will be deleted or modified.</li> <li>It will take some time to import the theme demo.</li></ol>', 'ansar-import'); ?></div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <form method="post" class="import">
                <input type="hidden" name="theme_id" id="theme_id" value="0">
                <?php wp_nonce_field('check-sec'); ?>
                <button type="button" class="uk-button uk-button-default uk-modal-close" data-dismiss="modal"><?php esc_html_e('Close', 'ansar-import'); ?></button>
                <button type="button" id="import_data" class="uk-button uk-button-primary"><?php esc_html_e('Confirm', 'ansar-import'); ?></button>
            </form>
        </div>
    </div>
</div>