@extends('layouts.master')

@section('title', 'Detail Network')
@push('style')
    <link href="{{ asset('theme') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('theme') }}/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <style>
        #c_integrasi {
            display: none;
        }

        #c_perwal {
            display: none;
        }
    </style>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

        .mapControls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .custom-map-control-button {
            background-color: #fff;
            border: 0;
            border-radius: 20px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            font: 12px Roboto, Arial, sans-serif;
            overflow: hidden;
            height: 32px;
            cursor: pointer;
            padding: 10px !important;
        }

        .custom-map-control-button:hover {
            background: rgb(235, 235, 235);
        }

        @media only screen and (max-width: 600px) {
            .register-box {
                width: 100% !important;
            }
        }
    </style>
@endpush
@push('script')
    <script>
        function initMap() {
            var location = {
                lat: {{ $network->latitude }},
                lng: {{ $network->longitude }}
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Lokasi',
                draggable: false
            });
        }
    </script>

    <script
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"


    async
    defer onload="initMap()"></script>
@endpush


@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
            Kembali</button>
        <div class="card">
            <div class="card-body">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-hover">

                            <tr>
                                <th>Unit Kerja/Perangkat Daerah</th>
                                <td>:</td>
                                <td>{{ $network->opd->nama_opd }}</td>
                            </tr>
                            <th>Lokasi</th>
                                <td>:</td>
                                <td>{{ $network->alamat }}</td>
                            <tr>
                                <th>Latitude</th>
                                <td>:</td>
                                <td>{{ $network->latitude }}</td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td>:</td>
                                <td>{{ $network->status }}</td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>:</td>
                                <td>{{ $network->longitude }}</td>
                            </tr>
                            <tr>
                                <th>Jarak Kabael</th>
                                <td>:</td>
                                <td>{{ $network->jarak_kabel }}</td>
                            </tr>
                            
                            <tr>
                                <th>Jumlah Accespoint</th>
                                <td>:</td>
                                <td>{{ $network->jumlah_aksespoint }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Koneksi</th>
                                <td>:</td>
                                <td>{{ $network->jenis_koneksi }}</td>
                            </tr>

                        </table>
                        <h5>Peta Lokasi</h5>
                        <div id="map"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
