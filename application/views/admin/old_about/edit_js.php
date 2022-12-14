<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>
    $(() => {
        var base_url = window.location.origin;
        var theMarker = {};
        var map = L.map('map').setView([-3.4566892, 114.8258917], 13);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        var circles;
        var marker_top;

        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            marker_top = L.marker(e.latlng);
            marker_top.addTo(map);
            circles = L.circle(e.latlng, radius);
            circles.addTo(map);
            //marker_top.bindPopup("You are within " + radius + " ==== " +e.latlng + " meters from this point").openPopup();
            $('#latitude').val(e.latlng.lat);
            $('#longitude').val(e.latlng.lng);
        }

        function onLocationError(e) {
            alert(e.message);
        }

        //Add a marker to show where you clicked.

        map.on('click', function(e) {
            if (marker_top != undefined) {
                kosongkanLokasi();
            }
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
                $('#latitude').val(e.latlng.lat);
                $('#longitude').val(e.latlng.lng);
            };
            //Add a marker to show where you clicked.
            theMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
        });

        titikSemula();

        //reloadLokasi();
        $('#reload_lokasi').on('click', function(e) {
            if (theMarker != undefined) {
                //kosongkanMarker();
            }
            if (marker_top != undefined) {
                kosongkanLokasi();
            }
            //kosongkanLokasi();
            reloadLokasi();
        });

        $('#reload_semula').on('click', function(e) {
            if (marker_top != undefined) {
                kosongkanLokasi();
            }
            titikSemula();
        });

        function reloadLokasi() {
            kosongkanMarker();
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
            map.locate({
                setView: true,
                maxZoom: 18
            });
        }

        function kosongkanLokasi() {
            map.removeLayer(marker_top);
            map.removeLayer(circles);
        }

        function kosongkanMarker() {
            map.removeLayer(theMarker);
        }

        function titikSemula() {
            kosongkanMarker();
            $.ajax({
                url: base_url + "/coaching_bbgp/admin/about/getId",
                type: 'POST',
                dataType: 'JSON',
                data: {},
                success: function(data) {
                    setTimeout(function() {
                        theMarker = L.marker([parseFloat($('#latitude').val()), parseFloat($('#longitude').val())]).addTo(map);
                        theMarker.bindPopup(`
                                <div style="width: 300px; display: block;" class="text-center">
                                    <span  style="font-size: 14px;">Balai Guru</span>
                                </div>
                            `);
                        //theMarker.openPopup();

                    }, 300);
                }
            });
        }
    })

    $('#form-edit').on('submit', function(e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: () => {
                $(this).find(['type=submit']).fadeOut();
            },
            success: (res) => {
                Swal.fire(
                    'Success',
                    'Profilemu terupdate',
                    'success'
                )
                $('#myModal').modal('hide');
                setTimeout(location.reload.bind(location), 60000);


            },
            fail: (res) => {
                console.log(res);
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat update profilemu!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                // window.location.reload();
                setTimeout(location.reload.bind(location), 60000);
            },
            error: (res) => {
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat update profilemu!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                // window.location.reload();
                setTimeout(location.reload.bind(location), 60000);

            }
        })
    })
</script>