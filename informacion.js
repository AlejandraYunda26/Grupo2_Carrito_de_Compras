var departamentoSelect = document.getElementById("departamento");

// Realizar una solicitud AJAX para obtener la lista de departamentos desde el servidor
var xhrDepartamentos = new XMLHttpRequest();
xhrDepartamentos.open("GET", "get_departamentos.php", true);
xhrDepartamentos.onreadystatechange = function() {
    if (xhrDepartamentos.readyState === 4 && xhrDepartamentos.status === 200) {
        // Parsear la respuesta JSON
        var departamentos = JSON.parse(xhrDepartamentos.responseText);
        
        // Agregar opciones de departamentos al elemento select
        departamentos.forEach(function(departamento) {
            var option = document.createElement("option");
            option.value = departamento.id;
            option.text = departamento.nombre;
            departamentoSelect.appendChild(option);
        });
    }
};
xhrDepartamentos.send();

// Obtener la referencia al elemento select de municipios
var municipioSelect = document.getElementById("municipio");

// Manejar el evento onchange del select de departamentos
departamentoSelect.addEventListener("change", function() {
    // Limpiar las opciones de municipios
    municipioSelect.innerHTML = "<option value=''>Selecciona un municipio</option>";

    // Obtener el ID del departamento seleccionado
    var idDepartamento = this.value;

    // Realizar una solicitud AJAX para obtener los municipios correspondientes al departamento seleccionado
    var xhrMunicipios = new XMLHttpRequest();
    xhrMunicipios.open("GET", "get_municipios.php?id_departamento=" + idDepartamento, true);
    xhrMunicipios.onreadystatechange = function() {
        if (xhrMunicipios.readyState === 4 && xhrMunicipios.status === 200) {
            // Parsear la respuesta JSON
            var municipios = JSON.parse(xhrMunicipios.responseText);
            
            // Agregar opciones de municipios al elemento select
            municipios.forEach(function(municipio) {
                var option = document.createElement("option");
                option.value = municipio.id;
                option.text = municipio.nombre;
                municipioSelect.appendChild(option);
            });
        }
    };
    xhrMunicipios.send();
});
