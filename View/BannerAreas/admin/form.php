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
    <?php echo $this->BcForm->create('BannerFile', array('url' => array('action' => 'add', $bannerArea['BannerArea']['id']), 'enctype' => 'multipart/form-data')) ?>
<?php else: ?>
    <?php echo $this->BcForm->create('BannerFile', array('url' => array('action' => 'edit', $bannerArea['BannerArea']['id'], $this->BcForm->value('BannerFile.id')), 'enctype' => 'multipart/form-data')) ?>
    <?php echo $this->BcForm->input('BannerFile.id', array('type' => 'hidden')) ?>
    <?php echo $this->BcForm->input('BannerFile.banner_area_id', array('type' => 'hidden', 'value' => $bannerArea['BannerArea']['id'])) ?>
<?php endif ?>
<?php echo $this->BcForm->input('BannerFile.sort', array('type' => 'hidden')) ?>

<?php echo $this->BcFormTable->dispatchBefore() ?>

<table cellpadding="0" cellspacing="0" class="form-table section">
    <?php if($this->request->action == 'admin_edit'): ?>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.no', 'NO') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->value('BannerFile.no') ?>
            <?php echo $this->BcForm->input('BannerFile.no', array('type' => 'hidden')) ?>
        </td>
    </tr>
    <?php endif ?>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.name', 'バナー') ?>&nbsp;<span class="required">*</span>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->file('BannerFile.name', array(
                'imgsize' => 'banner',
                'rel' => 'colorbox',
                'title' => $this->BcForm->value('BannerFile.name'),
                'delCheck' => false)) ?>
            <?php echo $this->BcForm->error('BannerFile.name') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.alt', 'altテキスト') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerFile.alt', array('type' => 'textarea', 'cols' => 60, 'rows' => 1)) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpAlt', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextAlt" class="helptext">
                <ul>
                    <li>バナーに設定する alt テキストを指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerFile.alt') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.url', 'リンク先URL') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerFile.url', array('type' => 'textarea', 'cols' => 60, 'rows' => 1)) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpUrl', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextUrl" class="helptext">
                <ul>
                    <li>表示するバナーのリンク先となるURLを指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerFile.url') ?>
        </td>
    </tr>
    <?php if($bannerArea['BannerArea']['description_flg']): ?>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.description', '説明') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerFile.description', array('type' => 'textarea', 'cols' => 60, 'rows' => 2)) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpDescription', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextDescription" class="helptext">
                <ul>
                    <li>表示するバナーの説明を指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerFile.description') ?>
        </td>
    </tr>
    <?php endif ?>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.blank', 'target指定') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerFile.blank', array('type' => 'checkbox', 'label' => '別窓で開く')) ?>
            <?php echo $this->BcBaser->img('admin/icn_help.png', array('id' => 'helpBlank', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
            <div id="helptextBlank" class="helptext">
                <ul>
                    <li>バナー画像をクリックした際に、別窓で開くかどうかを指定します。</li>
                </ul>
            </div>
            <?php echo $this->BcForm->error('BannerFile.blank') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head">
            <?php echo $this->BcForm->label('BannerFile.status', '公開状態') ?>
        </th>
        <td class="col-input">
            <?php echo $this->BcForm->input('BannerFile.status', array(
                    'type'      => 'radio',
                    'options'   => $statuses,
                    'legend'    => false,
                    'separator' => '&nbsp;&nbsp;')) ?>
            <?php echo $this->BcForm->error('BannerFile.status') ?>
            <?php echo $this->BcForm->dateTimePicker('BannerFile.publish_begin', array('size' => 12, 'maxlength' => 10), true) ?>
            &nbsp;〜&nbsp;
            <?php echo $this->BcForm->dateTimePicker('BannerFile.publish_end', array('size' => 12, 'maxlength' => 10),true) ?>
            <?php echo $this->BcForm->error('BannerFile.publish_begin') ?>
            <?php echo $this->BcForm->error('BannerFile.publish_end') ?>
        </td>
    </tr>
</table>

<?php echo $this->BcFormTable->dispatchAfter() ?>

<div class="submit">
<?php if($this->request->action == 'admin_add'): ?>
    <?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'btn-red button', 'id' => 'BtnSave')) ?>
<?php else: ?>
    <?php echo $this->BcForm->submit('保　存', array('div' => false, 'class' => 'btn-red button', 'id' => 'BtnSave')) ?>
    <?php $this->BcBaser->link('削　除',
            array('action' => 'delete', $bannerArea['BannerArea']['id'], $this->BcForm->value('BannerFile.id')),
            array('class'=>'btn-gray button', 'id' => 'BtnDelete'),
            sprintf('%s を本当に削除してもいいですか？', $this->BcForm->value('BannerFile.id')),
            false); ?>
<?php endif ?>
</div>
<?php endif ?>
<?php echo $this->BcForm->end() ?>
