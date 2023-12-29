<?php
/**
 * Product dynamic price elementor widget.
 */

class Elementor_Product_Dynamic_Price extends \Elementor\Widget_Base {

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'before',
			array(
				'label'       => esc_html__( 'Before', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your before symbol', 'textdomain' ),
			)
		);

		$this->add_control(
			'after',
			array(
				'label'       => esc_html__( 'After', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your after symbol', 'textdomain' ),
				'default'     => 'DZD',
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
		return 'landing_master_product_dynamic_price';
	}

	public function get_title() {
		return esc_html__( 'Dynamic Price', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-product-dynamic-price';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
        $price = get_field( 'price' );
        if(get_field('sale_price')){
            $price = get_field('sale_price');
        }
		echo $settings['before'] . ' <span class="dynamic-price">' . $price . '</span> ' . $settings['after'];
	}

	protected function content_template() {
		$price = get_field( 'price' );
        if(get_field('sale_price')){
            $price = get_field('sale_price');
        }
		?>
			{{settings.before}} <?php echo $price; ?> {{settings.after}}
		<?php
	}
}

