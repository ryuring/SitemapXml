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

    public function display()
    {
        $searchIndexes = $this->fetchTable('BcSearchIndex.SearchIndexes');
		$searchIndexes = $searchIndexes->find()->where(['SearchIndexes.status' => true])->all();
		$this->set('searchIndexes', $searchIndexes);
        $this->viewBuilder()->setLayout('empty');
        $this->viewBuilder()->setHelpers(['SitemapXml.SitemapXml']);
    }

}
