//VARIABLES GLOBALES

let caja = document.getElementById('caja');
let lista = document.getElementById('lista');

//FUNCION DEL CALENDARIO DATAPICKER
$(function () {
    // An array of dates
    var eventDates = {};
    //mes de octubre
    eventDates[new Date("04/01/2022")] = new Date("04/01/2022");
    eventDates[new Date("04/02/2022")] = new Date("04/02/2022");
    eventDates[new Date("04/03/2022")] = new Date("04/03/2022");
    eventDates[new Date("04/04/2022")] = new Date("04/04/2022");
    eventDates[new Date("04/07/2022")] = new Date("04/07/2022");
    eventDates[new Date("04/09/2022")] = new Date("04/09/2022");
    eventDates[new Date("04/10/2022")] = new Date("04/10/2022");
    eventDates[new Date("04/11/2022")] = new Date("04/11/2022");
    eventDates[new Date("04/14/2022")] = new Date("04/14/2022");
    eventDates[new Date("04/16/2022")] = new Date("04/16/2022");
    eventDates[new Date("04/17/2022")] = new Date("04/17/2022");
    eventDates[new Date("04/18/2022")] = new Date("04/18/2022");
    eventDates[new Date("04/21/2022")] = new Date("04/21/2022");
    eventDates[new Date("04/23/2022")] = new Date("04/23/2022");
    eventDates[new Date("04/24/2022")] = new Date("04/24/2022");
    eventDates[new Date("04/25/2022")] = new Date("04/25/2022");
    eventDates[new Date("04/28/2022")] = new Date("04/28/2022");
    eventDates[new Date("04/30/2022")] = new Date("04/30/2022");

    // datepicker
    $("#datepicker").datepicker({
        minDate: new Date(2022, 03, 1),
        maxDate: new Date(2022, 03, 30),
        beforeShowDay: function (date) {
            var highlight = eventDates[date];
            if (highlight) {
                return [false, "event", "Tooltip text"];
            } else {
                return [true, "", ""];
            }
        },
        dateFormat: "dd-mm-yy"
    });
});

//CUANDO CARGA LA PAGINA
/* document.addEventListener(('DOMContentLoaded'), () => {

    //AGREGAR UN CONTENIDO PARA MANDAR A TRAER LAS FECHAS
    let lista = document.getElementById('lista');

    lista.innerText = 'SELECCIONA LA FECHA QUE DESEAS';

})
 */
//MANDA A TRAER LOS HORARIOS QUE ESTAN DISPONIBLES
function verHorario() {
    let fecha = document.getElementsByName('fecha')[0].value;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        lista.innerHTML = '';
        //console.log(this.responseText)
        $objeto = JSON.parse(this.responseText);

        $objeto.forEach(element => {
            let item = document.createElement('li');
            let radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = 'seleccion';
            radio.id = element['hora'];
            radio.value = element['hora'];
            radio.setAttribute('onchange', 'disponible()')

            let label = document.createElement('label');
            label.innerText = element['hora'];
            label.setAttribute('for', radio.id)

            item.appendChild(radio)
            item.appendChild(label)

            lista.appendChild(item)
        });
    }
    xhttp.open("GET", `./modulos/horarios.php?fecha=${fecha}`);
    xhttp.send();
}
//FUNCION PARA VER HORARIOS DISPONIBLES
function disponible() {
    //VARIABLES A ENVIAR
    let fecha = document.getElementsByName('fecha')[0].value;
    let hora = document.querySelector('input[name="seleccion"]:checked').value;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let respuesta = document.getElementById('respuesta');
            let ask = this.responseText;
            respuesta.innerHTML = ask;
            setTimeout(() => {
                respuesta.innerHTML = '';
            }, 3000);

        }

    }
    xhttp.open("GET", `./modulos/disponible.php?fecha=${fecha}&hora=${hora}`);
    xhttp.send();
}
//CUANDO DAMOS EL BOTON DE CONFIRMAR LA CITA
let confirmar = document.getElementById('confirmar');
confirmar.addEventListener('click', function () {
    let nombre = document.getElementById('nombre').value;
    let email = document.getElementById('email').value;
    let tel = document.getElementById('tel').value;
    let ads = document.getElementById('ads').value;
    let opcion = document.getElementById('opcion').value;
    let fecha = document.getElementsByName('fecha')[0].value;
    let hora = document.querySelector('input[name="seleccion"]:checked').value;

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            let respuesta = document.getElementById('respuesta');
            let ask = this.responseText;
            respuesta.innerHTML = ask;
            setTimeout(() => {
                respuesta.innerHTML = '';
                lista.innerHTML = '';

            }, 3000);

        }

    }
    xhttp.open("GET", `./modulos/registro.php?nombre=${nombre}&email=${email}&tel=${tel}&ads=${ads}&hora=${hora}&opcion=${opcion}&fecha=${fecha}`);
    xhttp.send();
    document.getElementById('nombre').value = '';
    document.getElementById('email').value = '';
    document.getElementById('tel').value = '';
    document.getElementById('ads').value = '';
    document.getElementsByName('fecha')[0].value = '';

})