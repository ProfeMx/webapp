<template>

	<div class="uk-section-default uk-position-relative uk-light">  

        <div 
        	style="background-image: url(https://i.ibb.co/cwJHG0b/aTC5TIO.jpg);" 
        	class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section uk-flex uk-flex-middle" 
        	uk-height-viewport="offset-top: true">  

            <div class="uk-width-1-1">  
            
                <div class="uk-container uk-position-relative">  
            
                    <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>

                        <div class="uk-width-1-1@m uk-first-column">  
                    
                            <h1 class="uk-text-left@m uk-text-center uk-heading-hero uk-scrollspy-inview uk-animation-slide-left-medium">
                            	{{ errorCode }}
                            </h1>  

                            <h6 class="uk-text-left@m uk-text-center uk-heading-primary uk-scrollspy-inview uk-animation-slide-left-medium">
                            	{{ errorName }}
                            </h6>  

                            <div class="uk-text-left@m uk-text-center uk-text-lead uk-scrollspy-inview uk-animation-slide-left-medium">  
                            	{{ errorMessage }}
                            </div> 

                            <router-view
                            	@updateError="updateError"></router-view> 
 
                            <!-- Buttons  -->  
                            <div class="uk-text-left@m uk-text-center uk-scrollspy-inview uk-animation-slide-left-medium uk-margin-top">  

                                <div class="uk-flex-middle uk-child-width-auto uk-grid-medium uk-flex-left@m uk-flex-center uk-grid" uk-grid="">  
                                
                                    <div class="el-item uk-first-column">  

                                    	<a
                                    		href="/"
                                    		class="uk-button uk-button-secondary" >

                                    		<span class="uk-text-middle">Regresar a inicio</span>
                                    		
                                    	</a> 

                                    </div>  

                                </div>  

                            </div>  

                        </div>  

                    </div>  

                </div>  

            </div>  

        </div>  

    </div>  

</template>

<script>
	
	export default {

		data() {
			return {
				errorCode: '',
				errorName: '',
				errorMessage: '',
			}
		},

		methods: {

			updateError(values) {

				this.errorCode = values.errorCode;
				this.errorName = values.errorName;
				this.errorMessage = values.errorMessage;

			}

		}

	}

</script>