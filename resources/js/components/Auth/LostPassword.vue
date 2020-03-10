<template>
	<form class="">
		<div class="modal-card">
			<header class="modal-card-head">
				<h3 class="title">Alterar senha</h3>
			</header>
			<section class="modal-card-body">
                <div class="has-text-centered" :v-if="serverErrors.error">
                    <span class="has-text-danger is-size-7">{{ serverErrors.error ? 'Dados inseridos não confere !!!' : serverErrors.data }}</span>
                </div>
				<div class="columns">
					<div class="column">
						<b-field label="Digite seu e-mail">
							<b-input type="text" name="email" v-model="remember.email" :disabled="isLoading"></b-input>
						</b-field>
                        <div class="has-text-centered" :v-if="serverErrors.email">
							<template v-for="error in serverErrors.email">
								<span v-bind:key="error" class="has-text-danger is-size-7">{{error}}</span>
							</template>
						</div>
					</div>
				</div>
                <div class="columns">
					<div class="column">
						<b-field label="Digite seu CNPJ">
							<b-input type="text" name="email" v-model="cnpj" v-mask="'##.###.###/####-##'" :disabled="isLoading"></b-input>
						</b-field>
                        <div class="has-text-centered" :v-if="serverErrors.cnpj > 0">
                            <template v-for="error in serverErrors.cnpj">
                                <span v-bind:key="error" class="has-text-danger is-size-7">{{error}}</span>
                            </template>
                        </div>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Nova senha">
							<b-input type="password" name="password" v-model="remember.password" :disabled="isLoading"></b-input>
						</b-field>
                        <div class="has-text-centered" :v-if="serverErrors.password > 0">
							<template v-for="error in serverErrors.password">
								<span v-bind:key="error" class="has-text-danger is-size-7">{{error}}</span>
							</template>
						</div>
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
import axios from 'axios'

export default {
	data(){
		return {
            isLoading: false,
            cnpj: '',
			remember: {},
			serverErrors: {},
		}
	},
	methods: {
		getPassword(){
            this.isLoading = true;
			axios
                .post(
                    "/change-password",
                    {
                        email: this.remember.email,
                        password: this.remember.password,
                        cnpj: this.cnpj
                    },
                    {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content")
                        }
                    }
                )
                .then(() => this.$buefy.toast.open({
                    message: 'Senha alterada com sucesso!',
                    type: 'is-success'
                }))
                .then(() => this.$parent.close())
                .catch(obj => {
                    if (obj.response.data.error) {
                        this.serverErrors = obj.response.data
                    } else if (obj.response.data.errors) {
                        this.serverErrors = obj.response.data.errors
                    } else if (obj.response.status === 500) {
                        this.serverErrors = obj.response
                    }
                    this.isLoading = false;
                })
		}
	}
}
</script>
