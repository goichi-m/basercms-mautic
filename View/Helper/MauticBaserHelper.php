<?php
/*
* Mauticプラグイン
* ヘルパー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Mautic Plugin Project
* @since        ver.0.9.0
*/
App::uses('AppHelper', 'View/Helper');
App::import('Model', 'Mautic.MauticConfig');

class MauticBaserHelper extends AppHelper {

  /**
  * ヘルパー
  *
  * @var array
  */
  public $helpers = array('BcBaser', 'Session');



  public function mauticTrackingCode(){
    if($this->BcBaser->isMail()){
      $mailContentId = $this->_View->viewVars['mailContent']['MailContent']['id'];
      if($this->action == 'thanks'){
        echo $this->_getSubmitCode($mailContentId);
      } else {
        echo $this->_getCode();
      }
    } else {
      echo $this->_getCode();
    }
  }


  public function _getCode(){
    $model = new MauticConfig();
    $mauticConfig = $model->find('first');
    $mauticURL = $mauticConfig['MauticConfig']['base_url'];
    if(!empty($mauticURL)){
      $js = <<< EOF
<script>
(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
})(window,document,'script','{$mauticURL}mtc.js','mt');
mt('send', 'pageview');
</script> 
EOF;
      return $js;
    } else {
      return false;
    }

  }


  public function _getSubmitCode($mailContentId = null){
    $model = new MauticConfig();
    $mauticConfig = $model->find('first');
    $mauticURL = $mauticConfig['MauticConfig']['base_url'];
    if(!empty($mauticURL)){
      if(empty($mailContentId)){
        return false;
      }
      //consume は読み込んだあとに破棄する。
      $mailData = $this->Session->consume('Mautic.'.$mailContentId);
      if(empty($mailData)){
        return false;
      } else {
        $ma_count = 0;
        $ma_tag = '{';
        $ma_data = $mailData;
        foreach ($ma_data as $key => $value) {
          if($ma_count !== 0){
            $ma_tag .= ',';
          }
          $ma_tag .= $key . ':\'' . preg_replace('/(?:\n|\r|\r\n)/','　',$value) . '\''; //改行を削除して格納
          ++$ma_count;
        }
        $ma_tag .= '}';
        $js = <<< EOF
<script>
(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
})(window,document,'script','{$mauticURL}mtc.js','mt');
mt('send', 'pageview', {$ma_tag});
</script>
EOF;
        return $js;
      }
    } else {
      return false;
    }

  }
}
