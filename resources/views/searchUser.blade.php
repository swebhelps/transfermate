
    @include('include.header')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2" id="main_card_box" style="height: 265px;">
              <div class="table-responsive p-0">
                <br> 
               <div class="col-md-5" style="margin-left: 3%;">
                  <form  action="{!! route('searchUser') !!}"  method="POST">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Author name</label>
                        
                        <input type="text" value="{{ $author_name }}" class="form-control" name="author_name" id="author_name" placeholder="Enter author name">
                      </div>
                      <button type="submit" id="src_btn" class="btn btn-primary">Search</button>
                  </form>
               </div>

               <div class="container">
                <table   id="result_row" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th style='border-top-color:black'>Sl.No </th>
                          <th style='border-top-color:black'>Author Name</th>
                          <th style='border-top-color:black'>Book Name</th>
                      </tr>
                  </thead>
                  <tbody id='table1'>
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
                    @if(isset($enable_table))
                      window.enable_table = "{{ $enable_table }}";
                    @endif

                    if(window.enable_table==2)
                    {
                      $('#result_row').show();
                      $('#main_card_box').css('height','600px')
                      $('#result_row').dataTable({searching: false,"bLengthChange": false});
                    }

                    if(window.enable_table==1)
                    {
                      $('#result_row').hide();
                    }
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
