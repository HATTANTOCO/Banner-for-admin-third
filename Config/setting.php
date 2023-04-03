<?php
/**
 * [BANNER] SystemNavi
 *
 * @copyright		Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link			http://www.d-zero.co.jp/
 * @package			Banner
 * @license			MIT
 */
/**
 * システムナビ
 */
$config['BcApp.adminNavi.banner'] = array(
		'name'		=> 'バナー プラグイン',
		'contents'	=> array(
			array('name' => 'バナーエリア一覧',
				'url' => array(
					'admin' => true,
					'plugin' => 'banner',
					'controller' => 'banner_areas',
					'action' => 'index')
			),
			array('name' => 'バナーエリア新規登録',
				'url' => array(
					'admin' => true,
					'plugin' => 'banner',
					'controller' => 'banner_areas',
					'action' => 'add')
			),
	)
);
// TODO bcUploadヘルパを使ってると SessionComponent が存在しない、というエラーが出る
// 以下で解消できるが影響範囲が掴めないため保留
// App::import('Component', 'Session');
/* $BannerArea = ClassRegistry::init('Banner.BannerArea');
$bannerAreas = $BannerArea->find('all', array('recursive' => -1));
if($bannerAreas) {
	foreach($bannerAreas as $bannerArea) {
		$bannerArea = $bannerArea['BannerArea'];
		$config['BcApp.adminNavi.banner']['contents'] = array_merge($config['BcApp.adminNavi.banner']['contents'], array(
			array('name' => '['.$bannerArea['name'].'] バナー一覧',		'url' => array('admin' => true, 'plugin' => 'banner', 'controller' => 'banner_areas', 'action' => 'index', $bannerArea['id'])),
			array('name' => '['.$bannerArea['name'].'] バナー登録',		'url' => array('admin' => true, 'plugin' => 'banner', 'controller' => 'banner_files', 'action' => 'add', $bannerArea['id'])),
			array('name' => '['.$bannerArea['name'].'] 設定',			'url' => array('admin' => true, 'plugin' => 'banner', 'controller' => 'banner_areas', 'action' => 'edit', $bannerArea['id'])),
		));
	}
}*/
