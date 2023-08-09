export default [
	{
		path: '/',
		name: "Home",
		component: () => import(/* webpackChunkName: "HomeView"*/ "./../views/HomeView.vue"),
		meta: {
			title: "Inicio",
		},
		children: []
	}
];