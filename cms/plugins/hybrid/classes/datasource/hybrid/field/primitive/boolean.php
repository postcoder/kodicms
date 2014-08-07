<?php defined('SYSPATH') or die('No direct access allowed.');

class DataSource_Hybrid_Field_Primitive_Boolean extends DataSource_Hybrid_Field_Primitive {
	
	const HTML_SELECT = 2;
	const HTML_RADIO = 0;
	const HTML_CHECKBOX = 1;
	
	protected $_is_required = FALSE;
	
	protected $_props = array(
		'default' => 0,
		'display' => 0
	);
	
	public function onUpdateDocument(DataSource_Hybrid_Document $old = NULL, DataSource_Hybrid_Document $new) 
	{
		$new->set($this->name, $new->get($this->name) ? 1 : 0);
	}
	
	public function get_type() 
	{
		return 'TINYINT(1) UNSIGNED NOT NULL';
	}

	public static function fetch_widget_field( $widget, $field, $row, $fid, $recurse )
	{
		return (bool) $row[$fid];
	}
	
	public function fetch_headline_value( $value, $document_id)
	{
		return $value == 1 ? __('TRUE') : __('FALSE');
	}
	
	public function display_types()
	{
		return array(
			self::HTML_RADIO => __('Radio buttons'),
			self::HTML_CHECKBOX => __('Checkbox'),
			self::HTML_SELECT => __('Dropdown')
		);
	}
}