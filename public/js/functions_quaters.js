const swalCustom = Swal.mixin({
	customClass: {
		confirmButton: 'text-white color-primario focus:outline-none font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer mr-2',
		cancelButton: 'text-white color-secundario focus:outline-none font-medium rounded-xl text-sm px-5 py-2.5 text-center dark:hover:bg-blue-700 cursor-pointer'
	},
	buttonsStyling: false
})

const formDelete = async (e) => {

	swalCustom.fire({
		icon: 'question',
		title: "Cuatrimestre",
		text: `Eliminar cuatrimestre (${e.name})`,
		type: "question",
		showCancelButton: true,
		confirmButtonText: "Confirmar",
		confirmButtonColor: '#aea322',
		cancelButtonColor: '#165b30',
		cancelButtonText: "Cancelar",
		closeOnConfirm: false,
		closeOnCancel: true

	}).then(async (result) => {

		if (result.isConfirmed) {

			const data = new FormData(document.getElementById('formDelete'));
			const sendData = await fetch(`${base_url+'/admin/quaters/'+e.id}`, {
				
				method: 'post',
				body: data
			})
			.then(response => response.json())
			.then(async result => {

				if (result.status) {
					
					reloadPage();
					
					const Toast = Swal.mixin({
						toast: true,
						position: 'bottom-end',
						iconColor: 'rgb(61, 61, 61)',
						customClass: {
							popup: 'colored-toast'
						},
						showConfirmButton: false,
						timer: 8000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					});

					await Toast.fire({
						icon: 'success',
						title: result.message
					});
				}else{
					const Toast = Swal.mixin({
						toast: true,
						position: 'bottom-end',
						iconColor: 'rgb(61, 61, 61)',
						customClass: {
							popup: 'colored-toast'
						},
						showConfirmButton: false,
						timer: 8000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					});

					await Toast.fire({
						icon: 'error',
						title: result.message
					});
				}
			})
			.catch(error => {
				return error;
			});
		}
	});
}

const reloadPage = async () => {

	await reloadIndex();
}

const calculateIA = async (records) => {

	if (records[0].points > 0) {
	
		let points = records[0].points;
		let credits = records[1].credits;
		let result = points/credits;
	
		let putValue = document.getElementById('ia');
		putValue.innerHTML = new Intl.NumberFormat('en-US', { maximumSignificantDigits: 3 }).format(result);
	}else{
		let putValue = document.getElementById('ia');
		putValue.innerHTML = 0;
	}
}
