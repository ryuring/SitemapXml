<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXMLファイル名設定
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
<script type="text/javascript">
$(window).load(function() {
	$("#SitemapxmlName").focus();
});
</script>

<?php echo $bcForm->create('Sitemapxml', array('url' => array('controller' => 'sitemapxml', 'action' => 'edit'))) ?>
<table cellpadding="0" cellspacing="0" class="form-table section">
	<tr>
		<th class="col-head"><?php echo $bcForm->label('Sitemapxml.name', 'ファイル名') ?></th>
		<td class="col-input">
			<?php echo $bcForm->input('Sitemapxml.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'counter' => true)) ?>
			<?php echo $bcForm->error('Sitemapxml.name') ?>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $bcForm->submit('保存', array('div' => false, 'class' => 'btn-red button')) ?>
</div>
<?php echo $bcForm->end() ?>
