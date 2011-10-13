<?php
/* SVN FILE: $Id$ */
/**
 * サイトマップXMLテンプレート
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2011 - 2011, Catchup, Inc.
 *								1-19-4 ikinomatsubara, fukuoka-shi
 *								fukuoka, Japan 819-0055
 *
 * @copyright		Copyright 2011 - 2011, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			sitemap_xml.views
 * @since			Baser v 1.6.11
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($datas as $data): ?>
<?php if($data['Content']['priority'] == '1.0') {
	$changefreq = 'daily';
} elseif ($data['Content']['priority'] > '0.5') {
	$changefreq = 'weekly';
} else {
	$changefreq = 'monthly';
}?>
   <url>
      <loc><?php echo Router::url($data['Content']['url'], true) ?></loc>
      <lastmod><?php echo date('Y-m-d', strtotime($data['Content']['modified'])) ?></lastmod>
      <changefreq><?php echo $changefreq ?></changefreq>
      <priority><?php echo $data['Content']['priority'] ?></priority>
   </url>
<?php endforeach ?>
</urlset>
