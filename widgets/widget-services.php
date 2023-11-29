<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class Widget_Services extends Widget_Base {

    public function get_name() {
        return 'services-widget';
    }

    public function get_title() {
        return __( 'Services', 'your-text-domain' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_services',
            [
                'label' => __( 'Services', 'your-text-domain' ),
            ]
        );
        
        $this->add_control(
            'services_list',
            [
                'label' => __( 'Services List', 'your-text-domain' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'service_image',
                        'label' => __( 'Image', 'your-text-domain' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'service_icon',
                        'label' => __( 'Icon', 'your-text-domain' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
                    ],
                    [
                        'name' => 'service_heading',
                        'label' => __( 'Heading', 'your-text-domain' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Service Heading', 'your-text-domain' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'service_description',
                        'label' => __( 'Description', 'your-text-domain' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Service Description', 'your-text-domain' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'service_read_more',
                        'label' => __( 'Read More', 'your-text-domain' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Read More', 'your-text-domain' ),
                        'label_block' => true,
                    ],
                    // Add more fields as needed
                ],
                'default' => [
                    [
                        'service_heading' => __( 'Service Heading', 'your-text-domain' ),
                        'service_description' => __( 'Service Description', 'your-text-domain' ),
                        'service_read_more' => __( 'Read More', 'your-text-domain' ),
                        // Set default values for fields
                    ],
                ],
                'title_field' => '{{{ service_heading }}}', // Field to display in the repeater control
            ]
        );
    
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $services_list = $settings['services_list'];
        $columns = $settings['columns'];
        ?>
        <div class="inx-services-widget">
            <?php foreach ($services_list as $index => $service) : ?>
                <div class="service-item">
                    <img src="<?= esc_attr($service['service_image']['url']); ?>" alt="<?= esc_attr($service['service_heading']); ?>">
                    <div class="service-content">
                        <?php
                        $service_icon = $service['service_icon'];
    
                        if (!empty($service_icon['value'])) : ?>
                            <span class="service-icon">
                                <i class="<?= esc_attr($service_icon['value']); ?>"></i>
                            </span>
                        <?php endif; ?>
                        <h3><?= esc_html($service['service_heading']); ?></h3>
                        <p><?= esc_html($service['service_description']); ?></p>
                        <a href="#" class="read-more"><?= esc_html($service['service_read_more']); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
    
}
