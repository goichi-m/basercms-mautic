<?php
App::import( 'Vendor', 'Mautic.MauticApi', array('file' => 'mautic_api-library' . DS .'lib' . DS . 'MauticApi.php'));
App::import( 'Vendor', 'Mautic.ApiAuth',
  array('file' => 'mautic_api-library' . DS .'lib' . DS . 'Auth' . DS . 'ApiAuth.php'));
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
    //return;
  }


  public function back_mailMailBeforeSendEmail(CakeEvent $event){

    /*
    $ip = "";
    $formId = 1;

    // Get IP from $_SERVER
    if (!$ip) {
      $ipHolders = array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
      );

      foreach ($ipHolders as $key) {
        if (!empty($_SERVER[$key])) {
          $ip = $_SERVER[$key];

          if (strpos($ip, ',') !== false) {
            // Multiple IPs are present so use the last IP which should be the most reliable IP that last connected to the proxy
            $ips = explode(',', $ip);
            array_walk($ips, create_function('&$val', '$val = trim($val);'));

            $ip = end($ips);
          }

          $ip = trim($ip);
          break;
        }
      }
    }

    $data = [
      'LastName' => 'maniwa',
      'FirstName' => 'goichi',
      'email' => 'g.maniwa@hiniarata.jp'
    ];

    $data['formId'] = $formId;

    // return has to be part of the form data array
    if (!isset($data['return'])) {
      $data['return'] = 'https://hiniarata.jp/';
    }





    $data = array('mauticform' => $data);

    // Change [path-to-mautic] to URL where your Mautic is
    $formUrl =  'https://hiniarata.jp/mautic/form/submit?formId=' . $formId;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $formUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Forwarded-For: $ip"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);

    var_dump($response);
    exit;

    return $response;

    /*
    $settings = array(
      'baseUrl'      => 'https://hiniarata.jp/mautic/',
      'version'      => 'OAuth2',
      'clientKey'    => '1_14numf0wsri8wwwskcosw4so80owo0o00wo0wso8sckg4s4kk4',
      'clientSecret' => '2xlgobm1s0ao8ccks8w004o4gc84scgg440ggogwogow8gkwgo',
      'callback'     => 'https://hiniarata.jp/'
    );

// Initiate the auth object
    $initAuth = new \Mautic\Auth\ApiAuth();
    $auth     = $initAuth->newAuth($settings);

// Initiate process for obtaining an access token; this will redirect the user to the authorize endpoint and/or set the tokens when the user is redirected back after granting authorization

    if ($auth->validateAccessToken()) {
      if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();

        //store access token data however you want
      }
    }

    //$api = new \Mautic\Auth\ApiAuth();
    //var_dump($event->data);
    exit;
    */

    //return;
  }

}