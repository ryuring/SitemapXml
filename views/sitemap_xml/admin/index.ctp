<h2><?php $baser->contentsTitle() ?></h2>

<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
<p>出力先のパス：<?php echo ROOT.DS.'sitemap.xml' ?></p>

<?php echo $formEx->create('SitemapXml', array('action' => 'index', 'url' => array('controller' => 'sitemap_xml'))) ?>
<?php echo $formEx->hidden('HtmlConverter.exec', array('value' => true)) ?>

<div class="align-center">
	<?php echo $formEx->submit('生成実行', array('div' => false, 'class' => 'btn-orange button')) ?>
</div>

<?php echo $formEx->end() ?>