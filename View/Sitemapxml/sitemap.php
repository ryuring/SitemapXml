<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXMLビュー
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.views
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($datas as $data): ?>
<?php if($data['SearchIndex']['priority'] == '1.0') {
	$changefreq = 'daily';
} elseif ($data['SearchIndex']['priority'] > '0.5') {
	$changefreq = 'weekly';
} else {
	$changefreq = 'monthly';
}
if(!empty($data['SearchIndex']['modified'])) {
	$modified = $data['SearchIndex']['modified'];
} else {
	$modified = $data['SearchIndex']['created'];
}
?>
   <url>
      <loc><?php echo Router::url($data['SearchIndex']['url'], true) ?></loc>
      <lastmod><?php echo date('Y-m-d', strtotime($modified)) ?></lastmod>
      <changefreq><?php echo $changefreq ?></changefreq>
      <priority><?php echo $data['SearchIndex']['priority'] ?></priority>
   </url>
<?php endforeach ?>
</urlset>