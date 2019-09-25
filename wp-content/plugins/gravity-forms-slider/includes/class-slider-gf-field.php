<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GF_Field_Slider extends GF_Field {

	/**
	 * @var string $type The field type.
	 */
	public $type	=	'slider';
	
	/**
	 * Return the field title, for use in the form editor.
	 *
	 * @return string
	 */
		
	public function get_form_editor_field_title() {
		return esc_attr__( 'Slider', 'sliderfieldaddon' );
	}

	/**
	 * Assign the field button to the Advanced Fields group.
	 *
	 * @return array
	 */
	public function get_form_editor_button() {
		return array(
			'group' => 'advanced_fields',
			'text'  => $this->get_form_editor_field_title(),
		);
	}

	/**
	 * The settings which should be available on the field in the form editor.
	 *
	 * @return array
	 */
	function get_form_editor_field_settings() {
		return array(
			'conditional_logic_field_setting',
			'prepopulate_field_setting',
			'error_message_setting',
			'label_setting',
			'size_setting',
			'min_value_setting',
			'max_value_setting',
			'step_value_setting',		
			'cp_value_setting',
			'px_value_setting',
			'sx_value_setting',
			'str_value_setting',
			'stri_value_setting',
			'label_placement_setting',
			'admin_label_setting',
			'rules_setting',
			'visibility_setting',
			'duplicate_setting',
			'default_value_setting',
			'description_setting',
		);
	}
	
	/**
	 * Enable this field for use with conditional logic.
	 *
	 * @return bool
	 */
	public function is_conditional_logic_supported() {
		return true;
	}
	
	

	/**
	 * The scripts to be included in the form editor.
	 *
	 * @return string
	 */
	public function get_form_editor_inline_script_on_page_render() {
		

		// set the default field label for the simple type field
		$script = sprintf( "function SetDefaultValues_simple(field) {field.label = '%s';}", $this->get_form_editor_field_title() ) . PHP_EOL;

		// Min Value setting
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var minValue = field.minValue == undefined ? '' : field.minValue;" .
		           "jQuery('#min_value_setting').val(minValue);" .
		           "});" . PHP_EOL;
		$script .= "function SetMinValueSetting(value) {SetFieldProperty('minValue', value);}" . PHP_EOL;
		

		//Max Value Settings
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var maxValue = field.maxValue == undefined ? '' : field.maxValue;" .
		           "jQuery('#max_value_setting').val(maxValue);" .
		           "});" . PHP_EOL;
		$script .= "function SetMaxValueSetting(value) {SetFieldProperty('maxValue', value);}" . PHP_EOL;
		
		
		//Step Value setting
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
				   "var stepValue = field.stepValue == undefined ? '' : field.stepValue;" .
				   "jQuery('#step_value_setting').val(stepValue);" .
				   "});" . PHP_EOL;
		$script .= "function SetStepValueSetting(value) {SetFieldProperty('stepValue', value);}" . PHP_EOL;
		
		
		//Color Picker setting
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
				"var cpValue = field.cpValue == undefined ? '' : field.cpValue;" .
				"jQuery('#cp_value_setting').val(cpValue);" .
				"});" . PHP_EOL;
		$script .= "function SetCPValueSetting(value) {SetFieldProperty('cpValue', value);}" . PHP_EOL;
		
		
		//prefix settings
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
				"var pxValue = field.pxValue == undefined ? '' : field.pxValue;" .
				"jQuery('#px_value_setting').val(pxValue);" .
				"});" . PHP_EOL;
		$script .= "function SetPXValueSetting(value) {SetFieldProperty('pxValue', value);}" . PHP_EOL;
		
		
		
		//Suffix settings
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
				"var sxValue = field.sxValue == undefined ? '' : field.sxValue;" .
				"jQuery('#sx_value_setting').val(sxValue);" .
				"});" . PHP_EOL;
		$script .= "function SetSXValueSetting(value) {SetFieldProperty('sxValue', value);}" . PHP_EOL;
		
		
		
		//String values settings
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
				"var strValue = field.strValue == undefined ? '' : field.strValue;" .
				"jQuery('#str_value_setting').val(strValue);" .
				"});" . PHP_EOL;
		$script .= "function SetStrValueSetting(value) {SetFieldProperty('strValue', value);}" . PHP_EOL;
		
		//String values settings
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) { " .
					"jQuery('#stri_value_setting').attr('checked', field['stri_value_setting'] == true);" .
				"});" . PHP_EOL;
		
		return $script;
	}
	

		/**
	 * Define the fields inner markup.
	 *
	 * @param array $form The Form Object currently being processed.
	 * @param string|array $value The field value. From default/dynamic population, $_POST, or a resumed incomplete submission.
	 * @param null|array $entry Null or the Entry Object currently being edited.
	 *
	 * @return string
	 */
	public function get_field_input( $form, $value = '', $entry = null ) {
		$id              = absint( $this->id );
		$form_id         = absint( $form['id'] );
		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();
		
		
		// Prepare the value of the input ID attribute.
		$field_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";
		
		$value = esc_attr( $value );
		
		// Get the value of the inputClass property for the current field.
		$minValue 	=	$this->minValue;
		$maxValue 	=	$this->maxValue;
		$stepValue 	=	$this->stepValue;
		$cpValue	=	$this->cpValue;
		$pxValue	=	$this->pxValue;
		$sxValue	=	$this->sxValue;
		$strValue	=	$this->strValue;
		// Prepare the input classes.
		$size         = $this->size;
		$class_suffix = $is_entry_detail ? '_admin' : '';
		$class        = $size . $class_suffix;

		// Prepare the other input attributes.
		$tabindex              = $this->get_tabindex();
		$logic_event           = ! $is_form_editor && ! $is_entry_detail ? $this->get_conditional_logic_event( 'keyup' ) : '';
		$placeholder_attribute = $this->get_field_placeholder_attribute();
		$required_attribute    = $this->isRequired ? 'aria-required="true"' : '';
		$invalid_attribute     = $this->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';
		$disabled_text         = $is_form_editor ? 'disabled="disabled"' : '';
		if($is_form_editor==1){
			$finaloutput	=	'';
		}
		else{
			$finaloutput	=	"<span class='slider_prefix slider_prefix_{$id}'>{$pxValue}</span><output class='output' id='output_{$id}'></output><span class='slider_suffix slider_suffix_{$id}'>{$sxValue}</span>";
		}
		// Prepare the input tag for this field.
		$input = "<input name='input_{$id}' id='{$field_id}' type='range' data-str='{$strValue}' min='{$minValue}' max='{$maxValue}' step='{$stepValue}' value='{$value}' class='rating' {$tabindex} {$logic_event} {$placeholder_attribute} {$required_attribute} {$invalid_attribute} {$disabled_text} />{$finaloutput}<style>#field_{$form_id}_{$id} div.rangeslider .rangeslider__fill{background:{$cpValue} !important; }</style>";
		
		return sprintf( "<div class='ginput_container ginput_container_%s'>%s</div>", $this->type, $input );
	}
}



GF_Fields::register( new GF_Field_Slider() );