export default {

	namespaced: true,

	state() {

		return {

			roles: [],

		}

	},

	getters: {

		isAuth(state) {

			let metaUsr = document.querySelector("meta[name='usr']").getAttribute("content");

			return (metaUsr != "" || state.auth) ? true : false

		},

		getRoles(state) {

			return state.roles;

		}

	},

	mutations: {

		//

	},

	actions: {

		hasRole({state}, role) {

			return state.roles.includes('role');

		}

	}

}
