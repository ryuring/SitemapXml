<?php
/* SVN FILE: $Id$ */
/**
 * サイトマップXMLクリエーターコントローラー
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2011 - 2011, Catchup, Inc.
 *								1-19-4 ikinomatsubara, fukuoka-shi
 *								fukuoka, Japan 819-0055
 *
 * @copyright		Copyright 2011 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			sitemap_xml.config
 * @since			Baser v 1.6.11
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
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
class SitemapXmlController extends PluginsController {
/**
 * コントローラー名
 * 
 * @var string
 */
	var $name = 'SitemapXml';
/**
 * モデル
 * 
 * @var array
 */
	var $uses = array('Plugin', 'Content');
/**
 * [ADMIN] サイトマップXML生成実行ページ
 */
	function admin_index() {
		
		$path = WWW_ROOT.'sitemap.xml';
		if($this->data) {
			$sitemap = $this->requestAction('/admin/sitemap_xml/create', array('return', $this->data));
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