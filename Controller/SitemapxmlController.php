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
 * サイトマップXMLクリエーターコントローラー
 *
 * @package	sitemap_xml.controllers
 */
class SitemapxmlController extends AppController {
/**
 * コントローラー名
 * 
 * @var string
 */
	public $name = 'Sitemapxml';
/**
 * モデル
 * 
 * @var array
 */
	public $uses = array('SearchIndex');
/**
 * コンポーネント
 *
 * @var array
 * @access public
 */
	public $components = array('BcAuth','Cookie','BcAuthConfigure');

/**
 * Before Filter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->BcAuth->allow('create');
	}

/**
 * [ADMIN] サイトマップXML生成実行ページ
 */
	public function admin_index() {
		
		$path = WWW_ROOT . Configure::read('Sitemapxml.filename');
		if($this->request->data) {
			$sitemap = $this->requestAction('/sitemapxml/sitemapxml/create', array('return', $this->request->data));
			ClassRegistry::removeObject('View');
			$File = new File($path);
			$File->write($sitemap);
			$File->close();
			$this->setMessage('サイトマップの生成が完了しました。');
			chmod($path, 0666);
		}
		
		$dirWritable = true;
		$fileWritable = true;		
		if(file_exists($path)) {
			if(!is_writable($path)) {
				$fileWritable = false;
			}
		} else {
			if(!is_writable(dirname($path))) {
				$dirWritable = false;
			}
		}
		
		$this->set('path', $path);
		$this->set('fileWritable', $fileWritable);
		$this->set('dirWritable', $dirWritable);
		$this->pageTitle = 'サイトマップXML作成';
		$this->render('index');
		
	}
/**
 * [ADMIN] サイトマップXML生成処理
 */
	public function create() {
		$this->layout = 'empty';
		$datas = $this->SearchIndex->find('all', array('conditions' => array('SearchIndex.status' => true)));
		$this->set('datas', $datas);
		$this->render('sitemap');
	}
	
}