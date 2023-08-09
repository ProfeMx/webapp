let filters = {}

const setFilters = (newFilters = {}) => {

	filters = {

		...filters,

		...newFilters,

	}

	return filters;

}

const getFilters = () => {

	return filters;

}

let strings = {
	crudActions: {
		create: {
			name: 'Crear',
			icon: 'fa-plus'
		},
		export: {
			name: 'Exportar',
			icon: 'fa-download'
		}
	},
	exportModel: {
		confirmation: {
			title: 'Confirmar operación',
			text: 'Desea confirmar la exportación de datos',
		}
	},
	deleteModel: {
		confirmation: {
			title: 'Confirmar operación',
			text: 'Desea confirmar la exportación de datos',
		}
	}
}

const crudActions = () => {

	return [
		{
			id: 'create',
			name: strings.crudActions.create.name,
			callback: 'createUser',
			icon: strings.crudActions.create.icon,
			route: true,
			policy: false,
			params: {
				to: {
					name: 'AdminCreateUser',
					params: {}
				}
			}
		},
		{
			id: 'export',
			name: strings.crudActions.export.name,
			callback: 'exportModel',
			icon: strings.crudActions.export.icon,
			route: false,
			policy: false,
			params: {}
		}
	];

}

const dataTableHead = () => {

	return [
		{
			id: 'id',
			value: 'ID',
			sortable: true,
			html: false,
		},
		/*
		{
			id: 'column',
			value: 'Column',
			sortable: true,
			html: false,
			parser: (value) => {

				return value;

			}
		},
		*/
	];

}

const dataTableSort = () => {

	return {
		id: 'asc',
		// Añadir columnas ordenables
	};

}

const exportModel = (data) => { 

	return new Promise( (resolve, reject) => {

		Swal.fire({
			title: string.exportModel.confirmation.title,
			text: string.exportModel.confirmation.text,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, continuar'
		}).then((result) => {

			if (result.isConfirmed) {

				axios.post(route('api.user.export'), {

			    	_token: csrf_token,

			    	...filters,

			    }).then( res => {

					resolve({ message: 'En unos segundos recibirás un correo con el archivo de descarga' });

				}).catch( error => {

					reject({ message: error.response.data.message })

				});

			} else {

				Swal.fire(
					'Operación cancelada',
					'Se ha cancelado la operación',
					'error'
				);

			}

		});

	});

}

const getModel = (modelId) => {

	return new Promise((resolve, reject) => {

		axios.get(route('api.user.show'), {

            params: {

            	_token: csrf_token,

            	user_id: modelId

            }

        }).then( res => {

            resolve(res);

        }).catch( error => {

            reject(error);

        });

	});

}

const createModel = (data) => {

	return new Promise((resolve, reject) => {

		axios.post(route('api.user.create'), {

	            _token: csrf_token,

	            ...data,
	            
	        })
			.then( res => {

	            resolve(res);

	        })
	        .catch( error => {
	            
	            reject(error);

	        });

	});

}

const updateModel = (modelId, data) => {

	return new Promise((resolve, reject) => {

		axios.put(route('api.user.update'), {

	            _token: csrf_token,

	            ...data,

	            user_id: modelId
	            
	        })
			.then( res => {

	            resolve(res);

	        })
	        .catch( error => {
	            
	            reject(error);

	        });

	});

}

const deleteModel = (data) => { 

	return new Promise( (resolve, reject) => {

		Swal.fire({
			title: string.deleteModel.confirmation.title,
			text: string.deleteModel.confirmation.text,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar'
		}).then((result) => {

			if (result.isConfirmed) {

				axios.post(route('api.user.delete'), {

			    	_token: csrf_token,

			    	_method: 'DELETE',

			    	user_id: data.id

			    }).then( res => {

					resolve({ message: 'Operación exitosa' });

				}).catch( error => {

					reject({ message: error.response.data.message })

				});

			} else {

				Swal.fire(
					'Operación cancelada',
					'Se ha cancelado la operación',
					'error'
				);

			}

		});

	});

}

// PENDIENTE: Crear los método, policy, policies, index, show, create, update, etc.

export { 
	setFilters,
	getFilters,
	crudActions,
	dataTableHead,
	dataTableSort,
	exportModel,
	getModel,
	createModel,
	updateModel,
	deleteModel,
};