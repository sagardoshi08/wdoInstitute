<div class="main-panel container-fluid">
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

    <div class=" me-3 my-3 text-end">
        <a href="{{route('collegeCreate')}}" class="btn bg-dark mb-0 text-white rounded-pill shadow-xs mb-n5 position-relative z-index-1 mx-3 btn-lg">Add New College</a>
        @if($isOpen)
        @include('livewire.college.college-add')
        @endif
    </div>
    @if(!$isOpen)
    <div class="content-wrapper ">
        <div class="card">
            <div class="" style="padding: 10px;">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="table-responsive pt-5 ">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row align-items-center mb-2">
                                    <div class="" style="display: flex; padding: 0px 34px;">
                                    <div class="col-md-6 col-12">
                                        <div class="dropdown filter-bg">

                                            <div class="filter-by input-group input-group-outline mb-5">
                                                <label for="filter" class="form-label align-items-center"><span><i class="fa fa-filter"></i> Filter by</span>
                                                    <input wire:model="search_name" type="text" class="form-control" placeholder="Search by collage..." />
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 ms-auto-none col-12 justify-content-between d-flex" style="    align-items: center;">
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
                                            <span class="nav-link mb-0  active " data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="container">
                                        <div class="row mt-2 collge-details-row">
                                            <div class="col-sm-12">
                                                <table id="order-listing" class="table dataTable w-100 text-center" role="grid" aria-describedby="order-listing_info">
                                                    <thead>
                                                        <tr role="row" class="bg-dark text-white">
                                                            <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" : activate to sort column descending">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="check" id="checkAll" onclick="toggle(this);">
                                                                </label>
                                                            </th>
                                                            <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Sno.: activate to sort column ascending">S. no.</th>
                                                            <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="College Name: activate to sort column ascending">College Name</th>
                                                            <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Total Cource: activate to sort column ascending">Total Course</th>
                                                            <th class=" text-uppercase  text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($colleges->count())

                                                        @foreach ($colleges as $key => $college)

                                                        <tr role="row">
                                                            <td class="sorting_1 pt-2">
                                                                <div class="form-check p-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="check">
                                                                        <i class="input-helper"></i></label>
                                                                </div>
                                                            </td>

                                                            <td class="pt-2">{{($colleges->currentPage()-1)*$perPage+$key +1 }}</td>
                                                            <td class="pt-2">
                                                            <b>{{ $college->college_name }}</b>
                                                            </td>
                                                            <?php
                                                            $college_detail = json_decode($college->college_details, true);

                                                            $college_detail_count = count($college_detail);
                                                            ?>
                                                            <td class="pt-2"><b>{{ $college_detail_count }}</b> </td>

                                                            <td class="pt-2">

                                                                <a href="{{route('collegeEdit',$college->id)}}" type="button" class="btn btn-primary btn-rounded btn-icon mb-0">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </a>


                                                                <a href="#"><button type="button" class="btn btn-primary btn-rounded btn-icon mb-0">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </button></a>

                                                                <button type="button" wire:click="delete('{{ $college->uuid }}')" class="btn btn-danger btn-rounded btn-icon mb-0">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
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
                                                {{ $colleges->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <style>
        main.main-content.ps--active-x .ps__thumb-x {
            display: none;
        }
    </style>
    <script>
        function toggle(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    </script>
