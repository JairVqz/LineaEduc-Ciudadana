<script>
    const solicitudes = @json($solicitudesPorMunicipio);
    let solicitudesPorDelegacion = {};
    Promise.all([
        //fetch('http://127.0.0.1:8000/mapa/delegacionMunicipio.json').then(res => res.json()),
        //fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson').then(res => res.json()),
        fetch('https://callcenter.sev.gob.mx/mapa/delegacionMunicipio.json').then(res => res.json()),
        fetch('https://callcenter.sev.gob.mx/mapa/veracruz_municipios.geojson').then(res => res.json())
    ]).then(([delegacionesData, municipiosGeoJSON]) => {
        solicitudes.forEach(solicitud => {
            let nombreMunicipio = solicitud.municipio.trim().toLowerCase();

            // busca e municipio
            let municipioEncontrado = municipiosGeoJSON.features.find(mun => {
                if (!mun || !mun.properties || !Array.isArray(mun.properties.mun_name) || !mun.properties.mun_name[0]) {
                    console.warn("Registro de municipio inválido en GeoJSON:", mun);
                    return false;
                }
                return mun.properties.mun_name[0].trim().toLowerCase() === nombreMunicipio;
            });

            if (!municipioEncontrado) {
                console.warn(`Municipio no encontrado en GeoJSON: ${solicitud.municipio}`);
                return;
            }

            // sacar el codifo
            let numCode = Array.isArray(municipioEncontrado.properties.mun_code) ? municipioEncontrado.properties.mun_code[0] : null;

            if (!numCode) {
                console.warn(`num_code no encontrado para municipio: ${solicitud.municipio}`);
                return;
            }

            let numCodeInt = (parseInt(numCode.replace("30", ""), 10));

            // busca delegacion
            let delegacionEncontrada = delegacionesData.cvemun_serreg.find(entry => parseInt(entry.cvemun, 10) === numCodeInt);

            if (!delegacionEncontrada) {
                console.warn(`Delegación no encontrada para municipio: ${solicitud.municipio} (num_code: ${numCodeInt})`);
                return;
            }

            let idDelegacion = delegacionEncontrada.serreg ? delegacionEncontrada.serreg.toString().padStart(3, "0") : "000";

            // sumar el total 
            if (!solicitudesPorDelegacion[idDelegacion]) {
                solicitudesPorDelegacion[idDelegacion] = 0;
            }
            solicitudesPorDelegacion[idDelegacion] = parseInt(solicitudesPorDelegacion[idDelegacion]) + parseInt(solicitud.total);
            //console.log(solicitudesPorDelegacion[idDelegacion]);
            //console.log(`Municipio: ${solicitud.municipio}, Num Code: ${numCodeInt}, Delegación: ${idDelegacion}, Total: ${solicitud.total}`);
        });
    }).catch(error => console.error('Error cargando datos:', error));



    var map = L.map('map', {
        center: [19.8738, -96.0080],
        zoom: 7,
        minZoom: 7,
        maxZoom: 10,
        zoomControl: false
    });

    L.control.zoom({ position: 'bottomleft' }).addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    var geoJsonMunicipios, geoJsonDelegaciones;
    const delegacionColors = {
        "001": "#ff9999", "002": "#ffcc99", "003": "#ffff99",
        "004": "#ccff99", "005": "#99ff99", "006": "#a1d388",
        "007": "#88d3d0", "008": "#99ccff", "009": "#9999ff",
        "010": "#cc99ff", "011": "#ff99ff", "012": "#ff99cc",
        "013": "#bb84ea", "014": "#ea8484"
    };
    const delegacionNombres = {
        "Tuxpan": "001", "Poza Rica": "002", "Martínez de la Torre": "003",
        "Coatepec": "004", "Orizaba": "005", "Veracruz": "006",
        "Coatzacoalcos": "007", "Xalapa": "008", "Tantoyuca": "009",
        "Huayacocotla": "010", "Zongolica": "011", "Cosamaloapan": "012",
        "Acayucan": "013", "Córdoba": "014"
    };

    function getColor(d) {
        return d > 100 ? '#f33d20' :
            d > 50 ? '#f69d3f' :
                d > 20 ? '#fbd286' :
                    d > 10 ? '#ffff95' :
                        d > 5 ? '#0d8310' :
                            d > 0 ? '#29ca57' :
                                '#afafaf';
    }



    function styleMunicipios(feature) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        // Buscar el municipio en los datos de solicitudes
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;

        return {
            fillColor: getColor(total),
            weight: 1,
            opacity: 1,
            color: 'gray',
            fillOpacity: 0.7
        };
    }

    function onEachFeatureMunicipios(feature, layer) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;
        // Pop-up con el nombre y total de solicitudes
        layer.bindPopup(`<strong>${feature.properties.mun_name}</strong><br>Total de solicitudes: ${total}
                        <br>Codigo de municipio: ${parseInt(feature.properties.mun_code[0].replace("30", ""), 10)}
                        `);
    }
    var legend = L.control({ position: 'topright' });

    legend.onAdd = function () {
        var div = L.DomUtil.create('div', 'info legend');
        div.innerHTML = "<strong>Delegaciones</strong><br>";
        Object.keys(delegacionNombres).forEach(function (delegacionNombre) {
            let delegacionId = delegacionNombres[delegacionNombre]; // Convierte nombre en código
            let color = delegacionColors[delegacionId] || "#afafaf"; // Obtiene el color correspondiente
            div.innerHTML +=
                '<i style="background:' + color + ';width: 15px; height: 15px; display: inline-block; margin-right: 5px;"></i> ' + delegacionNombre + '<br>';
        });
        return div;
    };

    var legendMunicipios = L.control({ position: 'topright' });

    legendMunicipios.onAdd = function () {
        var div = L.DomUtil.create('div', 'info legend');
        div.innerHTML = "<strong>Solicitudes</strong><br>";

        // Definir los rangos y colores basados en getColor(d)
        var rangos = [
            { min: 101, label: "Más de 100 solicitudes", color: '#f33d20' },
            { min: 51, max: 100, label: "Entre 51 y 100 solicitudes", color: '#f69d3f' },
            { min: 21, max: 50, label: "Entre 21 y 50 solicitudes", color: '#fbd286' },
            { min: 11, max: 20, label: "Entre 11 y 20 solicitudes", color: '#ffff95' },
            { min: 6, max: 10, label: "Entre 6 y 10 solicitudes", color: '#0d8310' },
            { min: 1, max: 5, label: "Entre 1 y 5 solicitudes", color: '#29ca57' },
            { min: 0, max: 0, label: "Sin solicitudes", color: '#afafaf' }
        ];

        // Generar los elementos de la leyenda
        rangos.forEach(rango => {
            div.innerHTML += `<i style="background: ${rango.color}; width: 15px; height: 15px; display: inline-block; margin-right: 5px;"></i> ${rango.label}<br>`;
        });

        return div;
    };
    var municipiosDelegaciones = {};



    // Cargar municipios y delegaciones
    //fetch('http://127.0.0.1:8000/mapa/delegacionMunicipio.json')
    fetch('https://callcenter.sev.gob.mx/mapa/delegacionMunicipio.json')
        .then(response => response.json())
        .then(data => {
            data.cvemun_serreg.forEach(entry => {
                if (entry.cvemun && entry.serreg !== undefined) {
                    municipiosDelegaciones[entry.cvemun] = entry.serreg.toString().padStart(3, "0");
                } else {
                    console.error("Error en registro:", entry);
                }
            });

            //fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson')
            fetch('https://callcenter.sev.gob.mx/mapa/veracruz_municipios.geojson')
                .then(response => response.json())
                .then(geojsonData => {
                    geoJsonMunicipios = L.geoJson(geojsonData, {
                        style: styleMunicipios,
                        onEachFeature: onEachFeatureMunicipios
                    });

                    geoJsonDelegaciones = L.geoJson(geojsonData, {
                        style: function (feature) {
                            let munCode = parseInt(feature.properties.mun_code[0].replace("30", ""), 10);
                            let delegacionId = municipiosDelegaciones[munCode] || "000";
                            let color = delegacionColors[delegacionId] || "#afafaf";
                            return {
                                fillColor: color,
                                weight: 1,
                                opacity: 1,
                                color: 'gray',
                                fillOpacity: 0.7
                            };
                        },
                        onEachFeature: function (feature, layer) {
                            let munCode = parseInt(feature.properties.mun_code[0].replace("30", ""), 10);
                            let delegacionId = municipiosDelegaciones[munCode] || "000";
                            let nombreDelegacion = Object.keys(delegacionNombres).find(nombre => delegacionNombres[nombre] === delegacionId) || "Desconocida";
                            let totalSolicitudes = solicitudesPorDelegacion[delegacionId] || 0;

                            layer.bindPopup(`
                                <strong>Delegación:</strong> ${nombreDelegacion} (${delegacionId})<br>
                                <strong>Total de solicitudes:</strong> ${totalSolicitudes}
                            `);
                        }

                    });

                    // **AGREGAR LA CAPA INICIAL SEGÚN EL SELECT**
                    const selectedOption = document.getElementById('mapSelect').value;
                    let tablaMunicipios = document.getElementById('tablaMunicipios');
                    let tablaDelegaciones = document.getElementById('tablaDelegaciones');
                    let filtroInput = document.getElementById('filtroTabla');
                    let tituloTabla = document.getElementById('tituloTabla');
                    if (selectedOption === "Municipios") {
                        geoJsonMunicipios.addTo(map);
                        legendMunicipios.addTo(map);
                        map.fitBounds(geoJsonMunicipios.getBounds());


                        tablaDelegaciones.style.display = "none";
                        tablaMunicipios.style.display = "table";
                        tituloTabla.textContent = "Solicitudes por Municipio";
                        actualizarTablaMunicipios();

                    } else {
                        geoJsonDelegaciones.addTo(map);
                        legend.addTo(map);
                        map.fitBounds(geoJsonDelegaciones.getBounds());

                        tablaMunicipios.style.display = "none";
                        tablaDelegaciones.style.display = "table";
                        tituloTabla.textContent = "Solicitudes por Delegación";
                        actualizarTablaDelegaciones();
                    }
                })
                .catch(error => console.error('Error al cargar el GeoJSON de municipios:', error));
        })
        .catch(error => console.error('Error al cargar el JSON de delegaciones:', error));


    document.getElementById('mapSelect').addEventListener('change', function () {
        let tablaMunicipios = document.getElementById('tablaMunicipios');
        let tablaDelegaciones = document.getElementById('tablaDelegaciones');
        let filtroInput = document.getElementById('filtroTabla');
        let tituloTabla = document.getElementById('tituloTabla');

        if (this.value === "Municipios") {
            // Mostrar tabla de municipios y ocultar delegaciones
            tablaDelegaciones.style.display = "none";
            tablaMunicipios.style.display = "table";
            tituloTabla.textContent = "Solicitudes por Municipio";

            if (map.hasLayer(geoJsonDelegaciones)) map.removeLayer(geoJsonDelegaciones);
            geoJsonMunicipios.addTo(map);
            legend.remove();
            legendMunicipios.addTo(map);
            map.fitBounds(geoJsonMunicipios.getBounds());

            actualizarTablaMunicipios();
        } else if (this.value === "Delegaciones") {
            // Mostrar tabla de delegaciones y ocultar municipios
            tablaMunicipios.style.display = "none";
            tablaDelegaciones.style.display = "table";
            tituloTabla.textContent = "Solicitudes por Delegación";

            if (map.hasLayer(geoJsonMunicipios)) map.removeLayer(geoJsonMunicipios);
            geoJsonDelegaciones.addTo(map);
            legendMunicipios.remove();
            legend.addTo(map);
            map.fitBounds(geoJsonDelegaciones.getBounds());

            actualizarTablaDelegaciones();

        }

        // Reiniciar filtro
        filtroInput.value = '';
        $('#tablaMunicipios, #tablaDelegaciones').DataTable().search('').columns().search('').draw();
    });


    function actualizarTablaDelegaciones() {
        let tablaMunicipios = $("#tablaMunicipios");
        tablaMunicipios.DataTable().destroy();


        let tablaDelegaciones = $("#tablaDelegaciones");
        if ($.fn.DataTable.isDataTable(tablaDelegaciones)) {
            tablaDelegaciones.DataTable().destroy();
        }
        let tbody = tablaDelegaciones.find("tbody");
        tbody.empty(); 

        Object.keys(delegacionNombres).forEach(nombreDelegacion => {
            let delegacionId = delegacionNombres[nombreDelegacion] || "000";
            let totalSolicitudes = solicitudesPorDelegacion[delegacionId] || 0;
            tbody.append(`
            <tr>
                <td>${nombreDelegacion}</td>
                <td>${totalSolicitudes}</td>
            </tr>
        `);
        });
        tablaDelegaciones.DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "pageLength": -1,
            "scrollY":        380,
            "deferRender":    true,
            "scroller":       true,

        });
        tablaDelegaciones.show();
    }

    

</script>

<!--mapas por separado-->
<script>
    /*
        var map2 = L.map('map2', {
            center: [19.8738, -97.0000],
            zoom: 7,
            minZoom: 7,
            maxZoom: 10,
            zoomControl: false
        });
    
        L.control.zoom({ position: 'bottomleft' }).addTo(map2);
        var delegacionColors = {
            "001": "#ff9999", "002": "#ffcc99", "003": "#ffff99",
            "004": "#ccff99", "005": "#99ff99", "006": "#a1d388",
            "007": "#88d3d0", "008": "#99ccff", "009": "#9999ff",
            "010": "#cc99ff", "011": "#ff99ff", "012": "#ff99cc",
            "013": "#bb84ea", "014": "#ea8484"
        };
        var delegacionNombres = {
            "TUXPAN": "001", "POZA RICA": "002", "MARTINEZ DE LA TORRE": "003",
            "COATEPEC": "004", "ORIZABA": "005", "VERACRUZ": "006",
            "COATZACOALCOS": "007", "XALAPA": "008", "TANTOYUCA": "009",
            "HUAYACOCOTLA": "010", "ZONGOLICA": "011", "COSAMALOAPAN": "012",
            "ACAYUCAN": "013", "CÓRDOBA": "014"
        };
    
        var legend = L.control({ position: 'topright' });
    
        legend.onAdd = function () {
            var div = L.DomUtil.create('div', 'info legend');
            div.innerHTML = "<strong>Delegaciones</strong><br>";
    
            Object.keys(delegacionNombres).forEach(function (delegacionNombre) {
                let delegacionId = delegacionNombres[delegacionNombre]; // Convierte nombre en código
                let color = delegacionColors[delegacionId] || "#afafaf"; // Obtiene el color correspondiente
    
                div.innerHTML +=
                    '<i style="background:' + color + ';"></i> ' + delegacionNombre + '<br>';
            });
    
            return div;
        };
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map2);
    
        // relación municipios-delegaciones
        var municipiosDelegaciones = {};
    
        fetch('http://127.0.0.1:8000/mapa/delegacionMunicipio.json')
            .then(response => response.json())
            .then(data => {
                //diccionario { "cvemun": "serreg" } :D
                //console.log(data);
                data.cvemun_serreg.forEach(entry => {
                    //console.log([entry.cvemun.toString()]);
                    if (entry.cvemun && entry.serreg !== undefined) {
                        municipiosDelegaciones[entry.cvemun] = entry.serreg.toString().padStart(3, "0");
                    } else {
                        console.error("Error en registro:", entry);
                    }
                });
    
                // geojson uwu
                fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson')
                    .then(response => response.json())
                    .then(geojsonData => {
                        L.geoJson(geojsonData, {
                            style: function (feature) {
                                let munCode = parseInt(feature.properties.mun_code[0].replace("30", ""), 10);
                                let delegacionId = municipiosDelegaciones[munCode] || "000";
                                let color = delegacionColors[delegacionId] || "#afafaf";
    
                                return {
                                    fillColor: color,
                                    weight: 1,
                                    opacity: 1,
                                    color: 'gray',
                                    fillOpacity: 0.7
                                };
                            }
                        }).addTo(map2);
                        legend.addTo(map2);
                    })
                    .catch(error => console.error('Error al cargar el GeoJSON :c', error));
            })
            .catch(error => console.error('Error al cargar el JSON :c', error));*/
</script>


<script>
    /*solicitudes * municipio
    const solicitudes = @json($solicitudesPorMunicipio);
    var map = L.map('map', {
        center: [19.8738, -97.0000],
        zoom: 7,
        minZoom: 7,
        maxZoom: 10,
        zoomControl: false
    });
    L.control.zoom({
        position: 'bottomleft'
    }).addTo(map);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    // Colores según el número de solicitudes
    function getColor(d) {
        return d > 100 ? '#f33d20' :
            d > 50 ? '#f69d3f' :
                d > 20 ? '#fbd286' :
                    d > 10 ? '#ffff95' :
                        d > 5 ? '#0d8310' :
                            d > 0 ? '#29ca57' :
                                '#afafaf';
    }
    // Estilo :D
    function style(feature) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        console.log(nombreMunicipio);
        // Buscar el municipio en los datos de solicitudes
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;
        return {
            fillColor: getColor(total),
            weight: 1,
            opacity: 1,
            color: 'gray',
            fillOpacity: 0.7
        };
    }

    function onEachFeature(feature, layer) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;
        // Pop-up con el nombre y total de solicitudes
        layer.bindPopup(`<strong>${feature.properties.mun_name}</strong><br>Total de solicitudes: ${total}
                        <br>Codigo de municipio: ${parseInt(feature.properties.mun_code[0].replace("30", ""), 10)}
                        `);
    }
    // Cargar el GeoJSON
    //fetch('{{ url('mapa/veracruz_municipios.geojson') }}')
    fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson')
        //fetch('https://callcenter.sev.gob.mx/mapa/veracruz_municipios.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJson(data, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        })
        .catch(error => console.error('no se cargó bien el GeoJSON:', error));*/
</script>






<!--mapas por separado-->
<script>
            /*
                var map2 = L.map('map2', {
                    center: [19.8738, -97.0000],
                    zoom: 7,
                    minZoom: 7,
                    maxZoom: 10,
                    zoomControl: false
                });
            
                L.control.zoom({ position: 'bottomleft' }).addTo(map2);
                var delegacionColors = {
                    "001": "#ff9999", "002": "#ffcc99", "003": "#ffff99",
                    "004": "#ccff99", "005": "#99ff99", "006": "#a1d388",
                    "007": "#88d3d0", "008": "#99ccff", "009": "#9999ff",
                    "010": "#cc99ff", "011": "#ff99ff", "012": "#ff99cc",
                    "013": "#bb84ea", "014": "#ea8484"
                };
                var delegacionNombres = {
                    "TUXPAN": "001", "POZA RICA": "002", "MARTINEZ DE LA TORRE": "003",
                    "COATEPEC": "004", "ORIZABA": "005", "VERACRUZ": "006",
                    "COATZACOALCOS": "007", "XALAPA": "008", "TANTOYUCA": "009",
                    "HUAYACOCOTLA": "010", "ZONGOLICA": "011", "COSAMALOAPAN": "012",
                    "ACAYUCAN": "013", "CÓRDOBA": "014"
                };
            
                var legend = L.control({ position: 'topright' });
            
                legend.onAdd = function () {
                    var div = L.DomUtil.create('div', 'info legend');
                    div.innerHTML = "<strong>Delegaciones</strong><br>";
            
                    Object.keys(delegacionNombres).forEach(function (delegacionNombre) {
                        let delegacionId = delegacionNombres[delegacionNombre]; // Convierte nombre en código
                        let color = delegacionColors[delegacionId] || "#afafaf"; // Obtiene el color correspondiente
            
                        div.innerHTML +=
                            '<i style="background:' + color + ';"></i> ' + delegacionNombre + '<br>';
                    });
            
                    return div;
                };
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map2);
            
                // relación municipios-delegaciones
                var municipiosDelegaciones = {};
            
                fetch('http://127.0.0.1:8000/mapa/delegacionMunicipio.json')
                    .then(response => response.json())
                    .then(data => {
                        //diccionario { "cvemun": "serreg" } :D
                        //console.log(data);
                        data.cvemun_serreg.forEach(entry => {
                            //console.log([entry.cvemun.toString()]);
                            if (entry.cvemun && entry.serreg !== undefined) {
                                municipiosDelegaciones[entry.cvemun] = entry.serreg.toString().padStart(3, "0");
                            } else {
                                console.error("Error en registro:", entry);
                            }
                        });
            
                        // geojson uwu
                        fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson')
                            .then(response => response.json())
                            .then(geojsonData => {
                                L.geoJson(geojsonData, {
                                    style: function (feature) {
                                        let munCode = parseInt(feature.properties.mun_code[0].replace("30", ""), 10);
                                        let delegacionId = municipiosDelegaciones[munCode] || "000";
                                        let color = delegacionColors[delegacionId] || "#afafaf";
            
                                        return {
                                            fillColor: color,
                                            weight: 1,
                                            opacity: 1,
                                            color: 'gray',
                                            fillOpacity: 0.7
                                        };
                                    }
                                }).addTo(map2);
                                legend.addTo(map2);
                            })
                            .catch(error => console.error('Error al cargar el GeoJSON :c', error));
                    })
                    .catch(error => console.error('Error al cargar el JSON :c', error));*/
</script>


<script>
    /*solicitudes * municipio
    const solicitudes = @json($solicitudesPorMunicipio);
    var map = L.map('map', {
        center: [19.8738, -97.0000],
        zoom: 7,
        minZoom: 7,
        maxZoom: 10,
        zoomControl: false
    });
    L.control.zoom({
        position: 'bottomleft'
    }).addTo(map);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    // Colores según el número de solicitudes
    function getColor(d) {
        return d > 100 ? '#f33d20' :
            d > 50 ? '#f69d3f' :
                d > 20 ? '#fbd286' :
                    d > 10 ? '#ffff95' :
                        d > 5 ? '#0d8310' :
                            d > 0 ? '#29ca57' :
                                '#afafaf';
    }
    // Estilo :D
    function style(feature) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        console.log(nombreMunicipio);
        // Buscar el municipio en los datos de solicitudes
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;
        return {
            fillColor: getColor(total),
            weight: 1,
            opacity: 1,
            color: 'gray',
            fillOpacity: 0.7
        };
    }

    function onEachFeature(feature, layer) {
        const nombreMunicipio = feature.properties.mun_name.toString().trim().toLowerCase();
        const municipio = solicitudes.find(s => s.municipio.toString().trim().toLowerCase() === nombreMunicipio);
        const total = municipio ? municipio.total : 0;
        // Pop-up con el nombre y total de solicitudes
        layer.bindPopup(`<strong>${feature.properties.mun_name}</strong><br>Total de solicitudes: ${total}
                        <br>Codigo de municipio: ${parseInt(feature.properties.mun_code[0].replace("30", ""), 10)}
                        `);
    }
    // Cargar el GeoJSON
    //fetch('{{ url('mapa/veracruz_municipios.geojson') }}')
    fetch('http://127.0.0.1:8000/mapa/veracruz_municipios.geojson')
        //fetch('https://callcenter.sev.gob.mx/mapa/veracruz_municipios.geojson')
        .then(response => response.json())
        .then(data => {
            L.geoJson(data, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        })
        .catch(error => console.error('no se cargó bien el GeoJSON:', error));*/
</script>