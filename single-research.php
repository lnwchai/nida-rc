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
            if (get_field('research_download_url')) {
                echo '<div class="text-center">';
                echo '<a href="' . get_field('research_download_url') . '" class="btn btn-outline" target="_blank">full paper</a>';
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
            the_tax_sdg();

            edit_post_link('EDIT', '', '', null, 'btn-edit');
        }
    }
    ?>
</main>

<?php
get_footer();
?>