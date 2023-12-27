<?php
/**
 * Product categories elementor widget.
 */

class Elementor_Product_Categories extends \Elementor\Widget_Base {
	public function get_name() {
		return 'landing_master_product_categories';
	}

	public function get_title() {
		return esc_html__( 'Product Categories', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-product-categories';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_Content',
			array(
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);


        $this->add_control(
			'before',
			array(
				'label'       => esc_html__( 'before', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your before', 'textdomain' ),
			)
		);


		$this->add_control(
			'separator',
			array(
				'label'       => esc_html__( 'separator', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your separator', 'textdomain' ),
				'default'     => '-',
			)
		);

		

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

        $this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}}',
			)
		);

        $this->add_control(
			'color',
			array(
				'label'     => esc_html__( 'Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}' => 'color: {{VALUE}}',
				),
			)
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'selector' => '{{WRAPPER}}',
			)
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'selector' => '{{WRAPPER}}',
			)
		);

		$this->end_controls_section();

	}

    protected function render() {
        $settings = $this->get_settings_for_display();
        $categories = get_the_category();
        if ($categories) {
            $cats = $settings['before'];
            foreach ($categories as $category) {
                $cats .= $category->name . ' ' .$settings['separator'].' ';
            }
            $cats = substr($cats, 0, -2);
            echo $cats;
        } else {
            echo 'No categories found.';
        }
	}

	protected function content_template() {
        $categories = get_the_category();
        if ($categories) {
            $cats = '{{settings.before}}';
            foreach ($categories as $category) {
                $cats .= $category->name . " {{settings.separator}} "; 
            }
            $cats = substr($cats, 0, -23);
            echo $cats;
        } else {
            echo 'No categories found.';
        }
	}
}
