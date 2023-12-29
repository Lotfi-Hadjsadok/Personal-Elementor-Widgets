<?php
/**
 * Product order form elementor widget.
 */


class Elementor_Product_Order_Form extends \Elementor\Widget_Base {

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'input_label',
			array(
				'label' => esc_html__( 'Label', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'input_placeholder',
			array(
				'label' => esc_html__( 'Placeholder', 'textdomain' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'input_classes',
			array(
				'label'       => esc_html__( 'Classes', 'textdomain' ),
                'description'=>'states_ar , states_fr',
				'placeholder' => 'states',
				'type'        => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'input_type',
			array(
				'label'   => esc_html__( 'Input Type', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'text',
				'options' => array(
					'text'   => esc_html__( 'Text', 'textdomain' ),
					'number'   => esc_html__( 'Number', 'textdomain' ),
					'tel'   => esc_html__( 'Phone', 'textdomain' ),
					'select' => esc_html__( 'Select', 'textdomain' ),
				),
			)
		);

			$repeater->add_control(
				'select_options',
				array(
					'label'       => esc_html__( 'Options', 'textdomain' ),
					'placeholder' => 'option1,option2,option3,...',
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'default'     => '',
					'condition'   => array(
						'input_type' => 'select',
					),
				)
			);

			$repeater->add_control(
				'number_min',
				array(
					'label'       => esc_html__( 'Min', 'textdomain' ),
					'default' => '1',
					'type'        => \Elementor\Controls_Manager::NUMBER,
					'condition'   => array(
						'input_type' => 'number',
					),
				)
			);

			$repeater->add_control(
				'number_max',
				array(
					'label'       => esc_html__( 'Max', 'textdomain' ),
					'default' => '100',
					'type'        => \Elementor\Controls_Manager::NUMBER,
					'condition'   => array(
						'input_type' => 'number',
					),
				)
			);

		$repeater->add_control(
			'input_required',
			array(
				'label'        => esc_html__( 'Required?', 'textdomain' ),
				'placeholder'  => 'states',
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( '', 'textdomain' ),
				'label_off'    => esc_html__( '', 'textdomain' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'form',
			array(
				'label'         => esc_html__( 'Form', 'textdomain' ),
				'type'          => \Elementor\Controls_Manager::REPEATER,
				'prevent_empty' => true,
				'fields'        => $repeater->get_controls(),
				'default'       => array(
					array(
						'input_label'       => esc_html__( 'Name', 'textdomain' ),
						'input_placeholder' => 'Name',
						'input_required'    => 'yes',
						'input_classes'     => '',

					),
					array(
						'input_label'       => esc_html__( 'Phone Number', 'textdomain' ),
						'input_placeholder' => 'Phone Number',
						'input_required'    => 'yes',
						'input_classes'     => '',

					),
					array(
						'input_label'       => esc_html__( 'Sate', 'textdomain' ),
						'input_placeholder' => 'States',
						'input_classes'     => 'states',
						'input_required'    => 'yes',
					),
					array(
						'input_label'       => esc_html__( 'City', 'textdomain' ),
						'input_placeholder' => 'Cities',
						'input_classes'     => 'cities',
						'input_required'    => 'yes',
					),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			array(
				'label' => esc_html__( 'Button Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} button' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} button',
			)
		);

		$this->add_control(
			'color',
			array(
				'label'     => esc_html__( 'Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} button' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'selector' => '{{WRAPPER}} button',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'selector' => '{{WRAPPER}} button',
			)
		);
		$this->add_control(
			'button_border_radius',
			array(
				'label'     => esc_html__( 'Button border radius', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'step'      => 1,
				'default'   => 0,
				'selectors' => array(
					'{{WRAPPER}} button' => 'border-radius: {{VALUE}}px;',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_shadow',
				'selector' => '{{WRAPPER}} button',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_2',
			array(
				'label' => esc_html__( 'Input Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_2',
				'selector' => '{{WRAPPER}} input,{{WRAPPER}} select',
			)
		);

		$this->add_control(
			'color_2',
			array(
				'label'     => esc_html__( 'Text Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} input,{{WRAPPER}} select' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background_2',
				'selector' => '{{WRAPPER}} input,{{WRAPPER}} select',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'border_2',
				'selector' => '{{WRAPPER}} input,{{WRAPPER}} select',
			)
		);
		$this->add_control(
			'input_border_radius_2',
			array(
				'label'     => esc_html__( 'Input border radius', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 0,
				'step'      => 1,
				'default'   => 0,
				'selectors' => array(
					'{{WRAPPER}} input, {{WRAPPER}} select' => 'border-radius: {{VALUE}}px;',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_shadow_2',
				'selector' => '{{WRAPPER}} input,{{WRAPPER}} select',
			)
		);

		$this->end_controls_section();
	}

	public function get_name() {
		return 'landing_master_order_form';
	}

	public function get_title() {
		return esc_html__( 'Order Form', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['form'] ) {
			echo '<form method="POST" class="order_form" action="' . admin_url( 'admin-post.php' ) . '">';
            echo '<input type="hidden" name="action" value="landing_master_order">';
            echo '<input type="hidden" name="total_price">';
            echo '<input type="hidden" name="Product Title" value="'.get_the_title().'">';
			foreach ( $settings['form'] as $input ) {
                if($input['input_type'] == 'select'){
                    echo '<select class="elementor-repeater-item-' . $input['_id'] . ' ' . $input['input_classes'] . '" name="' . $input['input_label'] . '"'.( $input['input_required'] == 'yes' ? ' required' : '' ).'  >
                    <option value="" selected disabled>'.$input['input_placeholder'].'</option>';
                    foreach(explode(',',$input['select_options']) as $option){
                       echo '<option value="'.$option.'">'.$option.'</option>';
                    }
                    echo '</select>';
                }else{
                    echo '<input '.($input['input_type'] == 'number' ? 'min="'.$input['number_min'].'" max="'.$input['number_max'].'"' : '').'  type="'.$input['input_type'].'" 
                    class="elementor-repeater-item-' . $input['_id'] . ' ' . $input['input_classes'] . '" name="' . $input['input_label'] . '" placeholder="' . $input['input_placeholder'] . '"' .
                    ( $input['input_required'] == 'yes' ? ' required' : '' ) .
                    ' >';
                }
			}
			echo '<button>Buy Now</button>';
			echo '</form>';
		}
	}
	protected function content_template() {
		?>
		<# if ( settings.form.length ) { #>
		<form method="POST" class="order_form" action="<?php echo admin_url( 'admin-post.php' ); ?>">
            <input type="hidden" name="action" value="landing_master_order">
            <input type="hidden" name="total_price">
			<# _.each( settings.form, function( item ) { #>
            <# if(item.input_type == 'select'){ #>
                <select  class="elementor-repeater-item-{{item._id}}" name="{{{item.input_label}}}" >
                <option value="" selected disabled>{{{item.input_placeholder}}}</option>
                <# _.each( item.select_options.split(','), function( option ) { #>
                    <option value="{{{option}}}">{{{option}}}</option>
                <# }) #>
                </select>
            <# }else{ #>
                <input type="{{{item.input_type}}}"   class="elementor-repeater-item-{{item._id}}"  name="{{{item.input_label}}}" placeholder="{{{item.input_placeholder}}}">
            <# } #>
			<# }) #>
			<button type="button">Buy Now</button>
		</form>
		<# } #>
		
		<?php
	}
}
