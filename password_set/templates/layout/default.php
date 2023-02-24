<?php
 $cakeDescription = 'CakePHP: customTemplate';?>
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


    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
  
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
    <?= $this->Html->css(['cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script(['jquery' ]) ?>
    <?= $this->Html->script(['validate' ]) ?>
    <?= $this->Html->script(['myjs' ]) ?>
    <?= $this->Html->script(['ajax']) ?>


    <?= $this->Html->css(['sweetalert.min.css']) ?>
    <?= $this->Html->script(['sweetalert.min.js']) ?>


</head>
<body>
    
    <main class="main">
        <div class="container-fluid p-0">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
