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
		$filename = Configure::read('SitemapXml.filename');
		if ($this->getRequest()->is('post')) {
		    $sitesTable = $this->fetchTable('BaserCore.Sites');
		    $sites = $sitesTable->find()->where(['Sites.status' => true]);
		    $result = true;
		    foreach($sites as $site) {
                $path = WWW_ROOT . basename($filename, '.xml') . (($site->name)? '_' . $site->name : '') . '.xml';
                if (file_exists($path) && !is_writable($path)) {
                    $this->BcMessage->setWarning($path . ' に書込権限を与えてください。');
                    $result = false;
                    break;
                }
                $sitemap = $this->cell('SitemapXml.SitemapXml', [$site]);
                $File = new File($path);
                $File->write($sitemap);
                $File->close();
                chmod($path, 0666);
		    }
		    if($result) {
                $this->BcMessage->setInfo('サイトマップの生成が完了しました。');
            }
		}

		$dirWritable = true;
		if (!is_writable(WWW_ROOT)) {
            $this->BcMessage->setWarning(WWW_ROOT . ' に書込権限を与えてください。');
            $dirWritable = false;
        }
        $this->set([
            'path' => WWW_ROOT . $filename,
            'dirWritable' => $dirWritable
        ]);
	}
}
