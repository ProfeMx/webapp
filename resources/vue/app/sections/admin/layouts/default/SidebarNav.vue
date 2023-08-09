<template>

    <div id="sidebarNavWrapper">

        <div class="close-toggle uk-visible@m">

            <a uk-toggle="target: #sidebarNavWrapper; cls: force-display mobile-display">
                
                <i class="fas fa-arrow-left"></i>

            </a>

        </div>
            
        <div class="sidebar-nav">
                        
            <ul class="uk-list">
                
                <!-- Home link -->
                <li class="uk-text-center uk-margin-top uk-margin-bottom">
                    
                    <router-link to="/">
                        
                        <img 
                            src="https://siconsulta.com/assets/images/logos/logo_150.png" 
                            style="width: 35px; height: 35px; object-fit: contain; display: unset;" />

                    </router-link>

                </li>
                
                <!-- adminNav -->
                <li 
                    v-if="$store.dispatch('user/hasRole', 'user')"
                    class="uk-text-center icon" 
                    :class="{
                        'active-group': activeGroup == 'admin-group'
                    }" 
                    @click="selectNav('adminNav'), activateGroup('admin-group')">
                    
                    <a href="#">

                        <i class="fas fa-tachometer-alt"></i>

                    </a>

                </li>

                <hr class="uk-margin-remove" />

                <!-- Support -->
                <li class="uk-text-center icon">
                    
                    <a href="https://tawk.to/siconsulta" target="_blanck">

                        <i class="far fa-comment-alt"></i>

                    </a>

                </li>

                <!-- Help -->
                <li class="uk-text-center icon">
                    
                    <a href="https://siconsulta.tawk.help" target="_blanck">

                        <i class="fas fa-question"></i>

                    </a>

                </li>

            </ul>

        </div>

    </div>

</template>

<script>

    export default {

        emits: ['select'],

        data() {

            return {

                activeGroup: '',

            }

        },

        methods: {

            selectNav(nav) {

                this.$emit('select', nav);

                UIkit.offcanvas('#offcanvasNav').hide();

                setTimeout(() => {

                    UIkit.offcanvas('#offcanvasNav').show();

                }, 300);

            },

            activateGroup(className) {

                this.activeGroup = className;

            },

            closeOffcanvas() {

                UIkit.offcanvas('#offcanvasNav').hide();

            }

        }

    }

</script>

<style scoped>

	.sidebar-nav {
 		position: fixed;
        width: 60px;
 		background-color: var(--admin-sidebar-nav-background);
        border-right: 1px solid var(--border-color);
        z-index: 1001;
        height: 100vh;
        overflow-y: hidden;
        overflow-x: hidden;
        transition: 0.3s;
 	}

    .sidebar-nav:hover {
        overflow-y: auto;
    }

    @media only screen and (max-width: 916px) {
        
        .sidebar-nav {
            overflow-y: auto;
        }

    }

    li.uk-text-center.icon {
        padding: 5px 15px;
    }

    .icon a i {
        color: var(--admin-sidebar-nav-color) !important;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 1.2em;
    }

    .icon:hover {
        border-left: 3px solid var(--admin-sidebar-nav-active-color);
    }

    .icon a i:hover {
        color: var(--admin-sidebar-nav-active-color) !important;
    }

    .active-group {
        border-left: 3px solid var(--admin-sidebar-nav-active-color);
    }

    .active-group a i {
        color: var(--admin-sidebar-nav-active-color) !important;
    }

    .mobile-display {
        position: relative;
    }

    .close-toggle {
        display: none;
    }

    .mobile-display .close-toggle {
        position: absolute;
        top: 11px;
        left: 70px;
        z-index: 10;
        font-size: 25px;
        color: #5295fe;
        background: #2196f317;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        display: flex !important;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

</style>