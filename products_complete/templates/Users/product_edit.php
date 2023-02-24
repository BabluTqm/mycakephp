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
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                  <?= $this->Html->link(__('Add New User'), ['action' => 'adduser'], ['class' => 'btn btn-danger m-5 p-2 float-right']) ?>
                  <table class="table table-border datatable">

                  <?= $this->Form->create($product, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Product') ?></legend>
                <?php
                    echo $this->Form->control('product_title');
                    echo $this->Form->control('product_description');
                    echo $this->Form->control('product_category_id', ['options' => $productCategories]);
                    echo $this->Form->control('product_image', ['type' => 'file']);
                    echo $this->Html->image(h($product->product_image), array('width' => '250px'));
                    echo $this->Form->control('product_tags');
                    echo $this->Form->control('status');
                    // echo $this->Form->control('created_date');
                    // echo $this->Form->control('modified_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>


                </div>
                </section>
            </main>

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
</body>

</html>


