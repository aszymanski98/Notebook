<div class="list">
  <section>

    <div class="error">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'noteNotFound':
            echo 'Note has not been found';
            break;

          case 'missingNoteId':
            echo "Invalid note's identification data";
            break;
        }
      }
      ?>
    </div>

    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Note has been created';
            break;

          case 'edited':
            echo 'Note has been updated';
            break;

          case 'deleted':
            echo 'Note has been deleted';
            break;
        }
      }
      ?>
    </div>

    <?php
    $sort = $params['sort'] ?? [];
    $by = $sort['by'] ?? 'inserted_ts';
    $order = $sort['order'] ?? 'desc';

    $page = $params['page'] ?? [];
    $size = (int) $page['size'] ?? 10;
    $currentPage = (int) $page['number'] ?? 1;
    $pages = (int) $page['pages'] ?? 1;

    $phrase = $params['phrase'] ?? null;
    ?>

    <form class="settings-form" action="/" method="GET">

      <div>Search:
        <input type="text" name="phrase" value="<?php echo $phrase ?>">
      </div>

      <div>Sort by:
        <label>Title:<input type="radio" name="sortby" value="title" <?php echo $by === 'title' ? 'checked' : '' ?>></label>
        <label>Date:<input type="radio" name="sortby" value="inserted_ts" <?php echo $by === 'inserted_ts' ? 'checked' : '' ?>></label>
      </div>

      <div style="margin-bottom: 10px;">Sort order:
        <label>Ascending:<input type="radio" name="sortorder" value="asc" <?php echo $order === 'asc' ? 'checked' : '' ?>></label>
        <label>Descending:<input type="radio" name="sortorder" value="desc" <?php echo $order === 'desc' ? 'checked' : '' ?>></label>
      </div>

      <div style="margin-bottom: 10px;">Page size:

        <select name="pagesize">
          <option value="1" <?php echo $size === 1 ? 'selected' : '' ?>>1</option>
          <option value="5" <?php echo $size === 5 ? 'selected' : '' ?>>5</option>
          <option value="10" <?php echo $size === 10 ? 'selected' : '' ?>>10</option>
          <option value="25" <?php echo $size === 25 ? 'selected' : '' ?>>25</option>
        </select>
      </div>

      <button type="submit">Sort</button>
    </form>

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
          <?php foreach ($params['notes'] ?? [] as $note) : ?>
            <tr>
              <td style="display: none;"><?php echo $note['id'] ?></td>
              <td><?php echo $note['title'] ?></td>
              <td><?php echo $note['inserted_ts'] ?></td>
              <td>
                <a href="/?action=show&id=<?php echo $note['id'] ?>"><button>Show</button></a>
                <a href="/?action=delete&id=<?php echo $note['id'] ?>"><button>Delete</button></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

    <?php
    $paginationUrl = "&phrase=$phrase&pagesize=$size?sortby=$by&sortorder=$order";
    ?>

    <ul class="pagination">
      <?php if ($currentPage !== 1) : ?>
        <li>
          <a href="/?page=<?php echo ($currentPage - 1)  . $paginationUrl ?>">
            <button>
              < </button>
          </a>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <li>
          <a href="/?page=<?php echo $i . $paginationUrl ?>">
            <button><?php echo $i ?></button>
          </a>
        </li>
      <?php endfor; ?>

      <?php if ($currentPage < $pages) : ?>
        <li>
          <a href="/?page=<?php echo $currentPage + 1 . $paginationUrl ?>">
            <button>
              > </button>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </section>
</div>