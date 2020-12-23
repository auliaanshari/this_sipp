@extends('layout.main')
@extends('layout.side-bar')

@section('content')



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Anggota Keluarga
                </h4>
            </div>
            <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="add">
                        <i class="anticon anticon-plus"></i>
                       Tambah Anggota Keluarga
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
                    <th>Nama</th>
                    <th>NIK</th>
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
                        <div class="form-group" id="div_keluarga">
                            <label>No. KK</label>
                            <select class="form-control" id="kk" name="kk" required>
                                    <option value=""> Pilih No. KK </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_value">
                            <label>Nama</label>
                            <input required type="text" class="form-control" id="nama_input" name="nama_input" placeholder="....." >
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>NIK</label>
                            <input required type="number" class="form-control" id="nik_input" name="nik_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jeniskel" name="jeniskel" required>
                                    <option value=""> Pilih Jenis kelamin </option>
                                    <option value="Laki-laki"> Laki-laki </option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_value">
                            <label>Status Pernikahan</label>
                            <select class="form-control" id="nikah" name="nikah" required>
                                    <option value=""> Pilih Status Pernikahan </option>
                                    <option value="Belum Menikah"> Belum Menikah </option>
                                    <option value="Menikah"> Menikah </option>
                                    <option value="Janda/Duda"> Janda/Duda </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Status Keluarga</label>
                            <select class="form-control" id="keluarga" name="keluarga" required>
                                    <option value=""> Pilih Status Keluarga </option>
                                    <option value="Ayah"> Ayah </option>
                                    <option value="Ibu"> Ibu </option>
                                    <option value="Anak"> Anak </option>
                                    <option value="Orang Tua"> Orang Tua </option>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
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
                 "ajax": "{{ url('/detail_keluarga/data2') }}",
                        "columns": [
                            { "data": "id" },
                            { "data": "kartu_keluarga.no" },
                            { "data": "nama"},
                            { "data": "nik"},

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
                $('#form').attr('action', '{{ url('detail_keluarga/create') }}');
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

        $(document).on('click', '#detail', function() {
                disable_field();
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#kk').val(data.keluarga_id).change();
                $('#nama_input').val(data.nama).change();
                $('#nik_input').val(data.nik).change();
                $('#jeniskel').val(data.jenis_kelamin).change();
                $('#nikah').val(data.status_pernikahan).change();
                $('#keluarga').val(data.status_keluarga).change();
                $('#form').attr('action', '{{ url('penduduk/update') }}/'+data.id);
        });

        function disable_field() {
            document.getElementById("kk").disabled = true;
            document.getElementById("nama_input").disabled = true;
            document.getElementById("nik_input").disabled = true;
            document.getElementById("jeniskel").disabled = true;
            document.getElementById("nikah").disabled = true;
            document.getElementById("keluarga").disabled = true;
            document.getElementById('simpan').style.visibility = 'hidden';
        }


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('detail_keluarga/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $.ajax({
                url: '{{ url('detail_keluarga/combo_kk') }}',
                dataType: "json",
                success: function(data) {
                    var kk = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kk, function(k, v) {
                        $('#kk').append($('<option>', {value:v.id}).text(v.no))
                    })
                }
            });
        
    } );



</script>
@endsection
