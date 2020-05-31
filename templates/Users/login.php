<div class="users form">
    <?= $this->Html->css('login.css') ?>
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <div class="login-form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Welcome back! Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <!-- <button class="button"> -->
    <div class="login-button">
    <?= $this->Form->submit(__('Login')); ?>
    <!-- </button> -->
    </div>
    <!-- <button class="button"> -->
    <?= $this->Html->link("New user? Sign up here!", ['action' => 'add']) ?>
    <!-- </button> -->
    <?= $this->Form->end() ?>

    
    </div>
</div>