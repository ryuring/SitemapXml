<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace src\Command;
use AppShell;
use CakeRequest;
use CakeResponse;
use Configure;
use Controller;
use File;

class SitemapXmlCommand extends AppShell
{

	/**
	 * サイトマップ生成
	 */
	public function create()
	{
		$Controller = new Controller(new CakeRequest(), new CakeResponse());
		$sitemap = $Controller->requestAction('/sitemapxml/sitemapxml/create', ['return']);
		$path = WWW_ROOT . Configure::read('Sitemapxml.filename');
		$File = new File($path);
		$File->write($sitemap);
		$File->close();
	}
}
