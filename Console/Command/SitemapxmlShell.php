<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Controller
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

App::uses('Controller', 'Controller');

class SitemapxmlShell extends AppShell {

/**
 * サイトマップ生成
 */
	public function create() {
		$Controller = new Controller(new CakeRequest(), new CakeResponse());
		$sitemap = $Controller->requestAction('/sitemapxml/sitemapxml/create', array('return'));
		$path = WWW_ROOT . Configure::read('Sitemapxml.filename');
		$File = new File($path);
		$File->write($sitemap);
		$File->close();
	}
}