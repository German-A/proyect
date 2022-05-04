//funcion cambio

function cambio(e) {
    var img = e.getAttribute("data-social");
    e.src = "../img/" + img + "1" + ".png";
}

function regresa(e) {
    var img = e.getAttribute("data-social");
    e.src = "../img/" + img + ".png";
}

for (var i = 0; i < document.getElementsByClassName("redes").length; i++) {
    document.getElementsByClassName("redes")[i].setAttribute("onmouseover", "cambio(this)");
    document.getElementsByClassName("redes")[i].setAttribute("onmouseout", "regresa(this)");
}

//Rotar


//Vinculo parpadeante
window.setInterval(BlinkIt, 500);
var color = "red";

function BlinkIt() {
    var blink = document.getElementById("blink");
    color = (color == "#ffffff") ? "red" : "#ffffff";


}

//MOSTAR DIA ACTUAL
var d = new Date();
var month = new Array(12);
month[0] = 'Enero';
month[1] = 'Febrero';
month[2] = 'Marzo';
month[3] = 'Abril';
month[4] = 'Mayo';
month[5] = 'Junio';
month[6] = 'Julio';
month[7] = 'Agosto';
month[8] = 'Septiembre';
month[9] = 'Octubre';
month[10] = 'Noviembre';
month[11] = 'Diciembre';
var todaysDate = +d.getDate() + ' de ' + month[d.getUTCMonth()] + ' del ' + d.getUTCFullYear();