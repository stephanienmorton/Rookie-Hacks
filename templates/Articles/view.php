<h1><?= h($article->title) ?></h1>
<a href="/">Return to homepage</a>
<?= $this->Html->css('view.css') ?>
<div class="view-story">
<p><?= h($article->body) ?></p>
<!-- <p><b>Tags:</b> <?= h($article->tag_string) ?></p> -->
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></large></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></p>
</div>