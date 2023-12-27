<?php
/**
 * Product thumbnail elementor widget.
 */


class Elementor_Product_Thumbnail extends \Elementor\Widget_Base {

	public function get_name() {
		return 'landing_master_product_thumbnail';
	}

	public function get_title() {
		return esc_html__( 'Product Thumbnail', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return array( 'basic', 'landing-master' );
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Choose Image', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => get_the_post_thumbnail_url(),
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			array(
				'name'    => 'thumbnail',
				'default' => 'large',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			array(
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
			\Elementor\Group_Control_Css_Filter::get_type(),
			array(
				'name'     => 'custom_css_filters',
				'selector' => '{{WRAPPER}} img',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
	}

	protected function content_template() {
		?>
		<#
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.thumbnail_size,
				dimension: settings.thumbnail_custom_dimension,
				model: view.getEditModel()
			};
			var image_url = elementor.imagesManager.getImageUrl( image );
			
		#>
		<img src="{{ image_url }}">
		<?php
	}
    
}
