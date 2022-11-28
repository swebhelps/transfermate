
    @include('include.header')
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
                    @php
                      $counter=1;
                    @endphp
                      @foreach ($book_list as $list)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $list->author_name }}</td>
                            <td>  
                                @if($list->book_name !='')         
                                      {{ $list->book_name }}  
                                @else
                                      `<`none`>` (no books found)     
                                @endif
                            </td>
                        </tr>
                      @php
                        $counter++;
                      @endphp
                      @endforeach
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

  @include('include.footer')
