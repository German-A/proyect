var nodelist = document.querySelectorAll('.card');
var arraylist = Array.prototype.slice.call(nodelist);
var cards = document.getElementById('cards');

maxItem = arraylist.length - 1;
cont = 0;

let atras = document.querySelector('.atras');
atras.addEventListener('click', e => {
    if (cont > 0) {
        cards.innerHTML = "";
        cont--;
        cards.appendChild(arraylist[cont]);
    } else {
        cont = maxItem;
        cards.innerHTML = "";
        cards.appendChild(arraylist[cont]);
    }
});

let adelante = document.querySelector('.adelante');
adelante.addEventListener('click', e => {
    if (cont < maxItem) {
        cards.innerHTML = "";
        cont++;
        cards.appendChild(arraylist[cont]);
    } else {
        cards.innerHTML = "";
        cont = 0;
        cards.appendChild(arraylist[cont]);
    }

});