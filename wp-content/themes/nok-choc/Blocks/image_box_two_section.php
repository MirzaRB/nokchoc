<?php /* block markup */ ?>


<div class="image_box_two_section">
    <div class="container">
        <div class="flex">
            <div class="side_text">
                <p class="paragraph"><?php echo get_field("text_area"); ?></p>

                <?php 
                $button_area = get_field('button_area');
                if( $button_area ): 
                    $button_area_url = $button_area['url'];
                    $button_area_title = $button_area['title'];
                    $button_area_target = $button_area['target'] ? $button_area['target'] : '_self';
                    ?>
                    <a class="button" href="<?php echo esc_url( $button_area_url ); ?>" target="<?php echo esc_attr( $button_area_target ); ?>"><?php echo esc_html( $button_area_title ); ?></a>
                <?php endif; ?>

            </div>

            <div class="side_image">
            <?php 
            $Image_box = get_field('Image_box');
            if( !empty( $Image_box ) ): ?>
                <img src="<?php echo esc_url($Image_box['url']); ?>" alt="<?php echo esc_attr($Image_box['alt']); ?>" />
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>