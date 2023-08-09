// ENV
    
    import env from '@js/env.js'

// UIkit

    import UIkit from 'uikit';
    
    import Icons from 'uikit/dist/js/uikit-icons';

    import CustomIcons from 'uikit-custom-icons'

    UIkit.use(Icons);

    UIkit.icon.add(CustomIcons);

    window.UIkit = UIkit;

// LODASH

    import _ from 'lodash';
    
    window._ = _;

// ROUTE

    import route, { setRoutes, setBaseUrl } from 'innoboxrr-route-resolver';

    import routes from '@json/routes.json';

    setRoutes(routes);

    // setBaseUrl(window.location.hostname);

    window.route = route;

// LOCALE

    import lang, {setTranslations, setLocale} from 'innoboxrr-i18n'

    setTranslations(import.meta.globEager('/resources/lang/*.json'));

    // setLocale('es-ES'); // Implementar lógica para cambiar idioma

    window.t = lang;

// CHANCE: Library to generate any random string. Docs: https://chancejs.com/index.html

    import chance from 'chance'

    window.chance = chance.Chance();

// SWAL

    import sweetalert2 from 'sweetalert2'
    
    // Docs: https://sweetalert2.github.io/
    window.Swal = sweetalert2;

// AXIOS
    
    import axios from 'axios'

    window.axios = axios;
    
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    
    axios.defaults.withCredentials = true;

    window.csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// DAYJS

    import dayjs from 'dayjs'
    import customParseFormat from 'dayjs/plugin/customParseFormat'
    import utc from 'dayjs/plugin/utc'
    import timezone from 'dayjs/plugin/timezone'
    import relativeTime from 'dayjs/plugin/relativeTime'
    import isSameOrBefore from 'dayjs/plugin/isSameOrBefore'
    import isSameOrAfter from 'dayjs/plugin/isSameOrAfter'
    import isBetween from 'dayjs/plugin/isBetween'
    import 'dayjs/locale/es'
    import 'dayjs/locale/fr'

    dayjs.extend(customParseFormat)
    dayjs.extend(utc)
    dayjs.extend(timezone)
    dayjs.extend(relativeTime)
    dayjs.extend(isSameOrBefore)
    dayjs.extend(isSameOrAfter)
    dayjs.extend(isBetween)

    dayjs.locale(document.querySelector('html').getAttribute('lang'))
    dayjs.tz.setDefault('America/Mexico_City')


// VUE

    import { createApp } from 'vue'

    import App from '@app/App.vue'

    import router from '@router'
    
    import vuex from '@vuex'

    import mixin from '@js/mixin.js'

    import { globalComponentRegistration } from '@js/global-components.js'

// Vue App

    window.app = createApp(App);

    app.use(router);

    app.use(vuex);

    app.mixin(mixin);

// Registro Global de componentes
    
    globalComponentRegistration(app);

// Vue Model

    window.vm = app.mount('#app');
