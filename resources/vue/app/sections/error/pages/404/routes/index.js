export default [

	{
		path: '404',
		name: "ErrorNotFound",
		component: () => import(/* webpackChunkName: "ErrorNotFound"*/ "./../views/ErrorView.vue"),
		meta: {
			title: "Error 404",
		},
	}

];