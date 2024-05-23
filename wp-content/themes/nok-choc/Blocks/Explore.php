<?php /* block markup */ ?>

    <!-- explore a virtual -->
    <section class="explore-virtual">
        <div class="flex">
            <div class="explore-section-content">
                <h2 class="sub-heading"><?php echo get_field('explore_title')?></h2>
                <p class="paragraph"><?php echo get_field('explore_description')?></p>
                <?php 
                $explorebutton = get_field('explore_button');
                if( $explorebutton ): 
                $explorebutton_url = $explorebutton['url'];
                $explorebutton_title = $explorebutton['title'];
                $explorebutton_target = $explorebutton['target'] ? $link['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url( $explorebutton_url ); ?>" target="<?php echo esc_attr( $explorebutton_target ); ?>"><?php echo esc_html( $explorebutton_title ); ?></a>
                <?php endif; ?>
                <!-- <a class="button" href="">Explore A Virtual Store</a> -->
            </div>
            <div class="explore-section-image">
                <?php 
                $rightsideimage1 = get_field('right_side_image');
                if( !empty( $rightsideimage1 ) ): ?>
                    <img src="<?php echo esc_url($rightsideimage1['url']); ?>" alt="<?php echo esc_attr($rightsideimage1['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
        <div class="vector-three">
            <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Vector-7.png" alt="">
        </div>
    </section>