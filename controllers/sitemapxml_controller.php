<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXMLクリエーターコントローラー
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2013, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.controllers
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
class SitemapxmlController extends BaserPluginAppController {
/**
 * コントローラー名
 * 
 * @var string
 * @access public
 */
	var $name = 'Sitemapxml';
/**
 * モデル
 * 
 * @var array
 * @access public
 */
	var $uses = array('Sitemapxml.Sitemapxml', 'Content');
/**
 * コンポーネント
 *
 * @var array
 * @access public
 */
	var $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');
/**
 * サブメニューエレメント
 *
 * @var array
 * @access public
 */
	var $subMenuElements = array('sitemapxml');
/**
 * ぱんくずナビ
 *
 * @var string
 * @access public
 */
	var $crumbs = array(
		array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
		array('name' => 'サイトマップXML管理', 'url' => array('plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action' => 'index'))
	);
/**
 * [ADMIN] サイトマップXML生成実行ページ
 * 
 * @return void
 * @access public
 */
	function admin_index() {

		$datas = array('Sitemapxml' => $this->Sitemapxml->findExpanded());
		$fileName = $datas['Sitemapxml']['name'] . '.xml';
		$path = WWW_ROOT . $fileName;
		if($this->data) {
			$sitemap = $this->requestAction('/admin/sitemapxml/create', array('return', $this->data));
			ClassRegistry::removeObject('View');
			$File = new File($path);
			$File->write($sitemap);
			$File->close();
			$this->Session->setFlash('サイトマップの生成が完了しました。');
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

		$this->set('fileName', $fileName);
		$this->set('fileWritable', $fileWritable);
		$this->set('dirWritable', $dirWritable);
		$this->pageTitle = 'サイトマップXML作成';
		$this->render('index');
		
	}
/**
 * [ADMIN] サイトマップXML生成処理
 * 
 * @return void
 * @access public
 */
	function admin_create() {
		
		$this->layout = '../empty';
		$datas = $this->Content->find('all', array('conditions' => array('Content.status' => true)));		
		$this->set('datas', $datas);
		$this->render('sitemap');

	}
/**
 * [ADMIN] サイトマップXMLファイル名設定
 * 
 * @return void
 * @access public
 */
	function admin_edit() {

		if(empty($this->data)) {
			$this->data = array('Sitemapxml' => $this->Sitemapxml->findExpanded());
		} else {
			$this->Sitemapxml->set($this->data);
			if($this->Sitemapxml->validates()) {
				if($this->Sitemapxml->saveKeyValue($this->data)) {
					$this->Session->setFlash('出力ファイル名を保存しました。');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('設定の保存に失敗しました。');
				}
			} else {
				$this->Session->setFlash('入力エラーです。内容を修正して下さい。');
			}
		}

		$this->pageTitle = '出力ファイル名設定';
		$this->render('form');

	}

}
