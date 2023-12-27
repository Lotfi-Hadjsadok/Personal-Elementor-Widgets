<?php
/**
 * Product price elementor widget.
 */

class Elementor_Product_Title extends \Elementor\Widget_Base {

	protected function register_controls() {


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
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'selector' => '{{WRAPPER}}',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'selector' => '{{WRAPPER}}',
			)
		);

		


		$this->end_controls_section();
	}


	public function get_name() {
		return 'landing_master_product_title';
	}

	public function get_title() {
		return esc_html__( 'Product Title', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}

  
	protected function render() {
		echo get_the_title();
	}

	protected function content_template() {
		echo get_the_title();
	}
}
