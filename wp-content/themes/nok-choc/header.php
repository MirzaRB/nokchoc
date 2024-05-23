<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nok_Choc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link
		href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&family=Montserrat:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">





	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e('Skip to content', 'nok-choc'); ?>
		</a>

		<div class="main_header">
			<header id="masthead" class="site-header">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()):
						?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php bloginfo('name'); ?>
							</a></h1>
						<?php
					else:
						?>
						<?php
					endif;
					$nok_choc_description = get_bloginfo('description', 'display');
					if ($nok_choc_description || is_customize_preview()):
						?>
						<p class="site-description">
							<?php echo $nok_choc_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped         ?>
						</p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class="fas fa-bars"></i>
					</button>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
						)
					);
					?>
				</nav>
				<div class="cart-icon">
					<a href="<?php echo wc_get_cart_url(); ?>">
						<img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Add-to-cart.png">
						<span class="cart-notification">
							<?php echo WC()->cart->get_cart_contents_count(); ?>
						</span>
					</a>
				</div>

				<script>
					// add_to_cart_button 
					jQuery(document).ready(function ($) {
						var addOne = 0;
						function updateCartCount() {
							$.ajax({
								url: '<?php echo admin_url('admin-ajax.php'); ?>',
								type: 'GET',
								data: { action: 'get_cart_count' },
								success: function (response) {
									$('.cart-notification').text(response + addOne);
								}
							});
						}
						$('.add_to_cart_button').click(function () {
							addOne = 1;
							updateCartCount();
						});

						// Call updateCartCount function initially to set the cart count
						updateCartCount();

						// Update cart count when the cart is modified (e.g., item added or removed)
						$(document.body).on('added_to_cart removed_from_cart', function () {
							updateCartCount();
						});
					});

				</script>
				<!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>