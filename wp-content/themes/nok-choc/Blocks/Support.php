<?php /* block markup */

// $current_user_id = get_current_user_id('ID');
// $user_data = get_userdata($current_user_id);

// Define the query arguments
$args = array(
    'post_type' => 'campaign', // Your custom post type
    // 'user_id' => $current_user_id,
    'posts_per_page' => -1, // Retrieve all posts
    'post_status' => 'publish',
);
// Instantiate the query
$the_query = get_posts($args);
?>

<!-- slider -->
<section class="slider" style="background-image: url(<?php the_field('support_background'); ?>);">
    <h2 class="sub-heading">
        <?php echo get_field('support_title'); ?>
    </h2>
    <p class="paragraph">
        <?php echo get_field('support_description'); ?>
    </p>

    <div class="container">
        <div class="home-demo">

            <?php if ($the_query): ?>
                <div class="owl-carousel owl-theme">
                    <?php foreach ($the_query as $post) {
                        setup_postdata($post);
                        // print_r($post);
                        $post_id = $post->ID;
                        $start_date = get_field('start_date', $post_id);
                        $end_date = get_field('end_date', $post_id);
                        $user_id = get_field('user_id', $post_id);
                        $leader_id = get_field('leader_id', $post_id);
                        $ref_link = get_field('ref_link', 'user_' . $user_id);
                        ?>
                        <div class="item">
                            <a href='https://appwebmart.com/client/nokchoc/my-virtual-store/?campain_code=<?php echo $ref_link ?>'>
                                <div class="slides-store">
                                    <?php
                                    if ($user_id): ?>
                                        <img class="aa" src="<?php echo esc_url(get_avatar_url($user_id)); ?>"
                                            alt="<?php echo esc_url(get_avatar_url($user_id)); ?>" />
                                    <?php endif ?>

                                    <div class="flex-store">
                                        <div class="slide-text">
                                            <h5>
                                                <?php echo ($post->display_name) ?>
                                            </h5>
                                            <p class="sub-text">
                                                Team's Total $
                                                <?php echo (get_field('fundraising_goal', $post_id)) ?>
                                            </p>
                                        </div>
                                        <div class="text">
                                            <h5>$
                                                <?php echo (get_field('team_fundraising_goal', $post_id)) ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>