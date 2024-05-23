<?php /* block markup */ ?>

<div class="main_image_box">
    <div class="container">
        <div class="flex">
            <div class="side_image">
            <?php 
            $image_box = get_field('image_box');
            if( !empty( $image_box ) ): ?>
                <img src="<?php echo esc_url($image_box['url']); ?>" alt="<?php echo esc_attr($image_box['alt']); ?>" />
            <?php endif; ?>
            </div>
            <div class="side_text">
                <p class="paragraph"><?php echo get_field("Text_box");?></p>
            </div>
        </div>
    </div>
    <div class="section_image">
        <div class="left_image"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Vector-2.png" alt=""></div>
        <div class="right_image"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Vector-1.png" alt=""></div>
    </div>
</div>