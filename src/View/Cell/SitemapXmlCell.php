<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml\View\Cell;

use BcSearchIndex\Model\Table\SearchIndexesTable;
use Cake\View\Cell;

/**
 * SitemapXmlCell
 */
class SitemapXmlCell extends Cell
{

    public function display($site)
    {
        $searchIndexes = $this->fetchTable('BcSearchIndex.SearchIndexes');
		$searchIndexes = $searchIndexes->find()->where([
		    'SearchIndexes.status' => true,
		    'SearchIndexes.site_id' => $site->id
        ])->all();
		$this->set([
		    'site' => $site,
		    'searchIndexes' => $searchIndexes
        ]);
        $this->viewBuilder()->setLayout('empty');
        $this->viewBuilder()->addHelpers(['SitemapXml.SitemapXml']);
    }

}
