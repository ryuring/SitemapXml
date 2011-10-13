<?php
/* SVN FILE: $Id$ */
/**
 * サイトマップXML出力
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
<h2><?php $baser->contentsTitle() ?></h2>

<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
<p>出力先のパス：<?php echo WWW_ROOT.'sitemap.xml' ?></p>

<?php if($fileWritable && $dirWritable): ?>
<?php echo $formEx->create('SitemapXml', array('action' => 'index', 'url' => array('controller' => 'sitemap_xml'))) ?>
<?php echo $formEx->hidden('HtmlConverter.exec', array('value' => true)) ?>
<div class="align-center">
	<?php echo $formEx->submit('生成実行', array('div' => false, 'class' => 'btn-orange button')) ?>
</div>
<?php endif ?>
<?php if(!$dirWritable): ?>
	<div class="message"><?php echo WWW_ROOT ?> に書込権限を与えてください。</div>
<?php endif ?>
<?php if(!$fileWritable): ?>
	<div class="message"><?php echo WWW_ROOT.'sitemap.xml' ?> に書込権限を与えてください。</div>
<?php endif ?>

<?php echo $formEx->end() ?>