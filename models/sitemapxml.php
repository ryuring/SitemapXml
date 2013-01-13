<?php
/* SVN FILE: $Id$ */
/**
 * [Sitemapxml] サイトマップXML生成
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			sitemapxml.models
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
class Sitemapxml extends BaserPluginAppModel {
/**
 * モデル名
 * 
 * @var string
 * @access public
 */
	var $name = 'Sitemapxml';
/**
 * プラグイン名
 * 
 * @var string
 * @access public
 */
	var $plugin = 'Sitemapxml';
/**
 * バリデーション
 * 
 * @var array
 * @access public
 */
	var $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => '入力必須です。'
			),
			'maxLength' => array(
				'rule'		=> array('maxLength', 255),
				'message'	=> '255文字以内で入力してください。'
			)
		)
	);

}
