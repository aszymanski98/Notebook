<div class="show" style="padding: 0;">

  <?php $note = $params['note'] ?? null ?>

  <?php if ($note) : ?>

    <h2>Note details</h2>

    <ul class="details">
      <li>Title: <?php echo $note['title'] ?></li>
      <li>Description: <?php echo $note['description'] ?></li>
      <li>Created time: <?php echo $note['inserted_ts'] ?></li>
      <li>Last update time: <?php echo $note['updated_ts'] ?? "-" ?></li>
    </ul>

  <?php else : ?>

    <div style="padding: 20px 10px;">
      Lack of note to display
    </div>

  <?php endif; ?>

  <a href="/"><button>Go back to list</button></a>
</div>