<?php

/**
 * Template Name: Dashboard Page
 */

get_header();


if (!current_user_can('administrator')) {
    wp_redirect(home_url());
    exit;
}

if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
<div class="site-dashboard">
    <main id="main" class="site-main">
        <div class="page-content">
            <?php the_content(); ?>
            <?php
            // current url
            $current_url = home_url(add_query_arg(array(), $wp->request));

            if (is_page('dashboard') && !str_contains($current_url, 'entry')) : ?>
            <div class="s-sec dashboard overview">
                <h2>ภาพรวม</h2>
                <div class="s-grid -d5">
                    <div class="dashboard-card">
                        <h2>ผู้สมัครใหม่</h2>
                        <h4 class="summary-number">
                            <?php echo do_shortcode('[gravitymath scope="form" id="1" filter="filter_33=ผู้สมัครใหม่"] {อายุ (ปี):7:count} [/gravitymath]'); ?>
                        </h4>
                        <span>คน</span>
                    </div>
                    <div class="dashboard-card">
                        <h2>กำลังดำเนินการ</h2>
                        <h4 class="summary-number">
                            <?php echo do_shortcode('[gravitymath scope="form" id="1" filter="filter_33=กำลังดำเนินการ"] {อายุ (ปี):7:count} [/gravitymath]'); ?>
                        </h4>
                        <span>คน</span>
                    </div>
                    <div class="dashboard-card">
                        <h2>ชำระเงินเรียบร้อย</h2>
                        <h4 class="summary-number">
                            <?php echo do_shortcode('[gravitymath scope="form" id="1" filter="filter_33=ชำระเงิน"] {อายุ (ปี):7:count} [/gravitymath]'); ?>
                        </h4>
                        <span>คน</span>
                    </div>
                    <div class="dashboard-card">
                        <h2>การสมัครสมบูรณ์</h2>
                        <h4 class="summary-number">
                            <?php echo do_shortcode('[gravitymath scope="form" id="1" filter="filter_33=การสมัครสมบูรณ์"] {อายุ (ปี):7:count} [/gravitymath]'); ?>
                        </h4>
                        <span>คน</span>
                    </div>
                    <div class="dashboard-card">
                        <h2>รวม</h2>
                        <h4 class="summary-number">
                            <?php echo do_shortcode('[gravitymath scope="form" id="1"] {อายุ (ปี):7:count} [/gravitymath]'); ?>
                        </h4>
                        <span>คน</span>
                    </div>
                </div>
                <div class="s-grid -d2">
                    <div class="dashboard-card">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="reg-info">
                <div class="flex items-center justify-between">
                    <h2>ข้อมูลผู้สมัคร</h2>
                    <a href="/dashboard"> → Dashboard</a>
                </div>
                <div class="s-container">
                    <?php echo do_shortcode('[gravityview id="2712"]'); ?>
                </div>
            </div>
            <script>
            document.getElementsByName('gv_search')[0].placeholder = 'ค้นหาจากชื่อ';
            document.getElementById(" gv_search_button_2712").value = "ค้นหา";
            </script>

            <?php edit_post_link('EDIT', '', '', null, 'btn-edit'); ?>
        </div>
    </main>
</div>
<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>

<?php
    // get all form entries
    $entries = GFAPI::get_entries(1);
    // list school id
    $school_id = array();
    // group status field by school
    $faculties = array();
    $list_date = array();
    $data_date = array();
foreach ($entries as $entry) {
    // field school id = 2
    $school = rgar($entry, '2');
    // get school name by id
    $school_name = get_the_title($school);
    if (empty($school_name)) {
        continue;
    }
    // field status id = 33
    $status = rgar($entry, '33');
    // add school name to list
    $faculties_name[] = $school_name;
    // count status by school
    $faculties[$school_name][$status] = isset($faculties[$school_name][$status]) ? $faculties[$school_name][$status] + 1 : 1;

    // entry date
    $entry_date = rgar($entry, 'date_created');
    // js date format
    $entry_date = date('d F Y', strtotime($entry_date));
    // date string format
    $list_date[] = $entry_date ;
    $data_date[$entry_date][$status] = isset($data_date[$entry_date][$status]) ? $data_date[$entry_date][$status] + 1 : 1;
}
    // js log
    echo '<script>console.log(' . json_encode($data_date) . ')</script>';


    // group date by status
    $status = array('ผู้สมัครใหม่', 'กำลังดำเนินการ', 'ชำระเงินเรียบร้อย', 'การสมัครสมบูรณ์');
    $date_status = array();
foreach ($data_date as $value) {
    foreach ($status as $s) {
        // js log
      //  var_dump($value[$s]);
        if (isset($date_status[$s])) {
        } else {
            $date_status[$s] = 0;
        }
        // if ( isset( $data_date[$date][$s] ) ) {
        //     $date_status[$s] = $data_date[$date][$s];
        // } else {
        //     $date_status[$s] = 0;
        // }
    }
}


    $status = array('ผู้สมัครใหม่', 'กำลังดำเนินการ', 'ชำระเงินเรียบร้อย', 'การสมัครสมบูรณ์');
    $faculties_status = array();
foreach ($status as $s) {
    // loop school
    foreach ($faculties as $school => $status) {
        // check status
        if (isset($status[$s])) {
            $faculties_status[$s][] = $status[$s];
        } else {
            $faculties_status[$s][] = 0;
        }
    }
}
?>

<script>
const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($faculties_name); ?>,
        datasets: [{
                label: 'ผู้สมัครใหม่',
                data: <?php echo json_encode($faculties_status['ผู้สมัครใหม่']) ?>,
                backgroundColor: '#4CA960',
            },
            {
                label: 'กำลังดำเนินการ',
                data: <?php echo json_encode($faculties_status['กำลังดำเนินการ']) ?>,
                backgroundColor: '#F9A350',
            },
            {
                label: 'ชำระเงินเรียบร้อย',
                data: <?php echo json_encode($faculties_status['ชำระเงินเรียบร้อย']) ?>,
                backgroundColor: '#a51931'
            },
            {
                label: 'การสมัครสมบูรณ์',
                data: <?php echo json_encode($faculties_status['การสมัครสมบูรณ์']) ?>,
                backgroundColor: '#5A3F99'
            },
        ]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: (ctx) => 'สถานะการสมัครของแต่ละคณะ'
            },
            tooltip: {
                mode: 'index'
            },
        },
        indexAxis: 'y',
        scales: {
            x: {
                stacked: true,
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                },
            },
            y: {
                stacked: true,
            }
        }

    }
});
</script>