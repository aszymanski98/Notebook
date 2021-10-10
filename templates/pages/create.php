<h2>Add new note</h2>

<?php if ($params['created']) : ?>
  <div>
    <h4>Title: <?php echo $params['title'] ?></h4>
    <p>Content: <?php echo $params['description'] ?></p>
  </div>

<?php else : ?>
  <form class="note-form" action="/?action=create" method="post">

    <label>Title<span class="required">*</span>:</label>
    <input type="text" name="title" class="field-long" required />

    <label>Content:</label>
    <textarea name="description" id="field5" class="field-long field-textarea"></textarea>

    <input type="submit" value="Submit" />
  </form>

<?php endif; ?>