<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXML出力ページ
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

<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
<p>出力先のパス：<?php echo $path ?></p>
<p>※ ファイル名は、/Config/setting.php で変更できます。</p>

<?php if($fileWritable && $dirWritable): ?>
<?php echo $this->BcForm->create('Sitemapxml', array('action' => 'index', 'url' => array('controller' => 'sitemapxml'))) ?>
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