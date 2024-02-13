@extends('layouts.master')
@section('title')
    Tambah Infrastruktur Jaringan
@endsection
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
    <script src="{{ asset('theme') }}/plugins/select2/js/select2.min.js"></script>
    <script>
        let map;
        let marker;
        let myLatLng;

        function initMap() {
            myLatLng = {
                lat: -1.6305139969201516,
                lng: 103.6079577392868
            };
            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 7,
            });
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
                        $('#latitude').val(position.coords.latitude)
                        $('#longitude').val(position.coords.longitude)
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            map.addListener("click", (e) => {
                myLatLng = e.latLng.toJSON()
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
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            marker.setPosition(pos);
                            map.setCenter(pos);
                            map.setZoom(14);
                            $('#latitude').val(position.coords.latitude)
                            $('#longitude').val(position.coords.longitude)
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });
            autocomplete.addListener('place_changed', function() {
                infoWindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                /* If the place has a geometry, then present it on a map. */
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(18);
                }
                myLatLng = place.geometry.location;
                marker.setPosition(myLatLng);
                marker.setVisible(true);
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
                $('#latitude').val(place.geometry.location.lat())
                $('#longitude').val(place.geometry.location.lng())
            });
        }

        function setupMap(latLng, map) {

            $('#latitude').val(latLng.lat)
            $('#longitude').val(latLng.lng)
            marker = new google.maps.Marker({
                animation: google.maps.Animation.DROP,
                anchorPoint: new google.maps.Point(0, -29),
                position: latLng,
                draggable: true,
                map: map,
            });
            marker.setPosition(latLng);
            marker.setVisible(true);
            marker.addListener("click", toggleBounce);
            google.maps.event.addListener(marker, 'dragend', function(marker) {
                myLatLng = marker.latLng;
                $('#latitude').val(marker.latLng.lat())
                $('#longitude').val(marker.latLng.lng())
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        function mapClick(latLng, map, radius) {
            $('#latitude').val(latLng.lat)
            $('#longitude').val(latLng.lng)
            marker.setPosition(latLng);
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNt-6cPhU80v9oM2k27Wafg7OUAOny94w&libraries=places&callback=initMap&v=weekly"
        async></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
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
                    <h4 class="mb-0">Tambah Infrastruktur Jaringan</h4>
                    <hr>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('daftaraplikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.select_v id="opd_id" name="opd_id" label="Unit Kerja/Perangkat Daerah"
                                    isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->id }}"
                                            {{ old('opd_id') == $list->id ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>
                                <div class="form-group">
                                    <label class="form-label" style="font-weight: bold;">Lokasi</label>

                                    <input type="text" id="lokasi" name="lokasi" class="form-control form-control-sm"
                                        placeholder="Cari Lokasi"><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="label-text col-form-label text-md-right">Latitude</label>
                                            <input type="text" name="latitude" id="latitude"
                                                class="form-control form-control-sm" placeholder="Latitude" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-text col-form-label text-md-right">Longitude</label>
                                            <input type="text" name="longitude" id="longitude"
                                                class="form-control form-control-sm" placeholder="Longitude" readonly>
                                        </div>
                                    </div><br>
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-forms.input_v id="jarak_kabel" type="text" name="jarak_kabel"
                                    label="Jarak Kabel dari ODP" isRequired="false" value="" isReadonly=""
                                    placeholder="Jarak Kabel" />

                                <x-forms.input_v id="jml_accespoint" type="number" name="jml_accespoint"
                                    label="Jumlah Accespoint" isRequired="false" value="" isReadonly=""
                                    placeholder="Jumlah Accespoint" />

                                <x-forms.select_v id="jenis_koneksi" name="jenis_koneksi" label="Jenis Koneksi"
                                    isRequired="true" isSelect2="true">
                                    <option value="" selected>[Pilih]</option>

                                    <option value="GPON" {{ old('jenis_koneksi') == 'GPON' ? ' selected' : '' }}>
                                        GPON</option>

                                    <option value="SFP" {{ old('jenis_koneksi') == 'SFP' ? ' selected' : '' }}>
                                        SFP</option>

                                </x-forms.select_v>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
