@extends('layout.main')
@extends('layout.side-bar')

@section('content')



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Jorong
                </h4>
            </div>
            <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="add">
                        <i class="anticon anticon-plus"></i>
                       Tambah Data
                    </button>
                </h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                <tr class="text-sm-center">
                    <th>ID</th>
                    <th>Jorong</th>
                    <th>Nagari</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Jorong</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_jorong">
                            <label>Jorong</label>
                            <input required type="text" class="form-control" id="jorong_input" name="jorong_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_nagari">
                            <label for="nagari">Nagari</label>
                                <select class="form-control" id="nagari" name="nagari" required>
                                    <option value=""> Pilih Nagari </option>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')


<script>

    $(document).ready( function () {

        $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

        function loadData() {
            $('#table').dataTable({
                 "ajax": "{{ url('/jorong/data') }}",
                        "columns": [
                            { "data": "id" },
                            { "data": "nama" },
                            { "data": "nagari.nama" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="delete" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
                                },
                            }
                        ],
                        columnDefs: [
                            {
                                width: "30px",
                                targets: [0]
                            },
                            {
                                width: "100px",
                                targets: [1]
                            },
                            {
                                width: "100px",
                                targets: [2]
                            },
                            {
                                width: "50px",
                                targets: [3],
                                orderable: false
                            },
                            
                        ],

                });
        } loadData();


        $(document).on('click', '#add', function() {
                $('#modal').modal('show');
                $('#form').attr('action', '{{ url('jorong/create') }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'jorong_input': $('#jorong_input').val(),
                        'nagari_input': $('#nagari').val(),
                    },
                    success :function () {
                        $('#table').DataTable().destroy();
                        loadData();
                        $('#modal').modal('hide');
                    },

                });
        });

        $(document).on('click', '#edit', function() {
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#jorong_input').val(data.nama).change();
                $('#nagari').val(data.nagari_id).change();
                $('#form').attr('action', '{{ url('jorong/update') }}/'+data.id);
        });


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('jorong/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $.ajax({
                url: '{{ url('jorong/combo') }}',
                dataType: "json",
                success: function(data) {
                    var nagari = jQuery.parseJSON(JSON.stringify(data));
                    $.each(nagari, function(k, v) {
                        $('#nagari').append($('<option>', {value:v.id}).text(v.nama))
                    })
                }
            });

    } );



</script>
@endsection
