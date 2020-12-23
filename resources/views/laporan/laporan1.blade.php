@extends('layout.main')
@extends('layout.side-bar')

@section('content')



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Penduduk Usia Produktif
                </h4>
            </div>
            <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="#">
                        <i class="anticon anticon-printer"></i>
                       Cetak
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
                    <th>Kartu Keluarga</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
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
                            <label>Tempat Lahir</label>
                            <input required type="text" class="form-control" id="tl_input" name="tl_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_data">
                            <label>Tanggal Lahir</label>
                            <input required type="date" class="form-control datepicker-input" id="tgl_input" name="tgl_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_value">
                            <label>Agama</label>
                            <select class="form-control" id="agama" name="agama" required>
                                    <option value=""> Pilih Agama </option>
                                    <option value="Islam"> Islam </option>
                                    <option value="Katolik"> Katolik </option>
                                    <option value="Protestan"> Protestan </option>
                                    <option value="Hindu"> Hindu </option>
                                    <option value="Buddha"> Buddha </option>
                                    <option value="Konghucu"> Konghucu </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jeniskel" name="jeniskel" required>
                                    <option value=""> Pilih Jenis kelamin </option>
                                    <option value="Laki-laki"> Laki-laki </option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Level Pendidikan</label>
                            <select class="form-control" id="level" name="level" required>
                                    <option value=""> Pilih Level Pendidikan </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_data">
                            <label>Pekerjaan</label>
                            <select class="form-control" id="kerja" name="kerja" required>
                                    <option value=""> Pilih Pekerjaan </option>
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
                        <div class="form-group" id="div_satuan">
                            <label>Kewarganegaraan</label>
                            <select class="form-control" id="warga" name="warga" required>
                                    <option value=""> Pilih Kewarganegaraan </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Ayah</label>
                            <input type="text" class="form-control" id="ayah_input" name="ayah_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_satuan">
                            <label>Ibu</label>
                            <input type="text" class="form-control" id="ibu_input" name="ibu_input" placeholder="...." >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                            <button type="#" id="simpan" class="btn btn-primary">Cetak</button>
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
                 "ajax": "{{ url('/laporan1/data') }}",
                        "columns": [
                            { "data": "id" },
                            { "data": "kartu_keluarga.no" },
                            { "data": "nama"},
                            { "data": "nik"},
                            { "data": "tanggal_lahir"},
                            { "data": "level_pendidikan.nama"},
                            { "data": "pekerjaan.nama"},

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a>';
                                },
                            }
                        ],
                });
        } loadData();


        $(document).on('click', '#print', function() {
                $('#modal').modal('show');
                // $('#form').attr('action', '{{ url('laporan1/data') }}');
        });

        $(document).on('click', '#detail', function() {
                disable_field();
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#kk').val(data.keluarga_id).change();
                $('#nama_input').val(data.nama).change();
                $('#nik_input').val(data.nik).change();
                $('#tl_input').val(data.tempat_lahir).change();
                $('#tgl_input').val(data.tanggal_lahir).change();
                $('#agama').val(data.agama).change();
                $('#jeniskel').val(data.jenis_kelamin).change();
                $('#level').val(data.level_pendidikan_id).change();
                $('#kerja').val(data.pekerjaan_id).change();
                $('#nikah').val(data.status_pernikahan).change();
                $('#keluarga').val(data.status_keluarga).change();
                $('#warga').val(data.kewarganegaraan_id).change();
                $('#ayah_input').val(data.ayah).change();
                $('#ibu_input').val(data.ibu).change();
                // $('#form').attr('action', '{{ url('laporan1/data') }}/'+data.id);
        });

        function disable_field() {
            document.getElementById("kk").disabled = true;
            document.getElementById("nama_input").disabled = true;
            document.getElementById("nik_input").disabled = true;
            document.getElementById("tl_input").disabled = true;
            document.getElementById("tgl_input").disabled = true;
            document.getElementById("agama").disabled = true;
            document.getElementById("jeniskel").disabled = true;
            document.getElementById("level").disabled = true;
            document.getElementById("kerja").disabled = true;
            document.getElementById("nikah").disabled = true;
            document.getElementById("keluarga").disabled = true;
            document.getElementById("warga").disabled = true;
            document.getElementById("ayah_input").disabled = true;
            document.getElementById("ibu_input").disabled = true;
            document.getElementById('simpan').style.visibility = 'visible';
        }


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $.ajax({
                url: '{{ url('laporan1/combo_kk') }}',
                dataType: "json",
                success: function(data) {
                    var kk = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kk, function(k, v) {
                        $('#kk').append($('<option>', {value:v.id}).text(v.no))
                    })
                }
            });
        
        $.ajax({
                url: '{{ url('laporan1/combo_level') }}',
                dataType: "json",
                success: function(data) {
                    var level = jQuery.parseJSON(JSON.stringify(data));
                    $.each(level, function(k, v) {
                        $('#level').append($('<option>', {value:v.id}).text(v.nama))
                    })
                }
            });

        $.ajax({
                url: '{{ url('laporan1/combo_kerja') }}',
                dataType: "json",
                success: function(data) {
                    var kerja = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kerja, function(k, v) {
                        $('#kerja').append($('<option>', {value:v.id}).text(v.nama))
                    })
                }
            });

        $.ajax({
                url: '{{ url('laporan1/combo_warga') }}',
                dataType: "json",
                success: function(data) {
                    var warga = jQuery.parseJSON(JSON.stringify(data));
                    $.each(warga, function(k, v) {
                        $('#warga').append($('<option>', {value:v.id}).text(v.nama))
                    })
                }
            });

    } );



</script>
@endsection
