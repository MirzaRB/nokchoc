<?php /* block markup */ ?>

<!-- banner -->
<!-- <p>Click on this paragraph.</p> -->
<!-- <a type="button" class="redirect-link">redirect-link</a> -->
<!-- <button class="redirect-link">redirect-link</button>
<div class="alert" style="display: none">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div> -->

<section class="banner">
    <div class="flex">
        <div class="column">
            <h1 class="heading tt">
                <?php echo get_field('banner_title') ?>
            </h1>
            <p class="paragraph">
                <?php echo get_field('banner-description'); ?>
            </p>
            <?php
            $bannerbutton = get_field('banner_button');
            if ($bannerbutton):
                $bannerbutton_url = $bannerbutton['url'];
                $bannerbutton_title = $bannerbutton['title'];
                $bannerbutton_target = $bannerbutton['target'] ? $bannerbutton['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url($bannerbutton_url); ?>"
                    target="<?php echo esc_attr($bannerbutton_target); ?>">
                    <?php echo esc_html($bannerbutton_title); ?>
                </a>
            <?php endif; ?>

            <!-- <a class="button" href="">Get Started</a> -->
        </div>
        <div class="column-image">
            <?php
            $image = get_field('banner_right_side_image');
            if (!empty($image)): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            <!-- <img src="./assets/images/Group 1026.png" alt=""> -->
        </div>
    </div>
</section>

<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

<script src="">
    document.addEventListener('DOMContentLoaded', function () {

        var redirectLink = document.querySelector('.redirect-link');
        var closeBtn = document.querySelector('.close-notification');
        // var showBtn = document.querySelector('.show-notification');

        // redirectLink.addEventListener('click', function (event) {
        //     event.preventDefault();
        //     window.location.href = 'https://example.com'; // Replace with your desired URL
        // });

        closeBtn.addEventListener('click', function () {
            console.log('closeBtn');
            var notificationBar = document.querySelector('.notification-bar');
            notificationBar.style.display = 'none'; // Hide the notification bar when the close button is clicked
        });
    });


    // $(".redirect-link").on('click', function () {
    //     console.log('redirectLink');
    //     jQuery('.alert').show();
    // });
    // $(document).ready(function () {
    //     $("p").click(function () {
    //         alert("The paragraph was clicked.");
    //     });
    // });
</script>