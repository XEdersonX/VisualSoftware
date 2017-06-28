/**
 * Created by Visual Software on 21/06/2017.
 */
function typeWritter(texto,idElemento,tempo){
    var char = texto.split('').reverse();
    var typer = setInterval(function () {
        if (!char.length) return clearInterval(typer);
        var next = char.pop();
        document.getElementById(idElemento).innerHTML += next;
    }, tempo);
}
typeWritter('Bem-Vindo à Visual Software','log',100);