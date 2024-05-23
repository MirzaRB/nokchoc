<?php /* block markup */ ?>



    <!-- banner -->
    <section class="banner">
        <div class="flex">
            <div class="column">
                <h1 class="heading"><?php echo get_field('banner_title') ?></h1>
                <p class="paragraph"><?php echo get_field('banner-description'); ?></p>
                <?php 
                $bannerbutton = get_field('banner_button');
                if( $bannerbutton ): 
                $bannerbutton_url = $bannerbutton['url'];
                $bannerbutton_title = $bannerbutton['title'];
                $bannerbutton_target = $bannerbutton['target'] ? $bannerbutton['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url( $bannerbutton_url ); ?>" target="<?php echo esc_attr( $bannerbutton_target ); ?>"><?php echo esc_html( $bannerbutton_title ); ?></a>
                <?php endif; ?>

                <!-- <a class="button" href="">Get Started</a> -->
            </div>
            <div class="column-image">
                <?php 
                $image = get_field('banner_right_side_image');
                if(!empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </section>