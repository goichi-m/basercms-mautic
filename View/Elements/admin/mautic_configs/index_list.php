

<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table  sort-table" id="ListTable">
  <thead>
    <tr>
      <th class="list-tool">
      </th>
      <th>No</th>
      <th>Mautic</th>
      <th>
      <?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . ' 登録日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . ' 登録日'), array('escape' => false, 'class' => 'btn-direction')) ?><br />
      <?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . ' 更新日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . ' 更新日'), array('escape' => false, 'class' => 'btn-direction')) ?>
      </th>
      </tr>
      </thead>
      <tbody>
      <?php if (!empty($mautics)): ?>
      <?php foreach ($mautics as $data): ?>
      <?php $this->BcBaser->element('mautic_configs/index_row', array('data' => $data)) ?>
      <?php endforeach; ?>
      <?php else: ?>
      <tr>
      <td colspan="9"><p class="no-data">未設定です。（ <?php $this->BcBaser->link('設定をする', array('action' => 'add')) ?> ）</p></td>
      </tr>
      <?php endif; ?>
      </tbody>
      </table>

      <!-- list-num -->
      <?php $this->BcBaser->element('list_num') ?>
