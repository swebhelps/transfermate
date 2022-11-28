<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('img/apple-icon.png')); ?>">
  <link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>">
  <title>
    Dashboard 
  </title>
  <link href="<?php echo e(asset('css/nucleo-icons.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous')}}"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?php echo e(asset('css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <link id="pagestyle" href="<?php echo e(asset('css/soft-ui-dashboard.css?v=1.0.6')); ?>" rel="stylesheet" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"/>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php echo $__env->make('include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
               <br> 

               <div class="col-md-9" style="margin-left: 12%;">
               <form >
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
               </div>

              
                <table  style="display:none" id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th style='border-top-color:black'>Sl.No </th>
                          <th style='border-top-color:black'>Author Name</th>
                          <th style='border-top-color:black'>Book Name</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      $counter=1;
                    ?>
                      <?php $__currentLoopData = $book_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($counter); ?></td>
                            <td><?php echo e($list->author_name); ?></td>
                            <td>  
                                <?php if($list->book_name !=''): ?>         
                                      <?php echo e($list->book_name); ?>  
                                <?php else: ?>
                                      `<`none`>` (no books found)     
                                <?php endif; ?>
                            </td>
                        </tr>
                      <?php
                        $counter++;
                      ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sl.No </th>
                      <th>Author Name</th>
                      <th>Book Name</th>
                  </tr>
                  </tfoot>
              </table>
              <script>
                $(document).ready(function() 
                {
                 // $('#example').dataTable();
                })
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="<?php echo e(asset('js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/plugins/perfect-scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/plugins/smooth-scrollbar.min.js')); ?>"></script>

</body>
</html><?php /**PATH C:\Apache24\htdocs\blog\resources\views/search.blade.php ENDPATH**/ ?>