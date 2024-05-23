<section class="HOw-it-works" style="background-image: url(<?php the_field('work_background_image'); ?>);">
    <h2 class="sub-heading"><?php echo get_field('work_title');?></h2>
    <p class="paragraph"><?php echo get_field('work_description')?></p>
    <div class="container">
        <div class="Main-tabs">
            <?php
           
            $tabcount = 1;
            if (have_rows('how_it_work_tab')) : ?>
                <ul class="work_section">
                    <div class="tab">
                        <?php while (have_rows('how_it_work_tab')) : the_row(); ?>
                            <button class="tablinks <?php echo $tabcount == 1 ? 'active' : ''; ?>" data-tabcontent="tab-<?php echo $tabcount; ?>"><?php echo get_sub_field('tabs_button') ?></button>
                            <?php $tabcount++; ?>
                        <?php endwhile; ?>
                        
                    </div>
                    <div class="tab-container">
                        <?php $countent = 1;
                        while (have_rows('how_it_work_tab')) : the_row(); ?>
                            <?php  $image = get_sub_field('left_image'); ?>
                            <?php if (have_rows('tabs_inner_repeater')) : ?>
                                <div id="tab-<?php echo $countent; ?>" class="tabcontent <?php echo $countent == 1 ? 'active' : ''; ?>">
                                <div class="flex">
                                        <div class="tab-image">
                                            <?php 
                                            if( !empty( $image ) ): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                     <div class="tab-content">
                                    <?php $count = 1;
                                    while (have_rows('tabs_inner_repeater')) : the_row();
                                    ?>
                                 
                                    
                                        
                                           
                                                <div class="flex">
                                                    <div class="number">
                                                        <span class="numbers"><?php echo $count; ?></span>
                                                    </div>
                                                    <div class="number-content">
                                                        <h4><?php echo get_sub_field('tab_title'); ?></h4>
                                                        <p class="paragraph"><?php echo get_sub_field('tabs_description'); ?></p>
                                                    </div>
                                                </div>
                                            
                                     
                                    <?php $count++;
                                    endwhile; ?>   </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php $countent++; ?>
                        <?php endwhile; ?>
                    </div>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
