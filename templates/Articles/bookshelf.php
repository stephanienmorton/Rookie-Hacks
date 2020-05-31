<div class="explore">
<?= $this->Html->css('index.css') ?>
<h1>Your Stories</h1>
<div class="list">
<p><?= $this->Html->link("Begin writing a new story", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th></th>
    </tr>

<!-- Here's where we iterate through our $articles query object, printing out article info -->
<?php foreach ($articles as $article): ?>
    <?php if ($article->user_id == $this->getRequest()->getAttribute('identity')->id): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->slug],
                    ['confirm' => 'Are you sure?'])
                ?>
        </td>
    </tr>
    <?php else: ?>
        <!-- <p>Read!</p> -->
    <?php endif ?>
<?php endforeach; ?>

</table>
</div>
<div>