<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductComment $productComment
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Comment'), ['action' => 'editComment', $productComment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Comment'), ['action' => 'deleteComment', $productComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productComment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Comments'), ['action' => 'indexComment'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Comment'), ['action' => 'addComment'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <?= $this->Html->css('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
  <?= $this->Html->css('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?> 
  <?= $this->Html->css('assets/vendor/boxicons/css/boxicons.min.css '); ?>
  <?= $this->Html->css('assets/vendor/quill/quill.snow.css'); ?> 
  <?= $this->Html->css('assets/vendor/quill/quill.bubble.css'); ?> 
  <?= $this->Html->css('assets/vendor/remixicon/remixicon.css '); ?>
  <?= $this->Html->css('assets/vendor/simple-datatables/style.css'); ?> 

  <!-- Template Main CSS File -->
  <?= $this->Html->css('style'); ?>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <?= $this->element('header'); ?>

<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?= $this->element('aside'); ?>

<!-- End Sidebar-->

  <main id="main" class="main">

    
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <?= $this->Flash->render() ?>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-9">
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                  
                  <table class="table table-border datatable">
            
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productComment->has('product') ? $this->Html->link($productComment->product->id, ['controller' => 'Products', 'action' => 'view', $productComment->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $productComment->has('user') ? $this->Html->link($productComment->user->id, ['controller' => 'Users', 'action' => 'view', $productComment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments') ?></th>
                    <td><?= h($productComment->comments) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productComment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($productComment->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($productComment->modified_date) ?></td>
                </tr>
            </table>


                      
                </div>
              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div><!-- End Left side columns -->

      
    

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?= $this->element('footer'); ?>

<!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?= $this->Html->script('assets/vendor/apexcharts/apexcharts.min.js'); ?>
  <?= $this->Html->script('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>
  <?= $this->Html->script('assets/vendor/chart.js/chart.umd.js'); ?>
  <?= $this->Html->script('assets/vendor/quill/quill.min.js'); ?>
  <?= $this->Html->script('assets/vendor/simple-datatables/simple-datatables.js'); ?>
  <?= $this->Html->script('assets/vendor/tinymce/tinymce.min.js'); ?>
  <?= $this->Html->script('assets/vendor/php-email-form/validate.js'); ?>


  <!-- Template Main JS File -->
  <?= $this->Html->script('main'); ?>
  <?= $this->Html->script('jquery'); ?>

</body>

</html>


