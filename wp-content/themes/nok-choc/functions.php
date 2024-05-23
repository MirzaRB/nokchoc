<?php

/**
 * nok Choc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nok_Choc
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nok_choc_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on nok Choc, use a find and replace
     * to change 'nok-choc' to the name of your theme in all the template files.
     */
    load_theme_textdomain('nok-choc', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'nok-choc'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'nok_choc_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'nok_choc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nok_choc_content_width()
{
    $GLOBALS['content_width'] = apply_filters('nok_choc_content_width', 640);
}
add_action('after_setup_theme', 'nok_choc_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nok_choc_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'nok-choc'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'nok-choc'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'nok_choc_widgets_init');




if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'other_menu' => __( 'Other Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}




/**
 * Enqueue scripts and styles.
 */
function nok_choc_scripts()
{
    wp_enqueue_style('nok-choc-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('nok-choc-style', 'rtl', 'replace');

    wp_enqueue_script('nok-choc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nok_choc_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}



register_sidebar(
    array(
        'name' => __('Footer Logo Section', 'twentyten'),
        'id' => 'footer_logo_section',
        'description' => __('The banner content widget area', 'twentyten'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => __('Colume2', 'twentyten'),
        'id' => 'Colume2',
        'description' => __('The banner content widget area', 'twentyten'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => __('Colume3', 'twentyten'),
        'id' => 'Colume3',
        'description' => __('The banner content widget area', 'twentyten'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => __('Colume5', 'twentyten'),
        'id' => 'Colume5',
        'description' => __('The banner content widget area', 'twentyten'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);



//function to add nav menu in Navigation Bar and Footer Bar:

function add_nav_menus()
{
    register_nav_menus(
        array(
            'footer_menu' => 'Footer Bar',
        )
    );
}
add_action('init', 'add_nav_menus');

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}


/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts()
{
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', array(), time(), false);
}
add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

// ACF Gutenberg blocks
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register a testimonial block.
        acf_register_block_type(
            array(
                'name' => 'Banner_section',
                'title' => __('Banner_section'),
                'description' => __('A custom Banner block.'),
                'render_template' => 'Blocks/Banner.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Fundraising_section',
                'title' => __('Fundraising_section'),
                'description' => __('A custom Fundraising made easy block.'),
                'render_template' => 'Blocks/Section.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'How_It_work',
                'title' => __('How_It_work'),
                'description' => __('A custom How_It_work made easy block.'),
                'render_template' => 'Blocks/How_its_work.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'EXPLORE_A_VIRTUAL_STORE',
                'title' => __('EXPLORE_A_VIRTUAL_STORE'),
                'description' => __('A custom EXPLORE_A_VIRTUAL_STORE made easy block.'),
                'render_template' => 'Blocks/Explore.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Support_A_Live_Store',
                'title' => __('Support_A_Live_Store'),
                'description' => __('A custom Support_A_Live_Store made easy block.'),
                'render_template' => 'Blocks/Support.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'EVERY_CUP_IS_A_CELEBRATION!',
                'title' => __('EVERY_CUP_IS_A_CELEBRATION'),
                'description' => __('A custom EVERY_CUP_IS_A_CELEBRATION made easy block.'),
                'render_template' => 'Blocks/Every_section.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Testimonial!',
                'title' => __('Testimonial'),
                'description' => __('A custom Testimonial made easy block.'),
                'render_template' => 'Blocks/Testimonial.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Schedule',
                'title' => __('Schedule'),
                'description' => __('A custom Schedule made easy block.'),
                'render_template' => 'Blocks/schedule.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Shop_Review',
                'title' => __('Shop_Review'),
                'description' => __('A custom Shop_Review made easy block.'),
                'render_template' => 'Blocks/Shop_Review.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Banner_two',
                'title' => __('Banner_two'),
                'description' => __('A custom Banner_two made easy block.'),
                'render_template' => 'Blocks/banner_two.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Image_box',
                'title' => __('Image_box'),
                'description' => __('A custom image_box made easy block.'),
                'render_template' => 'Blocks/image_text_section.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'Image_box_two',
                'title' => __('Image_box_two'),
                'description' => __('A custom Image_box_two made easy block.'),
                'render_template' => 'Blocks/image_box_two_section.php',
                'category' => 'formatting',
            )
        );

        acf_register_block_type(
            array(
                'name' => 'FAQ',
                'title' => __('FAQ'),
                'description' => __('A custom FAQ made easy block.'),
                'render_template' => 'Blocks/faq.php',
                'category' => 'formatting',
            )
        );
    }
}


// Add product descriptions to the Shop page
function ts_display_product_description_on_shop_page()
{
    global $product;

    // Check if we are on the Shop page
    if (is_shop()) {
        // Retrieve and display the product description
        $product_description = $product->get_description();
        if (!empty($product_description)) {
            echo '<div class="product-description">' . $product_description . '</div>';
        }
    }
}
add_action('woocommerce_after_shop_loop_item_title', 'ts_display_product_description_on_shop_page');

add_shortcode('sale_products_test', 'sale_products');

function sale_products()
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'meta_query' => array(
            array(
                'key' => '_sale_price',
                'value' => 0,
                'compare' => '>',
                'type' => 'NUMERIC',
            ),
        ),
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );

    $products = wc_get_products($args);

    echo '<div class="main_p">';

    if ($products) {
        foreach ($products as $product) {
            echo '<div class="product">';

            // 1. Featured Image
            echo '<div class="product-image">';
            echo $product->get_image();
            echo '</div>';

            // 2. Category
            $categories = get_the_terms($product->get_id(), 'product_cat');
            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo '<span class="product-category">' . esc_html($category->name) . '</span>';
                }
            }

            echo '<div class="inner-flex">';

            // 3. Title
            echo '<h2 class="product-title">' . $product->get_name() . '</h2>';

            // 4. Price
            echo '<span class="product-price">' . wc_price($product->get_price()) . '</span>';

            echo '</div>';

            echo '<div class="product-description">' . $product->get_short_description() . '</div>';

            // 5. Add to Cart
            //  apply_filters('woocommerce_loop_add_to_cart_link', sprintf(
            //     '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product-add-to-cart">%s</a>',
            //     esc_url($product->add_to_cart_url()),
            //     esc_attr($product->get_id()),
            //     esc_attr($product->get_sku()),
            //     $product->is_purchasable() ? 'add_to_cart_button' : '',
            //     esc_html($product->add_to_cart_text())
            // ), $product);

            // 6. Product Permalink
            echo '<a class="product-permalink" href="' . esc_url(get_permalink($product->get_id())) . '">Add To Cart</a>';

            echo '</div>'; // .product
        }
        echo "</div>";
    } else {
        echo __('No products found');
    }
}

// product Category Function 
// Function to display products from a specific category
function display_products_by_category_shortcode($atts)
{
    // Shortcode attributes
    $atts = shortcode_atts(
        array(
            'category' => '', // Default category slug
        ),
        $atts,
        'products_by_category'
    );

    // Query parameters
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $atts['category'],
            ),
        ),
    );

    // Query the products
    $products_query = new WP_Query($args);

    // Output the products
    if ($products_query->have_posts()) {
        $output = '<ul class="category_flex">';
        while ($products_query->have_posts()) {
            $products_query->the_post();
            $product = wc_get_product(get_the_ID());

            $output .= '<div class="product">';
            $output .= '<div class="product_flex">';
            // 1. Featured Image
            $output .= '<div class="product-image">';
            $output .= $product->get_image();
            $output .= '</div>';
            // 2. Category
            $categories = get_the_terms($product->get_id(), 'product_cat');
            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $output .= '<span class="product-category">' . esc_html($category->name) . '</span>';
                }
            }

            $output .= '<div class="inner-flex">';
            $output .= '<h2 class="product-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';

            // 4. Price
            $output .= '<span class="product-price">' . wc_price($product->get_price()) . '</span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div class="product-description">' . $product->get_short_description() . '</div>';

            //  // 5. Add to Cart
            //  $output .= apply_filters('woocommerce_loop_add_to_cart_link', sprintf(
            // 	 '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product-add-to-cart">%s</a>',
            // 	 esc_url($product->add_to_cart_url()),
            // 	 esc_attr($product->get_id()),
            // 	 esc_attr($product->get_sku()),
            // 	 $product->is_purchasable() ? 'add_to_cart_button' : '',
            // 	 esc_html($product->add_to_cart_text())
            //  ), $product);

            // 6. Product Permalink
            $output .= '<a class="product-permalink" href="' . esc_url(get_permalink($product->get_id())) . '">Add To Cart</a>';

            $output .= '</div>'; // .product

        }
        $output .= '</ul>';
        wp_reset_postdata();
        return $output;
    } else {
        return 'No products found in the specified category.';
    }
}

// Register the shortcode
add_shortcode('products_by_category', 'display_products_by_category_shortcode');

function custom_wc_single_product_image_html($html, $post_id)
{
    $attachment_ids = $product->get_gallery_image_ids();
    if ($attachment_ids) {
        $html .= '<div id="woocommerce-thumbs" class="woocommerce-thumbs">';
        foreach ($attachment_ids as $attachment_id) {
            $image_link = wp_get_attachment_url($attachment_id);
            $image = wp_get_attachment_image($attachment_id, 'thumbnail');
            $html .= '<a href="' . $image_link . '" class="woocommerce-thumb">' . $image . '</a>';
        }
        $html .= '</div>';
    }
    return $html;
}
add_filter('woocommerce_single_product_image_html', 'custom_wc_single_product_image_html', 20, 2);


add_filter('woocommerce_product_tabs', 'my_remove_all_product_tabs', 98);

function my_remove_all_product_tabs($tabs)
{
    unset($tabs['description']);        // Remove the description tab
    unset($tabs['reviews']);       // Remove the reviews tab
    unset($tabs['additional_information']);    // Remove the additional information tab
    return $tabs;
}

// Override WooCommerce template files
function override_woocommerce_templates($located, $template_name, $args)
{
    // Check if we are dealing with a cart template
    if ($template_name == 'cart/cart.php') {
        // Specify the path to your custom template file
        $located = get_stylesheet_directory() . '/woocommerce/cart/cart.php';
    }
    return $located;
}

add_filter('wc_get_template', 'override_woocommerce_templates', 10, 3);

function change_lost_password_text($translated_text, $text, $domain)
{
    if ($text === 'Lost your password?' && $domain === 'woocommerce') {
        $translated_text = 'Forgot password?'; // Change this to your desired text
    }
    return $translated_text;
}

add_filter('gettext', 'change_lost_password_text', 20, 3);

// Step form shortcode
function enqueue_step_form_script()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('step_form_script', get_template_directory_uri() . '/js/step_form_script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_step_form_script');

function step_form_shortcode()
{
    ob_start();
    ?>
    <form>
        <div id="step-form" method="post">
            <div class="step" id="step-1" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <h4 class="span_one">Get Started</h4>
                    <h2 class="main_head">Your fundraising journey begins here</h2>
                    <h4 class="span_two">NŌK CHOC Fundraising is always free to use and there are no minimums to meet!</h4>
                    <input type="email" id="email" name="email" id="email" placeholder="Email" required>
                    <label for="" id="email-validation"></label>
                    <button type="button" class="next-step" id="email-btn" disabled>Continue<span></span></button>
                </div>
            </div>

            <div class="step" id="step-2" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h4 class="span_one">Step 1 of 4</h4>
                    <h2 class="main_head">Enter the name of your team</h2>
                    <h4 class="span_two">The Team Name will be displayed on each Virtual Store.</h4>
                    <label id="team_name-validation"></label>
                    <input type="text" id="team_name" name="team_name" placeholder="Team Name" required>
                    <button type="button" class="next-step" id="team_name-btn" disabled>Team Details</button>
                </div>
            </div>
            <div class="step" id="step-3" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h4 class="span_one">Step 2 of 4</h4>
                    <h2 class="main_head">Tell us about your team</h2>
                    <h4 class="span_two">NŌK CHOC is excited to partner in fundraising with your Team
                        or Organization in addition to funding girls’ education in Nigeria</h4>
                    <label id="org_type-validation"></label>
                    <select id="org_type" name="org_type" required>
                        <option value="">Select Organization</option>
                    </select>
                    <label id="arts_culture-validation"></label>
                    <select id="arts_culture" name="arts_culture" required disabled style="display: none;">
                        <option value="">Select Sub Organization</option>
                    </select>
                    <label id="sport_org_name-validation"></label>
                    <input placeholder="Sport or Organization Name" type="text" id="sport_org_name" name="sport_org_name"
                        required readonly style="display: none;">
                    <label id="zip_code-validation"></label>
                    <input placeholder="Zip Code" type="number" id="zip_code" name="zip_code" required
                        style="display: none;">

                    <button type="button" class="next-step" id="details-btn" disabled>Fundraiser Details</button>
                </div>
            </div>
            <div class="step" id="step-4" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h4 class="span_one">Step 3 of 4</h4>
                    <h2 class="main_head">Select your 7 days Fundraising Window</h2>
                    <h4 class="span_two">We recommend leaving a couple days before your fundraiser launches to get
                        your Team
                        ready</h4>
                    <label id="start_date-validation"></label>
                    <input type="date" id="start_date" name="start_date" required>
                    <label id="end_date-validation"></label>
                    <input type="date" id="end_date" name="end_date" required disabled>

                    <button type="button" class="next-step" id="date-btn" disabled>Set Goals</button>
                </div>
            </div>
            <div class="step" id="step-5" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h4 class="span_one">Step 4 of 4</h4>
                    <h2 class="main_head">What is your Team’s fundraising goal?</h2>
                    <h4 class="span_two">The goal amount will be displayed on top of the campaign’s
                        main page with a tracker.</h4>
                    <label id="fundraising_goal-validation"></label>
                    <input type="number" name="fundraising_goal" id="fundraising_goal" placeholder="$ Enter Dollar Amount">

                    <button type="button" class="next-step" id="fundraising_goal-btn" disabled>Campaign
                        Strategy</button>
                </div>
            </div>
            <div class="step" id="step-6" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Group-1040-1.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h4 class="span_one">Campaign Strategy</h4>
                    <h2 class="main_head">sell <span id="show_bags"></span> bags
                        to hit your $ <span id="show_fundraising_goal"></span> fundraising goal!</h2>
                    <button type="button" class="next-step">Build Your Campaign</button>
                </div>
            </div>
            <div class="step" id="step-7" style="display: none;">
                <div class="col-img">
                    <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Group-1040.png" alt="arrow"
                        srcset="">
                </div>
                <div class="col-form">
                    <button type="button" class="prev-step"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="arrow"
                            srcset=""> Back</button>
                    <h2 class="main_head">Finish Setting Up Your Fundraising Account</h2>
                    <label id="email-validation2"></label>
                    <label id="username-validation"></label>
                    <input placeholder="First Name" type="text" id="first_name" name="first_name" required>
                    <input placeholder="Last Name" type="text" id="last_name" name="last_name" required>
                    <!-- <input placeholder="Phone Number" type="number" id="phone_num" name="phone_num" required> -->
                    <input type="tel" id="phone_num" name="phone_num" placeholder="(123) 456-7890"
                        pattern="\(\d{3}\) \d{3}-\d{4}" required>
                    <input placeholder="Password" type="password" id="password" name="password" required>
                    <div class="trem_para">
                        <p>By creating an account, you agree to NŌK CHOC <a href="#">Terms & Conditions </a> and
                            <a href="#">Privacy Policy</a>
                        </p>
                    </div>
                    <button id="ajax-submit" type="submit" value="Register" disabled>Create account</button>
                    <!-- <div class="term_login">
                    <p>Already have an account? <a href="https://appwebmart.com/client/nokchoc/login/">Log in</a></p>
                </div> -->
                </div>
            </div>
    </form>

    <script>
        jQuery(document).ready(function ($) {

            // Store previous step field values when the next button is clicked
            $('#fundraising_goal-btn').click(function () {
                // Get values from current step fields
                var fundraising_goal = $('#fundraising_goal').val();

                // Clear previous values before appending new ones
                $('#show_fundraising_goal').empty();
                $('#show_bags').empty();
                $('#show_fundraising_goal').append(fundraising_goal);
                var bags = fundraising_goal / 5;
                $('#show_bags').append(bags);
            });

            // Function to calculate seven days after the start date and set it as the end date
            function setEndDate() {
                // Get the value of the start date input field
                var startDate = new Date($('#start_date').val());
                // Calculate seven days after the start date
                var endDate = new Date(startDate.getTime() + (7 * 24 * 60 * 60 * 1000));
                // Format the end date as "YYYY-MM-DD" (required format for input type="date")
                var endDateFormatted = endDate.toISOString().split('T')[0];
                // Set the value of the end date input field
                $('#end_date').val(endDateFormatted);
            }

            // Call the setEndDate function when the start date changes
            $('#start_date').change(function () {
                setEndDate();
            });
        });
    </script>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('step_form', 'step_form_shortcode');

// AJAX handler to retrieve taxonomy terms
function get_parent_taxonomy_terms()
{
    $post_type = $_GET['post_type'];
    $taxonomy = $_GET['taxonomy'];

    $terms = get_terms(
        array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'parent' => 0,
        )
    );

    $parent_terms = array();

    foreach ($terms as $term) {
        $parent_terms[] = array(
            'id' => $term->term_id,
            'name' => $term->name,
        );
    }

    wp_send_json($parent_terms);
}

add_action('wp_ajax_get_parent_taxonomy_terms', 'get_parent_taxonomy_terms');
add_action('wp_ajax_nopriv_get_parent_taxonomy_terms', 'get_parent_taxonomy_terms');

// AJAX handler to retrieve taxonomy terms
function get_child_taxonomy_terms()
{
    $post_type = $_GET['post_type'];
    $taxonomy = $_GET['taxonomy'];
    $taxonomy_id = $_GET['taxonomy_id'];

    $terms = get_terms(
        array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        )
    );
    // echo $taxonomy_id;
    $child_terms = array();
    foreach ($terms as $term) {
        // print_r($term);
        if ($term->parent == $taxonomy_id) {
            $child_terms[] =
                array(
                    'id' => $term->term_id,
                    'name' => $term->name,
                );
        }
    }

    wp_send_json($child_terms);
}

add_action('wp_ajax_get_child_taxonomy_terms', 'get_child_taxonomy_terms');
add_action('wp_ajax_nopriv_get_child_taxonomy_terms', 'get_child_taxonomy_terms');

function invite_to_support_shortcode()
{

    // $ref_link = $_GET['campain_code'];

    // if (isset ($_GET['campain_code'])) {

    //     $leader_data = get_users(
    //         array(
    //             'meta_key' => 'ref_link',
    //             'meta_value' => $ref_link,
    //             'orderby' => 'registered', // Sort by registration date
    //             'order' => 'ASC', // Ascending order (oldest first)
    //             'number' => 1, // Limit the number of results to 1
    //         )
    //     );
    //     // print_r($leader_data);
    //     $leader_id = $leader_data[0]->data->ID;
    //     // echo $leader_id;
    // }
    ?>
    <!-- data-popup="popup-1" -->
    <!-- main_popup -->
    <div class="idaras-popup " style="display: block;">
        <!--  popup -->
        <!-- overlay_popup popup-inner -->
        <div class="invited_support">
            <div class="back-option" data-popup-close="popup-1"> <img
                    src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-5.png" alt="">
                <h5>Back</h5>
            </div>
            <h2> You’re Invited to Support <br><span class="change-color">Idara’s</span>
                <br>
                Virtual Fundraiser
            </h2>
            <div class="flex-idaras-input">
                <input type="text" class="text-align-left" name="" placeholder="August 30"
                    value="<?php echo $_GET['start_date'] ?>">
                <span>-</span>
                <input type="text" name="" placeholder="September 14" value="<?php echo $_GET['end_date'] ?>">
            </div>
            <h6>Get the details and support here:</h6>
            <div class="second-input-idaras">
                <input type="text" name="" id="p1" placeholder="http://nokchoc.com/fundraising/campaign/HN1625/IDARA"
                    value="https://appwebmart.com/client/nokchoc/my-virtual-store/?campain_code=<?php echo $_GET['campain_code']; ?>">
            </div>
            <img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Group-491.png" alt=""
                class="goal-img">
            <div class="icons-idaras">
                <a href="#" id="shareButton"><img
                        src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Group-474.png" alt=""></a>
                <a href="#" id="p1-btn"><img
                        src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Group-472.png" alt=""></a>
                <input type="hidden" name="" id="get_current_user_id"
                    value="https://appwebmart.com/client/nokchoc/my-virtual-store/?campain_code=<?php echo $_GET['campain_code']; ?>">

                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div>
                            <h1>Social Links</h1>
                        </div>
                        <a id="facebookShare"><img
                                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/facebook-1.png"
                                alt="facebookShare" srcset=""><span>facebook</span></a> <br>
                        <a id="twitterShare"><img
                                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/twitter.png"
                                alt="twitterShare" srcset=""><span>Twitter</span></a> <br>
                        <a id="linkedinShare"><img
                                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/linkedin-2.png"
                                alt="linkedinShare" srcset=""><span>linkedin</span></a> <br>
                        <a id="whatsappShare"><img
                                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/whatsapp.png"
                                alt="whatsappShare" srcset=""><span>Whatsapp </span></a> <br>
                        <a id="emailShare"><img
                                src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/mail.png"
                                alt="emailShare" srcset=""><span>Email</span></a> <br>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#p1-btn').click(function () {

                // Create a "hidden" input
                var aux = document.createElement("input");

                // Assign it the value of the specified element
                aux.setAttribute("value", $("#p1").val());

                // Append it to the body
                document.body.appendChild(aux);

                // Highlight its content
                aux.select();

                // Copy the highlighted text
                document.execCommand("copy");

                // Remove it from the body
                document.body.removeChild(aux);

            });

        });
    </script>
    <?php
}

add_shortcode('invite_to_support', 'invite_to_support_shortcode');

function invite_to_participate_shortcode()
{
    ?>
    <!-- data-popup="popup-1" -->
    <!-- main_popup -->
    <div class="" style="display: block;">
        <!-- popup -->
        <!-- overlay_popup -->
        <div class="popup-inner partici">
            <h4>Invite your team to participate</h4>
            <h5>Copy and share the message with your team, it has all the necessary information for them to get started.
            </h5>
            <p>Team - I set up a NŌK CHOC Cocoa Fundraiser! It’s 100% digital, we make $5 per bag sold, and the product
                ships directly to your supporters.</p>
            <p>We’ll each create a Virtual Cocoa Store and sell NŌK CHOC’s premium vegan Calabar Cocoa! All bags are $20
                each (10-12 servings) and come in three signature flavors – Cookies ‘N’ Cream, Dark Milk Chocolate, and
                Salted Caramel. The cocoa is SO GOOD!</p>
            <p>Our fundraiser begins on
                <?php echo $_GET['start_date'] ?> and goes until
                <?php echo $_GET['end_date'] ?> .
            </p>
            <p>Before our fundraiser begins:</p>
            <ul>
                <li><span>1.</span>Create your Cocoa Store with the code below or using the Campaign Code
                    <?php echo $_GET['campain_code']; ?>
                </li>
                <li><span>2.</span>Share your unique link with all your supporters!</li>
            </ul>
            <div class="doc_flex">
                <!-- Trigger/Open The Modal -->
                <a href="#" id="shareButton"><img decoding="async"
                        src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Vector-1-1.png"></a>
                <a href="#" id="p2-btn"><img decoding="async"
                        src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Vector-1.png"></a>
                <input type="hidden" name="" id="get_current_user_id"
                    value="https://appwebmart.com/client/nokchoc/login/?ref_link=<?php echo $_GET['campain_code']; ?>">
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div>
                        <h1>Social Links</h1>
                    </div>
                    <a id="facebookShare"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/facebook-1.png"
                            alt="facebookShare" srcset="">facebookShare</a> <br>
                    <a id="twitterShare"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/twitter.png"
                            alt="twitterShare" srcset="">XShare</a> <br>
                    <a id="linkedinShare"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/linkedin-2.png"
                            alt="linkedinShare" srcset="">linkedinShare</a> <br>
                    <a id="whatsappShare"><img
                            src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/whatsapp.png"
                            alt="whatsappShare" srcset="">whatsappShare</a> <br>
                    <a id="emailShare"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/mail.png"
                            alt="emailShare" srcset="">emailShare</a> <br>
                </div>
            </div>
            <!-- The Modal -->
            <!-- <div id="myModal2" class="modal">
                Modal content
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <a id="asda">asdasd</a> <br>
                </div>
            </div> -->
            <!-- <div class="close_button">
                <a href="#" data-popup-close="popup-1">Close Window</a>
            </div> -->
            <!-- <a href="#" class="popup-close" data-popup-close="popup-1">x</a> -->
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $('#p2-btn').click(function ($current_user_id) {
                // Access the current user ID
                // var ref_link = customScriptData.ref_link;

                // Create a "hidden" input
                var aux = document.createElement("input");

                // Assign it the value of the specified element
                aux.setAttribute("value", $("#get_current_user_id").val());

                // Append it to the body
                document.body.appendChild(aux);

                // Highlight its content
                aux.select();

                // Copy the highlighted text
                document.execCommand("copy");

                // Remove it from the body
                document.body.removeChild(aux);

            });
        });
    </script>
    <?php
}

add_shortcode('invite_to_participate', 'invite_to_participate_shortcode');

add_action('wp_footer', 'my_ajax_without_file');

function my_ajax_without_file()
{
    ?>

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            overflow: auto;
            bottom: 0;
            height: 100%;
            right: 0;
            margin: auto;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 21px;
            bottom: 0;
            right: 0;
            margin: auto;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            width: 29%;
            border-radius: 15px;
            border: 0;
            box-shadow: 0 2px 13px #00000040;
        }

        .modal-content a {
            font-size: 24px;
            text-transform: capitalize;
            font-family: 'Rubik';
            color: #37277c;
            text-decoration: underline;
            line-height: 40px;
        }

        /* The Close Button */
        .close {
            color: #ffffff;
            font-family: 'Rubik';
            font-weight: 400;
            margin-right: 0;
            font-size: 30px;
            border: 1px solid #37277c;
            line-height: 30px;
            padding: 3px 10px;
            border-radius: 50%;
            display: block;
            margin-left: auto;
            width: fit-content;
            background-color: #37277c;
        }

        .close:hover,
        .close:focus {
            text-decoration: none;
            cursor: pointer;
            background-color: #a22183;
        }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#ajax-submit').click(function (event) {

                event.preventDefault();
                ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>'; // get ajaxurl

                var email = $('#email').val();
                var team_name = $('#team_name').val();
                var org_type = $('#org_type').val();
                var arts_culture = $('#arts_culture').val();
                var sport_org_name = $('#sport_org_name').val();
                var zip_code = $('#zip_code').val();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                var fundraising_goal = $('#fundraising_goal').val();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                // var phone_num = $('#phone_num').val();
                var password = $('#password').val();

                var data = {
                    'action': 'custom_user_registration', // your action name 
                    'email': email, // the email to check, you can replace it with the actual email value
                    'team_name': team_name,
                    'org_type': org_type,
                    'arts_culture': arts_culture,
                    'sport_org_name': sport_org_name,
                    'zip_code': zip_code,
                    'start_date': start_date,
                    'end_date': end_date,
                    'fundraising_goal': fundraising_goal,
                    'first_name': first_name,
                    'last_name': last_name,
                    'password': password,
                };

                jQuery.ajax({
                    url: ajaxurl, // this will point to admin-ajax.php
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        $('#username-validation').empty();
                        if (response == 'username_exists') {
                            $("#username-validation").append("<b>Username Already Exist</b>.");
                            $('#first_name').addClass('error');
                            $('#last_name').addClass('error');
                        } else if (response == '/fundraising-goal/') {
                            window.location.replace("https://appwebmart.com/client/nokchoc/fundraising-goal/");
                        } else if (response == '/login/') {
                            window.location.replace("https://appwebmart.com/client/nokchoc/login/");
                        }
                    },
                    error: function (error) {
                        $('#username-validation').empty();
                        $("#username-validation").append("<b>Some Error Occured</b>.");
                    },
                });
            });

            function validate(element) {
                var team_name = $('#team_name').val();
                if (team_name == '') {
                    $('#team_name-validation').empty();
                    $('#team_name-btn').prop("disabled", true);
                    $("#team_name-validation").append("<b>team name Required</b>.");
                    $('#team_name').addClass('error');
                } else if (team_name) {
                    $('#team_name-btn').prop("disabled", false);
                    $('#team_name').removeClass('error');
                    $('#team_name-validation').empty();
                }
            }
            $('#team_name').on('focusout', function (event) {
                validate(this);
            });
            $('#org_type').on('focusout', function (event) {

                $('#arts_culture').prop("disabled", false);
                var getOrgType = $('#org_type').find(":selected").val();
                if (org_type == '') {
                    $('#org_type-validation').empty();
                    $('#details-btn').prop("disabled", true);
                    $("#org_type-validation").append("<b>Organization Type Required</b>.");
                    $('#org_type').addClass('error');
                } else if (org_type) {
                    $('#org_type').removeClass('error');
                    $('#org_type-validation').empty();
                }
            });
            $('#sport_org_name').on('focusout', function (event) {

                var sport_org_name = $('#sport_org_name').val();
                if (sport_org_name == '') {
                    $('#sport_org_name-validation').empty();
                    $('#details-btn').prop("disabled", true);
                    $("#sport_org_name-validation").append("<b>Sport Organization Name Required</b>.");
                    $('#sport_org_name').addClass('error');
                } else if (sport_org_name) {
                    $('#sport_org_name').removeClass('error');
                    $('#sport_org_name-validation').empty();
                }
            });
            $('#zip_code').on('focusout', function (event) {

                var zip_code = $('#zip_code').val();
                if (zip_code == '') {
                    $('#zip_code-validation').empty();
                    $('#details-btn').prop("disabled", true);
                    $("#zip_code-validation").append("<b>Zip-code Required</b>.");
                    $('#zip_code').addClass('error');
                } else if (zip_code) {
                    $('#zip_code').removeClass('error');
                    $('#zip_code-validation').empty();
                }
            });
            $('div#step-3 input').on('focusout', function (event) {
                var org_type = $('#org_type').val();
                var arts_culture = $('#arts_culture').val();
                var sport_org_name = $('#sport_org_name').val();
                var zip_code = $('#zip_code').val();
                if (org_type == '' || arts_culture == '' || sport_org_name == '' || zip_code == '') {
                    $('#details-btn').prop("disabled", true);
                } else {
                    $('#details-btn').prop("disabled", false);
                }

            });
            $('#start_date').on('focusout', function (event) {

                var start_date = $('#start_date').val();
                if (start_date == '') {
                    $('#start_date-validation').empty();
                    $('#date-btn').prop("disabled", true);
                    $("#start_date-validation").append("<b>Start Date Required</b>.");
                    $('#start_date').addClass('error');
                } else if (start_date) {
                    $('#start_date').removeClass('error');
                    $('#date-btn').prop("disabled", false);
                    $('#start_date-validation').empty();
                }
            });
            $('#fundraising_goal').on('focusout', function (event) {

                var fundraising_goal = $('#fundraising_goal').val();
                if (fundraising_goal == '') {
                    $('#fundraising_goal-validation').empty();
                    $('#fundraising_goal-btn').prop("disabled", true);
                    $("#fundraising_goal-validation").append("<b>Fundraising Goal Required</b>.");
                    $('#fundraising_goal').addClass('error');
                } else if (fundraising_goal) {
                    $('#fundraising_goal-btn').prop("disabled", false);
                    $('#fundraising_goal').removeClass('error');
                    $('#fundraising_goal-validation').empty();
                }
            });
            $('#first_name').on('focusout', function (event) {

                var first_name = $('#first_name').val();
                if (first_name == '') {
                    $('#first_name-validation').empty();
                    $('#ajax-submit-btn').prop("disabled", true);
                    $("#first_name-validation").append("<b>First Name Required</b>.");
                    $('#first_name').addClass('error');
                } else if (first_name) {
                    $('#first_name').removeClass('error');
                    $('#first_name-validation').empty();
                }
            });
            $('#last_name').on('focusout', function (event) {

                var last_name = $('#last_name').val();
                if (last_name == '') {
                    $('#last_name-validation').empty();
                    $('#ajax-submit-btn').prop("disabled", true);
                    $("#last_name-validation").append("<b>Last Name Required</b>.");
                    $('#last_name').addClass('error');
                } else if (last_name) {
                    $('#last_name').removeClass('error');
                    $('#last_name-validation').empty();
                }
            });
            $('div#step-7 input').on('focusout', function (event) {
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var phone_num = $('#phone_num').val();
                var password = $('#password').val();
                if (first_name == '' || last_name == '' || phone_num == '' || password == '') {
                    $('#ajax-submit').prop("disabled", true);
                } else {
                    $('#ajax-submit').prop("disabled", false);
                }
            });
            $('#email').on('focusout', function (event) {
                $('#email-btn span').addClass('step-from-loader');

                ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>'; // get ajaxurl
                var email = $('#email').val();

                // Regular expression for email validation
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email == '') {
                    $('#email-validation').empty();
                    $('#email-btn').prop("disabled", true);
                    $("#email-validation").append("<b>Email Required</b>.");
                    $('#email').removeClass('error');
                    $('#email-btn span').removeClass('step-from-loader');
                } else if (email) {
                    if (emailRegex.test(email)) {
                        $('#email').removeClass('error');
                        $('#email-validation').empty();
                    } else {
                        $('#email-validation').empty();
                        $('#email-btn').prop("disabled", true);
                        $("#email-validation").append("<b>Invalid email format. Please enter a valid email address.</b>.");
                        $('#email').removeClass('error');
                        $('#email-btn span').removeClass('step-from-loader');
                    }
                }

                var data = {
                    'action': 'check_email_existence', // action name for email existence check
                    'email': email // the email to check, you can replace it with the actual email value
                };

                jQuery.ajax({
                    url: ajaxurl, // this will point to admin-ajax.php
                    dataType: "json",
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        if (email == '') {
                            $('#email-validation').empty();
                            $('#email-btn').prop("disabled", true);
                            $("#email-validation").append("<b>Email Required</b>.");
                            $('#email').removeClass('error');
                        } else if (response.exists == true) {
                            $('#email-validation').empty();
                            $("#email-validation").append("<b>Email Already Exist</b>.");
                            $('#email-btn').prop("disabled", true);
                            $('#email').addClass('error');
                            $('.prev-step').removeAttr("style");
                            $('#email-btn span').removeClass('step-from-loader');
                        } else if (response.exists == false) {
                            if (emailRegex.test(email)) {
                                console.log('test');
                                $('#email-btn').prop("disabled", false);
                                $('#email').removeClass('error');
                                $('#email-validation').empty();
                            } else {
                                console.log('test else');
                                $('#email-validation').empty();
                                $('#email-btn').prop("disabled", true);
                                $("#email-validation").append("<b>Invalid email format. Please enter a valid email address.</b>.");
                                $('#email').removeClass('error');
                                // $('#email-btn span').removeClass('step-from-loader');
                            }
                        }
                    }
                });
            });
            $('#team_name-btn').on('click', function (event) {
                event.preventDefault();
                var team_name = $('#team_name').val();
                $('#sport_org_name').val(team_name);
                ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>'; // get ajaxurl
                // AJAX call to retrieve taxonomies
                $.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: {
                        action: 'get_parent_taxonomy_terms',
                        post_type: 'campain', // Replace with your custom post type
                        taxonomy: 'organization_type',
                    },
                    success: function (response) {
                        response.forEach(element => {
                            $option = '<option value="' + element.id + '">' + element.name + '</option>';
                            $('#org_type').append($option);
                        });
                        // Handle the response (update your UI, etc.)
                    },
                });
            });
            $('#org_type').on('change', function (event) {
                event.preventDefault();
                ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>'; // get ajaxurl

                // var org_type = $('#org_type_hidden').val();
                var org_type = $('#org_type').val();

                // AJAX call to retrieve taxonomies
                $.ajax({
                    type: 'GET',
                    dataType: "json",
                    url: ajaxurl,
                    data: {
                        action: 'get_child_taxonomy_terms',
                        post_type: 'campain', // Replace with your custom post type
                        taxonomy: 'organization_type',
                        taxonomy_id: org_type,
                    },
                    success: function (response) {
                        $('#arts_culture').empty();
                        $('#arts_culture').prop("disabled", false);
                        $('#arts_culture').removeAttr("style");
                        // $('#sport_org_name').removeAttr("style");
                        // $('#zip_code').removeAttr("style");
                        $option = '<option value="">Select Sub Organization</option>';
                        $('#arts_culture').append($option);
                        response.forEach(ele => {
                            $option = '<option value="' + ele.id + '">' + ele.name + '</option>';
                            $('#arts_culture').append($option);
                        });
                        // Handle the response (update your UI, etc.)
                    },
                });
            });
            // arts_culture
            $('#arts_culture').on('change', function (event) {
                event.preventDefault();
                $('#sport_org_name').removeAttr("style");
                $('#zip_code').removeAttr("style");
            });

            $('#phone_num').on('input', function () {
                var value = $(this).val().replace(/\D/g, ''); // Remove non-digit characters
                if (value.length > 10) {
                    value = value.slice(0, 10); // Limit to first 10 digits
                }
                var formattedValue = formatPhoneNumber(value); // Format the phone number
                $(this).val(formattedValue); // Update the input value
            });

            function formatPhoneNumber(value) {
                var formattedValue = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3'); // Add brackets and hyphen
                return formattedValue;
            }

            // Page 06 Input
            $('input#input_6_6').attr('readonly', 'readonly');
            $('input#input_6_10').attr('readonly', 'readonly');
            $('input#input_6_11').attr('readonly', 'readonly');
            $('input#input_6_12').attr('readonly', 'readonly');
            $('input#input_6_13').attr('readonly', 'readonly');
            $('input#input_6_14').attr('readonly', 'readonly');
            $('input#input_6_15').attr('readonly', 'readonly');
            $('input#input_6_16').attr('readonly', 'readonly');
            $('input#input_6_37').attr('readonly', 'readonly');
            $('input#input_6_38').attr('readonly', 'readonly');
            $('input#input_6_40').attr('readonly', 'readonly');
            // Page 08 Input
            $('input#input_8_10').attr('readonly', 'readonly');
            $('input#input_8_11').attr('readonly', 'readonly');
            $('input#input_8_12').attr('readonly', 'readonly');
            $('input#input_8_13').attr('readonly', 'readonly');
            $('input#input_8_14').attr('readonly', 'readonly');
            $('input#input_8_15').attr('readonly', 'readonly');
            $('input#input_8_16').attr('readonly', 'readonly');
            $('input#input_8_54').attr('readonly', 'readonly');

            // Get the modal
            var modal = document.getElementById("myModal");
            // var modal = document.getElementById("myModal2");

            // Get the button that opens the modal
            var btn = document.getElementById("shareButton");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            var shareUrl = window.location.href;

            // Facebook Share
            var facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent($("#get_current_user_id").val());

            // Twitter Share
            var twitterShareUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent($("#get_current_user_id").val());

            // LinkedIn Share
            var linkedinShareUrl = 'https://www.linkedin.com/shareArticle?url=' + encodeURIComponent($("#get_current_user_id").val());

            // // Share on WhatsApp
            var whatsappShareUrl = 'https://api.whatsapp.com/send?text=' + encodeURIComponent($("#get_current_user_id").val());

            // Share via Email
            var emailShareUrl = 'mailto:?subject=Check%20out%20this%20link&body=' + encodeURIComponent($("#get_current_user_id").val());

            // Function to open share links in a new window
            function openSharePopup(url) {
                window.open(url, 'Share', 'width=600, height=400, scrollbars=no');
            }
            // Attach click events to elements triggering the share
            $('#facebookShare').click(function () {
                openSharePopup(facebookShareUrl);
            });

            $('#twitterShare').click(function () {
                openSharePopup(twitterShareUrl);
            });

            $('#linkedinShare').click(function () {
                openSharePopup(linkedinShareUrl);
            });
            $('#whatsappShare').click(function () {
                openSharePopup(whatsappShareUrl);
            });
            $('#emailShare').click(function () {
                window.open(emailShareUrl);
            });
        });
    </script>
    <?php
}

function random_password($length = 8)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

function custom_user_registration()
{
    if (isset($_POST['email']) && isset($_POST['password'])) {

        if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
            $username = sanitize_user($_POST['first_name'] . $_POST['last_name']);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
        }
        if (isset($_POST['username'])) {
            $username = sanitize_user($_POST['username']);
        }

        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $team_name = $_POST['team_name'];
        $org_type = $_POST['org_type'];
        $sport_org_name = $_POST['sport_org_name'];
        $org_sub_type = $_POST['arts_culture'];
        $zip_code = $_POST['zip_code'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $fundraising_goal = $_POST['fundraising_goal'];
        $ref_link = random_password();
        $ref_link = $ref_link;

        // Check if Username already exists
        if (username_exists($username)) {
            echo 'username_exists';
            wp_die();
        }

        // Create the user
        $user_id = wp_create_user($username, $password, $email);

        // Update ACF fields
        update_field('first_name', $first_name, 'user_' . $user_id);
        update_field('last_name', $last_name, 'user_' . $user_id);
        update_field('team_name', $team_name, 'user_' . $user_id);
        update_field('zip_code', $zip_code, 'user_' . $user_id);
        update_field('org_type', $org_type, 'user_' . $user_id);
        update_field('org_sub_type', $org_sub_type, 'user_' . $user_id);
        update_field('org_name', $sport_org_name, 'user_' . $user_id);
        update_field('start_date', $start_date, 'user_' . $user_id);
        update_field('end_date', $end_date, 'user_' . $user_id);
        update_field('ref_link', $ref_link, 'user_' . $user_id);
        update_field('fundraising_goal', $fundraising_goal, 'user_' . $user_id);

        if (is_wp_error($user_id)) {
            echo 'Error creating user: ' . $user_id->get_error_message();
        } else {
            $user_credentials = array(
                'user_login' => $email,    // Replace 'username' with the username or email of the user
                'user_password' => $password,    // Replace 'password' with the password of the user
                'remember' => true           // Optional: Set to true to remember the user login
            );

            // Log in the user
            $user = wp_signon($user_credentials);
            if ($user->ID) {
                echo '/fundraising-goal/';
            } else {
                echo '/login/';
            }
        }
    }
    wp_die();
}

add_action("wp_ajax_custom_user_registration", "custom_user_registration");
add_action("wp_ajax_nopriv_custom_user_registration", "custom_user_registration");

add_action("wp_ajax_check_email_existence", "check_email_existence");
add_action("wp_ajax_nopriv_check_email_existence", "check_email_existence");

function check_email_existence()
{
    $email = $_POST['email'];
    $exists = email_exists($email);
    if ($exists) {
        echo json_encode(array('exists' => true));
    } else {
        echo json_encode(array('exists' => false));
    }
    wp_die();
}

add_filter('gform_pre_render_6', 'populate_deployment_user_6');

function populate_deployment_user_6($form)
{
    $current_user_id = get_current_user_id('ID');
    $user_data = get_userdata($current_user_id);

    $org_type_term_id = $user_data->org_type; // Replace with your term ID
    $taxonomy = 'organization_type'; // Replace with your taxonomy
    $org_type_term_by_id = get_term_by('id', $org_type_term_id, $taxonomy);

    // Get a term by its ID in the category taxonomy
    $org_sub_type_term_id = $user_data->org_sub_type; // Replace with your term ID
    $taxonomy = 'organization_type'; // Replace with your taxonomy
    $org_sub_type_term_by_id = get_term_by('id', $org_sub_type_term_id, $taxonomy);

    if ($current_user_id) {
        $leader_id = $user_data->leader_id;
        if (!$leader_id && $user_data->ref_link) {
            foreach ($form['fields'] as $field) {

                if ($field->id == 10) {
                    $field->defaultValue = $user_data->team_name;
                }
                if ($field->id == 11) {
                    // Output the term's name
                    if ($org_type_term_by_id && !is_wp_error($org_type_term_by_id)) {
                        $field->defaultValue = $org_type_term_by_id->name;
                    }
                }
                if ($field->id == 12) {
                    // Output the term's name
                    if ($org_sub_type_term_by_id && !is_wp_error($org_sub_type_term_by_id)) {
                        $field->defaultValue = $org_sub_type_term_by_id->name;
                    }
                }
                if ($field->id == 13) {
                    $field->defaultValue = $user_data->org_name;
                }
                if ($field->id == 14) {
                    $field->defaultValue = $user_data->zip_code;
                }
                if ($field->id == 15) {
                    $field->defaultValue = $user_data->start_date;
                }
                if ($field->id == 16) {
                    $field->defaultValue = $user_data->end_date;
                }
                if ($field->id == 6) {
                    $field->defaultValue = $user_data->user_email;
                }
                if ($field->id == 37) {
                    $field->defaultValue = $user_data->user_firstname;
                }
                if ($field->id == 38) {
                    $field->defaultValue = $user_data->last_name;
                }
                if ($field->id == 40) {
                    $field->defaultValue = $user_data->fundraising_goal;
                }
                if ($field->id == 44) {
                    $field->defaultValue = $user_data->ref_link;
                }
            }
        } else {

            // echo '<b>this Form is for Leader Only</b>';
            $url = 'https://appwebmart.com/client/nokchoc/';
            ?>
            <script>
                // Display an alert message
                alert('This Form is for Leader Only, your been Redirected to Home. Click OK to continue.');

                // Perform the redirect after the user clicks OK
                window.location.href = '<?php echo esc_url($url); ?>';
            </script>
            <?php

            // $url = 'https://appwebmart.com/client/nokchoc/';
            // wp_redirect($url);
            exit;
        }
    }
    return $form;
}

add_filter('gform_pre_render_8', 'populate_deployment_user_8');

function populate_deployment_user_8($form)
{
    $current_user_id = get_current_user_id('ID');
    $user_data = get_userdata($current_user_id);

    if ($current_user_id) {
        $leader_id = $user_data->leader_id;
        // echo  $leader_id;
        $user_data = get_userdata($leader_id);
        // print_r($user_data);
        // echo  $user_data->team_name;
        if ($leader_id) {
            foreach ($form['fields'] as $field) {

                if ($field->id == 10) {
                    $field->defaultValue = $user_data->team_name;
                }
                if ($field->id == 11) {
                    $term_id = $user_data->org_type; // Replace with your term ID
                    $taxonomy = 'organization_type'; // Replace with your taxonomy
                    $term_by_id = get_term_by('id', $term_id, $taxonomy);

                    // Output the term's name
                    if ($term_by_id && !is_wp_error($term_by_id)) {
                        $field->defaultValue = $term_by_id->name;
                        // echo '$user_data->org_type' .$term_by_id->name;
                    }
                }
                if ($field->id == 12) {
                    // Get a term by its ID in the category taxonomy
                    $term_id = $user_data->org_sub_type; // Replace with your term ID
                    $taxonomy = 'organization_type'; // Replace with your taxonomy
                    $term_by_id = get_term_by('id', $term_id, $taxonomy);

                    // Output the term's name
                    if ($term_by_id && !is_wp_error($term_by_id)) {
                        $field->defaultValue = $term_by_id->name;
                    }
                }
                if ($field->id == 13) {
                    $field->defaultValue = $user_data->org_name;
                }
                if ($field->id == 14) {
                    $field->defaultValue = $user_data->zip_code;
                }
                if ($field->id == 15) {
                    $field->defaultValue = $user_data->start_date;
                    // echo $user_data->start_date;
                }
                if ($field->id == 16) {
                    $field->defaultValue = $user_data->end_date;
                }
                if ($field->id == 54) {
                    $field->defaultValue = $user_data->fundraising_goal;
                }
                // if ($field->id == 65) {
                //     $field->defaultValue = $user_data->featured;
                // }
                if ($field->id == 66) {
                    $field->defaultValue = $user_data->ref_link;
                }
            }
        } else {
            echo '<b>this Form is for Team Members</b>';
            // $url = 'https://appwebmart.com/client/nokchoc/';
            // wp_redirect($url);
            exit;
        }
    }
    return $form;
}
add_action('gform_after_submission', 'fundrising_invite_send_email', 10, 2);

function fundrising_invite_send_email($entry, $form)
{
    $current_user_id = get_current_user_id('ID');
    $user_data = get_userdata($current_user_id);
    // print_r($user_data->user_email);
    echo $user_data->leader_id;
    if ($form['id'] == 8) {
        // Get form field values
        $team_name = rgar($entry, '10'); // Replace '2' with the field ID
        $organization_type = rgar($entry, '11');
        $sub_organization_type = rgar($entry, '12');
        $organization_name = rgar($entry, '13');
        $zip_code = rgar($entry, '14');
        $start_date = rgar($entry, '15');
        $end_date = rgar($entry, '16');
        $virtual_store_profile = rgar($entry, '46');
        $display_name = rgar($entry, '48');
        $team_fundraising_goal = rgar($entry, '54');
        $fundraising_goal = rgar($entry, '68');
        $first_name = rgar($entry, '56');
        $last_name = rgar($entry, '57');
        $featured = rgar($entry, '65');
        // print_r($featured);
        // print_r($virtual_store_profile);
        // die;

        // Create new post of custom post type 'campaign'
        $new_post_id = wp_insert_post(
            array(
                'post_title' => $organization_name, // Use form field values as post title/content
                'post_type' => 'campaign', // Your custom post type
                'post_status' => 'publish',
            )
        );

        // Optionally, set ACF field values for the newly created post
        // Check if the post was successfully created
        if (!is_wp_error($new_post_id)) {
            // Optionally, set ACF field values for the newly created post

            // Update ACF fields
            update_field('first_name', $first_name, 'user_' . $current_user_id);
            update_field('last_name', $last_name, 'user_' . $current_user_id);
            update_field('team_name', $team_name, $new_post_id);
            update_field('organization_type', $organization_type, $new_post_id);
            update_field('sub_organization_type', $sub_organization_type, $new_post_id);
            update_field('organization_name', $organization_name, $new_post_id);
            update_field('zip_code', $zip_code, $new_post_id);
            update_field('start_date', $start_date, $new_post_id);
            update_field('end_date', $end_date, $new_post_id);
            update_field('user_id', $current_user_id, $new_post_id);
            update_field('leader_id', $user_data->leader_id, $new_post_id);
            update_field('post_id', $new_post_id, $current_user_id);
            update_field('display_name', $display_name, $new_post_id);
            update_field('team_fundraising_goal', $team_fundraising_goal, $new_post_id);
            // update_field('team_fundraising_goal', $team_fundraising_goal, $user_data->leader_id);
            update_field('fundraising_goal', $fundraising_goal, $new_post_id);
            update_field('featured', $featured, $new_post_id);
            update_field('virtual_store_profile', $virtual_store_profile, $new_post_id);

        } else {
            // Handle error
            $error_message = $new_post_id->get_error_message();
            echo 'Error creating post: ' . $error_message;
            // Log or display the error message
        }
        // Optionally, redirect the user after form submission
        // $url = 'https://appwebmart.com/client/nokchoc/';
        // wp_redirect($url);
        // exit;
    }

    // if ($form['id'] == 6) { // Replace 1 with the actual form ID
    //     // Get form field values
    //     $eamil_sender = $user_data->user_email; // Replace '2' with the field ID
    //     $eamil_reciver = rgar($entry, '6'); // Replace '2' with the field ID
    //     $from = "info@appwebmart.com";
    //     $to = $eamil_reciver; //$email
    //     $subject = "Checking PHP mail";
    //     $message = "
    //         <html>
    //         <head>
    //             <title>This is a test HTML email</title>
    //         </head>
    //         <body>
    //             <a href='https://appwebmart.com/client/nokchoc/my-account/?ref_link=$user_data->ref_link'>Hi, Please link here  $user_data->ref_link.</a>
    //             <p>Hi, it’s a test email. Please ignore.</p>
    //         </body>
    //         </html>
    //         ";
    //     // The content-type header must be set when sending HTML email
    //     $headers = "MIME-Version: 1.0" . "\r\n";
    //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //     $headers = "From:" . $from;
    //     $sent = wp_mail($to, $subject, $message, $headers);
    //     if ($sent) {
    //         //    echo "Message was sent.";
    //         // $url = 'https://appwebmart.com/client/nokchoc/';
    //         // wp_redirect($url);
    //         // exit;
    //     } else {
    //         echo "Message was not sent.";
    //         exit;
    //     }
    // }
}
// Register Extra Filed

function wooc_extra_register_fields()
{
    if (isset($_GET['ref_link'])) {
        ?>
        <input type="text" class="input-text" name="ref_link" id="reg_ref_link" hidden
            value="<?php echo $_GET['ref_link']; ?>" />
        <?php
    }
}

add_action('woocommerce_register_form_end', 'wooc_extra_register_fields');
/**
 * Below code save extra fields.
 */
function wooc_save_extra_register_fields($customer_id)
{
    $ref_link = $_GET['ref_link'];

    if (isset($_GET['ref_link'])) {

        $leader_data = get_users(
            array(
                'meta_key' => 'ref_link',
                'meta_value' => $ref_link,
                'orderby' => 'registered', // Sort by registration date
                'order' => 'ASC', // Ascending order (oldest first)
                'number' => 1, // Limit the number of results to 1
            )
        );
        $leader_id = $leader_data[0]->data->ID;

        if (!empty($ref_link)) {
            // Update user meta with the values of the ACF fields
            if (!empty($leader_id)) {
                // update_user_meta($customer_id, 'leader_id', 'leader_id');
                update_user_meta($customer_id, 'leader_id', $leader_id);
            }
            update_user_meta($customer_id, 'ref_link', $ref_link);
        }
    }
}

add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');

if (isset($_GET['ref_link'])) {
    add_filter('woocommerce_registration_redirect', 'ts_custom_redirection_after_registration', 10, 1);
}
function ts_custom_redirection_after_registration($redirection_url)
{
    // Change the redirection Url
    $redirection_url = '/client/nokchoc/virtual-store/';

    return $redirection_url; // Always return something
}

// Login Extra Filed
function wooc_extra_login_fields()
{
    $ref_link = $_GET['ref_link'];
    if (isset($ref_link)) {
        ?>
        <input type="text" class="input-text" name="ref_link" id="reg_ref_link" hidden value="<?php echo $ref_link; ?>" />
        <!-- <script src="">
            // ?ref_link=8UMlVAr5
            var ref_link = $ref_link;
            $(document).ready(function () {
                $('.signup_link a').attr('href', 'https://appwebmart.com/client/nokchoc/register/?ref_link='+ref_link);
                $('.signup_link a').append(ref_link);
            });
        </script> -->
        <?php
    }
}

add_action('woocommerce_login_form_end', 'wooc_extra_login_fields');
/**
 * Below code save extra fields.
 */
function wooc_save_extra_login_fields($customer_id)
{
    $ref_link = $_GET['ref_link'];

    if (isset($_GET['ref_link'])) {

        $leader_data = get_users(
            array(
                'meta_key' => 'ref_link',
                'meta_value' => $ref_link,
                'orderby' => 'registered', // Sort by registration date
                'order' => 'ASC', // Ascending order (oldest first)
                'number' => 1, // Limit the number of results to 1
            )
        );
        $leader_id = $leader_data[0]->data->ID;

        if (!empty($ref_link)) {
            // Update user meta with the values of the ACF fields
            if (!empty($leader_id)) {
                // update_user_meta($customer_id, 'leader_id', 'leader_id');
                update_user_meta($customer_id, 'leader_id', $leader_id);
            }
            update_user_meta($customer_id, 'ref_link', $ref_link);
        }
    }
}

add_action('woocommerce_created_customer', 'wooc_save_extra_login_fields');

if (isset($_POST['ref_link'])) {
    add_filter('woocommerce_login_redirect', 'bbloomer_customer_login_redirect', 9999);
}
function bbloomer_customer_login_redirect($redirect_url)
{
    $redirect_url = '/client/nokchoc/virtual-store/';
    return $redirect_url;
}

// add menu link
add_filter('woocommerce_account_menu_items', 'fundraising_dashboard_link', 40);
function fundraising_dashboard_link($menu_links)
{

    $menu_links = array_slice($menu_links, 0, 0, true)
        + array('my-account' => 'Overview')
        + array('fundraising-dashboard' => 'Dashboard')
        + array_slice($menu_links, 1, NULL, true);

    return $menu_links;
}
// register permalink endpoint
add_action('init', 'add_endpoint');
function add_endpoint()
{
    add_rewrite_endpoint('fundraising-dashboard', EP_PAGES);
}
// content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
add_action('woocommerce_account_fundraising-dashboard_endpoint', 'my_account_endpoint_content');
function my_account_endpoint_content()
{

    $current_user_id = get_current_user_id('ID');

    // Define the query arguments
    $args = array(
        'post_type' => 'campaign', // Your custom post type
        'user_id' => $current_user_id,
        'posts_per_page' => -1, // Retrieve all posts
        'post_status' => 'publish',
    );
    // Instantiate the query
    $the_query = get_posts($args);

    // Check if there are posts
    if ($the_query) {
        // Start the loop
        // foreach ($the_query as $post) {
        //     setup_postdata($post);
        //     // $query->the_post();
        //     $post_id = $post->ID;
        //     $start_date = get_field('start_date', $post_id);
        //     $user_id = get_field('user_id', $post_id);
        //     $leader_id = get_field('leader_id', $post_id);
        // }
        require_once WP_CONTENT_DIR . '/themes/nok-choc/template/desboard.php';
        // Restore original post data
        wp_reset_postdata();
    } else {
        // No posts found
        echo 'No campaigns found.';
    }
}

add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

function get_cart_count()
{
    // return WC()->cart->get_cart_contents_count();
    wp_send_json(WC()->cart->get_cart_contents_count());
    // wp_die();
}



?>