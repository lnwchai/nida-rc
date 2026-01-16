<?php
/**
 * Template Name: Research Page
 */

// facetwp disable auto refresh
function fwp_disable_auto_refresh()
{
    echo '<script>(function($) { $(function() { if ("undefined" !== typeof FWP) { FWP.auto_refresh = false; } }); })(fUtil);</script>';
}
add_action('wp_footer', 'fwp_disable_auto_refresh', 100);
get_header(); ?>

<main id="main" class="site-main -wide">
    <header class="page-header header-research <?php echo plant_page_title_css(); ?>">
        <h1 class="title"><?php the_title();?></h1>
    </header>

    <div class="page-content">
        <?php

        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
        <div class="research-filter">
            <?php echo do_shortcode('[facetwp facet="search"]'); ?>
            <?php echo do_shortcode('[facetwp facet="topic"]'); ?>
            <?php echo do_shortcode('[facetwp facet="category_research"]'); ?>
            <?php echo do_shortcode('[facetwp facet="research_year"]'); ?>
            <button class="btn justify-center" onclick="FWP.refresh()">ค้นหา</button>
            <?php echo '<a href="https://demo.nida.ac.th/research-list/" id="reset" class="btn">เริ่มใหม่</a>'; ?>
        </div>
        <div>
            <h2 class="_title">งานวิจัย/Research/บทความวิชาการ</h2>
            <?php
            echo do_shortcode('[facetwp template="research_card"]');
            echo do_shortcode('[facetwp facet="pagination"]');
            ?>
        </div>
    </div>
    <?php edit_post_link('EDIT', '', '', null, 'btn-edit'); ?>
</main>


<?php get_footer(); ?>