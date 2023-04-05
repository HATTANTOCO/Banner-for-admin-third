<?php
/**
 * [BANNER] バナーエリア管理
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<?php echo $this->BcForm->create('BannerArea', array('url' => array('action' => 'index'))) ?>
<p class="bca-search__input-list">
    <span class="bca-search__input-item">
        <?php echo $this->BcForm->label('BannerArea.name', '表示場所', ['class' => 'bca-search__input-item-label']) ?>
        &nbsp;<?php echo $this->BcForm->input('BannerArea.name', ['type' => 'text', 'size' => '30']) ?>
    </span>
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
<?php echo $this->BcForm->end() ?>
