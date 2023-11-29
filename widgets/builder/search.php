<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit;

class Widget_Search extends Widget_Base
{
    public function get_name()
    {
        return 'innovatex-search';
    }

    public function get_title()
    {
        return esc_html__('Search', 'your-text-domain');
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
        return ['Innovatex', 'Toolkit', 'Search', 'Icon', 'header'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Section Content', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Placeholder', 'your-text-domain'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search...', 'your-text-domain'),
                'label_block' => true,
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
                'default' => 'right',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .header__area-menubar-right-box-search' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'search_color',
            [
                'label' => esc_html__('Icon Color', 'your-text-domain'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header__area-menubar-right-box-search-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="header__area-menubar-right-box-search">
            <div class="search">
                <span class="header__area-menubar-right-box-search-icon open"><i class="fal fa-search"></i></span>
            </div>
            <div class="header__area-menubar-right-box-search-box">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" placeholder="<?php echo esc_attr($settings['btn_text']); ?>"
                        value="<?php the_search_query(); ?>" name="s">
                    <button value="Search" type="submit"><i class="fal fa-search"></i>
                    </button>
                </form>
                <span class="header__area-menubar-right-box-search-box-icon"><i class="fal fa-times"></i></span>
            </div>
        </div>
        <?php
    }
}