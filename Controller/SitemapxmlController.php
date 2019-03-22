<?php
/**
 * Sitemapxml :  Google Sitemap Creator <https://github.com/ryuring/sitemapxml>
 * Copyright (c) ryuring <http://ryuring.com/>
 *
 * @package			Sitemapxml.Controller
 * @since			Sitemapxml v 0.1.0
 */

/**
 * サイトマップXMLクリエーターコントローラー
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
	public $uses = ['SearchIndex'];

/**
 * コンポーネント
 *
 * @var array
 * @access public
 */
	public $components = ['BcAuth','Cookie','BcAuthConfigure'];

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
			$sitemap = $this->requestAction('/sitemapxml/sitemapxml/create', ['return', $this->request->data]);
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
		$datas = $this->SearchIndex->find('all', ['conditions' => ['SearchIndex.status' => true]]);
		$this->set('datas', $datas);
		$this->render('sitemap');
	}
	
}