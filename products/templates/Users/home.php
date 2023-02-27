<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
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
    #post-img {
      width: 400px;
      height: 500px;

    }

    img {
      width: 100%;
      height: 400px;
    }
    #cart{
      height: 30px;
      
    }
  </style>
</head>

<body>

<?= $this->element('header'); ?>
<?= $this->element('aside'); ?>

<div id="cart">
<?= $this->Html->link(__('View Cart'), [ 'controller' => 'Cart','action' => 'index' ,'class' => 'float-end']) ?>

 


</div>

  <!-- ======= Sidebar ======= -->

 
  <main id="main" class="main">

    <section class="section dashboard">
    <?= $this->Flash->render() ?>
      <div class="row">
        <?php foreach ($products as $product) : 
          
          
          if ($product->status == 0 )
          continue;
          ?>


          
         
          <div class="col-lg-9">
            <div class="card ">
              
              <h2><b>Title &nbsp-</b> <?= h($product->product_title) ?> </h2>
              <div class="card-body  ">
                
                <div id="budgetChart" style="min-height: 400px;">

                  <?php $a = $product->id; ?>

                <a href="http://localhost:8765/users/product-view/<?= $a ?>" >
                  <?= $this->Html->Image($product->product_image) ?>
                </a>

                <h5>Description:  </h5>
                <p>   <?= h($product->product_description) ?>  </p>
                <hr>
                  
                
                  <?php foreach($product->product_comments as $comment) {
                  ?>

                    <?php
                      $cre_time = $comment->created_date;
                      $date = new DateTime($cre_time, new DateTimeZone('UTC'));
                      $date->setTimezone(new DateTimeZone("Asia/Kolkata"));
                      $cre_time= $date->format('h:i:a');  

                      
                    ?>
                    

                   <h5> <br><?= h($comment->comments ." ".$cre_time)  ; ?> </h5>
              
                  <?php } 

                  $a = 0; $b = 0;
                  foreach($product->user_likes as $likes){
                    $a = $a + $likes->likes;
                    $b = $b + $likes->dislikes;
                  }
                   ?>
                  <hr>
                  <?= $this->Html->link(__(''), [ 'controller' => 'UserLikes','action' => 'like',$product->id], ['class' => 'fas fa-thumbs-up add-like','data-id'=>$product->id]) ?>
                  <?php echo $a ?>
                  <?= $this->Html->link(__(''), [ 'controller' => 'UserLikes','action' => 'dislike',$product->id ], ['class' => 'fa-solid fa-sharp fa-thumbs-down']) ?>
                  <?php echo $b ?>
                  
                  <?= $this->Form->create($productComment) ?>
               
                    <?php
                    echo $this->Form->control('product_id', ['value' => $product->id, 'type' => 'hidden']);
                    echo $this->Form->control('comments' , ['required' => false]);
                    echo "<br>";
                   ?>
                     <!-- <input type="hidden" name="post_id" value="<?php echo $post->id; ?>"> -->
            
                  <?= $this->Form->button(__('Comment'), ['class' => 'bi bi-send-fill']) ?>
                  <?= $this->Html->link(__('Add to Cart'), [ 'controller' => 'Cart','action' => 'add',$product->id ]) ?>

                  <?= $this->Form->end() ?>
                 
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

    </section>

    



 
    </div>


  </main><!-- End #main -->


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