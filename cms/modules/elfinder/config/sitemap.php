<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
	array(
		'name' => 'File manager', 
		'url' => Route::get('backend')->uri(array('controller' => 'filemanager')),
		'priority' => 6000,
		'permissions' => 'filemanager.index',
		'icon' => 'folder-open'
	)
);
