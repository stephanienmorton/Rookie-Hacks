<h1>Workshop your story</h1>
<?= $this->Html->css('edit.css') ?>
<a href="/">Return to homepage</a>
<div class="edit-article">
<h4>Drag down the body text box from the bottom right corner to expand it!</h4>
<?php
    echo $this->Form->create($article);
    // echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '100']);
    // echo $this->Form->control('tag_string', ['type' => 'text']);
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>
</div>