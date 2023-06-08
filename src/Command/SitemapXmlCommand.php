<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Event\EventDispatcherTrait;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\View\CellTrait;

class SitemapXmlCommand extends Command
{

    /**
     * Trait
     */
    use CellTrait;
    use EventDispatcherTrait;

	/**
	 * サイトマップ生成
	 */
	public function execute(Arguments $args, ConsoleIo $io)
	{
        $this->request = new ServerRequest();
        $this->response = new Response();

	    $filename = \Cake\Core\Configure::read('SitemapXml.filename');
        $sitesTable = $this->getTableLocator()->get('BaserCore.Sites');
        $sites = $sitesTable->find()->where(['Sites.status' => true]);
        $result = true;
        foreach($sites as $site) {
            $path = WWW_ROOT . basename($filename, '.xml') . (($site->name)? '_' . $site->name : '') . '.xml';
            if (file_exists($path) && !is_writable($path)) {
                $io->out($path . ' に書込権限を与えてください。');
                $result = false;
                break;
            }
            $sitemap = $this->cell('SitemapXml.SitemapXml', [$site]);
            $File = new \Cake\Filesystem\File($path);
            $File->write($sitemap);
            $File->close();
            chmod($path, 0666);
        }
        if($result) {
            $io->out('サイトマップの生成が完了しました。');
        }
	}

}
