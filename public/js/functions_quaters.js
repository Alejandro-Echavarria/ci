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
				.then(result => {

					console.log(message = result);
					prueba2();
					
					const Toast = Swal.mixin({
						toast: true,
						position: 'bottom-end',
						showConfirmButton: false,
						timer: 8000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})

					Toast.fire({
						icon: 'success',
						title: 'Signed in successfully'
					})
				})
				.catch(error => {
					return error;
				});

			// let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			// let ajaxUrl = base_url+'/'+controlador+'/update';
			// let formData = new FormData(form);
			// request.open("POST",ajaxUrl,true);
			// request.send(formData);

			// request.onreadystatechange = async () => {
			// 	if (request.readyState == 4 && request.status == 200) {
			// 		var objData = JSON.parse(request.responseText);
			// 		if (objData.status) {

			// 			Swal.fire({
			// 				icon: objData.icon,
			// 				title: 'Requisición',
			// 				text: objData.msg,
			// 				confirmButtonText: 'Entendido',
			// 				confirmButtonColor: '#aea322'
			// 			});
			// 			// DataTableAc.api().ajax.reload();
			// 		}else{
			// 			Swal.fire({
			// 				icon: 'error',
			// 				title: 'Error',
			// 				text: objData.msg,
			// 				confirmButtonText: 'Entendido',
			// 				confirmButtonColor: '#aea322'
			// 			});
			// 		}
			// 	}
			// }
		}
	});
}

const prueba2 = async () => {

	await prueba();
}