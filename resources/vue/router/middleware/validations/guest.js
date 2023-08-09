export default function guest( { next } ) {

	// Si el usuario está identificado
    if (vm.$store.getters['user/isAuth']) {
    	
    	// Enviarlo al Dashboard
        return next({	
            name: 'AdminDashboard'
        });

    } else {

    	return next();

    }

}