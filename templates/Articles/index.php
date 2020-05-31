<div class="explore">
<?= $this->Html->css('index.css') ?>
<h1>All Stories</h1>
<a href="/">Return to homepage</a>
<div class="list">
<h4>Looking for inspiration? Check out what your fellow community writers have been working on!</h4>
<p><?= $this->Html->link("I'm inspired! Create new story!", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th></th>
    </tr>

<!-- Here's where we iterate through our $articles query object, printing out article info -->
<?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?php if ($article->user_id == $this->getRequest()->getAttribute('identity')->id): ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->slug],
                    ['confirm' => 'Are you sure?'])
                ?>
            <?php else: ?>
               <!-- <p>Read!</p> -->
            <?php endif ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>
</div>
<div>