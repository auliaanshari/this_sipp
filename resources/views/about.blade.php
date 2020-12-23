@extends('layout.main')
@extends('layout.side-bar')

@section('content')




<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    About
                </h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="m-t-50" >
                    <p>Ujian Akhir Semester Mata Kuliah Mata Kuliah Pemograman Database</p>
                    <p>Mini project yang dibangun adalah Sistem Informasi Pengelolaan Penduduk.</p><br>
                    <p>Aulia Anshari Fathurrahman</p>
                    <p>1611522015</p>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('js')

<script>
$(document).ready(function(){





        $.ajax({
                url: "{{ url('/statistik/dataKm') }}",
                method: "GET",
                success: function(data) {

                    var dataLine = []

                    var tbodyRef = document.getElementById('table').getElementsByTagName('tbody')[0];
                    var newRow = tbodyRef.insertRow();
                    for (var i in data) {


                        var newCell = newRow.insertCell();
                        var newText = document.createTextNode(data[i]);
                        newCell.appendChild(newText);

                        dataLine.push(data[i]);
                    }


                    var Labels = [2016,2017,2018,2019,2020]
                    var line = document.getElementById('line').getContext('2d');
                    var myLineChart2 = new Chart(line, {
                        type: 'line',
                        data: {
                            labels: Labels,
                            datasets: [{
                                label: 'jumlah data',
                                data: dataLine,
                                fill:false,
                                borderColor: 'rgb(75, 192, 192)',

                            }],
                        },
                        options: {
                            legend: {
                                display: false,
                            },
                            scales:{
                                xAxes: [{
                                    display: true,
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        // callback: function(value, index, values) {
                                        //     return Intl.NumberFormat().format((value/1000)) + 'K';
                                        // },
                                    }
                                }]
                            }
                        }

                    });
                }
            });

})
</script>

@endsection
