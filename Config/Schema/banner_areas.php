<?php

class BannerAreasSchema extends CakeSchema {

	public $name = 'BannerAreas';
	public $file = 'banner_areas.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
		
	}

	public $banner_areas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'width' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'height' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'description_flg' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

}
