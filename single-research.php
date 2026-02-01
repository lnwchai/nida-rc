<?php
get_header();
?>
<header class="page-header header-research text-center">
        <div class="title _h"><a href="/research/">Research • งานวิจัย/บทความวิชาการ</a></div>
    </header>


<main id="main" class="site-main single-main single-research-body">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            // get template parts
            get_template_part('parts/title', 'research');

            echo '<div class="entry-content">';
            echo '<div class="s-grid -d2">';
            // Authors
            if (get_field('research_authors')) {
                echo '<div class="authors">';
                echo '<h3>Authors</h3>';
                echo '<p>' . get_field('research_authors') . '</p>';
                echo '</div>';
            }
            // Published
            if (get_field('research_published')) {
                echo '<div class="published">';
                echo '<h3>Published</h3>';
                echo '<p>' . get_field('research_published') . '</p>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';

            // Abstract
            if (get_the_content()) {
                echo '<div class="entry-abstract">';
                if (has_term('nida-impact', 'topic') || (get_field('type') == 'article')) {
                    echo '<hr />';
                } else {
                    echo '<h3>Abstract</h3>';
                }
                the_content();
                echo '</div>';
            }
            // Download

            if (class_exists('GFAPI')) {

                $form_id   = 4;
                $page_name = get_the_title();
            
                $search_criteria = array(
                    'status' => 'active',
                    'field_filters' => array(
                        array(
                            'key'   => '8',              // Field ID 8
                            'value' => $page_name        // ชื่อหน้า
                        )
                    )
                );
            
                $count = GFAPI::count_entries($form_id, $search_criteria);
            }
            
            if (get_field('research_download_url')) {

                $download_url = get_field('research_download_url');
            
                echo '<div class="text-center">';
                echo '<a href="' . esc_url(add_query_arg('download', base64_encode($download_url))) . '" class="btn btn-outline">';
                echo 'Download full paper <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-down-icon lucide-file-down"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M12 18v-6"/><path d="m9 15 3 3 3-3"/></svg>'. number_format($count);
             
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
            the_tax_sdg();
            echo do_shortcode('[s_stat]');
            
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