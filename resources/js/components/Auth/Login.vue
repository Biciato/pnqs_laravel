<template>
	<section class="section">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-two-fifths">
					<div class="card is-rounded">
						<div class="card-content">
							<h1 class="title">Entrar</h1>
							<hr>
							<b-field label="Usuário - Seu e-mail cadastrado">
								<b-input type="text" v-model="email" :class="{'is-loading': isLoading}" :disabled="isLoading"></b-input>
							</b-field>
							<b-field label="Senha">
								<b-input type="password" v-model="password" :class="{'is-loading': isLoading}" :disabled="isLoading"></b-input>
							</b-field>
							<div class="has-text-centered" v-if="error">
                                <span class="has-text-danger is-size-7">{{error}}</span>
							</div>
							<br><br>
							<div class="level">
								<div class="level-right">
									<a class="is-size-7 has-text-grey" @click="isRememberPassModalActive = true">Esqueceu sua senha?</a>
								</div>
								<div class="level-left">
									<a class="button is-primary is-medium is-fullwidth" :class="{'is-loading': isLoading}" @click="doLogin()">Login</a><br>
								</div>
							</div>
						</div>
					</div><br><br>
					<p class="has-text-centered has-text-grey">Não é cadastrado? <a href="/register">Cadastre-se</a></p>
				</div>
			</div>
		</div>
		<b-modal :active.sync="isRememberPassModalActive" :canCancel="true" has-modal-card>
			<lost-password></lost-password>
		</b-modal>
	</section>
</template>

<script>
import axios from 'axios'

export default {
	data() {
		return {
			isLoading: false,
			email: "",
			password: "",
			isRememberPassModalActive: false,
			error: ''
		}
	},
	methods: {
		doLogin() {
			axios.post('/login', {
                    email: this.email,
                    password: this.password
                },{
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }
            ).then(() => window.location.replace('/home')).catch(() => this.error = 'As credenciais inseridas não conferem')
		}
	}
}
</script>
