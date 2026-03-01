<?php
/**
 * Plugin Name: City Budget Dashboard Embed
 * Description: Embeds the City Budget Healthcare Impact Dashboard with a shortcode.
 * Version: 1.0.0
 * Author: jbutler1079
 */

if (!defined('ABSPATH')) {
    exit;
}

function cbd_render_dashboard_shortcode($atts = array()) {
    $atts = shortcode_atts(
        array(
            'height' => '2200',
            'class' => '',
            'max_width' => 'none',
            'full_bleed' => 'no'
        ),
        $atts,
        'city_budget_dashboard'
    );

    $height = preg_replace('/[^0-9]/', '', (string) $atts['height']);
    if ($height === '') {
        $height = '2200';
    }

    $extra_class = sanitize_html_class((string) $atts['class']);
    $container_class = trim('city-budget-dashboard-embed ' . $extra_class);

    $max_width = trim((string) $atts['max_width']);
    if ($max_width === '') {
        $max_width = 'none';
    }

    $full_bleed = strtolower(trim((string) $atts['full_bleed'])) === 'yes';

    $container_style = 'width:100%;max-width:' . esc_attr($max_width) . ';margin:0 auto;';
    if ($full_bleed) {
        $container_style = 'width:100vw;max-width:100vw;margin-left:calc(50% - 50vw);margin-right:calc(50% - 50vw);';
    }

    $dashboard_url = plugins_url('full-dashboard.html', __FILE__);

    ob_start();
    ?>
        <div class="<?php echo esc_attr($container_class); ?>" style="<?php echo esc_attr($container_style); ?>">
      <iframe
        src="<?php echo esc_url($dashboard_url); ?>"
        title="City Budget Healthcare Impact Dashboard"
        style="width:100%;height:<?php echo esc_attr($height); ?>px;border:0;display:block;overflow:auto;"
        loading="lazy"
        scrolling="yes"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
    <?php

    return (string) ob_get_clean();
}
add_shortcode('city_budget_dashboard', 'cbd_render_dashboard_shortcode');
