<div class="list">
  <section>
    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Note has been created';
            break;
        }
      }
      ?>
    </div>

    <div class="tbl-header" style="margin: 0">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th style="display: none;">Id</th>
            <th>Title</th>
            <th>Date</th>
            <th>Options</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php foreach ($params['notes'] as $note) : ?>
            <tr>
              <td style="display: none;"><?php echo $note['id'] ?></td>
              <td><?php echo $note['title'] ?></td>
              <td><?php echo $note['inserted_ts'] ?></td>
              <td>Options</td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </section>
</div>