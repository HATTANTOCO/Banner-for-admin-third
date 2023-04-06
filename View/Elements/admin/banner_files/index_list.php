<?php
/**
 * [BANNER] バナー管理 一覧
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<?php
$this->BcListTable->setColumnNumber(6);
?>
<style>
.cboxElement img {
    max-width: 200px;
}
</style>

<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<?php if($this->BcBaser->siteConfig['admin_theme'] == 'admin-third'): ?>
<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
    <thead class="bca-table-listup__thead">
        <tr>
<?php if(!$sortmode): ?>
            <th class="row-tools bca-table-listup__thead-th">
                <?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>' . __d('baser', '並び替え'), ['sortmode' => 1, $this->request->params['pass'][0]]) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('id', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' NO',
                    'desc' => '<i class="bca-icon--desc"></i>'.' NO'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('name', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' バナー',
                    'desc' => '<i class="bca-icon--desc"></i>'.' バナー'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
                <br />
                <?php echo $this->Paginator->sort('name', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' ファイル名',
                    'desc' => '<i class="bca-icon--desc"></i>'.' ファイル名'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('alt', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' ALT',
                    'desc' => '<i class="bca-icon--desc"></i>'.' ALT'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
                <br />
                <?php echo $this->Paginator->sort('url', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' リンク先URL',
                    'desc' => '<i class="bca-icon--desc"></i>'.' リンク先URL'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <?php echo $this->BcListTable->dispatchShowHead() ?>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('created', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' 登録日',
                    'desc' => '<i class="bca-icon--desc"></i>'.' 登録日'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
                <br />
                <?php echo $this->Paginator->sort('modified', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' 更新日',
                    'desc' => '<i class="bca-icon--desc"></i>'.' 更新日'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo __d('baser', 'アクション') ?>
            </th>
<?php else: ?>
            <?php echo $this->BcForm->input('Sort.bannnerId', array('type'  => 'hidden', 'class' => 'id', 'value' => $bannerArea['BannerArea']['id'])) ?>
            <th class="row-tools bca-table-listup__thead-th">
                <?php $this->BcBaser->link('<i class="bca-btn-icon-text" data-bca-btn-type="draggable"></i>' . __d('baser', 'ノーマル'), ['sortmode' => 0, $this->request->params['pass'][0]]) ?>
            </th>
            <th class="bca-table-listup__thead-th">NO</th>
            <th class="bca-table-listup__thead-th">バナー<br />ファイル名</th>
            <th class="bca-table-listup__thead-th">ALT<br />リンク先URL</th>
            <?php echo $this->BcListTable->dispatchShowHead() ?>
            <th class="bca-table-listup__thead-th">登録日<br />更新日</th>
            <th class="bca-table-listup__thead-th"><?php echo __d('baser', 'アクション') ?></th>
<?php endif ?>
        </tr>
    </thead>
<tbody>
<?php if(!empty($datas)): ?>
    <?php foreach($datas as $data): ?>
        <?php $this->BcBaser->element('banner_files/index_row', array('data' => $data)) ?>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="<?php echo $this->BcListTable->getColumnNumber() ?>"><p class="no-data">データがありません。</p></td>
    </tr>
<?php endif ?>
    </tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>

<section class="bca-actions">
    <div class="bca-actions__main">
    <?php $this->BcBaser->link('バナーエリア一覧に戻る',
        ['controller' => 'banner_areas', 'action' => 'index'],
        ['class' => 'bca-btn  bca-actions__item', 'data-bca-btn-type' => 'back-to-list']
    ) ?>
    </div>
</section>
<?php else: ?>
<table cellpadding="0" cellspacing="0" class="list-table sort-table" id="ListTable">
    <thead>
        <tr>
            <th style="width: 50px" class="list-tool">
                <div>
                    <?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('alt' => '新規追加', 'class' => 'btn')). __d('baser', '新規追加'), array('action' => 'add', $bannerArea['BannerArea']['id'])) ?>
<?php if(!$sortmode): ?>
                    <?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_sort.png', array('alt' => '並び替え', 'class' => 'btn')). __d('baser', '並び替え'), array($bannerArea['BannerArea']['id'], 'sortmode' => 1)) ?>
<?php else: ?>
                    <?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_sort.png', array('alt' => 'ノーマル', 'class' => 'btn')). __d('baser', 'ノーマル'), array($bannerArea['BannerArea']['id'], 'sortmode' => 0)) ?>
<?php endif ?>
                </div>
            </th>
<?php if(!$sortmode): ?>
            <th><?php echo $this->Paginator->sort('no', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' NO',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' NO'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('name', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' バナー',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' バナー'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
                <br />
                <?php echo $this->Paginator->sort('name', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' ファイル名',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' ファイル名'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('alt', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' ALT',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' ALT'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
                <br />
                <?php echo $this->Paginator->sort('url', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' リンク先URL',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' リンク先URL'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <?php echo $this->BcListTable->dispatchShowHead() ?>
            <th><?php echo $this->Paginator->sort('created', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 登録日',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 登録日'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
                <br />
                <?php echo $this->Paginator->sort('modified', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 更新日',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 更新日'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
<?php else: ?>
            <?php echo $this->BcForm->input('Sort.bannnerId', array('type'  => 'hidden', 'class' => 'id', 'value' => $bannerArea['BannerArea']['id'])) ?>
            <th>NO</th>
            <th>バナー<br />ファイル名</th>
            <th>ALT<br />リンク先URL</th>
            <?php echo $this->BcListTable->dispatchShowHead() ?>
            <th>登録日<br />更新日</th>
<?php endif ?>
        </tr>
    </thead>
<tbody>
<?php if(!empty($datas)): ?>
    <?php foreach($datas as $data): ?>
        <?php $this->BcBaser->element('banner_files/index_row', array('data' => $data)) ?>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="<?php echo $this->BcListTable->getColumnNumber() ?>"><p class="no-data">データがありません。</p></td>
    </tr>
<?php endif ?>
    </tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
<?php endif ?>

