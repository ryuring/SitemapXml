<?php
/**
 * Sitemapxml :  Google Sitemap Creator <https://github.com/ryuring/sitemapxml>
 * Copyright (c) ryuring <http://ryuring.com/>
 *
 * @package			Sitemapxml.View
 * @since			Sitemapxml v 0.1.0
 */

/**
 * @var BcAppView $this
 */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" ?>
<?php echo '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">' . "\n" ?>
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
$site = BcSite::findById($data['SearchIndex']['site_id']);
$useSubDomain = false;
if($site) {
	$useSubDomain = $site->useSubDomain;
}
?>
   <url>
      <loc><?php echo $this->BcContents->getUrl($data['SearchIndex']['url'], true, $useSubDomain) ?></loc>
      <lastmod><?php echo date('Y-m-d', strtotime($modified)) ?></lastmod>
      <changefreq><?php echo $changefreq ?></changefreq>
      <priority><?php echo $data['SearchIndex']['priority'] ?></priority>
   </url>
<?php endforeach ?>
</urlset>