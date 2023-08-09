import { dynamicRouteImport } from '@router/routes/dynamicRouteImport'

let routes = dynamicRouteImport(import.meta.globEager('/resources/vue/app/sections/*/routes/index.js'));

export { routes }