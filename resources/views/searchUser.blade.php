
    @include('include.header')
    <style>
      h1, h2 {
          font-family: Lato;
        }
        
        @keyframes slideInFromLeft {
          0% {
            transform: translateX(-100%);
          }
          100% {
            transform: translateX(0);
          }
        }
        
        
        table tbody tr{
          animation: 1s ease-out 0s 1 slideInFromLeft;
        }
        
        /* table tbody tr.show{
          transform: translateX(0vw); 
        } */
      </style>
      
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2" id="main_card_box" style="height: 265px;">
              <div class="table-responsive p-0">
                <br> 
               <div class="col-md-5" style="margin-left: 3%;">
                  {{-- <form  action="{!! route('searchUser') !!}"  method="POST"> 
                    {{ csrf_field() }}--}}
                      <div class="form-group">
                        <label for="exampleInputEmail1">Author name</label>
                        <input type="text"  class="form-control" name="author_name" id="author_name" placeholder="Enter author name">
                      </div>
                      <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

                      <button type="submit" id="src_btn" class="btn btn-primary">Search</button>
                  <!--/form-->
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
                      //$('#result_row').show();
                      $('#main_card_box').css('height','600px')
                      $('#result_row').dataTable({searching: false,"bLengthChange": false});
                    }

                    if(window.enable_table==1)
                    {
                     // $('#result_row').hide();
                    }
                })


                const table = document.getElementById('table1');
                function search(author_name) 
                {

                     /*fetch('https://jsonplaceholder.typicode.com/todos')
                    .then((e) => e.json())
                    .then((e) => updatetable(e));*/
                     //.// const url = 'http://localhost:8000/getAuthor';
                     // var token = $("input[name='_token']").val();

                      $.ajax({
                        url: "{{route('getAuthor')}}",
                        type: 'POST',
                        async: true,
                        data: {
                                "_token": "{{ csrf_token() }}",
                                "author_name": author_name
                              },
                        headers: {
                                  'X-CSRF-TOKEN': $('input[name="_token"]').val()
                                  },
                        success: function (data) {
                          //console.log(data.length)
                          if(data.length===0)
                          {
                            norecordstable();
                          }else{
                            updatetable(data);
                          }
                        },
                        error: function (json){
                            if(json.status === 422) 
                            {
                              norecordstable();
                            }
                            else
                            {
                              norecordstable();
                            }
                        }
                    });
                }

                function updatetable(list) 
                {
                  
                    list.map((e) => console.log(e.author_name));
                    table.innerHTML = '';
                    list.forEach((e, i) => {
                      setTimeout(() => {
                        const tr = document.createElement('tr');
                        tr.innerHTML += `<td>${i+1}</td><td>${e.author_name}</td><td>${e.book_name}</td>`;
                        table.appendChild(tr);
                        $('#main_card_box').css('height','600px')
                      }, 500 * i);
                    });
                  // }
                }

                function norecordstable() 
                {
                    // setTimeout(() => 
                     //{
                      table.innerHTML = '';
                      const tr = document.createElement('tr');
                      tr.innerHTML += `<td colspan="3"><p style="text-align:center">No records<p></td>`;
                      table.appendChild(tr);
                      $('#main_card_box').css('height','600px');
                   // }, 500 * i);
                }


             
                document.getElementById('src_btn').addEventListener('click', function () {
                const author_name = document.getElementById('author_name');
                var author_name_1 = author_name.value;
                  search(author_name_1);
                });


                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include('include.footer')
