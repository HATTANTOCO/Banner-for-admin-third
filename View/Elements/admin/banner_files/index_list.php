<?php
/**
 * [BANNER] バナー管理 一覧
 *
 * @copyright		Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link			http://www.d-zero.co.jp/
 * @package			Banner
 * @license			MIT
 */
$this->BcListTable->setColumnNumber(6);
?>
<style>
	.cboxElement img {
		max-width: 200px;
	}
</style>

<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table sort-table" id="ListTable">
	<thead>
		<tr>
			<th style="width: 50px" class="list-tool">
				<div>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => '新規追加', 'class' => 'btn')), array('action' => 'add', $bannerArea['BannerArea']['id'])) ?>
<?php if(!$sortmode): ?>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_sort.png', array('width' => 65, 'height' => 14, 'alt' => '並び替え', 'class' => 'btn')), array($bannerArea['BannerArea']['id'], 'sortmode' => 1)) ?>
<?php else: ?>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_normal.png', array('width' => 65, 'height' => 14, 'alt' => 'ノーマル', 'class' => 'btn')), array($bannerArea['BannerArea']['id'], 'sortmode' => 0)) ?>
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
			<?php echo $this->BcForm->input('Sort.bannnerId', array('type'	=> 'hidden', 'class' => 'id', 'value' => $bannerArea['BannerArea']['id'])) ?>
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
<?php endif; ?>
	</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
