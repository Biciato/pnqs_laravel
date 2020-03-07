<template>
	<form action="">
		<div class="modal-card" style="width: 660px;">
			<header class="modal-card-head">
				<p class="modal-card-title">Cadastrar Contato</p>
			</header>
			<section class="modal-card-body">
				<form @submit.prevent="" data-vv-scope="contactForm">
					<div class="columns">
						<div class="column">
							<b-field label="Categoria do Contato" :type="errors.has('contactForm.categoria') ? 'is-danger': ''" :message="errors.has('contactForm.categoria') ? errors.first('contactForm.categoria') :''">
								<b-select v-model="editContact.type" name="categoria" v-validate="'required'">
									<option value="DIR">Principal dirigente</option>
									<option value="RES">Responsável Candidatura</option>
									<option value="APR">Apresentador do Case  no Seminário de benchmarking</option>
									<option value="REP">Representante no Seminário de benchmarking</option>
									<option value="FOR">Fornecedor indicado</option>
								</b-select>
							</b-field>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Nome" :type="errors.has('contactForm.name') ? 'is-danger': ''" :message="errors.has('contactForm.name') ? errors.first('contactForm.name') :''">
								<b-input v-model="editContact.name" name="name" v-validate="'required'"></b-input>
							</b-field>
						</div>
						<div class="column">
							<b-field label="Telefone" :type="errors.has('contactForm.phone') ? 'is-danger': ''" :message="errors.has('contactForm.phone') ? errors.first('contactForm.phone') :''">
								<b-input v-model="editContact.phone"  v-cleave="masks.phone" name="phone" v-validate="'required'"></b-input>
							</b-field>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="E-mail" :type="errors.has('contactForm.email') ? 'is-danger': ''" :message="errors.has('contactForm.email') ? errors.first('contactForm.email') :''">
								<b-input type="email" v-model="editContact.email" name="email" v-validate="'required'"></b-input>
							</b-field>
						</div>
					</div>
				</form>
			</section>
			<footer class="modal-card-foot">
				<button class="button" type="button" @click="$parent.close()">Cancelar</button>
				<button class="button is-primary" type="button" @click="saveContact()">Salvar</button>
			</footer>
		</div>
	</form>
</template>

<script>

export default {
	props: {
		subscription: {
			type: Object,
		},
		contact: {
			type: Object,
			default: () => true
		}
	},
	data(){
		return {
			isLoading: false,
			editContact: {
				type: ""
			},
			masks: {
				phone: {
					delimiters: [' ', '-'],
					blocks: [2,5,4],
					numericOnly: true
				}
			}
		}
	},
	created(){
		if (this.contact){
			this.editContact = this.contact
		}
	},
	methods: {
		saveContact(){
			this.$validator.validateAll("contactForm").then((isValid) => {
				if (isValid) {
					this.$emit('added-contact', this.editContact)
					this.$parent.close()
				}
			});
		}
	}
}
</script>
