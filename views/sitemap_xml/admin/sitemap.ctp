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