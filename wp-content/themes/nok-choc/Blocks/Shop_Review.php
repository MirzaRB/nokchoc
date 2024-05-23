<?php /* block markup */ ?>


<div class="shop_review" style="background-image: url(<?php the_field('section_background'); ?>);">
    <div class="container">
        <div><h2 class="sub-heading"><?php echo get_field("review_heading");?></h2></div>

        <div class="main_reviews">
<?php if( have_rows('reviews') ): ?>
    <div class="flex">
    <?php while( have_rows('reviews') ): the_row(); 
        ?>
        <div class="reviews">
            <p><?php the_sub_field('review_description'); ?></p>
            <h6><?php the_sub_field('review_title')?></h6>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>

</div>




    </div>
</div>