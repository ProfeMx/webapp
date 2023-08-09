function dynamicRouteImport(paths) {

	const routes = [];

	// Recorre cada paquete
	for (const path in paths) {

		let pathRoutes;

		try {
		
			pathRoutes = paths[path].default;
		
		} catch (e) {
			
			console.warn(e);

			// console.warn(`Unable to load path: ${path}`);
			
			continue;
		
		}

		// Agrega las rutas del paquete al arreglo de rutas
		routes.push(...pathRoutes);

	}

	return routes;

}

export  {

	dynamicRouteImport
	
}