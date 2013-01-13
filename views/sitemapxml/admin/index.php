<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXML出力ページ
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2013, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.views
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
?>
<table cellpadding="0" cellspacing="0" class="form-table section">
	<tr>
		<th class="col-head">出力先のパス</th>
		<td class="col-input">
			<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
			<?php echo WWW_ROOT . $fileName ?>
		</td>
	</tr>
</table>

<?php if($fileWritable && $dirWritable): ?>
<?php echo $bcForm->create('Sitemapxml', array('action' => 'index', 'url' => array('controller' => 'sitemapxml'))) ?>
<?php echo $bcForm->hidden('Sitemapxml.exec', array('value' => true)) ?>
<div class="submit">
	<?php echo $bcForm->submit('生成実行', array('div' => false, 'class' => 'button')) ?>
</div>
<?php endif ?>
<?php if(!$dirWritable): ?>
	<div class="message"><?php echo WWW_ROOT ?> に書込権限を与えてください。</div>
<?php endif ?>
<?php if(!$fileWritable): ?>
	<div class="message"><?php echo WWW_ROOT . $fileName ?> に書込権限を与えてください。</div>
<?php endif ?>

<?php echo $bcForm->end() ?>