<?php
App::uses('CakeSession','Model/Datasource');

class MauticControllerEventListener extends BcControllerEventListener {


  /**
   * 登録イベント
   *
   * @var array
   */
  public $events = array(
    'Mail.Mail.afterSendEmail'
  );


  public function mailMailAfterSendEmail(CakeEvent $event){
    //Sessionをつかってサンクスページに持ち込む。
    $post = $event->data["data"]["MailMessage"];
    $mailContentId = $event->subject->dbDatas["mailContent"]["MailContent"]["id"];
    $session = new CakeSession();
    $sessionName = 'Mautic.'.$mailContentId;
    $session->write($sessionName, $post);
  }
}