@extends('layouts.master')

@section('title', 'Edit Network')
@push('style')
    <link href="{{ asset('theme') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('theme') }}/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('theme') }}/plugins/select2/js/select2.min.js"></script>
    <script>
        let map;
        let marker;
        let myLatLng;

        function initMap() {
    var location = {
        lat: {{ $network->latitude }},
        lng: {{ $network->longitude }}
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: location,
        zoom: 15
    });

    // Langsung tetapkan marker berdasarkan lokasi dari database
    setupMap(location, map);

    // Kode di bawah ini digunakan untuk geolocation, bisa dihapus atau dikomentari jika tidak diperlukan
    /*
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                setupMap(pos, map);

                map.setCenter(pos);
                map.setZoom(14);
                $('#latitude').val(position.coords.latitude);
                $('#longitude').val(position.coords.longitude);
            },
            () => {
                handleLocationError(true, infoWindow, map.getCenter());
            }
        );
    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
    */

    map.addListener("click", (e) => {
        myLatLng = e.latLng.toJSON();
        mapClick(e.latLng.toJSON(), map);
    });

    var input = document.getElementById('lokasi');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("span");
    locationButton.textContent = "Pilih lokasi saya sekarang";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

    locationButton.addEventListener("click", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    marker.position = pos;
                    map.setCenter(pos);
                    map.setZoom(14);
                    $('#latitude').val(position.coords.latitude);
                    $('#longitude').val(position.coords.longitude);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });

    autocomplete.addListener('place_changed', function() {
        infoWindow.close();
        var place = autocomplete.getPlace();

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(18);
        }

        myLatLng = place.geometry.location;
        marker.position = myLatLng;

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infoWindow.open(map, marker);
        $('#latitude').val(place.geometry.location.lat());
        $('#longitude').val(place.geometry.location.lng());
    });
}

        function setupMap(latLng, map) {
            $('#latitude').val(latLng.lat);
            $('#longitude').val(latLng.lng);

            marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: "Your Location",
                draggable: true,
            });
            marker.addListener("click", toggleBounce);

            marker.addListener('dragend', function(event) {
                myLatLng = event.latLng.toJSON();
                $('#latitude').val(myLatLng.lat);
                $('#longitude').val(myLatLng.lng);
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        function mapClick(latLng, map) {
            $('#latitude').val(latLng.lat);
            $('#longitude').val(latLng.lng);
            marker.position = latLng;
            map.panTo(latLng);
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: Tidak dapat mengambil lokasi anda, silahkan izinkan persetujuan lokasi pada browser anda." :
                "Error: Browser anda tidak support geolocation."
            );
            infoWindow.open(map);
        }
    </script>

    <script
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"


    async
    defer onload="initMap()"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });
    </script>
@endpush

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Edit Network</h4>
                    <hr>
                    <form action="{{ route('network.update', $network->uuid) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <x-forms.select_v id="opd_id" name="opd_id"
                                    label="Unit Kerja/Perangkat Daerah Pengelola" isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->id }}"
                                            {{ $network->opd_id == $list->id ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>

                        <div class="form-group">
                                    <label class="form-label" style="font-weight: bold;">Lokasi</label>

                                    <input type="text" id="lokasi" name="lokasi" class="form-control form-control-sm"
                                        placeholder="Cari Lokasi" value="{{ $network->alamat }}"><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="label-text col-form-label text-md-right">Latitude</label>
                                            <input type="text" name="latitude" id="latitude"
                                                class="form-control form-control-sm" placeholder="Latitude" readonly value="{{ $network->alamat }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-text col-form-label text-md-right">Longitude</label>
                                            <input type="text" name="longitude" id="longitude"
                                                class="form-control form-control-sm" placeholder="Longitude" readonly value="{{ $network->alamat }}">
                                        </div>
                                    </div><br>

                        <div class="form-group">
                            <label>Jarak Kabel</label>
                            <input type="text" name="jarak_kabel" class="form-control" value="{{ $network->jarak_kabel }}">
                        </div>

                        <div class="form-group">
                            <label>Jumlah Access Point</label>
                            <input type="number" name="jumlah_aksespoint" class="form-control" value="{{ $network->jumlah_aksespoint }}">
                        </div>

                        <div class="form-group">
                            <label>Jenis Koneksi</label>
                            <select name="jenis_koneksi" class="form-control">
                                <option value="GPON" {{ $network->jenis_koneksi == 'GPON' ? 'selected' : '' }}>GPON</option>
                                <option value="SFP" {{ $network->jenis_koneksi == 'SFP' ? 'selected' : '' }}>SFP</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Peta Lokasi</label>
                            <div id="map"></div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
