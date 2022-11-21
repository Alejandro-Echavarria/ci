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

/* A function that changes the theme of the page. */
if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
	localStorage.dark = 1;
	document.documentElement.classList.add('dark');
} else {
	localStorage.dark = 0;
	document.documentElement.classList.remove('dark');	
}

/* A function that changes the theme of the page. */
document.querySelectorAll(".setMode").forEach(item =>
    item.addEventListener("click", () => {
        if (localStorage.dark == 1) {
            localStorage.dark = 0;
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.dark = 1;
            document.documentElement.classList.add('dark');
        }
    })
)