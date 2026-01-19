<?php
get_header();
?>
<header class="page-header header-research text-center">
        <div class="title _h"><a href="/research/">NIDA IMPACT</a></div>
    </header>


<main id="main" class="site-main single-main single-research-body">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            // get template parts
            get_template_part('parts/title', 'impact');

            echo '<div class="entry-content">';
            the_content();
            echo '</div>';

          
            // Download


            
            if (get_field('research_download_url')) {

                $download_url = get_field('research_download_url');
            
                echo '<div class="text-center">';
                echo '<a href="' . esc_url(add_query_arg('download', base64_encode($download_url))) . '" class="btn btn-outline">';
                echo 'Download full paper';
                echo '</a>';
                echo '</div>';
            }
            
            
            if (isset($_GET['download'])) {

                echo '<div class="download-form-wrapper">';
                echo do_shortcode('[gravityform id="4" title="false" description="false"]');
                echo '</div>';
            
            }
            
            
            


            // get list a taxonomy keywords this post
            $keywords = get_the_terms(get_the_ID(), 'keyword');
            // taxonomy keywords list
            if ($keywords && ! is_wp_error($keywords)) {
                $keywords_list = '';
                foreach ($keywords as $keyword) {
                    $keywords_list .= '<a href="' . get_term_link($keyword->slug, 'keyword') . '">' . $keyword->name . '</a>';
                }
                echo '<div class="single_tags _h ' . $css_class . '">' . $keywords_list . '</div>';
                
            }

            //show taxonomy SDG
            echo '<div class="sdg-view">';
          
            
            echo do_shortcode('[post-views]');
            
            echo '</div>';

            edit_post_link('EDIT', '', '', null, 'btn-edit');
        }
    }
    ?>
<?php if (isset($_GET['download'])) : ?>
<div id="gf-popup-overlay">
    <div id="gf-popup">

        <button class="gf-close" onclick="location.href='<?php echo esc_url(remove_query_arg('download')); ?>'">×</button>

        <?php echo do_shortcode('[gravityform id="4" title="false" description="false"]'); ?>

    </div>
</div>
<?php endif; ?>


</main>

<?php
get_footer();
?>