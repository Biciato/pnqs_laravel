<template>
	<form action="">
		<div class="modal-card" style="width: 660px;">
			<header class="modal-card-head">
				<p class="modal-card-title">Incluir local com força de trabalho</p>
			</header>
			<section class="modal-card-body">
				<div class="columns">
					<div class="column is-half">
						<b-field label="CEP" :type="errors.has('zipcode') ? 'is-danger': ''" :message="errors.has('zipcode') ? errors.first('zipcode') :''">
							<b-input type="text" name="zipcode" v-cleave="masks.cep" v-validate="'required'" v-model="editedPlace.zipcode" autocomplete="post-code" :disabled="isLoading"></b-input>
						</b-field>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Nome" :type="errors.has('name') ? 'is-danger': ''" :message="errors.has('name') ? errors.first('name') :''">
							<b-input type="text" name="name" v-model="editedPlace.name" v-validate="'required'"></b-input>
						</b-field>
					</div>
					<div class="column">
						<b-field label="Quantidade de Pessoas na força de trabalho (aprox.)" :type="errors.has('name') ? 'is-danger': ''" :message="errors.has('name') ? errors.first('name') :''">
							<b-input type="number" v-model="editedPlace.persons_qtd" v-validate="'required'"></b-input>
						</b-field>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Logradouro" :type="errors.has('street') ? 'is-danger': ''" :message="errors.has('street') ? errors.first('street') :''">
							<b-input type="text" name="street" v-model="editedPlace.street" v-validate="'required'" :disabled="isLoading" autocomplete="address-line1"></b-input>
						</b-field>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Número" :type="errors.has('number') ? 'is-danger': ''" :message="errors.has('number') ? errors.first('number') :''">
							<b-input type="text" name="number" v-model="editedPlace.number" v-validate="'required'" :disabled="isLoading"></b-input>
						</b-field>
					</div>
					<div class="column">
						<b-field label="Complemento">
							<b-input type="text" :disabled="isLoading" v-model="editedPlace.complement"></b-input>
						</b-field>
					</div>
				</div>
				<div class="columns">
					<div class="column">
						<b-field label="Cidade" :type="errors.has('city') ? 'is-danger': ''" :message="errors.has('city') ? errors.first('city') :''">
							<b-input type="text" name="city" v-model="editedPlace.city" v-validate="'required'" :disabled="isLoading"></b-input>
						</b-field>
					</div>
					<div class="column">
						<b-field label="Bairro" :type="errors.has('neighborhood') ? 'is-danger': ''" :message="errors.has('neighborhood') ? errors.first('neighborhood') :''">
							<b-input type="text" name="neighborhood" v-model="editedPlace.neighborhood" v-validate="'required'" :disabled="isLoading"></b-input>
						</b-field>
					</div>
					<div class="column">
						<b-field label="Estado" :type="errors.has('state') ? 'is-danger': ''" :message="errors.has('state') ? errors.first('state') :''">
							<b-select id="estado" name="state" v-validate="'required'" v-model="editedPlace.state" :disabled="isLoading">
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AM">Amazonas</option>
								<option value="AP">Amapá</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RO">Rondônia</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SE">Sergipe</option>
								<option value="SP">São Paulo</option>
								<option value="TO">Tocantins</option>
							</b-select>
						</b-field>
					</div>
				</div>
			</section>
			<footer class="modal-card-foot">
				<button class="button" type="button" @click="$parent.close()">Cancelar</button>
				<button class="button is-primary" type="button" @click="savePlace()">Salvar</button>
			</footer>
		</div>
	</form>
</template>

<script>

import subscriptionApi from '../../../api/subscription'

export default {
	props: {
		subscription: {
			type: Object,
		},
		place: {
			type: Object
		}
	},
	data(){
		return {
			isLoading: false,
			masks: {
				cep: {
					delimiters: ['-'],
					blocks: [5,3],
					//numericOnly: true
				}
			},
			editedPlace: null
		}
	},
	watch: {
		"editedPlace.zipcode"(newValue){
			var cep = newValue.split("-").join("")
			if (cep.length >= 8) {
				subscriptionApi.getAddress(cep).then((res) => {
					let address = res.data
					this.editedPlace.neighborhood = address.bairro
					this.editedPlace.city = address.localidade
					this.editedPlace.street = address.logradouro
					this.editedPlace.state = address.uf
					this.editedPlace.country = "Brazil"
					this.isLoading = false
				})
			}
		}
	},
	created(){
		if (!this.place){
			this.place = {
				zipcode: "",
				street: "",
				state: "",
				neighborhood: "",
				city: "",
				country: ""
			}
		}
		this.editedPlace = this.place
	},
	methods: {
		savePlace(){
			this.$validator.validateAll().then((isValid) => {
				if (isValid) {
					this.$emit('added-place', this.editedPlace)
					this.$parent.close()
				}
			})
		}
	}
}
</script>
