<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nok_Choc
 */

?>

<div class="main-footer">
    <div class="container">
        <div class="flex">
            <div class="col1">
                <?php dynamic_sidebar('footer_logo_section'); ?>
                <a class="mail-text" href="mailto:hello@nokchoc.com">hello@nokchoc.com</a>
                <div class="social_icon">
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>

            <div class="col1">
                <?php dynamic_sidebar('Colume2'); ?>
            </div>

            <div class="col1">
                <?php dynamic_sidebar('Colume3'); ?>
            </div>

            <div class="col1">
                <h2> About </h2>
                <div class="footer_menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_menu',
                        )
                    );
                    ?>
                </div>
            </div>

            <div class="col1">
				      <h2> Help </h2>
				<div class="footer_menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'other_menu',
						)
					);
					?>
				</div>
            </div>
        </div>

        <div class="footer-phara">
            <p>@2024 NOK CHOC all rights reserved</p>
        </div>
    </div>
</div>








<footer id="colophon" class="site-footer">
    <div class="site-info">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'nok-choc')); ?>">
            <?php
            /* translators: %s: CMS name, i.e. WordPress. */
            printf(esc_html__('Proudly powered by %s', 'nok-choc'), 'WordPress');
            ?>
        </a>
        <span class="sep"> | </span>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf(esc_html__('Theme: %1$s by %2$s.', 'nok-choc'), 'nok-choc', '<a href="http://underscores.me/">Underscores.me</a>');
        ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->







</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>

    // function openCity(evt, cityName) {
    // var i, tabcontent, tablinks;
    // tabcontent = document.getElementsByClassName("tabcontent");
    // for (i = 0; i < tabcontent.length; i++) {
    // tabcontent[i].style.display = "none";
    // }
    // tablinks = document.getElementsByClassName("tablinks");
    // for (i = 0; i < tablinks.length; i++) {
    // tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }
    // document.getElementById(cityName).style.display = "block";
    // evt.currentTarget.className += " active";
    // }
    // document.getElementById("defaultOpen").click();
    $(function () {
        $('.tablinks').on('click', function () {
            var id = $(this).data('tabcontent');
            $('.tablinks,.tabcontent').removeClass('active')
            $('.tabcontent').hide();
            $('#' + id).show();
            $('#' + id).addClass('active')
            if (!$(this).hasClass('active')) {
                $(this).addClass('active')
            } else {
                $(this).removeClass('active')
            }

        })


        // Owl Carousel
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 4,
            margin: 10,
            dots: false,
            loop: true,
            nav: true,
            navText: ["<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Arrow-3-1.png'>", "<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/arrow-right.png'>"],
            responsive: {
                0: {
                    items: 1
                },
                560: {
                    items: 2
                },
                769: {
                    items: 4
                }
            }
        });
    });

    $('#owl-carousel-two').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        nav: false,
        items: 1,
    })

    $('#owl-carousel-three').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav: true,
        navText: ["<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Arrow-3-1.png'>", "<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/arrow-right.png'>"],
        items: 3,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            },
            769: {
                items: 3
            }
        }
    })

    jQuery(".main_p").insertAfter(jQuery(".shop_head"))
    jQuery(".main_p").show();




    jQuery(function () {
        jQuery('.acc__title').click(function (j) {

            var dropDown = jQuery(this).closest('.acc__card').find('.acc__panel');
            jQuery(this).closest('.acc').find('.acc__panel').not(dropDown).slideUp();

            if (jQuery(this).hasClass('active')) {
                jQuery(this).removeClass('active');
            } else {
                jQuery(this).closest('.acc').find('.acc__title.active').removeClass('active');
                jQuery(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();
            j.preventDefault();
        });
    });


    jQuery(".woocommerce-product-gallery__wrapper").each(function () {
        jQuery(this).find('.woocommerce-product-gallery__image:nth-child(n+2)').wrapAll('<div class="blog-parent-first" />');
    });




    jQuery(".single-product .site-main").prepend('<a class="back" href="#"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Arrow-7.png" alt=""> Back</a>');

    // Add click event to handle Back button
    jQuery(".single-product .site-main").on("click", ".back", function (e) {
        e.preventDefault();
        history.back(); // This will navigate back in the browser history
    });

    jQuery(document).ready(function ($) {
        $('form.woocommerce-cart-form').on('click', '.plus, .minus', function () {
            var $qty = $(this).closest('.quantity').find('.qty');
            var currentVal = parseFloat($qty.val());
            var max = parseFloat($qty.attr('max'));
            var min = parseFloat($qty.attr('min'));
            var step = $qty.attr('step');

            if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
            if (max === '' || max === 'NaN') max = '';
            if (min === '' || min === 'NaN') min = 0;
            if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

            if ($(this).is('.plus')) {
                if (max && (currentVal >= max)) {
                    $qty.val(max);
                } else {
                    $qty.val(currentVal + parseFloat(step));
                }
            } else {
                if (min && (currentVal <= min)) {
                    $qty.val(min);
                } else if (currentVal > 1) {
                    $qty.val(currentVal - parseFloat(step));
                }
            }

            // Trigger change event
            $qty.trigger('change');
        });
    });

    setTimeout(function () {
        jQuery(".custom_class").insertAfter(".summery")

        jQuery(".woocommerce-checkout .site-main").prepend('<div class="checkout_main"><h1>CHECKOUT</h1><div class="check"><P>information</P><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Group-1040.png" alt=""><p>PAYMENT METHOD</p></div></div>')
        jQuery(".woocommerce-checkout .site-main").prepend('<a class="back" href="#"><img src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/01/Arrow-7.png" alt=""> Back</a>')

        jQuery(".woocommerce-cart .quantity").prepend("<span class='minus'>-</span>");

        jQuery(".minus").click(function () {
            var val = parseInt(jQuery(this).siblings(".plus-minus-input").val());
            jQuery(this).siblings(".plus-minus-input").val(val - 1);
        });

        jQuery(".woocommerce-cart .quantity").append("<span class='plus'>+</span>");

        jQuery(".plus").click(function () {
            var val = parseInt(jQuery(this).siblings(".plus-minus-input").val());
            jQuery(this).siblings(".plus-minus-input").val(val + 1);
        });

    }, 1000)

    jQuery(".woocommerce-LostPassword").insertBefore(jQuery("#customer_login .woocommerce-form-login__submit"))
    jQuery(".woocommerce-account #username").attr("placeholder", "Email Address")
    jQuery(".woocommerce-account #password").attr("placeholder", "Password")
    jQuery(".woocommerce-account #reg_username").attr("placeholder", "Username")
    jQuery(".woocommerce-account #reg_email").attr("placeholder", "Email Address")
    jQuery(".woocommerce-account #reg_password").attr("placeholder", "Password")
    reg_ref_link = $("#reg_ref_link").val();
    if (reg_ref_link) {
        jQuery("<p class='signup_link'>Don’t have an account?  <a href='https://appwebmart.com/client/nokchoc/register/?ref_link=" + reg_ref_link + "'>SignUp</p>").insertAfter(".woocommerce-form-login__submit")
    } else {
        jQuery("<p class='signup_link'>Don’t have an account?  <a href='https://appwebmart.com/client/nokchoc/register'>SignUp</p>").insertAfter(".woocommerce-form-login__submit")
    }
    jQuery(".woocommerce-privacy-policy-text").html('<div class="privacy_dev"><input type="checkbox"><div class="signup_link2">By creating an account, you agree to NŌK CHOC <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a></div> <div class="reset_password"><a href="https://appwebmart.com/client/nokchoc/login/lost-password/">Reset Password</a></div></div>')
    setInterval(function () {
        var text = jQuery(".mcfw-mini-product-price-html").text();
        var numberOnly = text.replace(/\D/g, '');
        jQuery(".mcfw-mini-product-price-html").text(numberOnly)
        jQuery(".mcfw-mini-product-price-html").css('opacity', 1)


    }, 1000)

    // 	setTimeout(function(){
    // 	jQuery("#primary-menu").css('display','flex')
    // },2000)



</script>

<script>
    jQuery(document).ready(function ($) {
        var menuToggle = $('.menu-toggle');
        var menuIcon = menuToggle.find('i');

        menuToggle.on('click', function () {
            if (menuIcon.hasClass('fa-bars')) {
                // Switch to close icon
                menuIcon.removeClass('fa-bars').addClass('fa-times');
            } else {
                // Switch back to hamburger icon
                menuIcon.removeClass('fa-times').addClass('fa-bars');
            }
        });
    });
</script>


<script>

    jQuery(document).ready(function () {

        jQuery(function () {
            // Open
            jQuery('[data-popup-open]').on('click', function (e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
                e.preventDefault();
            });

            // Close
            jQuery('[data-popup-close]').on('click', function (e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
                e.preventDefault();
            });
        });




    });



</script>


<script>
    jQuery(document).ready(function () {
        jQuery('#field_8_48, #field_8_65').wrapAll('<div class="parentDiv"></div>');

        jQuery('input#input_6_40, input#input_6_40').each(function () {
            jQuery(this).attr('readonly', 'readonly');
        });




        // add to Cart Icon Jquery 
        // jQuery(".nav-menu li:last-child").appendTo(".Add_to_cat");





    });
</script>

<script>
    $('.vertual_slider_one').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        navText: ["<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-3.png'>", "<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/03/Arrow-4.png'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>


<script>
    $('.vertual_slider_one_mobile').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: true,
        navText: ["<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/04/1.png'>", "<img src='https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/04/2.png'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>

<script>
    jQuery(document).ready(function () {
        jQuery(".return-to-shop a").attr("href", "https://appwebmart.com/client/nokchoc/shop-now/")
    });
</script>



<!-- Account Login Link Change Jquery -->
<!-- <script>
	jQuery( ".woocommerce-MyAccount-navigation ul li:last-child" ).addClass( "myclass" );
</script>
 -->


</body>

</html>