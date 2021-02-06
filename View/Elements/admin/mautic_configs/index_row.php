
<tr class="publish">
  <td class="row-tools">
    <?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn')), array('action' => 'edit', 1), array('title' => '編集')) ?>
  </td>
  <td><?php echo $data['MauticConfig']['id'] ?></td>
  <td><?php echo $data['MauticConfig']['base_url'] ?></td>
  <td style="white-space:nowrap">
  <?php echo $this->BcTime->format('Y-m-d', $data['MauticConfig']['created']); ?><br />
  <?php echo $this->BcTime->format('Y-m-d', $data['MauticConfig']['modified']); ?>
  </td>
</tr>
