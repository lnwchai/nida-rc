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
            if(get_field('start_date')){
                $start_date = get_field('start_date');
                $s_date = DateTime::createFromFormat('Ymd', $start_date);
                echo'<p><b>เริ่มต้น :</b> '. $s_date->format('j M Y').'</p>';
            }
            if(get_field('end_date')){
                $end_date = get_field('end_date');
                $e_date = DateTime::createFromFormat('Ymd', $end_date);
                echo '<p><b>สิ้นสุด :</b> '. $e_date->format('j M Y').'</p>';
            }
            if(get_field('place_name')){
            echo '<p><b>สถานที่ :</b> '.get_field('place_name').'</p>';
            }

            if(get_field('place_url')){
            echo '<p><b>url เว็บไซต์ :</b>  <a href="'.get_field('place_url').'">'.get_field('place_url').'</a></p>';   
            }

            
            echo get_field('info');
            do_action('plant_after_single_content');
            edit_post_link('EDIT', '', '', null, 'btn-edit');
            echo '</div>';
        }
    }
    ?>
    <?php
    get_template_part('parts/single', 'meta');
    get_template_part('parts/single', 'author');
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
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