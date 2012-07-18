<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXML生成
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.controllers
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
/**
 * Include files
 */
App::import('Controller', 'Plugins');
/**
 * サイトマップXMLクリエーターコントローラー
 *
 * @package	sitemap_xml.controllers
 */
class SitemapxmlController extends PluginsController {
/**
 * コントローラー名
 * 
 * @var string
 */
	var $name = 'Sitemapxml';
/**
 * モデル
 * 
 * @var array
 */
	var $uses = array('Plugin', 'Content');
/**
 * コンポーネント
 *
 * @var array
 * @access public
 */
	var $components = array('BcAuth','Cookie','BcAuthConfigure');
/**
 * [ADMIN] サイトマップXML生成実行ページ
 */
	function admin_index() {
		
		$path = WWW_ROOT.'sitemap.xml';
		if($this->data) {
			$sitemap = $this->requestAction('/admin/sitemapxml/create', array('return', $this->data));
			ClassRegistry::removeObject('View');
			$File = new File($path);
			$File->write($sitemap);
			$File->close();
			$this->Session->setFlash('サイトマップの生成が完了しました。');
		}
		
		$dirWritable = true;
		$fileWritable = true;
		if(!is_writable(dirname($path))) {
			$dirWritable = false;
		}
		if(file_exists($path) && !is_writable($path)) {
			$fileWritable = false;
		}
		
		$this->set('fileWritable', $fileWritable);
		$this->set('dirWritable', $dirWritable);
		$this->pageTitle = 'サイトマップXML作成';
		$this->render('index');
		
	}
/**
 * [ADMIN] サイトマップXML生成処理
 */
	function admin_create() {
		
		$this->layout = '../empty';
		$datas = $this->Content->find('all', array('conditions' => array('Content.status' => true)));		
		$this->set('datas', $datas);
		$this->render('sitemap');

	}
	
}