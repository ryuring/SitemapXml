<?php
App::import('Controller', 'Plugins');
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
		
		if($this->data) {
			$sitemap = $this->requestAction('/admin/sitemap_xml/create', array('return', $this->data));
			ClassRegistry::removeObject('View');
			$File = new File(ROOT.DS.'sitemap.xml');
			$File->write($sitemap);
			$File->close();
			$this->Session->setFlash('サイトマップの生成が完了しました。');
		}
		
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