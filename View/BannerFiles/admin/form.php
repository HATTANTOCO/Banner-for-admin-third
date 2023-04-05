<?php
/**
 * [BANNER] バナー管理 追加／編集
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<script type="text/javascript">
$(window).load(function() {
    $("#BannerFileAlt").focus();
});
</script>

<?php if($this->BcBaser->siteConfig['admin_theme'] == 'admin-third'): ?>
<?php if($this->request->action == 'admin_add'): ?>
    <?php echo $this->BcForm->create('BannerFile', array('url' => array('action' => 'add', $bannerArea['BannerArea']['id']), 'enctype' => 'multipart/form-data')) ?>
<?php else: ?>
    <?php echo $this->BcForm->create('BannerFile', array('url' => array('action' => 'edit', $bannerArea['BannerArea']['id'], $this->BcForm->value('BannerFile.id')), 'enctype' => 'multipart/form-data')) ?>
    <?php echo $this->BcForm->input('BannerFile.id', array('type' => 'hidden')) ?>
    <?php echo $this->BcForm->input('BannerFile.banner_area_id', array('type' => 'hidden', 'value' => $bannerArea['BannerArea']['id'])) ?>
<?php endif ?>
<?php echo $this->BcForm->input('BannerFile.sort', array('type' => 'hidden')) ?>

<?php echo $this->BcFormTable->dispatchBefore() ?>

<table cellpadding="0" cellspacing="0" class="form-table section bca-form-table">
    <?php if($this->request->action == 'admin_edit'): ?>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.no', 'NO') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->value('BannerFile.no') ?>
            <?php echo $this->BcForm->input('BannerFile.no', array('type' => 'hidden')) ?>
        </td>
    </tr>
    <?php endif ?>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.name', 'バナー') ?>&nbsp;<span class="required">*</span>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->file('BannerFile.name', array(
                'imgsize' => 'banner',
                'rel' => 'colorbox',
                'title' => $this->BcForm->value('BannerFile.name'),
                'delCheck' => false)) ?>
            <?php echo $this->BcForm->error('BannerFile.name') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.alt', 'altテキスト') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.alt', array('type' => 'textarea', 'cols' => 60, 'rows' => 1)) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
            <div class="helptext"><?php echo __d('baser', 'バナーに設定する alt テキストを指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerFile.alt') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.url', 'リンク先URL') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.url', array('type' => 'textarea', 'cols' => 60, 'rows' => 1)) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
            <div class="helptext"><?php echo __d('baser', '表示するバナーのリンク先となるURLを指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerFile.url') ?>
        </td>
    </tr>
    <?php if($bannerArea['BannerArea']['description_flg']): ?>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.description', '説明') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.description', array('type' => 'textarea', 'cols' => 60, 'rows' => 2)) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
            <div class="helptext"><?php echo __d('baser', '表示するバナーの説明を指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerFile.description') ?>
        </td>
    </tr>
    <?php endif ?>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.blank', 'target指定') ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.blank', array('type' => 'checkbox', 'label' => '別窓で開く')) ?>
            <i class="bca-icon--question-circle btn help bca-help"></i>
            <div id="helptextBlank" class="helptext"><?php echo __d('baser', 'バナー画像をクリックした際に、別窓で開くかどうかを指定します。') ?></div>
            <?php echo $this->BcForm->error('BannerFile.blank') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.status', __d('baser', '公開状態')) ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.status', array(
                    'type'      => 'radio',
                    'options'   => $statuses,
                    'legend'    => false,
                    'separator' => '&nbsp;&nbsp;')) ?>
            <?php echo $this->BcForm->error('BannerFile.status') ?>
        </td>
    </tr>
    <tr>
        <th class="col-head bca-form-table__label">
            <?php echo $this->BcForm->label('BannerFile.status', __d('baser', '公開期間')) ?>
        </th>
        <td class="col-input bca-form-table__input">
            <?php echo $this->BcForm->input('BannerFile.publish_begin', [
                    'type' => 'dateTimePicker',
                    'size' => 12,
                    'maxlength' => 10,
                    'dateLabel' => ['text' => '開始日付'],
                    'timeLabel' => ['text' => '開始時間']
                ]) ?>
            &nbsp;〜&nbsp;
            <?php echo $this->BcForm->input('BannerFile.publish_end', [
                    'type' => 'dateTimePicker',
                    'size' => 12,
                    'maxlength' => 10,
                    'dateLabel' => ['text' => '終了日付'],
                    'timeLabel' => ['text' => '終了時間']
                ]) ?>
            <?php echo $this->BcForm->error('BannerFile.publish_begin') ?>
            <?php echo $this->BcForm->error('BannerFile.publish_end') ?>
        </td>
    </tr>
</table>

<?php echo $this->BcFormTable->dispatchAfter() ?>

<div class="submit bca-actions">
<?php if($this->request->action == 'admin_add'): ?>
<div class="bca-actions__main">
        <?php $this->BcBaser->link('一覧に戻る',
            ['controller' => 'banner_files', 'action' => 'index', $bannerArea['BannerArea']['id']],
            ['class' => 'bca-btn  bca-actions__item', 'data-bca-btn-type' => 'back-to-list']
        ) ?>
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
<?php else: ?>
<div class="bca-actions__main">
        <?php $this->BcBaser->link('一覧に戻る',
            ['controller' => 'banner_files', 'action' => 'index', $bannerArea['BannerArea']['id']],
            ['class' => 'bca-btn  bca-actions__item', 'data-bca-btn-type' => 'back-to-list']
        ) ?>
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
<div class="bca-actions__sub">
            <?php $this->BcBaser->link(__d('baser', '削除'), ['action' => 'delete', $bannerArea['BannerArea']['id'], $this->BcForm->value('BannerFile.id')],
            [
                'class' => 'submit-token button bca-btn bca-actions__item',
                'data-bca-btn-type' => 'delete',
                'data-bca-btn-size' => 'sm'
            ],
            sprintf('No：%s を本当に削除してもいいですか？', $this->BcForm->value('BannerFile.id')),
            false); ?>
    </div>
<?php endif ?>
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
