<?php

GFForms::include_addon_framework();

class GFSliderFieldAddOn extends GFAddOn {

	protected $_version = GF_SLIDER_FIELD_ADDON_VERSION;
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'gravity-forms-slider';
	protected $_path = 'gravity-forms-slider/gravity-forms-slider.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Gravity Forms Slider Field Add-On';
	protected $_short_title = 'Slider Field Add-On';

	/**
	 * @var object $_instance If available, contains an instance of this class.
	 */
	private static $_instance = null;

	/**
	 * Returns an instance of this class, and stores it in the $_instance property.
	 *
	 * @return object $_instance An instance of this class.
	 */
	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
			/**
	 * Include the field early so it is available when entry exports are being performed.
	 */
	public function pre_init() {
		parent::pre_init();
		if ( $this->is_gravityforms_supported() && class_exists( 'GF_Field' ) ) {
			require_once( 'includes/class-slider-gf-field.php' );
		}
	}
	

	public function init_admin() {
		parent::init_admin();
		add_filter( 'gform_tooltips', array( $this, 'tooltips' ) );
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_min' ), 10, 2 );
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_max' ), 10, 2 );
		
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_px' ), 10, 2 );
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_sx' ), 10, 2 );
		
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_step' ), 10, 2 );
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_cp' ), 10, 2 );
		
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_str' ), 10, 2 );
		add_action( 'gform_field_standard_settings', array( $this, 'field_appearance_settings_stri' ), 10, 2 );
	}
	
	
	


	// # SCRIPTS & STYLES -----------------------------------------------------------------------------------------------

	/**
	 * Include my_script.js when the form contains a 'simple' type field.
	 *
	 * @return array
	 */
	public function scripts() {
		$scripts = array(
			array(
				'handle'  => 'wp_range_slider_js',
				'src'     => $this->get_base_url() . '/js/rangeslider.js',
				'version' => $this->_version,
				'deps'    => array( 'jquery' ),
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) ),
				),
			),

		);

		return array_merge( parent::scripts(), $scripts );
	}

	/**
	 * Include my_styles.css when the form contains a 'simple' type field.
	 *
	 * @return array
	 */
	public function styles() {
		$styles = array(
			array(
				'handle'  => 'wpg_range_slider_css',
				'src'     => $this->get_base_url() . '/css/rangeslider.css',
				'version' => $this->_version,
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) )
				)
			)
		);

		return array_merge( parent::styles(), $styles );
	}


	// # FIELD SETTINGS -------------------------------------------------------------------------------------------------

	/**
	 * Add the tooltips for the field.
	 *
	 * @param array $tooltips An associative array of tooltips where the key is the tooltip name and the value is the tooltip.
	 *
	 * @return array
	 */
		
	public function tooltips( $tooltips ) {
		$simple_tooltips = array(
			'min_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Minimum Value', 'sliderfieldaddon' ), esc_html__( 'Set Minimum Value for Slider.', 'sliderfieldaddon' ) ),
			'max_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Maximum Value', 'sliderfieldaddon' ), esc_html__( 'Set Maximum Value for Slider.', 'sliderfieldaddon' ) ),
			'step_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Step Value', 'sliderfieldaddon' ), esc_html__( 'Set Step Value for Slider.', 'sliderfieldaddon' ) ),
			'cp_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Slider Color', 'sliderfieldaddon' ), esc_html__( 'Set the Color for Slider.', 'sliderfieldaddon' ) ),
			'px_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Prefix', 'sliderfieldaddon' ), esc_html__( 'Set the prefix for Slider.', 'sliderfieldaddon' ) ),
			'sx_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Suffix', 'sliderfieldaddon' ), esc_html__( 'Set the prefix for Slider.', 'sliderfieldaddon' ) ),
			'str_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Text Values', 'sliderfieldaddon' ), esc_html__( 'Set the text values for Slider. <strong>e.g Bad, Good, Excellent, Brilliant</strong>', 'sliderfieldaddon' ) ),
			'stri_value_setting' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Submit Text Values', 'sliderfieldaddon' ), esc_html__( 'Use text values on submission', 'sliderfieldaddon' ) ),
		);

		return array_merge( $tooltips, $simple_tooltips );
	}

	/**
	 * Add the custom setting for the Simple field to the Appearance tab.
	 *
	 * @param int $position The position the settings should be located at.
	 * @param int $form_id The ID of the form currently being edited.
	 */
	
	
	
	public function field_appearance_settings_px( $position, $form_id ) {
	
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?><div style="float:left; display:inline-block;">
				<li class="px_value_setting field_setting">
					<label for="px_value_setting" class="section_label">
						<?php esc_html_e( 'Prefix', 'sliderfieldaddon' ); ?>
						<?php gform_tooltip( 'px_value_setting' ) ?>
					</label>
					<input id="px_value_setting" type="text" class="fieldwidth-6" onkeyup="SetPXValueSetting(jQuery(this).val());" onchange="SetPXValueSetting(jQuery(this).val());" placeholder="prefix" />
				</li>
				</div>
				<?php
		}	
	}
	public function field_appearance_settings_sx( $position, $form_id ) {
	
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?><div style="float:right; display:inline-block;">
					<li class="sx_value_setting field_setting">
						<label for="sx_value_setting" class="section_label">
							<?php esc_html_e( 'Suffix', 'sliderfieldaddon' ); ?>
							<?php gform_tooltip( 'sx_value_setting' ) ?>
						</label>
						<input id="sx_value_setting" type="text" class="fieldwidth-6" onkeyup="SetSXValueSetting(jQuery(this).val());" onchange="SetSXValueSetting(jQuery(this).val());" placeholder="suffix" />
					</li>
					</div>
					<?php
			}	
		}	
		
	public function field_appearance_settings_min( $position, $form_id ) {
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
			<div style="float:left; display:inline-block;">
			<li class="min_value_setting field_setting">
				<label for="min_value_setting" class="section_label">
					<?php esc_html_e( 'Minimum Value', 'sliderfieldaddon' ); ?>
					<?php gform_tooltip( 'min_value_setting' ) ?>
				</label>
				<input id="min_value_setting" type="text" class="fieldwidth-6" onkeyup="SetMinValueSetting(jQuery(this).val());" onchange="SetMinValueSetting(jQuery(this).val());"/>
			</li>
			</div>
			<?php
		}
		
	}
	
	public function field_appearance_settings_max( $position, $form_id ) {
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
			<div style="float:right; display:inline-block;">
			<li class="max_value_setting field_setting">
				<label for="max_value_setting" class="section_label">
					<?php esc_html_e( 'Maximum Value', 'sliderfieldaddon' ); ?>
					<?php gform_tooltip( 'max_value_setting' ) ?>
				</label>
				<input id="max_value_setting" type="text" class="fieldwidth-6" onkeyup="SetMaxValueSetting(jQuery(this).val());" onchange="SetMaxValueSetting(jQuery(this).val());"/>
			</li>
			</div>
			<?php
		}	
	}
	
	public function field_appearance_settings_step( $position, $form_id ) {
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
			<div style="float:left; display:inline-block;">
			<li class="step_value_setting field_setting">
				<label for="step_value_setting" class="section_label">
					<?php esc_html_e( 'Step Value', 'sliderfieldaddon' ); ?>
					<?php gform_tooltip( 'step_value_setting' ) ?>
				</label>
				<input id="step_value_setting" type="text" class="fieldwidth-6" onkeyup="SetStepValueSetting(jQuery(this).val());" onchange="SetStepValueSetting(jQuery(this).val());"/>
			</li>
			</div>
			<?php
		}	
	}
	
	
	public function field_appearance_settings_cp( $position, $form_id ) {
	
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
			<div style="float:right; display:inline-block;">
			<li class="cp_value_setting field_setting fieldwidth-6">
				<label for="cp_value_setting" class="section_label">
					<?php esc_html_e( 'Slider Color', 'sliderfieldaddon' ); ?>
					<?php gform_tooltip( 'cp_value_setting' ) ?>
				</label>
				<input id="cp_value_setting" type="text" class="fieldwidth-6" onkeyup="SetCPValueSetting(jQuery(this).val());" onchange="SetCPValueSetting(jQuery(this).val());" placeholder="#000000" />
			</li>
			</div><div class="clearfix" style="clear:both;"></div>
			<?php
		}	
	}
	
	public function field_appearance_settings_str( $position, $form_id ) {
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
				<li class="str_value_setting field_setting">
					<label for="str_value_setting" class="section_label">
						<?php esc_html_e( 'Text Values', 'sliderfieldaddon' ); ?>
						<?php gform_tooltip( 'str_value_setting' ) ?>
					</label>
					<input id="str_value_setting" type="text" class="fieldwidth-1" onkeyup="SetStrValueSetting(jQuery(this).val());" onchange="SetStrValueSetting(jQuery(this).val());"/>
				</li>
				<?php
			}	
		}
	public function field_appearance_settings_stri( $position, $form_id ) {
		// Add our custom setting just before the 'Custom CSS Class' setting.
		if ( $position == 250 ) {
			?>
				<li class="stri_value_setting field_setting">
					<label for="stri_value_setting" class="section_label">
						<?php esc_html_e( 'Input Text Values as text', 'sliderfieldaddon' ); ?>
						<?php gform_tooltip( 'stri_value_setting' ) ?>
					</label>
					<input id="stri_value_setting" type="checkbox" class="fieldwidth-6" onclick="SetFieldProperty('stri_value_setting', this.checked);" />
					
				</li>
				<?php
			}	
		}
	
	
}


