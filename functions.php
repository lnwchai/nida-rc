<?php

// ENQUEUE CSS_JS
function fruit_scripts()
{
    wp_dequeue_style('wp-block-library');

    $ver = wp_get_theme()->get('Version');
    $url = get_stylesheet_directory_uri() . '/assets/';
    wp_enqueue_style('f-m', $url . 'css/style-m.css', [], $ver);
    wp_enqueue_style('f-d', $url . 'css/style-d.css', [], $ver, '(min-width: 1024px)');
    //wp_enqueue_style('school', $url . 'css/school.css', [], $ver);
    wp_enqueue_script('f', $url . 'js/main.js', [], $ver, true);
	

    // check if is page template dashboard
    if (is_page_template('templates/dashboard.php')) {
        wp_enqueue_script('chartjs', $url . 'js/chart.umd.min.js', [], $ver, true);
    }
    if (is_single() && 'admission' == get_post_type()) {
        wp_enqueue_style('embla', get_template_directory_uri() . '/assets/css/ext-embla.css', [], $ver);
        wp_enqueue_script('embla', get_template_directory_uri() . '/assets/js/extension/embla.min.js', [], $ver, true);
    }

}
add_action('wp_enqueue_scripts', 'fruit_scripts', 20);


// ADMIN CSS
function nida_admin_css($hook)
{
    $ver = wp_get_theme()->get('Version');
    $url = get_stylesheet_directory_uri() . '/assets/';
    wp_enqueue_style('n-admin', $url . 'css/wp-admin.css', [], $ver);
}
add_action('admin_enqueue_scripts', 'nida_admin_css');

// THEME SUPPORT
if (! function_exists('plant_support')) :
    function plant_support()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        add_theme_support('align-wide');
        add_theme_support('title-tag');
        add_theme_support('editor-color-palette', plant_colors());
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('editor-styles');
        add_editor_style('assets/css/wp-editor.css');


        register_nav_menus(
            [
            'primary' => esc_html__('Primary Menu', 'plant'),
            'dashboard' => esc_html__('Dashboard Menu', 'plant')
            ]
        );

        if (! get_theme_mod('show_admin_bar', false)) {
            add_filter('show_admin_bar', '__return_false');
        }
        $GLOBALS['content_width'] = 750;
    }
endif;
add_action('after_setup_theme', 'plant_support');

// HEADER
function plant_title()
{
    if (get_theme_mod('hide_title', false)) {
        return;
    }
    if (is_front_page()) {
        $tag = 'h1';
    } else {
        $tag = 'p';
    }
    $title  = '<' .  $tag . ' class="site-title">';
    $title .= '<a href="' . esc_url(home_url()) . '" rel="home">';
    $title .= get_bloginfo('name') . '<small>' . get_bloginfo('description') . '</small>';
    $title .= '</a></' . $tag . '>';
    return $title;
}

// PAGE TITLE
function plant_page_title()
{
    $style = get_field('title_style');
    if ($style == 'hidden') {
        return;
    }
    if (is_front_page()) {
        return;
    } else {
        $id = get_the_ID();
        $h1 = '<h1>';
        if (get_theme_mod('set_page')) {
            if (get_theme_mod('page_title_align')) {
                $h1 =  '<h1 class="text-' . get_theme_mod('page_title_align') . '">';
            }
        }
        $head = $h1 . get_the_title() . '</h1>';
        $img = '';
        if (get_field('banner', $id)) {
            $img = wp_get_attachment_image(get_field('banner', $id), 'full');
            $head =  $img . $head;
        }
        return '<header class="page-header">' . $head . '</header>';
    }
}

// EVENTS
function event_list($atts)
{
    $atts = shortcode_atts(
        array(
            'post_per_page' => '-1',
        ),
        $atts,
        'event_list'
    );
    $per_page = sanitize_text_field($atts['post_per_page']);
    $output = '';
    $today = date('Ymd');
    if($per_page == -1) {
        $args = [
            'post_type' => 'event',
            'posts_per_page' => 5,
            'meta_key' => 'end_date',
            'orderby' => 'meta_value',
            'order'     => 'ASC',
            ];
    } else {
        $args = [
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_key' => 'end_date',
            'orderby' => 'meta_value',
            'order'     => 'ASC',
            'meta_query' => [
                [
                    'key'     => 'end_date',
                    'compare' => '>=',
                    'value'   => $today,
                ]
            ],
            ];
    }
    $q = new WP_Query($args);
    if ($q->have_posts()) {
        $output .= '<div class="s-events">';
        while ($q->have_posts()) {
            $q->the_post();
            $output .= '<a href="' . get_the_permalink() . '">';

            //$start_datetime = DateTime::createFromFormat('Ymd', get_field('start_date'));
            //$start_date  = $start_datetime->format('j');
            //$start_month = $start_datetime->format('M');

            $start_datetime = get_field('start_date');
            $start_date = date("j", strtotime($start_datetime));
            $start_month = date("M", strtotime($start_datetime));

            //$end_datetime = DateTime::createFromFormat('Ymd', get_field('end_date'));
            //$end_date  = $end_datetime->format('j');
            //$end_month = $end_datetime->format('M');

            $end_datetime = get_field('end_date');
            $end_date = date("j", strtotime($end_datetime));
            $end_month = date("M", strtotime($end_datetime));

            if (get_field('start_date') == get_field('end_date')) {
                $date  = $start_date;
                $month = $start_month;
            } else {
                $date  = '<small>' . $start_date . '-' . $end_date . '</small>';
                $month = $end_month;
            }

            $output .= '<span class="date">';
            $output .= '<strong>' . $date  . '</strong>';
            $output .= '<small>' .  $month . '</small>';
            $output .= '</span>';
            $address = get_field('place_name');
            $output .= '<h3>' . get_the_title() . '<small>' . $address . '</small></h3>';
            $output .= '<svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 17L7 9L0.999999 1" stroke="#C5C5C7" stroke-width="2"/></svg>';
            $output .= '</a>';
        }
        $output .= '</div>';
        wp_reset_postdata();
    }
    return $output;
}
// SHORTCODE
add_shortcode('n_events', 'event_list');


// facetwp hide count
add_filter('facetwp_facet_dropdown_show_counts', '__return_false');

function search_research()
{
    $args = array(
        'post_type' => 'research',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => 'research_year',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);
    $years = array();
    while ($query->have_posts()) {
        $query->the_post();
        $year = get_field('research_year');
        if (!in_array($year, $years) && $year != '') {
            array_push($years, $year);
        }
    }
    wp_reset_postdata();

    $topics = get_terms( array( 
        'taxonomy' => 'topic',
        'parent'   => 0
    ) );
    $cats = get_terms( array( 
        'taxonomy' => 'research_tax',
        'parent'   => 0
    ) );

    ob_start();
    echo '<form action="/research-list" method="get"class="research-filter">';
    echo '<input type="text" class="facetwp-search" name="_search" placeholder="Name, Title, Author" />';
    echo '<div class="filter-topic">';
    echo '<select name="_topic">';
    echo '<option value="">Topic</option>';
    foreach( $topics as $topic ) {
        echo '<option value="' . $topic->slug . '">' .  $topic->name . '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '<div class="filter-cat">';
    echo '<select name="_category_research">';
    echo '<option value="">Category</option>';
    foreach( $cats as $cat ) {
        echo '<option value="' . $cat->slug . '">' .  $cat->name . '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '<div class="filter-year">';
    echo '<select name="_research_year">';
    echo '<option value="">Year</option>';
    foreach ($years as $year) {
        echo '<option value="' . $year . '">' . $year . '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '<button class="btn">Search</button>';
    echo '</form>';
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('search_research', 'search_research');

add_shortcode('s_keyword_tag', 's_keyword_tag');
function s_keyword_tag()
{
    $html = '';
    // get list a taxonomy keywords
    $terms = get_terms(array(
        'taxonomy' => 'keyword',
        'hide_empty' => false,
        'number' => 5,
    ));

    // list link to taxonomy keywords
    foreach ($terms as $term) {
        $html .= '<a href="' . get_term_link($term) . '" class="research-keyword-tag">' . $term->name . '</a>';
    }
    return $html;
}


// Make slug as ID Number for custom post types
function change_slug($post_id)
{
    $cpt = ['docs', 'event', 'research', 'teams'];
    if (!in_array($_POST['post_type'], $cpt)) {
        return;
    }

    // `wp_update_post` calls `wp_insert_post`. Prevent infinite recursions!
    $post = get_post($post_id);
    if ($post->post_name == $post_id) {
        return;
    }

    wp_update_post(array(
        'ID' => $post_id,
        'post_name' => $post_id // slug
    ));
}
add_action('wp_insert_post', 'change_slug');


function acf_field_object($field_name){
    $field_object = get_field_object($field_name);
    $field_value = get_field($field_name);
    $field_label = $field_object['choices'][ $field_value ];
    return $field_label;
}

//tax sdg
function the_tax_sdg(){
    // get list a taxonomy SDG this post
    $sdg_terms = get_the_terms(get_the_ID(), 'sdg');
    // taxonomy SDG list
    if ($sdg_terms && ! is_wp_error($sdg_terms)) {
        $sdg_list = '';
        foreach ($sdg_terms as $sdg) {
            $sdg_list .= '<a class="'. $sdg->slug .'" href="' . get_term_link($sdg->slug, 'sdg') . '">' . $sdg->name . '</a>';
        }
        echo '<div class="single_tags _h sdg">' . $sdg_list . '</div>';
    }
}


function add_current_year_to_acf_year($post_id) {

    $posttype = get_post_type($post_id);

    if ('research' == $posttype) {

        $post_year = get_the_date( 'Y' );

        update_field('research_year', $post_year, $post_id);

    }

}
 
#Hide notification admin bar

function hide_all_admin_notices() {
    global $wp_filter;

    // Check if the WP_Admin_Bar exists, as it's not available on all admin pages.
    if (isset($wp_filter['admin_notices'])) {
        // Remove all actions hooked to the 'admin_notices' hook.
        unset($wp_filter['admin_notices']);
    }
}

add_action('admin_init', 'hide_all_admin_notices');

#Remove Lanaguage Swither
add_filter( 'login_display_language_dropdown', '__return_false' );

/*
# cookie consent
function add_cookie_banner() {
    ?>
    <div id="cookie-banner" style="position: fixed; bottom: 0; width: 100%; background-color: #333; color: #fff; text-align: center; padding: 10px; z-index: 1000;">
        เว็บไซต์นี้ใช้ cookies เพื่อปรับปรุงประสบการณ์ของคุณ <a href="/privacy-policy" style="color: #fff; text-decoration: underline;">อ่านเพิ่มเติม</a>.
        <button id="accept-cookies" style="background-color: #444; color: #fff; border: none; padding: 5px 10px; margin-left: 10px; cursor: pointer;">ยอมรับ</button>
    </div>
    <script>
    document.getElementById('accept-cookies').addEventListener('click', function() {
        document.getElementById('cookie-banner').style.display = 'none';
        document.cookie = "cookies_accepted=true; path=/; max-age=" + (60*60*24*365);
    });
    if (document.cookie.indexOf('cookies_accepted=true') !== -1) {
        document.getElementById('cookie-banner').style.display = 'none';
    }
    </script>
    <?php
}
add_action('wp_footer', 'add_cookie_banner');

*/

define('PLANT_DISABLE_ACF', true); 
