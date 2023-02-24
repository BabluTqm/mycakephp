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
                
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('user_type') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('Change Statu') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                  
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php foreach ($users as $user): 
          
         

                    if($result->id == $user->id){
                        continue;
                    }
                  
                    ?>

                <tr>
                    <td><?=  ++$count ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?php if($user->user_type=="1"){
                        echo "User";
                    } 
                    else{
                        echo "Admin";
                    }
                    ?></td> 
                   

                    <td>
                    <?php if($user->status == 1) : ?>
                    <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Inactive # {0}?', $user->id)]) ?>

                    <?php else: ?>
                    <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
                    <?php endif ; ?>


                    </td>

                      

                    <td><?= h($user->created_date) ?></td>
                    <td><?= h($user->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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


        <script>
        $(document).ready(function() {
        $('.statuscheck').click(function(){
        var status = $(this).val();
        var id = $(this).prev('a').click();

        })
        });
        </script>



</body>

</html>


