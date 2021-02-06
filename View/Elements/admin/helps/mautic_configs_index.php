<p><?php echo __d('baser', 'MauticのインストールURLを設定してください。')?></p>
<ul>
  <li>
    設定後は下記のヘルパーをテンプレートに記述してください。自動でトラッキングコードが出力されます。
  </li>
</ul>

<pre>
      <?php echo  htmlspecialchars('<?php $this->BcBaser->mauticTrackingCode() ?>') ?>
</pre>
