<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml\View\Helper;

use BaserCore\Model\Entity\Site;
use BaserCore\Model\Table\SitesTable;
use BaserCore\View\Helper\BcContentsHelper;
use BcSearchIndex\Model\Entity\SearchIndex;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;

/**
 * SitemapXmlHelper
 *
 * @property BcContentsHelper $BcContents
 */
class SitemapXmlHelper extends Helper
{

    public $helpers = ['BaserCore.BcContents'];

    /**
     * 更新頻度を取得
     * @param SearchIndex $searchIndex
     * @return string
     */
    public function getChangeFreq(SearchIndex $searchIndex)
    {
        if($searchIndex->priority == '1.0') {
            return 'daily';
        } elseif ($searchIndex->priority > '0.5') {
            return 'weekly';
        } else {
            return 'monthly';
        }
    }

    /**
     * 最終更新日を取得
     * @param SearchIndex $searchIndex
     * @return string
     */
    public function getLastMod(SearchIndex $searchIndex)
    {
        if(!empty($searchIndex->modified)) {
            $modified = $searchIndex->modified;
        } else {
            $modified = $searchIndex->created;
        }
        return date('Y-m-d', strtotime($modified));
    }

    /**
     * URLを取得
     * @param SearchIndex $searchIndex
     * @return mixed
     */
    public function getLoc(Site $site, SearchIndex $searchIndex)
    {
        return $this->BcContents->getUrl($searchIndex->url, true, $site->use_subdomain);
    }

}
