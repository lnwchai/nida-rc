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
    <div>
    <div id="main" class="container site-main single-main">
    <?php 
$image = get_field('images');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
        <p><b><?php the_field('flname'); ?></b></p>
        <p><b><?php the_field('rank'); ?></b></p>
        <p><?php the_field('responsibilities'); ?></p>
        <p><b>สถานที่ติดต่อ: </b><?php the_field('contact-location'); ?></p>
        <p><b>โทร: </b><?php the_field('contact'); ?></p>
        <p><b>อีเมล: </b><?php the_field('email'); ?></p>
        <p><?php the_field('responsibilities'); ?></p>
        <p><?php the_field('education'); ?></p>
        <p><?php the_field('Expert'); ?></p>
        <p><?php the_field('work-experience'); ?></p>
        <p><?php the_field('performance'); ?></p>
        <p><?php the_field('downloads-cv-th'); ?></p>
        <p><?php the_field('downloads-cv-en'); ?></p>
        <?php while (have_posts()) : the_post(); ?>
            <hr class="border border-primary border-3 opacity-75">
        <?php endwhile; // end of the loop. 
        ?>
</div>
</div><!-- #s-container -->
    <?php
    get_template_part('parts/single', 'meta');
    get_template_part('parts/single', 'author');
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    get_template_part('parts/single', 'related');
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