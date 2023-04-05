<?php
/**
 * [BANNER] バナーエリア管理 一覧
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<?php if($this->BcBaser->siteConfig['admin_theme'] == 'admin-third'): ?>
<table cellpadding="0" cellspacing="0" class="list-table sort-table bca-table-listup" id="ListTable">
    <thead class="bca-table-listup__thead">
        <tr>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('id', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' NO',
                    'desc' => '<i class="bca-icon--desc"></i>'.' NO'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('name', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' 表示場所',
                    'desc' => '<i class="bca-icon--desc"></i>'.' 表示場所'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('width', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' 横幅',
                    'desc' => '<i class="bca-icon--desc"></i>'.' 横幅'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
            <th class="bca-table-listup__thead-th">
                <?php echo $this->Paginator->sort('height', [
                    'asc' => '<i class="bca-icon--asc"></i>'.' 高さ',
                    'desc' => '<i class="bca-icon--desc"></i>'.' 高さ'
                ], ['escape' => false, 'class' => 'btn-direction bca-table-listup__a']
            ) ?>
            </th>
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
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($datas)): ?>
            <?php foreach($datas as $data): ?>
                <?php $this->BcBaser->element('banner_areas/index_row', array('data' => $data)) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6"><p class="no-data">データがありません。</p></td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
<?php else: ?>
<table cellpadding="0" cellspacing="0" class="list-table sort-table" id="ListTable">
    <thead>
        <tr>
            <th style="width: 50px" class="list-tool">
                <div>
                    <?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('alt' => '新規追加', 'class' => 'btn')). __d('baser', '新規追加'), array('action' => 'add')) ?>
                </div>
            </th>
            <th><?php echo $this->Paginator->sort('id', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' NO',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' NO'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('name', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 表示場所',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 表示場所'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('width', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 横幅',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 横幅'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('height', array(
                    'asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')).' 高さ',
                    'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')).' 高さ'),
                    array('escape' => false, 'class' => 'btn-direction')) ?>
            </th>
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
        </tr>
    </thead>
<tbody>
<?php if(!empty($datas)): ?>
    <?php foreach($datas as $data): ?>
        <?php $this->BcBaser->element('banner_areas/index_row', array('data' => $data)) ?>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6"><p class="no-data">データがありません。</p></td>
    </tr>
<?php endif ?>
    </tbody>
</table>
<?php endif ?>
<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
