 


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
      
          
            <div class="col-9">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <table class="table table-border table ">
                  <table>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($productCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php if($productCategory->status=="1"){
                        echo "Active";
                    } 
                    else{
                        echo "Deactive";
                    }
                    ?></td> 

                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($productCategory->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($productCategory->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($productCategory->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Title') ?></th>
                            <th><?= __('Product Description') ?></th>
                            <th><?= __('Product Category Id') ?></th>
                            <th><?= __('Product Image') ?></th>
                            <th><?= __('Product Tags') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th><?= __('Modified Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productCategory->products as $products) : ?>
                        <tr>
                            <td><?= h($products->id) ?></td>
                            <td><?= h($products->product_title) ?></td>
                            <td><?= h($products->product_description) ?></td>
                            <td><?= h($products->product_category_id) ?></td>
                            <td><?= $this->Html->image($products->product_image) ?></td>
                            <td><?= h($products->product_tags) ?></td>
                            <td><?= h($products->status) ?></td>
                            <td><?= h($products->created_date) ?></td>
                            <td><?= h($products->modified_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), [ 'action' => 'productView', $products->id]) ?>
                                <?= $this->Html->link(__('Edit'), [ 'action' => 'productEdit', $products->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), [ 'action' => 'productDelete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                            </td>
                        </tr>

                        <!-- <aside class="column">
                        <div class="side-nav">
                            <h4 class="heading"><?= __('Actions') ?></h4>
                            <?= $this->Html->link(__('Edit Product Category'), ['action' => 'productcatEdit', $productCategory->id], ['class' => 'side-nav-item']) ?>
                            <?= $this->Form->postLink(__('Delete Product Category'), ['action' => 'productcatDelete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id), 'class' => 'side-nav-item']) ?>
                            <?= $this->Html->link(__('List Product Categories'), ['action' => 'productcatIndex'], ['class' => 'side-nav-item']) ?>
                            <?= $this->Html->link(__('New Product Category'), ['action' => 'productcatAdd'], ['class' => 'side-nav-item']) ?>
                        </div>
                    </aside> -->

                        <?php endforeach; ?>
                    </table>
                </div>
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