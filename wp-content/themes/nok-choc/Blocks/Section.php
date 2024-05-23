<?php /* block markup */ 

	$image = get_field('background');?>
    <!-- Fundraising made easy -->
    <section class="Fundraising" style="background-image: url('<?php echo wp_get_attachment_image_url($image, 'full'); ?>')">
        <h2 class="sub-heading"><?php echo get_field("title"); ?></h2>
        <p class="paragraph"><?php echo get_field('description'); ?></p>
        
        <div class="container">

        <?php if( have_rows('fundraising_made_easy') ): ?>
    <div class="flex">
    <?php while( have_rows('fundraising_made_easy') ): the_row(); 
        $images = get_sub_field('box_icon');
        ?>
        <div class="columns">
                    <?php 
                    $images = get_sub_field('box_icon');
                    if( !empty( $images ) ): ?>
                    <img src="<?php echo esc_url($images['url']); ?>" alt="<?php echo esc_attr($images['alt']); ?>" />
                    <?php endif; ?>
                    <h3><?php the_sub_field('box_title')?></h3>
                    <p class="sub-text"><?php the_sub_field('box_description')?></p>
        </div>
    <?php endwhile; ?>
        </div>
<?php endif; ?>



        </div>

        
    </section>
