<?php
/**
 * [BANNER] バナーエリア管理
 *
 * @copyright		Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link			http://www.d-zero.co.jp/
 * @package			Banner
 * @license			MIT
 */
?>

<?php if($this->BcBaser->siteConfig['admin_theme'] == 'admin-third'): ?>
<?php echo $this->BcForm->create('BannerFile', array('url' => array('action'=>'index', $bannerArea['BannerArea']['id']))) ?>
<p class="bca-search__input-list">
	<span class="bca-search__input-item" style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.name', 'ファイル名', ['class' => 'bca-search__input-item-label']) ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.name', array('type' => 'text', 'size' => '20')) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('BannerFile.alt', 'alt', ['class' => 'bca-search__input-item-label']) ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.alt', array('type' => 'text', 'size' => '20')) ?>
	</span>
</p>
<p class="bca-search__input-list">
	<span class="bca-search__input-item" style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.url', 'リンクURL', ['class' => 'bca-search__input-item-label']) ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.url', array('type' => 'text', 'size' => '20')) ?>
	</span>
	<span class="bca-search__input-item" style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.status', '公開状態', ['class' => 'bca-search__input-item-label']) ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.status', array('type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?>
	</span>
	<span class="bca-search__input-item">
		<?php echo $this->BcForm->label('BannerFile.blank', '別窓で開く', ['class' => 'bca-search__input-item-label']) ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.blank', array('type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?>
	</span>
	<?php echo $this->BcSearchBox->dispatchShowField() ?>
</p>
<div class="button bca-search__btns">
    <div class="bca-search__btns-item">
        <?php $this->BcBaser->link(
            __d('baser', '検索'), 
            "javascript:void(0)", 
            ['id' => 'BtnSearchSubmit', 
                'class' => 'bca-btn', 
                'data-bca-btn-type' => 'search'
        ]) ?>
    </div>
    <div class="bca-search__btns-item">
        <?php $this->BcBaser->link(
            __d('baser', 'クリア'), 
            "javascript:void(0)", 
            ['id' => 'BtnSearchClear', 
                'class' => 'bca-btn', 
                'data-bca-btn-type' => 'clear'
        ]) ?>
    </div>
</div>
<?php else: ?>
<?php echo $this->BcForm->create('BannerFile', array('url' => array('action'=>'index', $bannerArea['BannerArea']['id']))) ?>
<p>
	<span style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.name', 'ファイル名') ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.name', array('type' => 'text', 'size' => '20')) ?>
	</span>
	<span>
		<?php echo $this->BcForm->label('BannerFile.alt', 'alt') ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.alt', array('type' => 'text', 'size' => '20')) ?>
	</span>
</p>
<p>
	<span style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.url', 'リンクURL') ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.url', array('type' => 'text', 'size' => '20')) ?>
	</span>
	<span style="margin-right: 20px;">
		<?php echo $this->BcForm->label('BannerFile.status', '公開状態') ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.status', array('type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?>
	</span>
	<span>
		<?php echo $this->BcForm->label('BannerFile.blank', '別窓で開く') ?>
		&nbsp;<?php echo $this->BcForm->input('BannerFile.blank', array('type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => '指定なし')) ?>
	</span>
	<?php echo $this->BcSearchBox->dispatchShowField() ?>
</p>
<div class="button">
	<?php echo $this->BcForm->submit('admin/btn_search.png', array('alt' => '検索', 'class' => 'btn'), array('div' => false, 'id' => 'BtnSearchSubmit')) ?>
</div>
<?php endif ?>
<?php echo $this->BcForm->end() ?>
