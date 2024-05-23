<?php
// get_header("");
echo '
<div class="dasboard_section">

    <div class="dasboard_content">
        <div class="das_headline_text">
            <h1>DASHBOARD</h1>
        </div>

        <div class="compaign_section">
            <div class="das_flex">
                <div class="camp_text">
                    <h2>Campaigns</h2>
                </div>
                <div class="create_new_camp"><a href="#"><img
                    src="https://appwebmart.com/client/nokchoc/wp-content/uploads/2024/02/Vector.png">
                    <span>Create New Campaign</span></a>
                </div>
            </div>
        </div>
        <div class="dasboard_contant_area">
            <div class="dashboard_box_flex">';
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

// Check if there are posts
if ($the_query) {
    // Start the loop
    foreach ($the_query as $post) {
        setup_postdata($post);
        // $query->the_post();
        $post_id = $post->ID;
        $start_date = get_field('start_date', $post_id);
        $end_date = get_field('end_date', $post_id);
        $user_id = get_field('user_id', $post_id);
        $leader_id = get_field('leader_id', $post_id);

        $status = (strtotime($end_date) - strtotime($start_date) > 0) ? 'Live' : 'End';
        echo '<div class="dasboard_box">
                                <h3>Stanford 2009</h3>
                                <div class="das_date"><span>' . $start_date . ' – ' . $end_date . '</span></div>
                                <div class="dash_store">12 Stores</div>
                                <div class="das_total">
                                    <span><strong>$1,300</strong>Raised</span>
                                    <span class="' . $status . '_stock"><a href="#">' . $status . '</a></span>
                                    <span class="live_stock"><a href="#">' . $status . '</a></span>
                                </div>
                            </div>';
    }
    // Restore original post data
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No campaigns found.';
}
echo '
            </div>
        </div>
    </div>

</div>';
?>

<?php
// get_footer("");  ?>