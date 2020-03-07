<template>
	<form action="">
		<div class="modal-card" style="width: 760px;">
			<header class="modal-card-head">
				<p class="modal-card-title">Incluir Práticas</p>
			</header>
			<section class="modal-card-body">
				<div class="columns">
					<div class="column">
						<b-field label="Categoria por porte ou tipo especial sugerida">
							<b-select v-model="practice.practice_category">
								<option value="IGS">IGS</option>
								<option value="PEOS">PEOS - Gestão de Perdas de Água  ou Gestão de Esgoto Sanitário</option>
							</b-select>
						</b-field>
					</div>
				</div>
				<form @submit.prevent="" data-vv-scope="pratica">
					<template v-if="practice.practice_category == 'IGS'">

						<h1 class="title is-6">Aplicável para categoria IGS</h1>
						<div class="block">
							<b-radio v-model="practice.subgroup_id" native-value="3">
								Água
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="4">
								Esgoto e Efluentes Industriais
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="5">
								Manejo de Águas Pluviais
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="6">
								Resíduos Sólidos
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="7">
								Clientes
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="8">
								Apoio
							</b-radio>
							<b-radio v-model="practice.subgroup_id" native-value="9">
								Sócioambiental
							</b-radio>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Denominação da Prática" :type="errors.has('pratica.practice_name') ? 'is-danger': ''" :message="errors.has('pratica.practice_name') ? errors.first('pratica.practice_name') :''">
									<b-input v-model="practice.name" name="practice_name" v-validate="'required'"></b-input>
								</b-field>
								<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
							</div>
							<div class="column">
								<b-field label="Data de início da implantação" :type="errors.has('pratica.implantation_start_dt') ? 'is-danger': ''" :message="errors.has('pratica.implantation_start_dt') ? errors.first('pratica.implantation_start_dt') :''">
									<b-datepicker name="implantation_start_dt" v-validate="'required'" v-model="practice.implantation_start_dt" placeholder="Selecione a data:" icon="calendar-today">
									</b-datepicker>
								</b-field>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Resumo da Prática" :type="errors.has('pratica.resume') ? 'is-danger': ''" :message="errors.has('pratica.resume') ? errors.first('pratica.resume') :''">
									<b-input v-model="practice.resume" name="resume" v-validate="'required'"  type="textarea"></b-input>
								</b-field>
								<p class="has-text-danger is-size-7">
									Não são elegíveis Trabalhos relativos a melhorias, ideias ou inovações em produtos, processos ou práticas operacionais,
									como por exemplo: softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
								</p>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Área, setor, divisão, departamento, grupo, equipe ou assemelhado, responsável pela Prática:" :type="errors.has('pratica.area') ? 'is-danger': ''" :message="errors.has('pratica.area') ? errors.first('pratica.area') :''">
									<b-input v-model="practice.area" name="area" v-validate="'required'"></b-input>
								</b-field>
							</div>
							<div class="column">
								<b-field label="Questões dos Critérios categoria AMEGSA Nível IV com os quais a prática tem mais relação: (Ex.: 2.d, 3.1b e 8.2a)" :type="errors.has('pratica.criteria_questions') ? 'is-danger': ''" :message="errors.has('pratica.criteria_questions') ? errors.first('pratica.criteria_questions') :''">
									<b-input v-model="practice.criteria_questions" name="criteria_questions" v-validate="'required'"></b-input>
								</b-field>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Partes interessadas mais beneficiadas pela Prática" :type="errors.has('pratica.stakeholders') ? 'is-danger': ''" :message="errors.has('pratica.stakeholders') ? errors.first('pratica.stakeholders') :''">
									<b-input v-model="practice.stakeholders" name="stakeholders" v-validate="'required'"></b-input>
								</b-field>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Resultados Alcançados" :type="errors.has('pratica.results') ? 'is-danger': ''" :message="errors.has('pratica.results') ? errors.first('pratica.results') :''">
									<b-input v-model="practice.results" name="results" v-validate="'required'" type="textarea"></b-input>
								</b-field>
								<p class="has-text-danger is-size-7">
									Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” da prática.
									Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
									Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
								</p>
							</div>
						</div>
					</template>
					<template v-if="practice.practice_category == 'PEOS'">
						<h1 class="title is-6">Aplicável para categoria PEOS</h1>
						<div class="columns">
							<div class="column">
								<b-field label="Denominação do Programa de aumento da Eficiência" :type="errors.has('pratica.practice_name') ? 'is-danger': ''" :message="errors.has('pratica.practice_name') ? errors.first('pratica.practice_name') :''">
									<b-input v-model="practice.name" name="practice_name" v-validate="'required'"></b-input>
								</b-field>
								<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
							</div>
							<div class="column">
								<b-field label="Data de implantação" :type="errors.has('pratica.implantation_start_dt') ? 'is-danger': ''" :message="errors.has('pratica.implantation_start_dt') ? errors.first('pratica.implantation_start_dt') :''">
									<b-datepicker  name="implantation_start_dt" v-validate="'required'" v-model="practice.implantation_start_dt" placeholder="Selecione a data" icon="calendar-today">
									</b-datepicker>
								</b-field>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<b-field label="Resumo do Programa" :type="errors.has('pratica.resume') ? 'is-danger': ''" :message="errors.has('pratica.resume') ? errors.first('pratica.resume') :''">
									<b-input v-model="practice.resume" name="resume" v-validate="'required'" type="textarea"></b-input>
								</b-field>
								<p class="has-text-danger is-size-7">
									Lembrete: Não são elegíveis Trabalhos relativos a softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
								</p>
							</div>
						</div>

						<div class="columns">
							<div class="column">
								<b-field label="Resultados Alcançados" :type="errors.has('pratica.results') ? 'is-danger': ''" :message="errors.has('pratica.results') ? errors.first('pratica.results') :''">
									<b-input v-model="practice.results" name="results" v-validate="'required'" type="textarea"></b-input>
								</b-field>
								<p class="has-text-danger is-size-7">
									Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” do Programa.
									Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
									Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
								</p>
							</div>
						</div>
					</template>
				</form>
			</section>
			<footer class="modal-card-foot">
				<button class="button" type="button" @click="$parent.close()">Cancelar</button>
				<button class="button is-primary" type="button" @click="savePratica()">Salvar</button>
			</footer>
		</div>
	</form>
</template>

<script>

// import subscriptionApi from '../../../api/subscription'

export default {
	props: ["subscription"],
	data(){
		return {
			isLoading: false,
			practice: {
				subgroup_id: "3"
			}
		}
	},
	methods: {
		savePratica(){
			this.$validator.validateAll("pratica").then((isValid) => {
				if (isValid) {
					this.$emit('added-practice', this.practice)
					this.$parent.close()
				}
			});
		}
	}
}
</script>
