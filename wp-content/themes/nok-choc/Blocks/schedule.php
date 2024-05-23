<?php /* block markup */ ?>

<!-- schedule -->
<section class="Schedule">
    <h2 class="sub-heading">
        <?php echo get_field('schedule_title'); ?>
    </h2>
    <?php
    $schedule_button = get_field('schedule_button');
    if ($schedule_button):
        $schedule_button_url = $schedule_button['url'];
        $schedule_button_title = $schedule_button['title'];
        $schedule_button_target = $schedule_button['target'] ? $schedule_button['target'] : '_self';
        $current_user_id = get_current_user_id('ID');
        // https://appwebmart.com/client/nokchoc/get-started-fundraising/
        ?>
        <a class="button"
            href="<?php if ($current_user_id):
                echo esc_url($schedule_button_url); else:
                echo esc_url('https://appwebmart.com/client/nokchoc/get-started-fundraising/'); endif; ?>"
            target="<?php echo esc_attr($schedule_button_target); ?>">
            <?php echo esc_html($schedule_button_title); ?>
        </a>
    <?php endif; ?>
</section>
