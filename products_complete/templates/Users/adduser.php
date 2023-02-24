<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
 <style>
  .error{
    color: red;
    font-size: 12px;
  }
 </style>
</head>

<body>

  <main>
    <div class="container">
    <?= $this->element('header'); ?>
    <?= $this->element('aside'); ?>

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

               <!-- End Logo -->

              <div class="card mb-3">
              <?= $this->Flash->render() ?>
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> </h5>
                    <p class="text-center small"></p>
                  </div>
 
                     <?= $this->Form->create($user , ['class' => 'row g-3' , 'type' => 'file']) ?>

                    <div class="col-12">
                      <?=   $this->Form->control('user_profile.first_name' , ['required' => false , 'class' => 'form-control']); ?>
                    </div>

                    <div class="col-12">
                      <?=  $this->Form->control('user_profile.last_name' , ['required' => false , 'class' => 'form-control']);?>
                    </div>

                    <div class="col-12">
                       <?=  $this->Form->control('email', ['required' => false , 'class' => 'form-control']);?>
                    </div>

                    <div class="col-12">
                    <?= $this->Form->control('user_profile.contact', ['required' => false , 'class' => 'form-control']); ?>
                    </div>

                    <!-- <div class="col-12">
                    
                    </div> -->

                    <div class="col-12">
                       <?= $this->Form->control('user_profile.address', ['required' => false , 'class' => 'form-control']); ?>
                    </div>

                    <div class="col-12">
                       <?= $this->Form->control('password', ['required' => false , 'class' => 'form-control']);; ?>
                    </div>

                    <div class="col-12">
                       <?= $this->Form->control('confirm_password' , ['type' => 'password' , 'class' => 'form-control'], ['required' => false  ]); ?>
                    </div>

                    <div class="col-12">
                       <?= $this->Form->control('user_profile.images' , ['type' => 'file' , 'class' => 'form-control'], ['required' => false  ]); ?>
                    </div>

                    <div class="col-12">
                       
                      <?= $this->Form->button(__('Submit') , ['class' => "btn btn-primary"]) ?>
                    </div>
                    
                    <?= $this->Form->end() ?>
                </div>
              </div>
 
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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