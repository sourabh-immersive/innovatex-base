<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class Services_Widget extends \Elementor\Widget_Base {

public function get_name() {
    return 'custom-services-widget';
}

public function get_title() {
    return __('Custom Services Widget', 'text-domain');
}

public function get_icon() {
    return 'eicon-posts-grid';
}

public function get_categories() {
    return ['basic'];
}

protected function render() {
    $settings = $this->get_settings_for_display();

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $settings['posts_per_page'],
        'category_name' => $settings['category'],
        'paged' => get_query_var('paged') ?: 1,
    ];

    $services_query = new WP_Query($args);

    if ($services_query->have_posts()) {
        echo '<div class="custom-services">';
        while ($services_query->have_posts()) {
            $services_query->the_post();
            echo '<div class="service-item">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '<a href="' . get_permalink() . '">Read more</a>';
            echo '</div>';
        }
        echo '</div>';

        // Pagination
        echo '<div class="custom-pagination">';
        echo paginate_links(['total' => $services_query->max_num_pages]);
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'No services found.';
    }
}

protected function _register_controls() {
    // Widget control options
    $this->start_controls_section(
        'section_content',
        [
            'label' => __('Settings', 'text-domain'),
        ]
    );

    $this->add_control(
        'posts_per_page',
        [
            'label' => __('Posts Per Page', 'text-domain'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 4,
        ]
    );

    $this->add_control(
        'columns',
        [
            'label' => __('Columns', 'text-domain'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ],
        ]
    );

    // Dynamic category selection
    $categories = get_categories([
        'taxonomy' => 'category',
        'hide_empty' => false,
    ]);
    $categories_options = [];
    foreach ($categories as $category) {
        $categories_options[$category->slug] = $category->name;
    }

    $this->add_control(
        'category',
        [
            'label' => __('Select Category', 'text-domain'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => $categories_options,
        ]
    );

    $this->end_controls_section();
}

}