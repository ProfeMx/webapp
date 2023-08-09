<template>

	<div class="uk-section uk-section-xsmall">

		<!-- Header -->
		<div v-if="dataLoaded" class="uk-container uk-container-expand">

			<h3 class="uk-heading-divider">

				<router-link :to="{name: 'AdminUsers'}">
					
					<i class="fas fa-arrow-circle-left"></i>

				</router-link>

				ID: {{ user.id }}
			
			</h3>

		</div>

		<!-- Body -->
		<div v-if="dataLoaded" class="uk-section uk-section-small">
			
			<!-- Add specific view content -->

		</div>

	</div>

</template>

<script>

	export default {

		mounted() {

			this.fetchData();

		},

		data() {
		
			return {

				dataLoaded: false,

				title: undefined,

				user: {},

				fetchUserAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchUser().then( res => {

					this.dataLoaded = true;
					
					this.title = this.user.name;

					document.title = this.title;

				});

			},

			fetchUser() {

                model.getModel(this.userId)
                    .then( res => {

                        this.fetchUserAttempts;

                        this.user = res.data;

                    })
                    .catch( error => {

                        if(this.fetchUserAttempts <= 3) {

                            setTimeout( () => {

                                ++this.fetchUserAttempts;

                                this.fetchUser();

                            }, 1500);

                        }

                    });

            },

		}

	}

</script>