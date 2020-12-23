@extends('layout.main')
@extends('layout.side-bar')

@section('content')



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Kartu Keluarga
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
                    <th>Nomor</th>
                    <th>Jorong</th>
                    <th>Tanggal Pencatatan</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_jorong">
                            <label>Nomor KK</label>
                            <input required type="text" class="form-control" id="kk_input" name="kk_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_nagari">
                            <label for="nagari">Jorong</label>
                                <select class="form-control" id="jorong" name="jorong" required>
                                    <option value=""> Pilih Jorong </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_data">
                            <label>Tanggal Pencatatan</label>
                            <input required type="date" class="form-control datepicker-input" id="tgl_input" name="tgl_input" placeholder="...." >
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
                 "ajax": "{{ url('/kartu_keluarga/data') }}",
                        "columns": [
                            { "data": "id" },
                            { "data": "no" },
                            { "data": "jorong.nama"},
                            { "data": "tanggal_pencatatan"},

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="delete" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
                                },
                            }
                        ],
                });
        } loadData();


        $(document).on('click', '#add', function() {
                $('#modal').modal('show');
                $('#form').attr('action', '{{ url('kartu_keluarga/create') }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'kk_input': $('#kk_input').val(),
                        'jorong_input': $('#jorong').val(),
                        'tgl_input': $('#tgl_input').val(),
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
                $('#kk_input').val(data.no).change();
                $('#jorong').val(data.jorong_id).change();
                $('#tgl_input').val(data.tanggal_pencatatan).change();
                $('#form').attr('action', '{{ url('kartu_keluarga/update') }}/'+data.id);
        });


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('kartu_keluarga/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $.ajax({
                url: '{{ url('kartu_keluarga/combo') }}',
                dataType: "json",
                success: function(data) {
                    var jorong = jQuery.parseJSON(JSON.stringify(data));
                    $.each(jorong, function(k, v) {
                        $('#jorong').append($('<option>', {value:v.id}).text(v.nama))
                    })
                }
            });

        $(document).on('click', '#detail', function() {
            var id = $(this).data('id');
            location.href = "{{ url('detail_keluarga') }}";
        });

    } );



</script>
@endsection
