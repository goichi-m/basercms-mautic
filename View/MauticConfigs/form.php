

<!-- form -->
<?php echo $this->BcForm->create('MauticConfig', array('enctype' => 'multipart/form-data')) ?>
<div class="section">
<h2>Mautic基本設定</h2>
  <table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
    <?php if ($this->action == 'admin_edit'): ?>
      <tr>
        <th class="col-head"><?php echo $this->BcForm->label('MauticConfig.id', 'NO') ?></th>
        <td class="col-input">
          <?php echo $this->BcForm->value('MauticConfig.id') ?>
          <?php echo $this->BcForm->input('MauticConfig.id', array('type' => 'hidden')) ?>
        </td>
      </tr>
    <?php endif; ?>
    <tr>
      <th class="col-head"><?php echo $this->BcForm->label('MauticConfig.base_url', 'MauticインストールURL') ?></th>
      <td class="col-input">
        <?php echo $this->BcForm->input('MauticConfig.base_url', array(
          'type' => 'text'
        )) ?>
        <?php echo $this->BcForm->error('MauticConfig.base_url') ?>
        <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
        <div id="helptextName" class="helptext">
          <ul>
            <li>MauticのインストールURLを入力してください。例えばMauticのログイン画面URLが以下の場合、赤字の部分がインストールURLになります（最後がスラッシュで終わります）。</li>
            <li>（ex. <span style="font-weight: bold;color:#f00;">https://hogehoge/</span>s/login）</li>
          </ul>
        </div>
      </td>
    </tr>
  </table>
</div>
  <!-- button -->
  <div class="submit">
    <?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
  </div>

  <?php echo $this->BcForm->end() ?>
