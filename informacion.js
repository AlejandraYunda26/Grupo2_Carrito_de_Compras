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
usuarioSelect.addEventListener("change", function() {
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



var usuarioSelect = document.getElementById("departamento");

// Realizar una solicitud AJAX para obtener la lista de departamentos desde el servidor
var xhrUsuarios = new XMLHttpRequest();
xhrUsuarios.open("GET", "get_usuarios.php", true);
xhrUsuarios.onreadystatechange = function() {
    if (xhrUsuarios.readyState === 4 && xhrUsuarios.status === 200) {
        // Parsear la respuesta JSON
        var usuarios = JSON.parse(xhrUsuarios.responseText);
        
        // Agregar opciones de departamentos al elemento select
        usuarios.forEach(function(usuario) {
            var option = document.createElement("option");
            option.value = usuario.id;
            option.text = usuario.nombre;
            usuarioSelect.appendChild(option);
        });
    }
};
xhrUsuarios.send();

// Evento de clic para el botón "Seleccionar"
document.getElementById("seleccionarBtn").addEventListener("click", function() {
    var usuarioSelect = document.getElementById("usuario");
    var usuarioId = usuarioSelect.value;
    var usuarioNombre = usuarioSelect.options[usuarioSelect.selectedIndex].text;

    if (usuarioId) {
        // Mostrar el div en la cabecera y actualizar el nombre del usuario
        document.getElementById("userHeader").style.display = "block";
        document.getElementById("selectedUserName").textContent = usuarioNombre;

        // Redirigir a gestionar_cuenta.html con el ID del usuario seleccionado
        window.location.href = "gestionar_cuenta.html?id_usuario=" + usuarioId;
    } else {
        alert("Por favor selecciona un usuario");
    }
});
