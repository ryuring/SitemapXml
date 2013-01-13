<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXMLビュー
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
<tr>
	<th>サイトマップXML管理メニュー</th>
	<td>
		<ul>
			<li><?php $bcBaser->link('サイトマップXML作成', array('admin' => true, 'plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action'=>'index')) ?></li>
			<li><?php $bcBaser->link('出力ファイル名設定', array('admin' => true, 'plugin' => 'sitemapxml', 'controller' => 'sitemapxml', 'action'=>'edit')) ?></li>
		</ul>
	</td>
</tr>
