<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml\Controller\Admin;

use BaserCore\Controller\Admin\BcAdminAppController;
use BaserCore\Controller\Component\BcMessageComponent;
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\View\CellTrait;

/**
 * サイトマップXMLクリエーターコントローラー
 *
 * @property BcMessageComponent $BcMessage
 */
class SitemapXmlController extends BcAdminAppController
{

    /**
     * Trait
     */
    use CellTrait;

	/**
	 * サイトマップXML生成実行ページ
	 */
	public function index()
	{
		$path = WWW_ROOT . Configure::read('SitemapXml.filename');
		if ($this->getRequest()->is('post')) {
		    $sitemap = $this->cell('SitemapXml.SitemapXml');
			$File = new File($path);
			$File->write($sitemap);
			$File->close();
			$this->BcMessage->setInfo('サイトマップの生成が完了しました。');
			chmod($path, 0666);
		}

		$dirWritable = true;
		$fileWritable = true;
		if (file_exists($path)) {
			if (!is_writable($path)) $this->BcMessage->setWarning(WWW_ROOT . ' に書込権限を与えてください。');
		} else {
			if (!is_writable(dirname($path))) $this->BcMessage->setWarning(WWW_ROOT . 'sitemap.xml に書込権限を与えてください。');
		}
        $this->set([
            'path' => $path,
            'fileWritable' => $fileWritable,
            'dirWritable' => $dirWritable
        ]);
	}
}
