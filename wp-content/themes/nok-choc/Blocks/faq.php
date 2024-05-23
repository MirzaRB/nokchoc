<?php /* block markup */ ?>

<div class="faq_section">
    <div class="container">
        <div class="main_heading">
            <h2 class="sub-heading center_head"><?php echo get_field("mian_title"); ?></h2>
        </div>
    <div class="accordins">
        <?php if( have_rows('accordins') ): ?>
    <div class="">
    <?php while( have_rows('accordins') ): the_row(); 
        ?>

        <div>
            <h3 class="accordins_main_title"><?php the_sub_field('heading'); ?></h3>
        </div>

        <?php if( have_rows('inner_accordins') ): ?>
        <div class="content">
        <?php while( have_rows('inner_accordins') ): the_row(); 
        ?>
        <div class="acc__card">
        <h4 class="acc__title"><?php the_sub_field('accordins_title'); ?></h4>
        <p class="acc__panel"><?php the_sub_field('accordins_description'); ?></p>
        </div>
        <?php endwhile; ?>
        </div>
        <?php endif; ?>

    <?php endwhile; ?>
        </div>
<?php endif; ?>

        </div>
    </div>
</div>
