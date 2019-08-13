var contador = 0;

function botonPulsado() {

	contador += 1;

	// Añade una línea al textarea
	document.getElementById("id_de_mi_textarea").value += "línea " + contador + "\n";

}