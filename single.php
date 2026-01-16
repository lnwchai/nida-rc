<?php get_header(); 
$sidebar = get_theme_mod('single_sidebar', 'none');
if ($sidebar != 'none') {
    echo '<div class="site-' . $sidebar . 'bar">';
}
?>
<main id="main" class="site-main single-main">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_plant_single_title();
            echo '<div class="single-content">';
            do_action('plant_before_single_content');
            the_content();
            do_action('plant_after_single_content');
            edit_post_link('EDIT', '', '', null, 'btn-edit');
            echo '</div>';
        }
    }
    ?>
    <?php
    //show taxonomy SDG
    the_tax_sdg();

    get_template_part('parts/single', 'author');
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    get_template_part('parts/single', 'related');


    $cat = get_the_category();
    $parentCatName = get_cat_name($cat[0]->parent);

    if(get_field('file')){
        echo '<a class="single-dowload _h" href="'.get_field('file').'">ดาวน์โหลดประกาศ</a>';
    }
    if($parentCatName == 'ทุนการศึกษา'){
            echo '<div class="alignfull scholarship-loop">
                <div class="s-container">
                <h2 class="_title">ข่าวเกี่ยวกับทุนการศึกษา</h2>
            ';
            echo do_shortcode('[s_loop template="noimg" category_name="scholarship" posts_per_page="3" css="s-grid -d3"]');

            echo '</div></div>';
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