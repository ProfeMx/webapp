<template>
    
    <div class="wrapper">

        <the-header />
        
        <div uk-height-viewport="expand: true">
            
            <router-view></router-view>

        </div>
        
        <the-footer />
        
        <the-offcanvas />
        
    </div>

</template>

<script>
    
    import TheHeader from './TheHeader.vue'
    import TheFooter from './TheFooter.vue'
    import TheOffcanvas from './TheOffcanvas.vue'

    export default {

        components: {

            TheHeader,

            TheFooter,

            TheOffcanvas,

        }

    }

</script>