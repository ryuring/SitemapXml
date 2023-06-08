<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */
?>

<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
<p>出力先のパス：<?php echo $path ?></p>
<p>※ ファイル名は、/Config/setting.php で変更できます。</p>

<?php if($fileWritable && $dirWritable): ?>
<?php echo $this->BcForm->create('Sitemapxml', array('url' => array('controller' => 'sitemapxml', 'action' => 'index'))) ?>
<?php echo $this->BcForm->hidden('Sitemapxml.exec', array('value' => true)) ?>
<div class="submit">
	<?php echo $this->BcForm->submit('生成実行', array('div' => false, 'class' => 'button')) ?>
</div>
<?php endif ?>
<?php if(!$dirWritable): ?>
	<div class="message"><?php echo WWW_ROOT ?> に書込権限を与えてください。</div>
<?php endif ?>
<?php if(!$fileWritable): ?>
	<div class="message"><?php echo WWW_ROOT.'sitemap.xml' ?> に書込権限を与えてください。</div>
<?php endif ?>

<?php echo $this->BcForm->end() ?>
