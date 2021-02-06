<?php
/*
* Mauticプラグイン
* 設定情報モデル
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Mautic Plugin Project
* @since        ver.0.9.0
*/

/**
* Include files
*/
App::uses('MauticApp', 'Mautic.Model');

/**
* Mautic設定情報
*
* @package baser.plugins.mautic
*/
class MauticConfig extends MauticApp {

  /**
  * クラス名
  *
  * @var string
  * @access public
  */
  public $name = 'MauticConfig';

  /**
  * プラグイン名
  *
  * @var string
  * @access public
  */
  public $plugin = 'Mautic';

  /**
  * DB接続時の設定
  *
  * @var string
  * @access public
  */
  public $useDbConfig = 'plugin';


  /**
  * validate
  *
  * @var array
  */
  public $validate = array(
  );

}
