<?php
/**Template Name: newpage 
 **/
?>

<?php get_header(); ?>

<div class="vertual_banner">
    <div class="container">
        <?php
        $ref_link = $_GET['campain_code'];

        if (isset($_GET['campain_code'])) {

            $team_leader_data = get_users(
                array(
                    'meta_key' => 'ref_link',
                    'meta_value' => $ref_link,
                    'orderby' => 'registered', // Sort by registration date
                    'order' => 'ASC', // Ascending order (oldest first)
                    'number' => 1, // Limit the number of results to 1
                )
            );
            // print_r($team_leader_data);
            $team_leader_id = $team_leader_data[0]->data->ID;
            $display_name = $team_leader_data[0]->data->display_name;
            $start_date = get_field('start_date', 'user_' . $team_leader_id);
            $end_date = get_field('end_date', 'user_' . $team_leader_id);
            $fundraising_goal = get_field('fundraising_goal', 'user_' . $team_leader_id);
            $team_fundraising_goal = get_field('team_fundraising_goal', 'user_' . $team_leader_id);
            $team_name = get_field('team_name', 'user_' . $team_leader_id);
            // Convert dates to Unix timestamp
            $start_timestamp = strtotime(str_replace('/', '-', $start_date));
            $end_timestamp = strtotime(str_replace('/', '-', $end_date));
            // Calculate the difference in seconds
            $campaign_status_seconds = $end_timestamp - $start_timestamp;
            $campaign_status_days = $campaign_status_seconds / (60 * 60 * 24);

        }
        if (isset($team_leader_id)):
            ?>
            <div class="vertual_content">
                <h1>
                    <?php echo $display_name ?>
                    <span>VIRTUAL STORE</span>
                </h1>
                <span class="Wjd">
                    <?php echo $team_name ?>
                </span>
                <p>Thank you for visiting my virtual fundraising store! Please know that the proceeds from your NŌk Choc
                    purchase goes directly to serve the needs of underprivileged girls from all over the world! </p>
                <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Line-3.png" alt="">
                <div class="vertual_prices">
                    <div class="price_col_one">
                        <ul>
                            <li>$
                                <?php echo $fundraising_goal; ?> <span>sold of $
                                    <?php echo $fundraising_goal; ?> goal
                                </span>
                            </li>
                            <li><span>
                                    <?php echo $campaign_status_days; ?> days left
                                </span></li>
                        </ul>
                    </div>
                </div>
                <div class="vertual_btn">
                    <a href="#">Shop Now</a>
                    <a href="#">Share</a>
                </div>

            </div>

            <div class="vertual_img">
                <img src="<?php echo esc_url(get_avatar_url($team_leader_id)); ?>" />
            </div>
        <?php else: ?>
            <div class="vertual_content">
                <h1>maya's
                    <span>VIRTUAL STORE</span>
                </h1>
                <span class="Wjd">WWJD TRACK & FIELD</span>
                <p>Thank you for visiting my virtual fundraising store! Please know that the proceeds from your NŌk Choc
                    purchase goes directly to serve the needs of underprivileged girls from all over the world! </p>
                <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Line-3.png" alt="">
                <div class="vertual_prices">
                    <div class="price_col_one">
                        <ul>
                            <li>$0 <span>sold of $0 goal
                                </span>
                            </li>
                            <li><span>0 days left
                                </span></li>
                        </ul>
                    </div>
                </div>
                <div class="vertual_btn">
                    <a href="#">Shop Now</a>
                    <a href="#">Share</a>
                </div>

            </div>
            <div class="vertual_img">
                <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/khalilgeorge_A_smiling_melanated_woman_gets_ready_to_participat_07c57ea0-95ad-4ba4-becc-6a7150e6abd8-1.png"
                    alt="">
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="leader_section">
    <div class="container">
        <p>Maya recently moved into 3rd place on the leaderboard.</p>
        <a href="">View Leaderboard <img
                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/arrow-right.png" alt=""> </a>
    </div>
</div>

<div class="main_vertual_section">
    <div class="show_event">
        <div class="product_slider_event">
            <div class="container">
                <h2><span>SHOP NOW.</span> GIVING BACK NEVER TASTED THIS GOOD</h2>
                <div class="vertual_slider_one owl-carousel owl-theme">
                    <?php
                    // Get WooCommerce product data in a loop
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1 // Get all products
                    );

                    $products = new WP_Query($args);

                    if ($products->have_posts()):
                        while ($products->have_posts()):
                            $products->the_post();
                            global $product;
                            ?>
                            <div class="item">
                                <?php
                                // Product Thumbnail
                                if (has_post_thumbnail()) {
                                    echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($product->get_id(), 'thumbnail') . '</a>';
                                }
                                // Product Title
                                echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

                                // Product Price
                                echo '<span class="price">' . $product->get_price_html() . '</span>';
                                echo '<div class="product_button_flex">';
                                // Quantity Selector and Add to Cart Button
                                woocommerce_quantity_input(
                                    array(
                                        'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
                                        'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                        'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1
                                    ),
                                    $product
                                );
                                echo '<button data-product_id="' . $product->get_id() . '" data-quantity="1" class="button add_to_cart_button ajax_add_to_cart">Add to cart</button>';
                                echo '</div>';
                                ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else:
                        echo __('No products found');
                    endif;
                    ?>

                </div>
            </div>
        </div>

        <div class="event_leaderboard">
            <div class="container">

                <h4 class="h4_head">Event Leaderboard</h4>

                <?php

                $ref_link = $_GET['campain_code'];

                if ($ref_link) {
                    $team_leader_data = get_users(
                        array(
                            'meta_key' => 'ref_link',
                            'meta_value' => $ref_link,
                        )
                    );
                    foreach ($team_leader_data as $team_leader) {
                        $team_member_id = $team_leader->data->ID;
                        $leader_id = get_field('leader_id', 'user_' . $team_member_id);

                        if ($leader_id):
                            // Define the query arguments
                            $args = array(
                                'post_type' => 'campaign', // Your custom post type
                                'user_id' => $team_member_id,
                                'posts_per_page' => -1, // Retrieve all posts
                                'post_status' => 'publish',
                            );
                            // Instantiate the query
                            $the_query = get_posts($args);

                            // Check if there are posts
                            if ($the_query) {
                                // print_r($the_query);
                                // Start the loop
                                foreach ($the_query as $post) {

                                    setup_postdata($post);
                                    $post_id = $post->ID;

                                    $campaign_user_id = get_field('user_id', $post_id);
                                    $campaign_leader_id = get_field('leader_id', $post_id);
                                    $campaign_fundraising_goal = get_field('fundraising_goal', $post_id);

                                    if ($team_member_id == $campaign_user_id):
                                        ?>
                                        <div class="event_box">
                                            <div class="event_title">
                                                <?php if (get_avatar_url($team_member_id)): ?>
                                                    <img src="<?php echo esc_url(get_avatar_url($team_member_id)); ?>" />
                                                <?php else: ?>
                                                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Ellipse-36.png"
                                                        alt="">
                                                <?php endif; ?>
                                                <h3>
                                                    <?php
                                                    echo $team_leader->data->display_name;
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="event_prices">
                                                <h4>
                                                    
                                                    <?php
                                                    echo '$'.$campaign_fundraising_goal;
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    <?php endif;
                                }
                            }
                        endif; ?>
                        <?php
                    }

                } else {
                    ?>
                    <h3>No team Memner Found</h3>
                    <?php
                }

                ?>
                <h5>RECENT SUPPORTERS (31)</h5>

                <div class="event_box">
                    <div class="event_title">
                        <h3>1. Savanah Parker</h3>
                        <span>14 hours ago </span>
                    </div>
                    <div class="event_prices">
                        <h4>$701</h4>
                        <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Chocolate-Bar.png"
                            alt="">
                    </div>
                </div>

                <div class="event_box">
                    <div class="event_title">
                        <h3>1. Savanah Parker</h3>
                        <span>14 hours ago </span>
                    </div>
                    <div class="event_prices">
                        <h4>$701</h4>
                        <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Chocolate-Bar.png"
                            alt="">
                    </div>
                </div>

                <div class="event_box">
                    <div class="event_title">
                        <h3>1. Savanah Parker</h3>
                        <span>14 hours ago </span>
                    </div>
                    <div class="event_prices">
                        <h4>$701</h4>
                        <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Chocolate-Bar.png"
                            alt="">
                    </div>
                </div>


                <div class="event_box">
                    <div class="event_title">
                        <h3>1. Savanah Parker</h3>
                        <span>14 hours ago </span>
                    </div>
                    <div class="event_prices">
                        <h4>$701</h4>
                        <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Chocolate-Bar.png"
                            alt="">
                    </div>
                </div>


                <div class="event_box">
                    <div class="event_title">
                        <h3>1. Savanah Parker</h3>
                        <span>14 hours ago </span>
                    </div>
                    <div class="event_prices">
                        <h4>$701</h4>
                        <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Chocolate-Bar.png"
                            alt="">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="vertual_fund">
    <div class="container">

    <h2><span>SHOP NOW.</span> GIVING BACK NEVER TASTED THIS GOOD</h2>

    <div class=" vertual_slider_one_mobile owl-carousel owl-theme">
                    <?php
                    // Get WooCommerce product data in a loop
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1 // Get all products
                    );

                    $products = new WP_Query($args);

                    if ($products->have_posts()):
                        while ($products->have_posts()):
                            $products->the_post();
                            global $product;
                            ?>
                            <div class="item">
                                <?php
                                // Product Thumbnail
                                if (has_post_thumbnail()) {
                                    echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($product->get_id(), 'thumbnail') . '</a>';
                                }
                                // Product Title
                                echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

                                // Product Price
                                echo '<span class="price">' . $product->get_price_html() . '</span>';
                                echo '<div class="product_button_flex">';
                                // Quantity Selector and Add to Cart Button
                                woocommerce_quantity_input(
                                    array(
                                        'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
                                        'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                        'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : 1
                                    ),
                                    $product
                                );
                                echo '<button data-product_id="' . $product->get_id() . '" data-quantity="1" class="button add_to_cart_button ajax_add_to_cart">Add to cart</button>';
                                echo '</div>';
                                ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else:
                        echo __('No products found');
                    endif;
                    ?>

                </div>










        <div class="fund_box">
            <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Icons_Cocoa-with-a-Concience-2.png"
                alt="">
                <div class="detail_para">
            <p>Fundraise with your team, sell premium cocoa, and make a profit.
                No fundraising minimums or fees.</p>
                <p>
                Just want to contribute? Make a cocoa donation (50% benefits the organization) and we will provide the
                cocoa as a gift to a person in need.
            </p>
                </div>
            <a href="#">Start a Fundraiser </a>
            <a href="#" class="yellow_button"> Learn More </a>
        </div>
    </div>
</div>









<?php get_footer(); ?>