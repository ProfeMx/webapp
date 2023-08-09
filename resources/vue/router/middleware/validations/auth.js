export default function auth( { next } ) {

	// Si el usuario NO está identificado
    if (vm.$store.getters['user/isAuth']) {
    	
    	return next();

    } else {

        // window.location.href = route.name('login');
        
        window.location.href = '/';

    }

}