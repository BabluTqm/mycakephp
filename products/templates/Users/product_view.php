 
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
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
  <?= $this->Html->link(__('DashBoard'), ['action' => 'home'], ['class' => 'nav-link collapsed bi  bi-grid']) ?>

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

<!-- End Sidebar-->

  <main id="main" class="main">
 
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales">
                <div class="card-body">
                  <table class="table ">
                  <tr>
                    <th><?= __('Product Title') ?></th>
                    <td><?= h($product->product_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Category') ?></th>
                    <td><?= $product->has('product_category') ? $this->Html->link($product->product_category->id, ['action' => 'productcatView', $product->product_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Image') ?></th>
                    <td><?= $this->Html->Image($product->product_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($product->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($product->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($product->modified_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Product Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->product_description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Product Tags') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->product_tags)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Product Comments') ?></h4>
                <?php if (!empty($product->product_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th><?= __('Modified Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_comments as $productComments) : ?>
                        <tr>
                            <td><?= h($productComments->id) ?></td>
                            <td><?= h($productComments->product_id) ?></td>
                            <td><?= h($productComments->user_id) ?></td>
                            <td><?= h($productComments->comments) ?></td>
                            <td><?= h($productComments->created_date) ?></td>
                            <td><?= h($productComments->modified_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), [ 'action' => 'viewComment', $productComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), [ 'action' => 'editComment', $productComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'deleteComment', $productComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productComments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
           
                      
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