<?php
get_header();
$sidebar = get_theme_mod('archive_sidebar', 'none');
if ($sidebar != 'none') {
    echo '<div class="site-' . $sidebar . 'bar">';
}
?>
<main id="main" class="site-main -wide">
    <header class="page-header <?php echo plant_page_title_css(); ?>">
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description _space">', '</div>');
        ?>
    </header>
    <?php
    if (have_posts()) {
        $term = get_queried_object();
        $taxonomy = $term->taxonomy;
        $term_id = $term->term_id;
        $children = get_term_children( $term_id, $taxonomy );
        
        echo '<div class="s-grid ">';
        $vars = plant_content_vars();
        while (have_posts()) {
            the_post();    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('nd-procurements'); ?>>
            <div class="entry-header">
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); 
                echo '<p>'.get_the_date().'</p>';
                ?>
            </div>

        </article>


    <?php }
        echo '</div>';
        echo plant_paging();
    } else {
        get_template_part('parts/content', 'none');
    }
    ?>
</main>
<?php
if ($sidebar != 'none') {
    echo '<div class="site-sidebar widget-area">';
    dynamic_sidebar($sidebar . 'bar');
    echo '</div>';
    echo '</div>';
}
get_footer();
?>