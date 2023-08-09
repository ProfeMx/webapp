import { dynamicRouteImport } from '@router/routes/dynamicRouteImport'

let pagesRoutes = dynamicRouteImport(import.meta.globEager('/resources/vue/app/sections/error/pages/**/routes/index.js'));

export default [

	{
		path: '/error',
		name: "Error",
		component: () => import(/* webpackChunkName: "ErrorLayout"*/ "./../layouts/default/ErrorLayout.vue"),
		meta: {
			title: "Error",
		},
		children: [

			...pagesRoutes,

		]
	}
	
];