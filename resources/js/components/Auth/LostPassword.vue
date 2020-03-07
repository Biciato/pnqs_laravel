<template>
	<form class="">
		<div class="modal-card">
			<header class="modal-card-head">
				<h3 class="title">Recuperar senha</h3>
			</header>
			<section class="modal-card-body">
				<div class="columns">
					<div class="column">
						<div class="has-text-centered" v-if="serverErrors.length > 0">
							<template v-for="error in serverErrors">
								<span v-bind:key="error" class="has-text-danger is-size-7">{{error}}</span>
							</template>
						</div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Digite seu e-mail">
							<b-input type="text" name="email" v-model="remember.email" :disabled="isLoading"></b-input>
						</b-field>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Nova senha">
							<b-input type="password" name="password" v-model="remember.password" :disabled="isLoading"></b-input>
						</b-field>
					</div>
				</div>
			</section>
			<footer class="modal-card-foot">
				<button type="button" class="button is-primary" :class="{'is-loading': isLoading}" @click="getPassword()">Salvar</button>
				<button type="button" class="button" :disabled="isLoading" @click="$parent.close()">Cancelar</button>
			</footer>
		</div>
	</form>
</template>

<script>

export default {
	data(){
		return {
			isLoading: false,
			remember: {},
			serverErrors: [],
		}
	},
	methods: {
		getPassword(){
			this.isLoading = true
			this.$http.post("auth/change-password", this.remember).then(() => {
				alert("Senha alterada com sucesso.")
				this.$parent.close()
			}).catch((errors) => {
				this.serverErrors.push(errors.data.message)
				this.isLoading = false
			})
		}
	}
}
</script>
