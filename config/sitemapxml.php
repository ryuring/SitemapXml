<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] システムナビ
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2013, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.config
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
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
