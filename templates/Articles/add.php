
<h1>Write a story</h1>
<a href="/">Return to homepage</a>
<?= $this->Html->css('add.css') ?>
<div class="add-article">
<h4>Drag down the body text box from the bottom right corner to expand it!</h4>
<?php
    echo $this->Form->create($article);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '100']);
    // echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>
</div>