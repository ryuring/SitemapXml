<?php
/**
 * [Sitemapxml] 出力
 *
 */
/**
 * システムナビ
 */
$config['BcApp.adminNavi.sitemapxml'] = array(
		'name'		=> 'サイトマップXMLクリエーター',
		'contents'	=> array(
			array('name' => 'サイトマップXML作成', 
				'url' => array('admin' => true, 'plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action' => 'index'))
	)
);
