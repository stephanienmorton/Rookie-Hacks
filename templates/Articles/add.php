<h1>Add Article</h1>
<?= $this->Html->css('add.css') ?>
<div class="add-article">
<h4>Drag down the body text box from the bottom right corner to expand it!</h4>
<?php
    echo $this->Form->create($article);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>
</div>