<?php 
/* SVN FILE: $Id$ */
/* Sitemapxmls schema generated on: 2013-01-14 00:01:26 : 1358092406*/
class SitemapxmlsSchema extends CakeSchema {
	var $name = 'Sitemapxmls';

	var $file = 'sitemapxmls.php';

	var $connection = 'plugin';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $sitemapxmls = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>