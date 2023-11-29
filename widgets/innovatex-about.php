<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class Innovatex_About extends Widget_Base
{


	public function get_name()
	{
		return 'about_us';
	}


	public function get_title()
	{
		return esc_html__('About Us', 'innovatex-addons');
	}


	public function get_icon()
	{
		return 'eicon-gallery-grid';
	}


	public function get_categories()
	{
		return ['innovatex-elements'];
	}

	public function get_keywords()
	{
		return ['Innovatex', 'Addon', 'About', 'Section'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__('Section Style', 'innovatex-addons'),
			]
		);

		$this->add_control(
			'select_design',
			[
				'label'   => esc_html__('Select Style', 'innovatex-addons'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'design-1' => esc_html__('Style 01', 'innovatex-addons'),
					'design-2' => esc_html__('Style 02', 'innovatex-addons'),
					'design-3' => esc_html__('Style 03', 'innovatex-addons'),
					'design-4' => esc_html__('Style 04', 'innovatex-addons'),
				],
				'default'      => 'design-1',
				'label_block'  => true,
			]
		);

		$this->add_control(
			'theme_shape',
			[
				'label'        => esc_html__( 'Element Shapes', 'innovatex-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'innovatex-addons' ),
				'label_off'    => esc_html__( 'Hide', 'innovatex-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_image',
			[
				'label' => esc_html__('About Image', 'innovatex-addons'),
			]
		);

		$this->add_control(
			'image_one',
			[
				'label' => esc_html__('Image One', 'innovatex-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_two',
			[
				'label' => esc_html__('Image Two', 'innovatex-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'about_content',
			[
				'label' => esc_html__('About Content', 'innovatex-addons'),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__('Sub Title', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('About Us', 'innovatex-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_one',
			[
				'label' => esc_html__('Title', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('our skilled Team grow your business', 'innovatex-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'description',
			[
				'label' => esc_html__('Content', 'innovatex-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('We are experts in Consulting business development', 'innovatex-addons'),
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Read More', 'innovatex-addons'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_url',
			[
				'label' => esc_html__('Button URL', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_attr__('http://google.com', 'innovatex-addons'),
			]
		);

		$this->add_control(
			'heading_five',
			[
				'label' => esc_html__('Questions', 'innovatex-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'select_design' => ['design-3'],
				],
			]
		);

		$this->add_control(
			'question_image',
			[
				'label' => esc_html__('Question Image', 'innovatex-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'select_design' => ['design-3'],
				],
			]
		);

		$this->add_control(
			'question_text',
			[
				'label' => esc_html__('Question Text', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Have queries? Click below link', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-3'],
				],
			]
		);

		$this->add_control(
			'question_details',
			[
				'label' => esc_html__('Question Title', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('FAQ', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-3'],
				],
			]
		);

		$this->add_control(
			'question_url',
			[
				'label' => esc_html__('Question URL', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__('http://google.com', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-3'],
				],
			]
		);

		$this->add_control(
			'heading_one',
			[
				'label' => esc_html__('Author Details', 'innovatex-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'select_design' => ['design-1', 'design-2'],
				],
			]
		);

		$this->add_control(
			'author_image',
			[
				'label' => esc_html__('Author Image', 'innovatex-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'select_design' => ['design-1', 'design-2'],
				],
			]
		);

		$this->add_control(
			'author_name',
			[
				'label' => esc_html__('Author Name', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Jhon Deo', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-1', 'design-2'],
				],
			]
		);

		$this->add_control(
			'author_details',
			[
				'label' => esc_html__('Author Details', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Founder CEO', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-1', 'design-2'],
				],
			]
		);

		$this->add_control(
			'heading_two',
			[
				'label' => esc_html__('Company Experience', 'innovatex-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'exper_counter',
			[
				'label' => esc_html__('Counter', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('14', 'innovatex-addons'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'company_exper',
			[
				'label' => esc_html__('Counter Content', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Years Experience Our Company', 'innovatex-addons'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_three',
			[
				'label' => esc_html__('Expert Team', 'innovatex-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'select_design' => ['design-1'],
				],
			]
		);

		$this->add_control(
			'team_counter',
			[
				'label' => esc_html__('Counter', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('150', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-1'],
				],
			]
		);

		$this->add_control(
			'team_text',
			[
				'label' => esc_html__('Counter Content', 'innovatex-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Expert Team members', 'innovatex-addons'),
				'label_block' => true,
				'condition' => [
					'select_design' => ['design-1'],
				],
			]
		);

		$this->add_control(
			'heading_four',
			[
				'label' => esc_html__('Features', 'innovatex-addons'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'after',
				'condition' => [
					'select_design' => ['design-1'],
				],
			]
		);

		$this->add_control(
			'features',
			[
				'label' => esc_html__('Feature List', 'innovatex-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'feature_title',
						'label' => esc_html__('Feature Title', 'innovatex-addons'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
				'condition' => [
					'select_design' => ['design-1'],
				],
				'default' => [
					[
						'feature_title' => esc_html__('Performing market research.', 'innovatex-addons'),
					],
					[
						'feature_title' => esc_html__('Providing information to a client.', 'innovatex-addons'),
					],
					[
						'feature_title' => esc_html__('Strategic planning.', 'innovatex-addons'),
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);


		$this->end_controls_section();
	}


	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$image_one = $settings['image_one'];
		$image_two = $settings['image_two'];
		$author_image = $settings['author_image'];
		$question_image = $settings['question_image'];

?>
		<?php if ('design-1' === $settings['select_design']) : ?>
			<div class="about__one dark__image">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-6 col-lg-6 lg-mb-30">
							<div class="about__one-left">
								<div class="about__one-left-image">
									<?php
									if ($image_one['url']) {
										if (!empty($image_one['alt'])) {
											echo '<img class="one" src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
										} else {
											echo '<img class="one" src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
									<?php
									if ($image_two['url']) {
										if (!empty($image_two['alt'])) {
											echo '<img class="two" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
										} else {
											echo '<img class="two" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
								</div>
								<div class="about__one-left-experience">
									<h1><span class="counter"><?php echo esc_html($settings['exper_counter']); ?></span><?php echo esc_html('+'); ?></h1>
									<h6><?php echo esc_html($settings['company_exper']); ?></h6>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<div class="about__one-right">
								<div class="about__one-right-title">
									<span class="subtitle-one"><?php echo esc_html($settings['sub_title']); ?></span>
									<h2><?php echo esc_html($settings['title_one']); ?></h2>
									<p><?php echo esc_html($settings['description']); ?></p>
								</div>
								<div class="about__one-right-btn">
									<div>
										<a class="btn-one" href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-chevron-double-right"></i></a>
									</div>
									<div class="about__one-right-btn-author">
										<div class="about__one-right-btn-author-avatar">
											<?php
											if ($author_image['url']) {
												if (!empty($author_image['alt'])) {
													echo '<img src="' . esc_url($author_image['url']) . '" alt="' . esc_attr($author_image['alt']) . '" />';
												} else {
													echo '<img src="' . esc_url($author_image['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
												}
											} ?>
										</div>
										<div class="about__one-right-btn-author-name">
											<span class="text-one"><?php echo esc_html($settings['author_name']); ?></span>
											<h6><?php echo esc_html($settings['author_details']); ?></h6>
										</div>
									</div>
								</div>
								<div class="about__one-right-bottom">
									<div class="about__one-right-bottom-list">
										<?php foreach ($settings['features'] as $feature) : ?>
											<span><i class="far fa-check"></i><?php echo esc_html($feature['feature_title']); ?></span>
										<?php endforeach; ?>
									</div>
									<div class="about__one-right-bottom-experience">
										<h3><span class="counter"><?php echo esc_html($settings['team_counter']); ?></span><?php echo esc_html('+'); ?></h3>
										<h6><?php echo esc_html($settings['team_text']); ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ('yes' === $settings['theme_shape']) : ?>
				<img class="about__one-shape-1 dark-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-1.png')); ?>" alt="shape-1">
				<img class="about__one-shape-1 light-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-1-dark.png')); ?>" alt="shape-1">
				<img class="about__one-shape-2 dark-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-2.png')); ?>" alt="shape-2">
				<img class="about__one-shape-2 light-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-2-dark.png')); ?>" alt="shape-2">
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ('design-2' === $settings['select_design']) : ?>
			<div class="about__two dark__image">
			    <?php if ('yes' === $settings['theme_shape']) : ?>
				<img class="about__two-shape dark-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about.png')); ?>" alt="shape">
				<img class="about__two-shape light-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-dark.png')); ?>" alt="shape">
				<?php endif; ?>
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-7 col-lg-6 lg-mb-30">
							<div class="row">
								<div class="col-6">
									<?php
									if ($image_one['url']) {
										if (!empty($image_one['alt'])) {
											echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
										} else {
											echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
								</div>
								<div class="col-6 mt-95 sm-mt-55">
									<?php
									if ($image_two['url']) {
										if (!empty($image_two['alt'])) {
											echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
										} else {
											echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
								</div>
							</div>
						</div>
						<div class="col-xl-5 col-lg-6">
							<div class="about__two-right">
								<div class="about__two-right-title">
									<span class="subtitle-two"><?php echo esc_html($settings['sub_title']); ?></span>
									<h2><?php echo esc_html($settings['title_one']); ?></h2>
									<p><?php echo esc_html($settings['description']); ?></p>
								</div>
								<div class="about__two-right-experience">
									<div class="about__two-right-experience-counter">
										<h1><span class="counter"><?php echo esc_html($settings['exper_counter']); ?></span><?php echo esc_html('+'); ?></h1>
									</div>
									<div>
										<h6><?php echo esc_html($settings['company_exper']); ?></h6>
									</div>
								</div>
								<div class="about__two-right-btn">
									<div>
										<a class="btn-six" href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-chevron-double-right"></i></a>
									</div>
									<div class="about__two-right-btn-author">
										<div class="about__two-right-btn-author-avatar">
											<?php
											if ($author_image['url']) {
												if (!empty($author_image['alt'])) {
													echo '<img src="' . esc_url($author_image['url']) . '" alt="' . esc_attr($author_image['alt']) . '" />';
												} else {
													echo '<img src="' . esc_url($author_image['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
												}
											} ?>
										</div>
										<div class="about__two-right-btn-author-name">
											<span class="text-one"><?php echo esc_html($settings['author_name']); ?></span>
											<h6><?php echo esc_html($settings['author_details']); ?></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ('design-3' === $settings['select_design']) : ?>
			<div class="about__three">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-5 col-lg-6 lg-mb-30">
							<div class="about__three-title">
								<span class="subtitle-three"><?php echo esc_html($settings['sub_title']); ?></span>
								<h2><?php echo esc_html($settings['title_one']); ?></h2>
								<p><?php echo esc_html($settings['description']); ?></p>
								<div class="about__three-title-faq">
									<div class="about__three-title-faq-icon">
										<?php
										if ($question_image['url']) {
											if (!empty($question_image['alt'])) {
												echo '<img class="icon-animation" src="' . esc_url($question_image['url']) . '" alt="' . esc_attr($question_image['alt']) . '" />';
											} else {
												echo '<img class="icon-animation" src="' . esc_url($question_image['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
											}
										}
										?>
									</div>
									<div class="about__three-title-faq-text">
										<span class="text-one"><?php echo esc_html($settings['question_text']); ?></span>
										<h6>
										   <?php if ('yes' === $settings['theme_shape']) : ?>
											<img class="dark-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/icon/hand.png')); ?>" alt="dark">
											<img class="light-n" src="<?php echo esc_url(get_theme_file_uri('assets/img/icon/hand-light.png')); ?>" alt="light">
											<?php endif;?>
											<a href="<?php echo esc_url($settings['question_url']); ?>"><?php echo esc_html($settings['question_details']); ?></a>
										</h6>
									</div>
								</div>
								<a class="btn-seven" href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-chevron-double-right"></i></a>
							</div>
						</div>
						<div class="col-xl-7 col-lg-6">
							<div class="about__three-right">
								<div class="about__three-right-image dark__image">
									<div class="about__three-right-image-one">
										<?php
										if ($image_one['url']) {
											if (!empty($image_one['alt'])) {
												echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
											} else {
												echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
											}
										}
										?>
									</div>
									<?php
									if ($image_two['url']) {
										if (!empty($image_two['alt'])) {
											echo '<img class="about__three-right-image-two" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
										} else {
											echo '<img class="about__three-right-image-two" src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
								</div>
								<div class="about__three-right-content">
									<div class="about__three-right-content-counter">
										<h1><span class="counter"><?php echo esc_html($settings['exper_counter']); ?></span><?php echo esc_html('k'); ?></h1>
									</div>
									<p><?php echo esc_html($settings['company_exper']); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ('design-4' === $settings['select_design']) : ?>
			<div class="about__company">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xxl-7 col-xl-6 xl-mb-30">
							<div class="about__company-left">
								<div class="about__company-left-image dark__image">
									<?php
									if ($image_one['url']) {
										if (!empty($image_one['alt'])) {
											echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr($image_one['alt']) . '" />';
										} else {
											echo '<img src="' . esc_url($image_one['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
									<?php
									if ($image_two['url']) {
										if (!empty($image_two['alt'])) {
											echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr($image_two['alt']) . '" />';
										} else {
											echo '<img src="' . esc_url($image_two['url']) . '" alt="' . esc_attr(__('No alt text', 'innovatex-addons')) . '" />';
										}
									}
									?>
								</div>
								<div class="about__company-left-experience">
									<h2><span class="counter"><?php echo esc_html($settings['exper_counter']); ?></span><?php echo esc_html('+'); ?></h2>
									<h6><?php echo esc_html($settings['company_exper']); ?></h6>
								</div>
							</div>
						</div>
						<div class="col-xxl-5 col-xl-6">
							<div class="about__company-right">
								<div class="about__company-right-title">
									<span class="subtitle-one"><?php echo esc_html($settings['sub_title']); ?></span>
									<h2><?php echo esc_html($settings['title_one']); ?></h2>
									<p><?php echo esc_html($settings['description']); ?></p>
									<a class="btn-one" href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="far fa-chevron-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ('yes' === $settings['theme_shape']) : ?>
				<img class="about__one-shape-1" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-1.png')); ?>" alt="shape-1">
				<img class="about__one-shape-2" src="<?php echo esc_url(get_theme_file_uri('assets/img/shape/about-2.png')); ?>" alt="shape-2">
				<?php endif; ?>
			</div>
		<?php endif; ?>

<?php
	}
}