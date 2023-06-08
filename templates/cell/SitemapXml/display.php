<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */
/**
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \Cake\Datasource\ResultSetInterface $searchIndexes
 */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<?php foreach($searchIndexes as $searchIndex): ?>
   <url>
      <loc><?php echo $this->SitemapXml->getLoc($searchIndex) ?></loc>
      <lastmod><?php echo $this->SitemapXml->getLastMod($searchIndex) ?></lastmod>
      <changefreq><?php echo $this->SitemapXml->getChangeFreq($searchIndex) ?></changefreq>
      <priority><?php echo $searchIndex->priority ?></priority>
   </url>
<?php endforeach ?>
</urlset>
