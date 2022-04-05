let caja = document.getElementById('caja');
let lista = document.getElementById('lista');

const xhttp = new XMLHttpRequest();


xhttp.onload = function () {

    $objeto = JSON.parse(this.responseText);
    //console.log($objeto)

    $objeto.forEach(element => {
        let item = document.createElement('li');
        let radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'seleccion';
        radio.id = element['hora'];
        radio.value = element['hora'];

        let label = document.createElement('label');
        label.innerText = element['hora'];
        label.setAttribute('for', radio.id)

        item.appendChild(radio)
        item.appendChild(label)

        lista.appendChild(item)
    });

}

xhttp.open("GET", "./modulos/horarios.php");
xhttp.send();




let confirmar = document.getElementById('confirmar');

confirmar.addEventListener('click', function () {
    let nombre = document.getElementById('nombre').value;
    let email = document.getElementById('email').value;
    let ads = document.getElementById('ads').value;
    let hora = document.querySelector('input[name="seleccion"]:checked').value;

    const xhttp = new XMLHttpRequest();


    xhttp.onload = function () {


        let respuesta = document.getElementById('respuesta');
        let ask = this.responseText;
        respuesta.innerHTML = ask;

        setTimeout(() => {

            respuesta.innerHTML = '';

        }, 5000);


        const xhttp = new XMLHttpRequest();


        xhttp.onload = function () {

            $objeto = JSON.parse(this.responseText);
            //console.log($objeto)
            lista.innerHTML = '';

            $objeto.forEach(element => {
                let item = document.createElement('li');
                let radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'seleccion';
                radio.id = element['hora'];
                radio.value = element['hora'];

                let label = document.createElement('label');
                label.innerText = element['hora'];
                label.setAttribute('for', radio.id);

                item.appendChild(radio);
                item.appendChild(label);

                lista.appendChild(item);
            });

        }

        xhttp.open("GET", "./modulos/horarios.php");
        xhttp.send();



    }

    xhttp.open("GET", `./modulos/registro.php?nombre=${nombre}&email=${email}&ads=${ads}&hora=${hora}`);
    xhttp.send();


    document.getElementById('nombre').value = '';
    document.getElementById('email').value = '';
    document.getElementById('ads').value = '';




})