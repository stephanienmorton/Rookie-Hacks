<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="stylesheet" type="text/css" href="bootstap.php">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?= $this->Html->css('home.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <
</head>
<body>

    
    <main class="main">
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" >CC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav navbar-right">
      <li class="nav-item active">
        <a class="nav-link navbar-right" href="users\logout">Sign Out <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="users\add">New User</a>
      </li>
    </ul>
  </div>
</nav>
            <div class="content">
                <div class="container text-center">

            <h1>
                Creative Corner
            </h1>
        </div>
        <div class="container text-center">
          <div class="prompt">
            <h3>Prompt of the Day </h3>
            <p> Mundane fantastic: describe a completely normal object or scenario in a new perspective. Find beauty in places you might not expect!</p>
            </div>
            <div id = "writing">
            <!-- <?php $link_name = "Start Writing"; ?> -->
            <a href="Articles\add" style="text-decoration:none" class="btn btn-dark btn-lg" role="button" aria-pressed="true">Start Writing</a>
            <p id="warning"> IF YOU ARE NOT SIGNED IN YOUR STORY<br> WILL NOT BE SAVED</p>
          </div> 
        </div>


        <div class="grid">
  <div class="row">
    <div class="col-sm">
    <a href="#" style="text-decoration:none" class="btn btn-info btn-lg link btn1" role="button" aria-pressed="true"> Your <br> Bookshelf</a>
    </div>
    <div class="col-sm">
    <a href="articles/index" style="text-decoration:none" class="btn btn-info btn-lg link btn2" role="button" aria-pressed="true">Explore <br> Stories</a>
    </div>
    <div class="col-sm">
    <a href="#" style="text-decoration:none" class="btn btn-info btn-lg link btn3" role="button" aria-pressed="true">Find <br> Community</a>
    </div>
  </div>
</div>
        

     
       
        
       
        


        <!-- <div class="square2">
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Find <br> Community</a>
        </div>

        <div class="square">
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Find <br> Find <br> Community</a>
        </div> -->
<!-- 
        <div class="square">
        <a href="#" style="text-decoration:none" role="button" aria-pressed="true">Find <br> My <br> Bookshelf</a>
        </div>

        <div class="square2">
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Find <br> Community</a>
        </div>

        <div class="square">
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Find <br> Find <br> Community</a>
        </div> -->


        <!-- <a href="#" style="text-decoration:none" class="testing"  aria-pressed="true">Your <br> Bookshelf</a>
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Explore <br> Stories</a>
        <a href="#" style="text-decoration:none" class="btn btn-info btn-lg" role="button" aria-pressed="true">Find <br> Community</a> -->

                   
                </div>
            </div>
    </main>
</body>
</html>
