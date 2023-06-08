<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

/**
 * @var \BaserCore\View\BcAdminAppView $this
 * @var string $path
 * @var bool $dirWritable
 */
$this->BcAdmin->setTitle('サイトマップXML作成');
?>

<p>検索インデックスのデータを元にサイトマップXMLを生成します。</p>
<p>出力先のパス：<?php echo $path ?></p>
<p>※ ファイル名は、/config/setting.php で変更できます。<br>
※ サブサイトの場合は、サブサイトのエイリアスがサフィックスとして付与されます。（例：sitemap_sub.xml）</p>

<?php if ($dirWritable): ?>
  <?php echo $this->BcForm->create() ?>
  <?php echo $this->BcForm->hidden('exec', ['value' => true]) ?>
  <div class="submit section bca-actions">
    <div class="bca-actions__main">
      <?= $this->BcAdminForm->button(
        __d('baser_core', '生成実行'),
        ['div' => false,
          'class' => 'bca-loading bca-btn bca-actions__item',
          'data-bca-btn-type' => 'save',
          'data-bca-btn-size' => 'lg',
          'data-bca-btn-width' => 'lg',
          'id' => 'BtnSave']
      ) ?>
    </div>
  </div>
<?php endif ?>

<?php echo $this->BcForm->end() ?>
