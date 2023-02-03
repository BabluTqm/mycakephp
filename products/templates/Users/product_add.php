 


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
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-9">
          <div class="row">
          
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body"> 
                  <table class="table table-border datatable">
                   
            <?= $this->Form->create($product  ,['type'=>'file' ]) ?>
            <fieldset>
               
                <?php
                    echo $this->Form->control('product_title'  );
                    echo $this->Form->control('product_description');
                    echo $this->Form->control('product_category_id', ['options' => $productCategories]);
                    
/*

                    echo ' <select name = "product_category">' ;
                    echo ' <option value = ""> Select Category </option>  ' ;
                            foreach($productCategories as $productCategory) : ?>
                             <option value="<?= h($productCategory->category_name) ?>"> </option>
                            <?php endforeach;

                            echo '</select>';

*/
                    echo $this->Form->control('images' , ['type' => 'file']);
                    echo $this->Form->control('product_tags');
                    echo $this->Form->control('status');
                   
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
                   
            <tbody>
                
            </tbody>
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