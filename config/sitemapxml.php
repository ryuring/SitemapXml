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
				'url' => array(
					'admin' => true, 'plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action' => 'index')
			),
			array('name' => '出力ファイル名設定', 
				'url' => array(
					'admin' => true, 'plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action' => 'edit')
			)
	)
);
