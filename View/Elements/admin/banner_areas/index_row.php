<?php
/**
 * [BANNER] バナーエリア管理　行
 *
 * @copyright       Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link            http://www.d-zero.co.jp/
 * @package         Banner
 * @license         MIT
 */
?>
<tr>
    <td class="bca-table-listup__tbody-td">
        <?php echo $data['BannerArea']['id']; ?>
    </td>
    <td class="bca-table-listup__tbody-td">
        <?php echo $this->BcBaser->link($data['BannerArea']['name'], array('controller' => 'banner_files', 'action' => 'index', $data['BannerArea']['id']), array('title' => 'バナー管理')) ?>
    </td>
    <td class="bca-table-listup__tbody-td">
        <?php echo $data['BannerArea']['width'] ?>
    </td>
    <td class="bca-table-listup__tbody-td">
        <?php echo $data['BannerArea']['height'] ?>
    </td>
    <td style="white-space: nowrap" class="bca-table-listup__tbody-td">
        <?php echo $this->BcTime->format('Y-m-d', $data['BannerArea']['created']) ?>
        <br />
        <?php echo $this->BcTime->format('Y-m-d', $data['BannerArea']['modified']) ?>
    </td>
    <td style="white-space: nowrap" class="row-tools bca-table-listup__tbody-td">
        <?php $this->BcBaser->link(
            '',
            ['controller' => 'banner_files', 'action' => 'index', $data['BannerArea']['id']],
            ['title' => 'バナー管理', 
            'class' => 'bca-btn-icon', 
            'data-bca-btn-type' => 'th-list', 
            'data-bca-btn-size' => 'lg'
        ]) ?>
        <?php $this->BcBaser->link(
            '',
            ['action' => 'edit', $data['BannerArea']['id']],
            ['title' => '編集', 
            'class' => 'bca-btn-icon', 
            'data-bca-btn-type' => 'edit', 
            'data-bca-btn-size' => 'lg'
        ]) ?>
        <?php $this->BcBaser->link(
            '',
            ['action' => 'ajax_copy', $data['BannerArea']['id']],
            ['title' => 'コピー', 
            'class' => 'btn-copy bca-btn-icon', 
            'data-bca-btn-type' => 'copy', 
            'data-bca-btn-size' => 'lg'
        ]) ?>
        <?php $this->BcBaser->link(
            '',
            ['action' => 'ajax_delete', $data['BannerArea']['id']],
            ['title' => '削除',
            'class' => 'btn-delete bca-btn-icon',
            'data-bca-btn-type' => 'delete', 
            'data-bca-btn-size' => 'lg'
        ]) ?>
    </td>
</tr>
