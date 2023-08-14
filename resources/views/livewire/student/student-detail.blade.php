
<div class="container-fluid py-4 student-list-content">
   <div class="row">
      <div class="col-12">
         @if (session('message'))
         <div class="row">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
               <span class="text-sm">{{ Session::get('message') }}</span>
               <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
         @endif
         @if (Session::has('delete'))
         <div class="row">
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
               <span class="text-sm">{{ Session::get('delete') }}</span>
               <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
         @endif
         <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            </div>
            <div class="me-3 my-3 text-start">
               @if(!$isView)
               <div class="text-end"><a wire:click="create()" class="btn bg-dark mb-0 my-auto rounded-pill text-white">Add New Student</a></div>
               @endif
               @if($isOpen)
               @include('livewire.student.add')
               @endif
               @if($isView && !($isOpen))
               @include('livewire.student.view')
               @endif
            </div>
            @if(!($isOpen || $isView))
            @foreach ($students as $key => $student)
            {{--
            <button type="button" wire:click="delete('{{ $student->uuid }}')" class="btn mb-0 btn-danger btn-link rounded-pill" data-original-title="" title="">
               <i class="material-icons icon-center">close</i>
               <div class="ripple-container"></div>
            </button>
            --}}
            {{-- <button class="button" >Remove Items</button> --}}
            @endforeach
            <button class="button remove-student btn mb-0 btn-danger btn-link rounded-pill" style="position: absolute;right: 18%;top: -8px;width: 58px !important;height: 41px;     background-color: #e63673;" student-id="">
               <i class="bi bi-trash icon-center" style=" position: absolute; top: 29%;left: 39%;"></i>
               <div class="ripple-container"></div>
            </button>
            <div class="row">
               <div class="col-12">
                  <div class="table-responsive pt-5 ">
                     <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row align-items-center mb-2">
                           <div class="col-md-3 col-12">
                              <div class="dropdown">
                                 <div class="filter-by input-group input-group-outline mb-5">
                                    <label for="filter" class="form-label align-items-center"><span><i class="fa fa-filter"></i> Filter by</span>
                                    <input wire:model="search" class="form-control jp naddu" list="datalistOptions" placeholder="Search by year...">
                                    </label>
                                    <datalist id="datalistOptions">
                                       <option value="Pending">Pending</option>
                                       <option value="2021">2021</option>
                                       <option value="2022">2022</option>
                                       <option value="2023">2023</option>
                                       <option value="2024">2024</option>
                                       <option value="2025">2025</option>
                                    </datalist>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col-12">
                              <div class="dropdown">
                                 <div class="filter-by input-group input-group-outline">
                                    <label>
                                    <input wire:model="search_name" type="text" class="form-control" placeholder="Search by name..." />
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 ms-auto-none col-12 justify-content-between d-flex">
                              <div class="showing-results input-group input-group-outline d-flex mt-0 custom-showing align-items-center justify-content-end">
                                 <span class="text-center text-uppercase text-xs font-weight-bolder px-2 ">Results Per Page: &nbsp;</span>
                                 <select wire:model="perPage" class="input-group input-group-outline select-custom-clg">
                                    <option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                    <option>500</option>
                                    <option>1000</option>
                                 </select>
                              </div>
                              <div class="print header-btn ms-2">
                                 <span class="nav-link mb-0 ml-2 active " data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fa fa-print" aria-hidden="true"></i></span>
                              </div>
                              <div class="export header-btn ms-2">
                                 <a href="{{route('student_export')}}"><span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span></a>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table class="table align-items-center mb-0">
                                 <thead>
                                    <tr class="bg-dark">
                                       <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" : activate to sort column descending">
                                          <label class="form-check-label">
                                          <input type="checkbox" class="check cboxs" input type="checkbox" id="Select-all-checkbox" class="mt-2 ms-3">
                                          </label>
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-center">S. No.</th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">ACTION</th>
                                       <th class="text-uppercase text-xxs font-weight-bolder ps-2 text-start">
                                          NAME
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          APPLICATION NO.
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          DoB
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          bank name
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          account number
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          YEAR
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          College name
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          course name
                                       </th>
                                       <th class="text-uppercase text-xxs font-weight-bolder text-start">
                                          status
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       @if ($students->count())
                                       @foreach ($students as $key => $student)
                                       <td>
                                          <div class=" px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center ps-2">
                                                <input type="checkbox" name="single_checkbox" value="{{$student->id}}" class="Select-single-checkbox">
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class=" px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center ps-2">
                                                <p class="mb-0 text-sm"><b>{{($students->currentPage()-1)*$perPage+$key +1 }}</b></p>
                                             </div>
                                          </div>
                                       </td>
                                       <td class="align-middle ">
                                          <a rel="tooltip" class="btn mb-0 btn-success btn-link bg-dark rounded-pill" href="{{route('studentEdit',$student->id)}}" data-original-title="" title="">
                                             <i class="material-icons icon-center">edit</i>
                                             <div class="ripple-container"></div>
                                          </a>
                                          <button rel="tooltip" wire:click="edit('{{ $student->uuid }}','view')" class="btn mb-0 btn-success btn-link bg-dark rounded-pill" href="" data-original-title="" title="">
                                             <i class="material-icons icon-center">visibility</i>
                                             <div class="ripple-container"></div>
                                          </button>
                                          {{--
                                          <button type="button" wire:click="delete('{{ $student->uuid }}')" class="btn mb-0 btn-danger btn-link rounded-pill" data-original-title="" title="">
                                             <i class="material-icons icon-center">close</i>
                                             <div class="ripple-container"></div>
                                          </button>
                                          --}}
                                       </td>
                                       <td>
                                          <div class=" justify-content-center">
                                             <h6 class="mb-0 text-sm">{{ $student->student_name }}</h6>
                                          </div>
                                       </td>
                                       <td class="">
                                          <div class="">
                                             <div class="d-flex flex-column justify-content-center ">
                                                <span class="text-secondary text-xs font-weight-bold ">{{ $student->application_number }}</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td class="align-middle  text-sm">
                                          <p class="text-xs text-secondary mb-0">
                                             {{ $student->dob }}
                                          </p>
                                       </td>
                                       <td class="align-middle">
                                          <span class="text-secondary text-xs font-weight-bold">{{ $student->bank_name }}</span>
                                       </td>
                                       <td class="align-middle ">
                                          <span class="text-secondary text-xs font-weight-bold">{{ $student->account_number }}</span>
                                       </td>
                                       <td class="align-middle">
                                          <span class="text-secondary text-xs font-weight-bold">{{ $student->year }}</span>
                                       </td>
                                       <td class="align-middle">
                                          <span class="text-secondary text-xs font-weight-bold">{{ $student->college_name }}</span>
                                       </td>
                                       <td class="align-middle ">
                                          <span class="text-secondary text-xs font-weight-bold">{{ $student->course_details }}</span>
                                       </td>
                                       <td class="align-middle ">
                                          <span class="text-secondary text-xs font-weight-bold">1</span>
                                       </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                       <td colspan="5">No record found</td>
                                    </tr>
                                    @endif
                                 </tbody>
                              </table>
                              <br>
                              {{ $students->links() }}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
          $(document).on('change', '#Select-all-checkbox', function() {
              if($(this).is(':checked')) {
                  var sele_val = new Array();
                 $('.Select-single-checkbox').each(function() {
                      sele_val.push($(this).val());
                  });
                  $('.remove-student').attr('student-id',sele_val);
                 $('input[type="checkbox"]').prop('checked',true);
              }else{
                  $('.remove-student').attr('student-id','');
                 $('input[type="checkbox"]').prop('checked',false);
              }
              $('#selected-student-count').text($('input[name=single_checkbox]:checked').length);
          });
          $(document).on('change', '.Select-single-checkbox', function() {
              $('#selected-student-count').text($('input[name=single_checkbox]:checked').length);
              var checkboxValues = [];
              $('input[name=single_checkbox]:checked').map(function() {
                  checkboxValues.push($(this).val());
              });
              $('.remove-student').attr('student-id',checkboxValues);
          });

          $(document).on('click', '.remove-student', function() {
              let isExecuted = confirm('Are you sure want to delete this record ?');
              if (isExecuted == true) {
              $.ajax({
                  type: 'POST',
                  url: "{{ route('deletestudent') }}",
                  data: {
                      'student_id': $(this).attr('student-id'),
                      "_token": "{{ csrf_token() }}"
                  },
                  dataType: 'html',
                  success: function(data) {
                      $('input:checked').not('.all').parents("tr").remove();
                  }
              });
          }
          });
      });
</script>
