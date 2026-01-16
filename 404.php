<?php get_header(); ?>
<style>
.content {
    min-height: 526px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-style: normal;
}

.content h5 {
    font-weight: 700;
    font-size: 16px;
    line-height: 160%;
    color: #A51D32;
}

.content h2 {
    font-weight: 600;
    font-size: 30px;
    line-height: 160%;
    color: #2E2A4A;
}

.content p {
    font-weight: 400;
    font-size: 18px;
    line-height: 160%;
    color: #2E2A4A;
}

.content a {
    font-weight: 700;
    font-size: 18px;
    line-height: 160%;
    color: #A51D32;
}

#search-input {
    width: 385px;
    height: 40px;
    background: #FFFFFF;
    border: 1px solid #C5C5C7;
}

.content button {
    width: 135px;
    height: 38px;
    background: #A51931;
    color: #fff;
    border: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.content form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
}
</style>
<main id="main" class="">
    <div class="s-container">
        <div class="content _h">

            <h5>error 404</h5>
            <h2>ไม่พบหน้าที่ระบุ - error 404</h2>
            <p>หน้าที่คุณกำลังมองหาไม่มีอยู่แล้ว คุณสามารถกลับไปที่ <a href="/">หน้าแรก</a> <br>
                และดูว่าคุณสามารถหาสิ่งที่คุณกำลังมองหาได้หรือไม่ หรือคุณอาจลองค้นหาโดยใช้แบบฟอร์มค้นหาด้านล่าง</p>

            

            <form action="/" method="get">
                <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
                <button type="submit">Search<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 0C4.48603 0 0 4.48604 0 10C0 15.514 4.48603 20 10 20C15.514 20 20 15.514 20 10C20 4.48604 15.514 0 10 0ZM10 1.5C14.7033 1.5 18.5 5.2967 18.5 10C18.5 14.7033 14.7033 18.5 10 18.5C5.29669 18.5 1.5 14.7033 1.5 10C1.5 5.2967 5.29669 1.5 10 1.5ZM10.7422 6.24219C10.5929 6.24222 10.4471 6.28679 10.3233 6.37019C10.1995 6.45358 10.1034 6.57202 10.0473 6.71033C9.99119 6.84865 9.97763 7.00056 10.0083 7.14662C10.0391 7.29269 10.1127 7.42627 10.2197 7.53027L11.9395 9.25H6.25C6.15062 9.24859 6.05194 9.26695 5.95972 9.30402C5.86749 9.34107 5.78355 9.3961 5.71277 9.46588C5.642 9.53566 5.58579 9.61882 5.54743 9.71051C5.50907 9.8022 5.48932 9.90061 5.48932 10C5.48932 10.0994 5.50907 10.1978 5.54743 10.2895C5.58579 10.3812 5.642 10.4643 5.71277 10.5341C5.78355 10.6039 5.86749 10.6589 5.95972 10.696C6.05194 10.733 6.15062 10.7514 6.25 10.75H11.9395L10.2197 12.4697C10.1477 12.5388 10.0903 12.6216 10.0507 12.7132C10.0111 12.8048 9.99019 12.9034 9.98918 13.0032C9.98816 13.1029 10.0071 13.2019 10.0448 13.2943C10.0825 13.3867 10.1383 13.4706 10.2088 13.5412C10.2794 13.6117 10.3633 13.6675 10.4557 13.7052C10.5481 13.7429 10.6471 13.7618 10.7468 13.7608C10.8466 13.7598 10.9452 13.7389 11.0368 13.6993C11.1284 13.6597 11.2112 13.6023 11.2803 13.5303L14.2803 10.5303C14.4209 10.3896 14.4999 10.1989 14.4999 10C14.4999 9.80112 14.4209 9.61038 14.2803 9.46973L11.2803 6.46973C11.2104 6.39773 11.1267 6.3405 11.0343 6.30142C10.9419 6.26233 10.8425 6.24219 10.7422 6.24219Z"
                            fill="white"></path>
                    </svg>
                </button>
            </form>





        </div>

    </div>

</main>


<script>

</script>
<?php get_footer(); ?>