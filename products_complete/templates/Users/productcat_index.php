
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
        <div class="col-lg-12">
          <div class="row">
        <?= $this->Flash->render() ?>

            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <table class="table table-border table table-striped">
                  <?= $this->Html->link(__('New Product Category'), ['action' => 'productcatAdd'], ['class' => 'btn btn-danger m-5 p-2 float-right']) ?>
                  <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productCategories as $productCategory): ?>
                <tr>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                    <td><?= h($productCategory->category_name) ?></td>
                    <!-- <td><?= h($productCategory->status) ?></td> -->

                    <td>
                    <?php if($productCategory->status == 1) : ?>
                    <?= $this->Form->postLink(__('Active'), ['action' => 'productCatStatus', $productCategory->id ,$productCategory->status], ['confirm' => __('Are you sure you want to Inactive # {0}?', $productCategory->id)]) ?>

                    <?php else: ?>
                    <?= $this->Form->postLink(__('Inactive'), ['action' => 'productCatStatus', $productCategory->id ,$productCategory->status], ['confirm' => __('Are you sure you want to Active # {0}?', $productCategory->id)]) ?>
                    <?php endif ; ?>


                    </td>



                    <td><?= h($productCategory->created_date) ?></td>
                    <td><?= h($productCategory->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'productcatView', $productCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'productcatEdit', $productCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'productcatDelete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



 
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