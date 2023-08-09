<template>

	<nav class="uk-navbar-container topbar" uk-navbar uk-sticky>
	
	    <div class="uk-navbar-left">
	
	        <ul class="uk-navbar-nav">

	        	<li class="uk-hidden@m">
	        		
	        		<a 
	        			class="uk-navbar-toggle ml-10" 
	        			uk-navbar-toggle-icon 
	        			href="#" 
	        			uk-toggle="target: #sidebarNavWrapper; cls: force-display mobile-display"></a>

	        	</li>
	
	        </ul>
	
	    </div>

	    <div class="uk-navbar-center">
	
	        <ul v-if="false" class="uk-navbar-nav">
	
	            <li class="uk-hidden@m">

	            	<router-link to="/">
                        
                        <img 
                            src="https://siconsulta.com/assets/images/logos/logo_150.png" 
                            style="width: 35px; height: 35px; object-fit: contain;" />

                    </router-link>

	            </li>
	
	        </ul>
	
	    </div>

	    <div class="uk-navbar-right">
	
	        <ul class="uk-navbar-nav">

	            <li>

	            	<a href="#">
							
						<i class="fas fa-envelope fs-20"></i>

					</a>

	            </li>
	
	            <li>

	            	<a href="#">
							
						<i class="fas fa-bell fs-20"></i>

					</a>

	            </li>
	
	            <li>

	            	<a class="mr-10" href="#">
                            
	                    <img 
                            class="uk-border-circle" 
                            src="https://siconsulta.com/assets/images/logos/logo_150.png"
                            style="height: 45px; width: 45px; object-fit: cover;" />

	                </a>

	            </li>
	
	        </ul>
	
	    </div>
	
	</nav>

</template>

<script>
	
	export default {

		//
		
	}

</script>


<style scoped>

	::v-deep(.uk-navbar-nav > li > a) {
		min-height: 55px !important;
		height: 55px !important;
	}

	.topbar {
		height: 54px;
    	background: #fff;
    	border-bottom: 1px solid var(--border-color);
	}

</style>