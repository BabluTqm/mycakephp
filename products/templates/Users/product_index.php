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
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
  <?= $this->Html->link(__('DashBoard'), ['action' => 'home'], ['class' => 'nav-link collapsed bi  bi-grid']) ?>

  </li>


  <li class="nav-item">
  <?= $this->Html->link(__('All User'), ['action' => 'index'], ['class' => 'nav-link collapsed bi  bi-people']) ?>

  </li>
 
  <!-- <li class="nav-heading">Pages</li> -->

  <li class="nav-item">
      <?= $this->Html->link(__('Profile'), ['action' => ''], ['class' => 'nav-link collapsed bi  bi-person']) ?>
  </li>

  <li class="nav-item">
      <?= $this->Html->link(__('Category'), ['action' => 'productcatIndex'], ['class' => 'nav-link collapsed bi  bi-card-list']) ?>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li> -->
  <!-- End Contact Page Nav -->

  <li class="nav-item">
  <?= $this->Html->link(__('Product'), ['action' => 'productIndex'], ['class' => 'nav-link collapsed bi  bi-card-list']) ?>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
      <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'nav-link collapsed bi bi-box-arrow-in-right']) ?>
  </li>



</ul>

</aside>
<!-- ======= Sidebar ======= -->
 

<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Listing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Product list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?= $this->Flash->render() ?>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                  <?= $this->Html->link(__('Add Product'), ['action' => 'productAdd'], ['class' => 'btn btn-danger m-5 p-2 float-right']) ?>
                  <table class="table table-border datatable">
                  <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_title') ?></th>
                    <th><?= $this->Paginator->sort('product_category_id') ?></th>
                    <th><?= $this->Paginator->sort('product_image') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $count = 0; ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= (++$count) ?></td>
                    <td><?= h($product->product_title) ?></td>
                    <td><?= $product->has('product_category') ? $this->Html->link($product->product_category->id, ['action' => 'productcatView', $product->product_category->id]) : '' ?></td>
                    <td><?= $this->Html->Image($product->product_image) ?></td>
                    <!-- <td><?= h($product->status) ?></td> -->
                    <td>
                    <?php if($product->status == 1) : ?>
                    <?= $this->Form->postLink(__('Active'), ['action' => 'productStatus', $product->id ,$product->status], ['confirm' => __('Are you sure you want to Inactive # {0}?', $product->id)]) ?>

                    <?php else: ?>
                    <?= $this->Form->postLink(__('Inactive'), ['action' => 'productStatus', $product->id ,$product->status], ['confirm' => __('Are you sure you want to Active # {0}?', $product->id)]) ?>
                    <?php endif ; ?>


                    </td>
                    <td><?= h($product->created_date) ?></td>
                    <td><?= h($product->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'productView', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'productEdit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'productDelete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
                
    
                      
            </div>
        </div>
      </div><!-- End Recent Sales -->
    </div>
</div><!-- End Left side columns -->

      
    

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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