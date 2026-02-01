<?php
// get taxonomy topic
$terms = get_the_terms(get_the_ID(), 'topic');

foreach ($terms as $term) {
    // get permalink
    $topic_link = get_term_link($term, 'topic');
    $topic = '<a href="' . $topic_link . '">' . $term->name . '</a>';
    $topic_id =  $term->term_id;
}

$year = get_field('research_year', get_the_ID());
$month = get_field('research_month', get_the_ID());
$day = get_field('research_day', get_the_ID());
if ($year && $month && $day) {
    $date= date('d F Y', strtotime($year . '-' . $month . '-' . $day));
} else {
    $date_research = $year;
}

$cover_topic = get_field('cover_topic', 'topic_' . $topic_id);

?>
<article id="post-<?php the_ID();?>" <?php post_class('s-content s-content-card -research');?>>
    <div class="entry-pic entry-pic-card">
        <div class="posted-cat _h -button">
            <?php
                $primary_topic_id = get_field('primary_topic', get_the_ID());
                if($primary_topic_id){
                    $primary_topic = get_term( $primary_topic_id , 'topic' );
                    $primary_topic_link = get_term_link($primary_topic, 'topic');
                    echo '<a href="'.$primary_topic_link.'">' . $primary_topic->name . '</a>';
                }else{
                    echo $topic; 
                }   
            ?>
        </div>
        <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
            <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium_large');
                } else{
                    echo '<div class="entry-thumbnail">';
                    if($cover_topic){
                        echo '<img src="'.$cover_topic.'" />';
                    } 
                    echo '</div>';
                }
            ?>
        </a>
    </div>
    <div class="entry-info entry-info-card">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
        <?php if (get_field('research_authors', get_the_ID())): ?>
        <div class="authors">
            <div class="icon">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.4999 1.25C5.77959 1.25 4.37451 2.65391 4.37451 4.37422C4.37451 6.09453 5.77959 7.49961 7.4999 7.49961C9.22022 7.49961 10.6253 6.09453 10.6253 4.37422C10.6253 2.65391 9.22022 1.25 7.4999 1.25ZM3.90576 8.75C3.13467 8.75 2.49951 9.38516 2.49951 10.1563V10.5301C2.49951 11.45 3.08311 12.2738 3.97139 12.841C4.86084 13.407 6.07607 13.7492 7.4999 13.7492C8.92373 13.7492 10.139 13.407 11.0284 12.841C11.9167 12.2738 12.5003 11.45 12.5003 10.5301V10.1563C12.5003 9.38516 11.8651 8.75 11.094 8.75H3.90576Z"
                        fill="#6E6F7F" />
                </svg>
            </div>
            <span><?php echo get_field('research_authors', get_the_ID());?></span>
        </div>
        <?php endif;?>
        <div class="date">
            <div class="icon">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.4998 1.30078C3.62762 1.30078 1.2998 3.62859 1.2998 6.50078C1.2998 9.37297 3.62762 11.7008 6.4998 11.7008C9.37199 11.7008 11.6998 9.37297 11.6998 6.50078C11.6998 3.62859 9.37199 1.30078 6.4998 1.30078ZM6.93348 6.93445H3.4641C3.22645 6.93445 3.03348 6.74148 3.03348 6.50281V6.49773C3.03348 6.26008 3.22645 6.06711 3.4641 6.06711H6.06613V2.59875C6.06613 2.36008 6.2591 2.16711 6.49777 2.16711H6.50285C6.74051 2.16711 6.93348 2.36008 6.93348 2.59875V6.93445Z"
                        fill="#6E6F7F" />
                </svg>
            </div>
            <span><?php echo plant_date($s_date);  ?></span>
            
        </div>
        <div class="sgd-stat">
        <?php
            //show taxonomy SDG
            the_tax_sdg();
            echo do_shortcode('[s_stat]');
        ?>
        </div>

        <div class="action">
            <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 2.91406C6.48603 2.91406 2 7.49812 2 13.1326C2 18.767 6.48603 23.3511 12 23.3511C17.514 23.3511 22 18.767 22 13.1326C22 7.49812 17.514 2.91406 12 2.91406ZM12 4.44684C16.7033 4.44684 20.5 8.32649 20.5 13.1326C20.5 17.9386 16.7033 21.8183 12 21.8183C7.29669 21.8183 3.5 17.9386 3.5 13.1326C3.5 8.32649 7.29669 4.44684 12 4.44684ZM12.7422 9.29264C12.5929 9.29268 12.4471 9.33822 12.3233 9.42344C12.1995 9.50866 12.1034 9.62968 12.0473 9.77102C11.9912 9.91236 11.9776 10.0676 12.0083 10.2168C12.0391 10.3661 12.1127 10.5026 12.2197 10.6089L13.9395 12.3662H8.25C8.15062 12.3647 8.05194 12.3835 7.95972 12.4214C7.86749 12.4592 7.78355 12.5155 7.71277 12.5868C7.642 12.6581 7.58579 12.7431 7.54743 12.8368C7.50907 12.9304 7.48932 13.031 7.48932 13.1326C7.48932 13.2341 7.50907 13.3347 7.54743 13.4284C7.58579 13.5221 7.642 13.607 7.71277 13.6784C7.78355 13.7497 7.86749 13.8059 7.95972 13.8438C8.05194 13.8816 8.15062 13.9004 8.25 13.899H13.9395L12.2197 15.6563C12.1477 15.7269 12.0903 15.8115 12.0507 15.9051C12.0111 15.9987 11.9902 16.0994 11.9892 16.2013C11.9882 16.3033 12.0071 16.4044 12.0448 16.4988C12.0825 16.5932 12.1383 16.679 12.2088 16.7511C12.2794 16.8232 12.3633 16.8802 12.4557 16.9187C12.5481 16.9573 12.6471 16.9766 12.7468 16.9756C12.8466 16.9745 12.9452 16.9532 13.0368 16.9127C13.1284 16.8723 13.2112 16.8135 13.2803 16.74L16.2803 13.6744C16.4209 13.5307 16.4999 13.3358 16.4999 13.1326C16.4999 12.9293 16.4209 12.7344 16.2803 12.5907L13.2803 9.52516C13.2104 9.45159 13.1267 9.39311 13.0343 9.35317C12.9419 9.31323 12.8425 9.29265 12.7422 9.29264Z"
                    fill="#C5C5C7" />
            </svg>
        </div>
    </div>
</article>