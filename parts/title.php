<header class="text-center">
    <div class="single-pic alignwide">
        <?php the_post_thumbnail('full'); ?>
    </div>
    <div class="single-cat">
        <?php echo plant_cat(); ?>
    </div>
    <h1>
        <?php the_title(); ?>
    </h1>
    <div class="entry-meta single-meta mb-0">
        <?php echo plant_date(); ?>
        <?php
        if (function_exists('seed_social')) {
            echo '<div class="entry-social">';
            seed_social();
            echo '</div>';
        }
        ?>
    </div>
</header>