// Functions for close the alerts components
const closeAlert = (event) => {

	let element = event.target;
	while(element.nodeName !== "BUTTON"){
			element = element.parentNode;
	}
	element.parentNode.parentNode.removeChild(element.parentNode);
}

const $elementos = document.querySelectorAll(".prevenir-envio");

$elementos.forEach(elemento => {
	elemento.addEventListener("keydown", (evento) => {
		if (evento.key == "Enter") {
			// Prevenir
			evento.preventDefault();
			return false;
		}
	});
});