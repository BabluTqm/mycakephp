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
           
             
                      
                        <select name="category_id" id="status" class="form-control">
                           <option value="" disabled selected>choose category</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                      
                     


                <div class="card-body">
                  <?= $this->Html->link(__('Add New User'), ['action' => 'adduser'], ['class' => 'btn btn-danger m-5 p-2 float-right']) ?>
                  <div class="ajaxdiv">

                  <?= $this->element('ajaxtable'); ?>
                 
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

        $('select').on('change', function() {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        //     }
        // });
        
        var data = $('#status').val();
        //alert(data);
        $.ajax({
            url: "http://localhost:8765/users/index",
            data: {'status':data},
            type: "json",
            method: "get",
            success:function(response){
                // code will work in case of json retun from the ajax start here
                res = JSON.parse(response);
                var tabel_html = '<table><thead><tr><th>id</th><th>Email</th><th>	User Type</th><th>Status</th><th>Profle Image</th><th>Created Date</th><th>Modified Date</th><th>Actions</th></tr></thead>';
                tabel_html += '<tbody>';
                $.each(res, function (key, val) {
                        tabel_html += '<tr><td>'+val.id+'</td><td>'+val.email+'</td><td>'+val.user_type+'</td><td>'+val.status+'</td><td>'+val.user_profile.profile_image+'</td><td>'+val.created_date+'</td><td>'+val.modified_date+'</td></tr>';
                    
                })
                tabel_html +='</tbody>';
                tabel_html +='</table>';
                $('.datatable').html(tabel_html);
                 // code will work in case of json retun from the ajax end here
                 
                // code will work in case cakephp element render start here \
                // $('.ajaxdiv').html(response);
                // code will work in case cakephp element render end here 
            }
        });
    });

/************User Status**************/
        $('.statuscheck').click(function(){
        var status = $(this).val();
        var id = $(this).prev('a').click();

        })
        });
/************User Status**************/

        </script>



</body>

</html>



