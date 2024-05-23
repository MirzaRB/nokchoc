<?php
/**
 * Single variation cart button
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>


<div class="faq_section single_faq">
<?php if( have_rows('product_details') ): ?>
    <div class="content">
    <?php while( have_rows('product_details') ): the_row(); 
        ?>
        <div class="acc__card">
        <h4 class="acc__title"><?php the_sub_field('Product_title'); ?></h4>
        <p class="acc__panel"><?php the_sub_field('product__detail_description'); ?></p>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
</div>

<div class="product_inner_logo">
<?php 
$single_product_logo_image = get_field('single_product_logo_image');
if( !empty( $single_product_logo_image ) ): ?>
    <img src="<?php echo esc_url($single_product_logo_image['url']); ?>" alt="<?php echo esc_attr($single_product_logo_image['alt']); ?>" />
<?php endif; ?>
</div>

