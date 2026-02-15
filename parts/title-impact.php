<?php
// get taxonomy topic
$terms = get_the_terms($post->ID, 'topic');
foreach ($terms as $term) {
    $topic_link = get_term_link($term, 'topic');
    $topic = '<a href="' . $topic_link . '">' . $term->name . '</a>';
    $topic_id =  $term->term_id;
}

?>
<header class="research-header _impact">
    <?php
        // Thumbnail
    if (has_post_thumbnail()) {
        echo '<div class="entry-thumbnail">';
        the_post_thumbnail('large');
        echo '</div>';
    }else{
        echo '<div class="entry-thumbnail">';
        if($cover_topic){
            echo '<img src="'.$cover_topic.'" />';
        } 
        echo '</div>';
    }
    ?>
    <div class="col">
        <div class="posted-cat _h -button">
            <?php 
                $primary_topic_id = get_field('primary_topic', get_the_ID());
                if($primary_topic_id){
                    $primary_topic = get_term( $primary_topic_id , 'topic' );
                    $primary_topic_link = get_term_link($primary_topic, 'topic');
                    echo '<a href="'.$primary_topic_link.'">' . $primary_topic->name . '</a>';
                }else{
                    echo $topic; 
                }  ?>
        </div>
        <h1 class="entry-title _hide"><?php the_title(); ?></h1>
        <?php
            $biweekly_no = get_field('biweekly_no');
            $biweekly    = get_field('biweekly');
            $caption     = get_field('caption');
            

            echo '<h2><b>'.$biweekly_no.'</b></h2>';
            echo '<h3>'.$biweekly.'</h3>';
            echo '<p>'.$caption.'</p>';

            
        ?>
    </div>
</header>