<?php /* block markup */ ?>



    <!-- every cup -->
    <section class="every-cup-slides">
        <div class="flex">
            <div class="every-cup-content">
                <h2 class="sub-heading"><?php echo get_field('every_title')?></h2>
                <p class="paragraph"><?php echo get_field('every_description')?></p>
            </div>

<div class="every-cupslides">
    <?php
    // Set up a custom query to get products with the category 'bags'
    $args = array(
        'post_type'      => 'product', // adjust post type if needed
        'posts_per_page' => -1, // adjust the number of products to display
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'premium-hot-cocoa', // specify the category slug
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div id="owl-carousel-three" class="owl-carousel owl-theme">
            <?php while ($query->have_posts()) : $query->the_post();

                // Get product information
                $product_image = get_post_thumbnail_id();
                $product_title = get_the_title();
                $product_permalink = get_permalink();
                ?>

                <div class="item">
                    <a href="<?php echo esc_url($product_permalink); ?>" class="slides-store">
                        <?php if (!empty($product_image)) : ?>
                            <?php echo wp_get_attachment_image($product_image, 'full'); ?>
                        <?php endif; ?>
                        <h5><?php echo esc_html($product_title); ?></h5>
                        <!-- You can add more fields like product description if needed -->
                        <!-- <p><?php //echo get_the_excerpt(); ?></p> -->
                    </a>
                </div>

            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); // Reset the query to the original state ?>
    <?php endif; ?>

</div>






            <!-- <div class="every-cupslides">
                <div id="owl-carousel-three" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="slides-store">
                            <img src="./assets/images/CNC Transparent 1.png" alt="">
                            <h5>COOKIES ‘N’ CREAM</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slides-store">
                            <img src="./assets/images/DMC Transparent 1.png" alt="">
                            <h5>COOKIES ‘N’ CREAM</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slides-store">
                            <img src="./assets/images/CNC Transparent 1.png" alt="">
                            <h5>COOKIES ‘N’ CREAM</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>