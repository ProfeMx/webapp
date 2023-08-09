<template>
	
	<div id="offcanvasNav" uk-offcanvas="overlay: true" >

        <div class="uk-offcanvas-bar">

            <template v-for="nav in navs">

                <ul 
                    v-if="canView(nav.canView)" 
                    class="uk-nav-default uk-nav-divider" 
                    uk-nav>
                
                    <li class="uk-active">

                        <a href="#">{{ nav.name }}</a>

                    </li>
                
                    <template v-for="path in nav.paths">
                        
                        <li 
                            v-if="canView(path.canView)" 
                            @click="closeSidenav" 
                            class="sub-items">

                            <router-link :to="{name: path.name}">
                                
                                {{ path.label }}

                            </router-link>

                        </li>

                    </template>
                
                </ul>

            </template>

        </div>

    </div>

</template>

<script>

    import navOptions from '@json/nav.json'
    
	export default {

        props: {

            navOption: {
                type: String,
                require: true
            }

        },

        data() {

            return {

                navs: [],

            }

        },

        watch: {

            navOption(val) {

                this.navs = navOptions[val];

            }

        },

        methods: {

            closeSidenav() {

                UIkit.offcanvas('#offcanvasNav').hide();
                
            },

            canView(roles) {

                // Wildcard validation
                if(roles.includes('*')) return true;

                // Role bases validation
                let userRoles = this.$store.getters['user/getRoles'];

                let status = false;

                userRoles.forEach( uRole => {

                    if(roles.includes(uRole.name)) {

                        status = true;

                    }

                });

                return status;

            }

        }

	}

</script>

<style scoped>
	
	.uk-offcanvas-bar {
        padding: 0px 0px 0px 60px !important;
        background-color: var(--admin-nav-background);
    }

    .uk-offcanvas-bar {
        width: 350px;
    }

    .uk-nav-divider {
        margin: 0px 0 !important;
    }

    .uk-offcanvas-overlay {
        background: #242e4263;
    }

    ul.uk-nav-default.uk-nav-parent-icon.uk-nav > li, .uk-nav-sub > li {
        padding: 7px 0 7px 10px;
    }

    .uk-offcanvas-bar .uk-nav-default > li > a:hover {
        color: var(--admin-nav-color);
        font-weight: 600;
    }

    .uk-nav-default > li > a {
        color: var(--admin-nav-color);
        font-size: 18px;
        min-height: 40px;
        display: flex;
        align-items: center;
    }

    .uk-nav-sub li {
        color: var(--admin-nav-color);
    }

    .uk-active {
        padding-left: 15px;
        background: var(--admin-sidebar-nav-active-color);
    }

    .uk-active > a {
        height: 40px;
        display: flex;
        align-items: center;
        color: #fff;
        font-weight: 600;
    }

    .uk-offcanvas-bar .uk-nav-default > li.uk-active > a:hover {
        color: #fff;
        font-weight: 600;
    }

    .sub-items {
        min-height: 50px;
        padding-left: 35px;
        border-bottom: 1px solid #e8e8e8;
    }

    .sub-items:hover {
        background: #F0F2F5;
        transition: all  .5s;
    }

    a.router-link-active.router-link-exact-active {
        font-weight: 600;
    }

</style>