<?php
/*
* プラグイン
* 管理コントローラー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Mautic Plugin Project
* @since        ver.0.9.0
*/

/**
*  管理コントローラー
*
* @package baser.plugins.property
*/
class MauticConfigsController extends MauticAppController {

  /**
  * クラス名
  *
  * @var string
  * @access public
  */
  public $name = 'MauticConfigs';

  /**
  * コンポーネント
  *
  * @var array
  * @access public
  */
  public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure', 'Security', 'BcContents');

  /**
  * モデル
  *
  * @var array
  * @access public
  */
  public $uses = array(
    'Mautic.MauticConfig'
  );

  /**
  * ぱんくずナビ
  *
  * @var string
  * @access public
  */
  public $crumbs = array(
  array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
  array('name' => '管理', 'url' => array('controller' => 'mautic_configs', 'action' => 'index'))
  );

  /**
  * サブケースエレメント
  *
  * @var array
  * @access public
  */
 // public $subMenuElements = array('mautic');

  /**
  * beforeFilter
  *
  * @return	void
  * @access 	public
  */
  public function beforeFilter() {
    parent::beforeFilter();
  }

  /**
  * [ADMIN] 一覧表示
  *
  * @return void
  */
  public function admin_index() {
  	// 画面表示情報設定
  	$default = array(
  		'named' => array(
  			'num' => $this->siteConfigs['admin_list_num']
  		),
  	);
    $this->setViewConditions('MauticConfig', array('default' => $default));

    $this->set('sortmode', false);
    //設定
    $this->paginate = array(
      'fields' => array(),
      'order' => 'MauticConfig.id',
      'limit' => $this->passedArgs['num']
    );

    /* 表示設定 */
    $this->set('mautics', $this->paginate('MauticConfig'));
    $this->pageTitle = '設定情報';
    $this->help = 'mautic_configs_index';
  }

  /**
  * [ADMIN] 新規登録
  *
  * @return void
  */
  public function admin_add() {

    if($this->request->data){
      if($this->MauticConfig->save($this->request->data)){
        $this->setMessage('Mauticの基本設定を設定しました。', false, true);
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setMessage('入力エラーです。', true);
      }
    }

    /* 表示設定 */
    $this->pageTitle = '基本設定';
    $this->help = 'mautic_configs_form';
    $this->render('form');
  }

  /**
  * [ADMIN] 編集
  *
  * @param int $id 物件登録ID
  * @return void
  */
  public function admin_edit() {


    if($this->request->data){
      if($this->MauticConfig->save($this->request->data)){
        $this->setMessage('Mauticの基本設定を設定しました。', false, true);
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setMessage('入力エラーです。', true);
      }
    } else {
      $data = $this->MauticConfig->findById(1);
      $this->request->data = $data;
    }

    /* 表示設定 */
    $this->pageTitle = '基本設定';
    $this->help = 'mautic_configs_form';
    $this->render('form');
  }

}
