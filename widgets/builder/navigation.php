<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Widget_Navigation extends Widget_Base
{
    public function get_name()
    {
        return 'innovatex-menu';
    }

    public function get_title()
    {
        return esc_html__('Navigation Menu', 'your-text-domain');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return ['innovatex-builder'];
    }

    public function get_keywords()
    {
        return ['Innovatex', 'Menu', 'Builder', 'Header', 'Custom'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Navigation Menu', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select a Menu', 'your-text-domain'),
                'type' => Controls_Manager::SELECT2,
                'options' => [
					'1' => esc_html__( 'Style 1', 'innovatex' ),
					'2' => esc_html__( 'Style 2', 'innovatex' ),
					'3' => esc_html__( 'Style 3', 'innovatex' ),
					'4' => esc_html__( 'Style 4', 'innovatex' ),
				],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_content',
            [
                'label' => esc_html__('Mobile Content', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose logo', 'your-text-domain'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'your-text-domain'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu_align',
            [
                'label' => esc_html__('Alignment', 'your-text-domain'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'your-text-domain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'your-text-domain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'your-text-domain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .custom-menu-alignment' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__('Menu Color', 'your-text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ele_header__area-menubar-center-menu ul li > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ele_header__area-menubar-center-menu ul li > a::before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_space',
            [
                'label' => esc_html__('Menu Space', 'your-text-domain'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ele_header__area-menubar-center-menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'menu_height',
            [
                'label' => esc_html__('Menu Height', 'your-text-domain'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ele_header__area-menubar-center-menu ul li > a' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_nav',
            [
                'label' => esc_html__('Mobile Nav', 'your-text-domain'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'mobile_menu_align',
            [
                'label' => esc_html__('Alignment', 'your-text-domain'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'your-text-domain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'your-text-domain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'your-text-domain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .custom-menu-mobile-nav' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mobile_nav_color',
            [
                'label' => esc_html__('Icon Color', 'your-text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu_bar i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $logo = $settings['image'];

        ?>
        <!-- Header Area Start -->
        <div class="ele_header__area">
            <div class="ele_header__area-menubar-center-menu menu-responsive-elementor custom-menu-alignment">
                <?php 
                // wp_nav_menu(
                //     array(
                //         'menu' => $settings['nav_menu'],
                //         'menu_id' => 'mobilemenu',
                //         'menu_class' => 'd-block',
                //     )
                // ); 
                ?>
            </div>

            <div class="ele_header__area-menubar-right">
                <div class="menu_bar custom-menu-mobile-nav">
                    <i class="fal fa-bars"></i>
                </div>
            </div>

            <div class="menu_bar-popup">
                <div class="menu_bar-popup-close"><i class="fal fa-times"></i></div>
                <?php if (!empty($logo['url'])): ?>
                    <div class="menu_bar-popup-logo">
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="logo">
                    </div>
                <?php endif; ?>
                <div class="responsive-menu-elementor"></div>
            </div>
        </div>
        <!-- Header Area End -->

        <?php
    }
}