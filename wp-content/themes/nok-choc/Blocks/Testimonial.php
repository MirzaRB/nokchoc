<?php /* block markup */ ?>


    <!-- testimonails -->
    <section id="testim" class="testim">
    <div class="parent">
        <div class="comma"><img src="./assets/images/Group 331.png" alt=""></div>
        <div class="container">
            <div id="owl-carousel-two" class="owl-carousel owl-theme">

                <?php
                $args = array(
                    'post_type' => 'testimonials', 
                    'posts_per_page' => -1,
                );

                $custom_posts = get_posts($args);

                foreach ($custom_posts as $post) :
                    $post_title = get_the_title($post);
                
                    $post_description = get_the_excerpt($post);
                   echo '<div class="item-testimonials">';
                   echo '<div class="clients">';
                   echo '<div class="comma">'; 
                   echo '<img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Group-331.png">';
                   echo '</div>';
                   $post_thumbnail_url = get_the_post_thumbnail_url($post, 'full');

                    if ($post_thumbnail_url) {
                    echo '<img class="feat-image" src="' . esc_url($post_thumbnail_url) . '" alt="' . esc_attr($post_title) . '">';
                    }
                    echo '<p class="paragraph">' . $post_description . '</p>';
                    echo '<h3>' . $post_title . '</h3>';
                    echo '<h4>Track & Feild Coach - G3 Performance</h4>';    
                    echo '</div>';
                    echo '</div>';
                endforeach;
            
                ?>

            </div>
        </div>
    </div>
</section>


