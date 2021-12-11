<div class="show" style="padding: 0;">
    <h2>Edit note</h2>

    <?php if (!empty($params['note'])) : ?>
        <?php $note = $params['note']; ?>

        <form class="note-form" action="/?action=edit" method="post">
            <input name="id" type="hidden" value="<?php echo $note['id'] ?>">

            <label>Title:</label>
            <input type="text" name="title" class="field-long" value="<?php echo $note['title'] ?>" required/>

            <label>Content:</label>
            <textarea name="description" id="field5" class="field-long field-textarea"
                      value="<?php echo $note['description'] ?>"></textarea>

            <input type="submit" value="Save"/>
        </form>
    <?php else : ?>
        <div>Lack of note to display</div>
        <a href="/">
            <button>Go back to main page</button>
        </a>
    <?php endif; ?>


</div>