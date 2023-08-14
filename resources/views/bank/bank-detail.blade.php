<div class="container-fluid py-4">
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
    <div class="row">
        <div class="card px-0 pb-2">
            <div class="me-3 my-3 text-start mt-n3">

                <div class="text-end"><button wire:click="bank()" class="btn bg-dark mb-0 my-auto rounded-pill text-white">Add New Bank</button></div>
                @if($isBank)
                @include('livewire.bank.add-bank')
                @endif
            </div>
            @if(!$isBank)
            <div class="table-responsive pt-5 ">
                <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row align-items-center mb-2 bank-table-top-row">
                        <div class="col-md-6 col-12">
                            <div class="dropdown filter-bg">

                                <div class="filter-by input-group input-group-outline mb-5">
                                    <label for="filter" class="form-label align-items-center"><span><i class="fa fa-filter"></i> Filter by</span>
                                    <input wire:model="search_name" type="text" class="form-control" placeholder="Search by bank..."/>
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
                                <span class="nav-link mb-0  active" data-bs-toggle="tooltip" data-bs-placement="top" title="Export CSV"><i class="fas fa-file-export"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row studant-banks">
                        <div class="col-sm-12">
                            <table id="order-listing" class="table dataTable w-100 text-center" role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row" class="bg-dark">
                                        <th class="sorting_asc " tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" : activate to sort column descending">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="check-bg-dark" id="checkAll" onclick="toggle(this);">
                                            </label>
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Sno.: activate to sort column ascending">S NO. </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Bank Name: activate to sort column ascending">BANK NAME</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Total Branch: activate to sort column ascending">TOTAL BRANCH</th>
                                        <th class="text-uppercase text-xxs font-weight-bolder" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($banks->count())

                                    @foreach ($banks as $key => $bank)

                                    <tr role="row" class="odd ">
                                        <td>
                                            <div class="px-2 py-1">
                                               <div class="d-flex flex-column justify-content-center">
                                                 <input class="cboxs" type="checkbox">
                                               </div>
                                            </div>
                                         </td>

                                        <td class="pt-2">
                                            <span class="text-secondary text-xs font-weight-bold text-center">{{($banks->currentPage()-1)*$perPage+$key +1 }}</span>

                                        </td>

                                        <td class="pt-2">
                                            <h6 class="mb-0 text-sm">{{$bank->bank_name}}</h6>
                                        </td>
                                        <?php
                                        $bank_detail = json_decode($bank->bank_details, true);

                                        $bank_detail_count = count($bank_detail);
                                        ?>
                                        <td class="pt-2">
                                            {{ $bank_detail_count }}
                                        </td>
                                        <td class="pt-2">
                                            <button wire:click="edit('{{ $bank->uuid }}')" type="button" class="btn btn-primary btn-rounded btn-icon mb-0">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" wire:click="delete('{{ $bank->uuid }}')" class="btn btn-danger btn-rounded btn-icon mb-0">
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
                            {{ $banks->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
