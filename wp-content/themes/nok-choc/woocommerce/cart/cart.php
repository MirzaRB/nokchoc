<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>
<div class="main_cart">
    <a class="back" href="#"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Arrow-7.png"
            alt=""> Back</a>
    <div class="main_cart_container">
        <h1 class="main_head">CART</h1>
        <p class="para_one">$5 from each bag sold benefits this fundraiser</p>
        <img class="line_image"
            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Line-3-Stroke.png">
        <!-- <p class="para_two"><span>$150</span>sold of $450 goal</p> -->

        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="main_chart">


                <?php do_action('woocommerce_before_cart_contents'); ?>

                <?php

                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                    /**
                     * Filter the product name.
                     *
                     * @since 2.1.0
                     * @param string $product_name Name of the product in the cart.
                     * @param array $cart_item The product in the cart.
                     * @param string $cart_item_key Key for the product in the cart.
                     */
                    $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <tr
                            class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">


                            <div class="prod_div">
                                <div class="product-thumbnail">
                                    <?php
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                    if (!$product_permalink) {
                                        echo $thumbnail; // PHPCS: XSS ok.
                                    } else {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                    }
                                    ?>
                                </div>

                                <div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                    <?php
                                    if (!$product_permalink) {
                                        echo wp_kses_post($product_name . '&nbsp;');
                                    } else {
                                        /**
                                         * This filter is documented above.
                                         *
                                         * @since 2.1.0
                                         */
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                    }

                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                    // Meta data.
                                    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
                            
                                    // Backorder notification.
                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                    }
                                    ?>
                                    <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove</a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            /* translators: %s is the product name */
                                            esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </div>

                                <div class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            
                                    // echo add_filter('woocommerce_cart_item_subtotal', 'custom_cart_item_subtotal', 10, 3);
                                    // function custom_cart_item_subtotal($subtotal, $cart_item, $cart_item_key) {
                            
                                    $min_quantity = 0;
                                    $max_quantity = $_product->get_max_purchase_quantity();

                                    if ($_product->is_sold_individually()) {
                                        $min_quantity = 1;
                                        $max_quantity = 1;
                                    }

                                    $product_quantity = woocommerce_quantity_input(
                                        array(
                                            'input_name' => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value' => $max_quantity,
                                            'min_value' => $min_quantity,
                                            'product_name' => $product_name,
                                            'classes' => 'plus-minus-input', // Add a custom class for styling
                                        ),
                                        $_product,
                                        false
                                    );

                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.

                                    ?>
                                </div>
                            </div>
                            <?php
                    }
                }
                ?>

                    <?php do_action('woocommerce_after_cart_contents'); ?>

            </div>
            <div class="minimum">
                <p>All orders have a 2 bag minimum</p>
            </div>
            <?php

            $args = array(
                'post_type' => 'product', // Adjust post type if necessary
                'posts_per_page' => -1, // Retrieve all posts
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    // Check if the ACF field 'cart_featured' is checked
                    $is_featured = get_field('cart_featured');

                    if ($is_featured) {
                        // Start product container
                        echo '<div class="product-container">';
                        echo '<div class="product-flex">';

                        // Display featured image
                        echo '<div class="product-image">';
                        the_post_thumbnail();
                        echo '</div>';
                        echo '<div class="second">';
                        // Display title
                        echo '<h2 class="product-title">';
                        the_title();
                        echo '</h2>';

                        // Display description
                        $short_description = get_the_excerpt();
                        echo '<div class="product-description">' . $short_description . '</div>';
                        echo '</div>';

                        // Display price (use the default WordPress price field)
                        $price = get_post_meta(get_the_ID(), '_price', true);
                        echo '<div class="product-price">$' . $price . '</div>';
                        echo '</div>';

                        // Display "Add to Cart" button with the correct URL
                        $add_to_cart_url = get_permalink(); // Assuming the product permalink is the "Add to Cart" URL
                        echo '<a href="' . esc_url($add_to_cart_url) . '" class="add-to-cart">Add to Cart</a>';

                        // End product container
                        echo '</div>';
                    }
                }

                wp_reset_postdata(); // Reset post data
            } else {
                echo 'No featured products found';
            }





            do_action('woocommerce_after_cart_table');
            echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="button alt custom-checkout-button">Checkout</a>';
            ?>
            <div class="cart_bottom_img">
                <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/image-31.png" alt="">
                <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/google-pay-1.png" alt="">
            </div>
        </form>






    </div>
</div>
<?php do_action('woocommerce_before_cart_collaterals'); ?>



<?php do_action('woocommerce_after_cart'); ?>