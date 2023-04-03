<?php
/**
 * [BANNER] コントローラ
 *
 * @copyright		Copyright 2014 - 2018, D-ZERO Co.,LTD.
 * @link			http://www.d-zero.co.jp/
 * @package			Banner
 * @license			MIT
 */
App::uses('Banner.BannerApp', 'Controller');
class BannerController extends BannerAppController {
	/**
	 * コントローラー名
	 *
	 * @var string
	 */
	public $name = 'Banner';
	
	/**
	 * モデル
	 *
	 * @var array
	 */
	public $uses = array('Banner.BannerFile', 'Banner.BannerArea');
	
	/**
	 * ヘルパー
	 *
	 * @var array
	 */
	public $helpers = array('Banner.Banner', 'BcUpload');
	
	/**
	 * コンポーネント
	 * 
	 * @var array
	 */
	public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');
	
	/**
	 * サブメニューエレメント
	 *
	 * @var array
	 */
	public $subMenuElements = array();
	
	/**
	 * ぱんくずナビ
	 *
	 * @var array
	 */
	public $crumbs = array();
	
	/**
	 * beforeFilter
	 *
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		/* 認証設定 */
		$this->BcAuth->allow(
			'index', 'mobile_index', 'smartphone_index'
		);
	}
	
	/**
	 * バナー一覧を表示する
	 * 
	 * @param int $bannerArea
	 */
	public function index($bannerArea = null) {
		if (!$bannerArea) {
			$bannerArea = 1;
		}
		
		$conditions = array(
			'BannerFile.banner_area_id' => $bannerArea
		);
		$conditions = Hash::merge($conditions, $this->BannerFile->getConditionAllowPublish());
		$datas = $this->BannerFile->find('all', array(
			'conditions' => $conditions
		));
		
		// バナー画像の保存先パスを作成する
		$fileUrl = $this->webroot . 'files' .DS. $this->BannerFile->actsAs['BcUpload']['saveDir'] .DS;
		
		foreach ($datas as $key => $data) {
			if ($datas[$key]['BannerFile']['name']) {
				$datas[$key]['BannerFile']['name'] = $fileUrl . $datas[$key]['BannerFile']['name'];
			}
		}
		
		$this->set(compact('datas'));
		$this->layout = null;
	}
	
	/**
	 * [SMARTPHONE] バナー一覧を表示する
	 *
	 */
	public function smartphone_index() {
		$this->setAction('index');
	}
	
	/**
	 * [MOBILE] バナー一覧を表示する
	 *
	 */
	public function mobile_index() {
		$this->setAction('index');
	}

}
