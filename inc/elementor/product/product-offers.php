<?php
/**
 * Product Offers elementor widget.
 */

class Elementor_Product_Offers extends \Elementor\Widget_Base {

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'offer_label',
			array(
				'label' => esc_html__( 'Label', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'offer_price',
			array(
				'label' => esc_html__( 'Price', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'offer_sale_price',
			array(
				'label' => esc_html__( 'Sale Price', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'before_price',
			array(
				'label'   => esc_html__( 'Before Price', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->add_control(
			'after_price',
			array(
				'label'   => esc_html__( 'After Price', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'DZD',
			)
		);

		$this->add_control(
			'offers',
			array(
				'label'         => esc_html__( 'Offers', 'textdomain' ),
				'type'          => \Elementor\Controls_Manager::REPEATER,
				'prevent_empty' => true,
				'fields'        => $repeater->get_controls(),
                'default'=>array(
                    'offer_label'=>'Order 1',
                    'offer_price'=>get_field('price'),
                    'offer_sale_price'=>get_field('sale_price')
                ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Radio Container', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'checkmark_size',
			array(
				'label'      => esc_html__( 'Size', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'default'    => array(
					'unit' => 'px',
					'size' => 25,
				),
				'selectors'  => array(
					'.radio_container .checkmark' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'checkmark_inside_size',
			array(
				'label'      => esc_html__( 'Size point', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'default'    => array(
					'unit' => 'px',
					'size' => 8,
				),
				'selectors'  => array(
					'.radio_container .checkmark:after' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);

        $this->add_control(
			'color_4',
			array(
				'label'     => esc_html__( 'Radio Background', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .checkmark' => 'background: {{VALUE}}',
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
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_shadow',
				'selector' => '{{WRAPPER}}',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_4',
			array(
				'label' => esc_html__( 'Radio Label', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .radio_label',
			)
		);

		$this->add_control(
			'color_5',
			array(
				'label'     => esc_html__( 'Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radio_label' => 'Color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'padding',
			array(
				'label'      => esc_html__( 'Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .radio_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'border_4',
				'selector' => '{{WRAPPER}} .radio_container',
			)
		);

		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_1',
			array(
				'label' => esc_html__( 'Radio Price', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'color_1',
			array(
				'label'     => esc_html__( 'Colors', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .offer_price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_1',
				'selector' => '{{WRAPPER}} .offer_price',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_3',
			array(
				'label' => esc_html__( 'Radio Price With Sale', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'color_3',
			array(
				'label'     => esc_html__( 'Colors', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .with_sale_price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_3',
				'selector' => '{{WRAPPER}} .with_sale_price',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_2',
			array(
				'label' => esc_html__( 'Radio Sale Price', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_4',
				'selector' => '{{WRAPPER}} .offer_sale_price',
			)
		);

		$this->add_control(
			'color_2',
			array(
				'label'     => esc_html__( 'Colors', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .offer_sale_price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_2',
				'selector' => '{{WRAPPER}} .offer_sale_price',
			)
		);
		$this->end_controls_section();
	}

	public function get_name() {
		return 'landing_master_product_offers';
	}

	public function get_title() {
		return esc_html__( 'Offers', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-tags';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['offers'] ) :
			foreach ( $settings['offers'] as $key => $input ) :
				?>
			<label class="radio_container">
				<span class="radio_label"><?php echo $input['offer_label']; ?></span>
				<input class="product_offer" data-sale_price="<?php echo $input['offer_sale_price']?>" type="radio" <?php echo checked( $key, 0 ); ?> value="<?php echo $input['offer_price']; ?>" name="offer">
				<div class="prices">
					<span class="offer_price <?php echo $input['offer_sale_price'] ? 'with_sale_price' : ''; ?>"><?php echo $settings['before_price'] . ' ' . $input['offer_price'] . ' ' . $settings['after_price']; ?></span>
					<?php if ( $input['offer_sale_price'] ) : ?>
					<span class="offer_sale_price"><?php echo $settings['before_price'] . ' ' . $input['offer_sale_price'] . ' ' . $settings['after_price']; ?></span>
					<?php endif; ?>
				</div>
				<span class="checkmark"></span>
			</label>
				<?php
		endforeach;
		endif;
	}

	protected function content_template() {
		?>
		<# if ( settings.offers.length ) { #>
			<# _.each( settings.offers, function( item,key ) { #>
				<label class="radio_container">
					<div class="radio_label">{{{item.offer_label}}}</div>
					<input class="product_offer" data-sale_price="{{item.offer_sale_price}}" type="radio" value="{{{item.offer_price}}}" name="offer" {{key === 0 ? 'checked' : ''}} >
					<div class="prices">
                    <# if(item.offer_price){ #>
						<span class="offer_price {{item.offer_sale_price ? 'with_sale_price' : ''}}">{{{settings.before_price}}} {{{item.offer_price}}} {{{settings.after_price}}}</span>
					<# } #>
						
						<# if(item.offer_sale_price){ #>
						<span class="offer_sale_price">{{{settings.before_price}}} {{{item.offer_sale_price}}} {{{settings.after_price}}}</span>
						<# } #>
					</div>
					<span class="checkmark"></span>
				</label>
			<#})#>
		<# }  #>
				<?php
	}
}

