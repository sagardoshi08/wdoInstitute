@include('admin.include.header')
<div class="inner-table-wrapper">
    <div class="container">
        <a style="color: black;">
            <h4 class="mt-4"><i class="fa fa-phone"></i> <span class="title-text"><b>Contact Us</b></span></h4>
        </a>
        <div class="edit-profile mt-4 mb-3">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="-page-row filter-datatable">
                            <div class="col_filed">
                                <i class="fa fa-column-icon"></i>
                                 <select name="column_name" id="column_name" class="form-control selectpicker" multiple>
                                    <option value="0" selected>Date Created</option>
                                    <option value="1" selected>Email</option>
                                    <option value="2" selected>Message</option>
                                    <option value="3" selected>Action</option>
                                </select>
                            </div>
                            <div class="datatable-filter p-0">
                                <button type="button" class="filter" autocomplete="off"><i class="fa fa-filter-icon"></i> Filters</button>
                            </div>
                            <div class="datatable-page-filter filter_menu">
                                <div class="filter-data">
                                    <label>Columns</label>
                                    <div class="select_opt">
                                        <select name="field_name" id="field-name" style="width:100%;" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="created_at">Date Created</option>
                                            <option value="email_id">Email</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-data">
                                    <label>Operator</label>
                                    <div class="select_opt">
                                        <select name="oprator" id="oprator" style="width:100%;" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="0" disabled>contains</option>
                                            <option value="1" disabled>equals</option>
                                            <option value="2" disabled>starts with</option>
                                            <option value="3" disabled>ends with</option>
                                            <option value="4" disabled>is empty</option>
                                            <option value="5" disabled>is not empty</option>
                                            <option value="6" disabled>is any of</option>
                                            <!--<option value="7" disabled>Between</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-data input-value">
                                    <label>Value</label>
                                    <input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="Filter Value">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped sample_data">
                            <thead>
                                <tr>
                                    <th>Date Created</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')
<!--<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.24/dataRender/ellipsis.js"></script>-->

<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        var dataTable = $('.sample_data').DataTable({
            //"processing" : true,
            "serverSide": true,
            "language": {
                searchPlaceholder: "Search"
            },
            "order": [],
            "ajax": {
                type: "POST",
                url: '{{route("admin.ContactUsData")}}',
                data: function(d) {
                    d.field = $("#field-name").val();
                    d.oprator = $("#oprator").val();
                    d.value = $("#filter_value").val();
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
            ,dom: 'lBfrtip',
            dom: '<"head_filter"<"search_btn"f><"export_btn"B>>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            columnDefs: [
               { 
                    "orderable": false,
                    "targets": [0,2,3]
                //render: $.fn.dataTable.render.ellipsis( 40 )
               }
             ],
             "buttons": [{
                extend: 'excelHtml5',
                title: null,
                filename: 'ContactUs_data',
                text: 'Export'
            }]
        });

        $('#column_name').selectpicker({
            selectedTextFormat: 'static',
            title: 'Columns'
        });

        $('.head_filter').append($('.filter-datatable'));

        $('#column_name').change(function() {

            console.log('remaining_column');
            var all_column = ["0", "1", "2","3"];

            var remove_column = [];

            remove_column = $('#column_name').prop('selected', false).val();

            var remaining_column = all_column.filter(function(obj) {
                return remove_column.indexOf(obj) == -1;
            });
            dataTable.columns(remove_column).visible(true);

            dataTable.columns(remaining_column).visible(false);

        });

        $('.filter_menu').hide();

        $("#field-name").change(function() {
            var field = $("#field-name").val();
            var oprator = $("#oprator").val();
            if (field == 'created_at') {
                $('#oprator option[value="0"]').attr('disabled', true);
                $('#oprator option[value="2"]').attr('disabled', true);
                $('#oprator option[value="3"]').attr('disabled', true);
                $('#oprator option[value="4"]').attr('disabled', false);
                $('#oprator option[value="5"]').attr('disabled', false);
                $('#oprator option[value="6"]').attr('disabled', true);
                //$('#oprator option[value="7"]').attr('disabled', false);
                $('#oprator option[value="1"]').attr('disabled', false);
                if (field == 'created_at') {
                    $('input[name="filter_value"]').datepicker({
                        format: 'dd-mm-yyyy',
                    });
                } else {
                    $('input[name="filter_value"]').datepicker("destroy").val('');
                }
            } else {
                $('input[name="filter_value"]').datepicker("destroy").val('');
                $('#oprator option[value="1"]').attr('disabled', false);
                $('#oprator option[value="0"]').attr('disabled', false);
                $('#oprator option[value="2"]').attr('disabled', false);
                $('#oprator option[value="3"]').attr('disabled', false);
                $('#oprator option[value="4"]').attr('disabled', false);
                $('#oprator option[value="5"]').attr('disabled', false);
                $('#oprator option[value="6"]').attr('disabled', false);
                //$('#oprator option[value="7"]').attr('disabled', true);
            }
            if (field == '') {
                $('input[name="filter_value"]').datepicker("destroy").val('');
                $('#oprator option').attr('disabled', true);
                $('#oprator option[value=""]').attr('selected', true);
                $('.input-value').show();
                dataTable.draw();
            }

        });

        $("#oprator").on('change', function(e) {
            var field = $("#field-name").val();
            var oprator = $("#oprator").val();
            var value = $("#filter_value").val();
            if (oprator == '4' || oprator == '5') {
                $('.input-value').hide();
                if (field && oprator) {
                    dataTable.draw();
                    e.preventDefault();
                }
            } else {
                $('.input-value').show();
            }
        });

        $('#filter_value').on('change', function(e) {
            var field = $("#field-name").val();
            var oprator = $("#oprator").val();
            var value = $("#filter_value").val();
            if (oprator == '1' && value && field == 'created_at') {
                if (field == 'created_at' && oprator) {
                    dataTable.draw();
                    e.preventDefault();
                }
            }
        });

        $('#filter_value').on('keyup', function(e) {
            var field = $("#field-name").val();
            var oprator = $("#oprator").val();
            var value = $("#filter_value").val();
            if (field && oprator) {
                dataTable.draw();
                e.preventDefault();
            }
        });

        $(".filter").click(function() {
            $(".filter_menu").toggle();
            $(this).toggleClass('active');
        });

    });
</script>