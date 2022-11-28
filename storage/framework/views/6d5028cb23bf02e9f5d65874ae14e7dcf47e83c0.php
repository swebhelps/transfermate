
    <?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <!--div class="card-header pb-0">
              <h6>Books Informations</h6>
            </div-->
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
               <br> 
               <div class="container">

                <table id="list_table" class="table table-striped table-bordered" style="width:100%">
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
                 
              </table>
            </div>
              <script>
                $(document).ready(function() 
                {
                  $('#list_table').dataTable();
                  
                })
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Apache24\htdocs\blog\resources\views/list.blade.php ENDPATH**/ ?>