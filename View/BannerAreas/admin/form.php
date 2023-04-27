<?php
/**
 * [BANNER] バナーエリア管理 追加／編集
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<script type="text/javascript">
$(window).load(function() {
    $("#BannerAreaName").focus();
});
</script>

<?php if($this->BcBaser->siteConfig['admin_theme'] == 'admin-third'): ?>
<?php if($this->request->action == 'admin_add'): ?>
    <?php echo $this->BcForm->create('BannerArea', array('url' => array('action' => 'add'))) ?>
<?php else: ?>
    <?php echo $this->BcForm->create('BannerArea', array('url' => array('action' => 'edit'))) ?>
    <?php echo $this->BcForm->input('BannerArea.id', array('type' => 'hidden')) ?>
<?php endif ?>

<table cellpadding="0" cellspacing="0" class="form-table section bca-form-table">
    <tr>
        <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BannerArea.name', '表示場所名') ?></th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerArea.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'counter' => true)) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
                    <div class="helptext"><?php echo __d('baser', '表示場所名を指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerArea.name') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BannerArea.width', 'サイズチェック設定') ?></th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->label('BannerArea.width', '幅') ?>
            <?php echo $this->BcForm->input('BannerArea.width', array('type' => 'text', 'size' => 8, 'maxlength' => 255)) ?>
            <small>px</small>
            <?php echo $this->BcForm->error('BannerArea.width') ?>
            <span style="margin-left: 50px;">
                <?php echo $this->BcForm->label('BannerArea.height', '高さ') ?>
                <?php echo $this->BcForm->input('BannerArea.height', array('type' => 'text', 'size' => 8, 'maxlength' => 255)) ?>
                <small>px</small>
                <?php echo $this->BcForm->error('BannerArea.height') ?>
            </span>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerArea.description_flg', '説明設定') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerArea.description_flg', array('type' => 'checkbox', 'label' => '説明を利用する')) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
                    <div class="helptext"><?php echo __d('baser', 'バナーエリアごとにバナー画像の説明を利用するかどうかを指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerArea.description_flg') ?>
        </td>
    </tr>
</table>
<div class="submit bca-actions">
    <div class="bca-actions__main">
        <?php $this->BcBaser->link('バナーエリア一覧に戻る',
            ['controller' => 'banner_areas', 'action' => 'index'],
            ['class' => 'bca-btn  bca-actions__item', 'data-bca-btn-type' => 'back-to-list']
        ) ?>
    </div>
    <div class="bca-actions__main">
        <?php
        echo $this->BcForm->button(__d('baser', '保存'),
            [
                'div' => false,
                'class' => 'button bca-btn bca-actions__item',
                'data-bca-btn-type' => 'save',
                'data-bca-btn-size' => 'lg',
                'data-bca-btn-width' => 'lg',
            ]);
            ?>
        </div>
    </div>
<?php else: ?>
<?php if($this->request->action == 'admin_add'): ?>
    <?php echo $this->BcForm->create('BannerArea', array('url' => array('action' => 'add'))) ?>
<?php else: ?>
    <?php echo $this->BcForm->create('BannerArea', array('url' => array('action' => 'edit'))) ?>
    <?php echo $this->BcForm->input('BannerArea.id', array('type' => 'hidden')) ?>
<?php endif ?>

<table cellpadding="0" cellspacing="0" class="form-table section">
    <tr>
        <th class="col-head"><?php echo $this->BcForm->label('BannerArea.name', '表示場所名') ?></th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerArea.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255, 'counter' => true)) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextName" class="helptext">
                <ul>
                    <li>表示場所名を指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerArea.name') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head"><?php echo $this->BcForm->label('BannerArea.width', 'サイズチェック設定') ?></th>
        <td class="col-input">
            <?php echo $this->BcForm->label('BannerArea.width', '幅') ?>
            <?php echo $this->BcForm->input('BannerArea.width', array('type' => 'text', 'size' => 8, 'maxlength' => 255)) ?>
            <small>px</small>
            <?php echo $this->BcForm->error('BannerArea.width') ?>
            <span style="margin-left: 50px;">
                <?php echo $this->BcForm->label('BannerArea.height', '高さ') ?>
                <?php echo $this->BcForm->input('BannerArea.height', array('type' => 'text', 'size' => 8, 'maxlength' => 255)) ?>
                <small>px</small>
                <?php echo $this->BcForm->error('BannerArea.height') ?>
            </span>
        </td>
    </tr>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerArea.description_flg', '説明設定') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerArea.description_flg', array('type' => 'checkbox', 'label' => '説明を利用する')) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpDescription', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextBlank" class="helptext">
                <ul>
                    <li>バナーエリアごとにバナー画像の説明を利用するかどうかを指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerArea.description_flg') ?>
        </td>
    </tr>
</table>

<div class="submit">
    <?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'btn-red button')) ?>
</div>
<?php endif ?>
<?php echo $this->BcForm->end() ?>
