export default [

	{
		path: 'dashboard',
		name: "AdminDashboard",
		component: () => import(/* webpackChunkName: "AdminDashboard"*/ "./../views/DashboardView.vue"),
		meta: {
			title: "Panel de administración",
		},
	}
	
];