<template>
	<section class="section">
		<div class="box">
			<div class="columns">
				<div class="column">
					<h2 class="title is-3">Formulário para Determinação de Elegibilidade</h2>
					<p class="help">Em caso de dúvidas, <a href="http://pnqs.com.br/criterios-de-avaliacao-peos-pnqs-2018-2-2/" target="_blank">clique aqui</a> para acessar o regulamento</p><br>

					<div class="columns" v-if="subscription.status != 'ANL' || subscription.status != 'DEV'">
						<div class="column">
							<strong class="has-text-grey">Parecer da Elegibilidade</strong>
							<p><template v-if="subscription.status == 'APR'">Aprovado</template><template v-else-if="subscription.status == 'REP'">Reprovado</template><template v-else-if="subscription.status == 'DEV'">Devolvido</template></p>
						</div>
						<div class="column" v-if="subscription.status == 'REP' || subscription.status == 'DEV'">
							<strong class="has-text-grey">Motivo</strong>
							<p>{{subscription.status_reason}}</p>
						</div>
					</div>

					<h5 class="title is-5">Selecione a categoria</h5>
					<div class="block">
						<b-radio :disabled="canEdit" v-model="subscription.subscription_category_id" native-value="1">
							<span class="is-size-7">Inovação em Gestão no Saneamento – IGS</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_category_id" native-value="2">
							<span class="is-size-7">Eficiência Operacional no Saneamento – PEOS</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_category_id" native-value="3">
							<span class="is-size-7">As Melhores de Gestão no Saneamento Ambiental – AMEGSA</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_category_id" native-value="4">
							<span class="is-size-7">Selo de Qualidade do Fornecedor da Prestação de Serviços e Insumos de Saneamento Ambiental – SQFSA</span>
						</b-radio>
					</div>
					<div class="block" v-if="subscription.subscription_category_id == 3">
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="1">
							<span class="is-size-7">Nivel B</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="2">
							<span class="is-size-7">Nivel I</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="3">
							<span class="is-size-7">Nivel II</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="4">
							<span class="is-size-7">Nivel III</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="5">
							<span class="is-size-7">Nivel IV</span>
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="6">
							<span class="is-size-7">Nivel IV Plus</span>
						</b-radio>
						<p class="control is-size-7 has-text-grey">Nota: Candidatas Nível III e IV/IV Plus devem candidatar, respectivamente e no mínimo, um e dois trabalhos, na categoria IGS ou PEOS</p>

						<p v-if="subscription.subscription_subcategory_id == 3" class="help is-danger">No Nível II da Categoria AMEGSA, candidatas devem obrigatoriamente apresentar uma candidatura IGS ou PEOS.</p>
						<p v-if="subscription.subscription_subcategory_id == 4" class="help is-danger">No Nível III a candidata AMEGSA deve apresentar candidatura concomitante de, no mínimo, um Case na categoria IGS ou PEOS e indicar ao menos um fornecedor para se candidatar ao SQFSA, cujo nome será informado nesta Ficha de Elegibilidade.</p>
						<p v-if="subscription.subscription_subcategory_id >= 5" class="help is-danger">Nos Níveisl IV e IV Plus a candidata deve apresentar candidatura concomitante de, no mínimo, dois Cases na categoria IGS ou PEOS e indicar ao menos um fornecedor para se candidatar ao SQFSA, cujo nome será informado nesta Ficha de Elegibilidade.</p>
					</div>
					<template v-if="subscription.subscription_category_id == 4">
						<div class="block" >
							<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="7">
								<span class="is-size-7">Nivel B - 125 Pontos “Iniciação para a Excelência” - Autoavaliação Virtual</span>
							</b-radio>
							<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="8">
								<span class="is-size-7">Nível B - 125 pontos - “Primeiros Passos para a Excelência”</span>
							</b-radio>
							<b-radio :disabled="canEdit" v-model="subscription.subscription_subcategory_id" native-value="9">
								<span class="is-size-7">Nível I – 250 pontos - “Compromisso com a Excelência</span>
							</b-radio><br><br>
							<p class="control is-size-7 has-text-grey">Nota: Nível B 125 pontos, também denominado “Primeiros Passos para a Excelência” e Nível I 250 pontos, também denominado de “Compromisso com a Excelência” seguem a sistemática da Categoria AMEGSA descrita a partir da página 16 do Regulamento PNQS.</p>
						</div>
						<div class="">
							<hr>
							<p>
								O <strong>SQFSA</strong> é destinado a organizações sediadas em território nacional, que prestam serviços ou fornecem insumos para
								organizações que detém a concessão (concessionárias) ou delegação (departamentos ou autarquias municipais e afins) de
								serviço de saneamento ambiental.<br><br>
								São elegíveis os seguintes tipos de organização:<br><br>
								1) Microempreendedor Individual;<br>
								2) Micro e pequena empresa;<br>
								3) Empresa;<br>
								4) ONG – Organização Não Governamental (sem fins lucrativos).<br>
							</p>
							<hr>
						</div>
						<div class="columns">
							<div class="column">
								<h5 class="title is-6">Atuação na Região</h5>
								<div class="block">
									<b-radio :disabled="canEdit" v-model="subscription.group_id" native-value="3">
										Norte
									</b-radio>
									<b-radio :disabled="canEdit" v-model="subscription.group_id" native-value="4">
										Nordeste
									</b-radio>
									<b-radio :disabled="canEdit" v-model="subscription.group_id" native-value="5">
										Centro-oeste
									</b-radio>
									<b-radio :disabled="canEdit" v-model="subscription.group_id" native-value="6">
										Sul
									</b-radio>
									<b-radio :disabled="canEdit" v-model="subscription.group_id" native-value="7">
										Sudeste
									</b-radio>
								</div>
							</div>
						</div>
						<div class="columns">
							<div class="column">
								<h5 class="title is-6">Atuação no segmento</h5>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="1">
									Água
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="2">
									Esgoto e Efluentes Industriais
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="3">
									Manejo de Águas Pluviais
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="4">
									Resíduos Sólidos
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="8">
									Insumos
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="9">
									Serviços Operacionais e comerciais
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="10">
									Administrativos / Instalações
								</b-radio>
								<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="11">
									Outros Serviços
								</b-radio>
							</div>
						</div>
					</template>
				</div>
			</div>
			<template v-if="subscription.subscription_category_id">
				<div class="columns" v-if="subscription.subscription_category_id == 4">
					<div class="column">
						<b-field label="Categoria por porte ou tipo especial sugerida">
							<b-select :disabled="canEdit" v-model="subscription.subscription_company_size_id">
								<option value="1">Microempreendedor individual</option>
								<option value="2">Micro e pequena empresa, com até 50 colaboradores;</option>
								<option value="3">Micro e pequena empresa, com 51 até 500 colaboradores;</option>
								<option value="4">Empresas ou Unidades Autônomas, com até 50 colaboradores;</option>
								<option value="5">Empresas ou Unidades Autônomas, com 51 até 500 colaboradores;</option>
								<option value="6">Empresas ou Unidades Autônomas, com mais de 500 a 2500 colaboradores;</option>
								<option value="7">Empresas ou Unidades Autônomas, com mais de 2501 a 10.000 colaboradores;</option>
								<option value="8">Empresas ou Unidades Autônomas, com mais de 10.000 colaboradores;</option>
								<option value="9">Terceiro Setor (organizações sem Fins Lucrativos) ou suas Unidades Autônomas, independentemente do porte.</option>
							</b-select>
						</b-field>
					</div>
				</div>

				<div class="columns">
					<div class="column is-half" v-if="subscription.subscription_subcategory_id >= 4">
						<b-field label="Razão Social do fornecedor indicado" :type="errors.has('indicate_company_name') ? 'is-danger': ''" :message="errors.has('indicate_company_name') ? errors.first('indicate_company_name') :''">
							<b-input :disabled="canEdit" name="indicate_company_name" v-model="subscription.indicate_company_name" v-validate="'required'"></b-input>
						</b-field>
					</div>
				</div>

				<common-data :subscription="subscription" :canEdit="canEdit"></common-data>


				<template v-if="subscription.subscription_category_id == 1">
					<h1 class="title is-6">Aplicável para categoria IGS</h1>
					<div class="block">
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="3">
							Água
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="4">
							Esgoto e Efluentes Industriais
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="5">
							Manejo de Águas Pluviais
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="6">
							Resíduos Sólidos
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="7">
							Clientes
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="8">
							Apoio
						</b-radio>
						<b-radio :disabled="canEdit" v-model="subscription.subgroup_id" native-value="9">
							Sócioambiental
						</b-radio>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Denominação da Prática">
								<b-input :disabled="canEdit" v-model="subscription.practice_name"></b-input>
							</b-field>

						</div>
						<div class="column">
							<b-field label="Data de início da implantação">
								<b-datepicker :disabled="canEdit" v-model="subscription.implantation_start_dt" placeholder="Selecione a data:" icon="calendar-today">
								</b-datepicker>
							</b-field>
							<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Resumo da Prática">
								<b-input :disabled="canEdit" v-model="subscription.practice_resume" type="textarea"></b-input>
							</b-field>
							<p class="has-text-danger is-size-7">
								Não são elegíveis Trabalhos relativos a melhorias, ideias ou inovações em produtos, processos ou práticas operacionais,
								como por exemplo: softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
							</p>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Área, setor, divisão, departamento, grupo, equipe ou assemelhado, responsável pela Prática:">
								<b-input :disabled="canEdit" v-model="subscription.practice_area"></b-input>
							</b-field>
						</div>
						<div class="column">
							<b-field label="Questões dos Critérios categoria AMEGSA Nível IV com os quais a prática tem mais relação: (Ex.: 2.d, 3.1b e 8.2a)">
								<b-input :disabled="canEdit" v-model="subscription.criteria_questions"></b-input>
							</b-field>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Partes interessadas mais beneficiadas pela Prática">
								<b-input :disabled="canEdit" v-model="name"></b-input>
							</b-field>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Resultados Alcançados">
								<b-input :disabled="canEdit" v-model="subscription.results" type="textarea"></b-input>
							</b-field>
							<p class="has-text-danger is-size-7">
								Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” da prática.
								Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
								Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
							</p>
						</div>
					</div>
				</template>
				<template v-if="subscription.subscription_category_id == 2">
					<h1 class="title is-6">Aplicável para categoria PEOS</h1>
					<div class="columns">
						<div class="column">
							<b-field label="Denominação do Programa de aumento da Eficiência">
								<b-input :disabled="canEdit" v-model="subscription.practice_name"></b-input>
							</b-field>
						</div>
						<div class="column">
							<b-field label="Data de implantação">
								<b-datepicker :disabled="canEdit" v-model="subscription.implantation_start_dt" placeholder="Selecione a data" icon="calendar-today">
								</b-datepicker>
							</b-field>
							<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-field label="Resumo do Programa">
								<b-input :disabled="canEdit" v-model="subscription.practice_resume" type="textarea"></b-input>
							</b-field>
							<p class="has-text-danger is-size-7">
								Lembrete: Não são elegíveis Trabalhos relativos a softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
							</p>
						</div>
					</div>

					<div class="columns">
						<div class="column">
							<b-field label="Resultados Alcançados">
								<b-input :disabled="canEdit" v-model="subscription.results" type="textarea"></b-input>
							</b-field>
							<p class="has-text-danger is-size-7">
								Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” do Programa.
								Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
								Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
							</p>
						</div>
					</div>
				</template>
				<template v-if="subscription.subscription_category_id == 3">
					<h3 class="title is-5">Cadastro das Práticas / Programas</h3>
					<div class="columns" v-if="!canEdit">
						<div class="column">
							<button class="button is-info" @click="isPraticasModalActive = true">Cadastrar Prática</button>
						</div>
					</div>
					<hr>
					<b-table :data="this.subscription.practices.length <= 0 ? [] : this.subscription.practices" :striped="true" :loading="isLoading" detailed detail-key="id" :show-detail-icon="true">
						<template slot-scope="props">
							<b-table-column :field="'name'" :label="'Denominação da Prática'">
								{{props.row.name}}
							</b-table-column>
							<b-table-column :field="'name'" :label="'Categoria da Prática'">
								{{props.row.practice_category}}
							</b-table-column>
							<b-table-column :field="''" :label="'#'">
								<button type="button" class="button is-danger is-small" :disabled="canEdit" @click="removePractice(props.row)">X</button>
							</b-table-column>
						</template>
						<template slot="detail" slot-scope="props">
							<article class="media">
								<div class="media-content">
									<div class="content">
										<template v-if="props.row.practice_category == 'IGS'">
											<h1 class="title is-6">Aplicável para categoria IGS</h1>
											<div class="block">
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="3">
													Água
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="4">
													Esgoto e Efluentes Industriais
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="5">
													Manejo de Águas Pluviais
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="6">
													Resíduos Sólidos
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="7">
													Clientes
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="8">
													Apoio
												</b-radio>
												<b-radio :disabled="canEdit" v-model="props.row.subgroup_id" native-value="9">
													Sócioambiental
												</b-radio>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Denominação da Prática">
														<b-input :disabled="canEdit" v-model="props.row.name"></b-input>
													</b-field>
													<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
												</div>
												<div class="column">
													<b-field label="Data de início da implantação">
														<b-datepicker :disabled="canEdit" v-model="props.row.implantation_start_dt" placeholder="Selecione a data:" icon="calendar-today">
														</b-datepicker>
													</b-field>
												</div>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Resumo da Prática">
														<b-input :disabled="canEdit" v-model="props.row.resume" type="textarea"></b-input>
													</b-field>
													<p class="has-text-danger is-size-7">
														Não são elegíveis Trabalhos relativos a melhorias, ideias ou inovações em produtos, processos ou práticas operacionais,
														como por exemplo: softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
													</p>
												</div>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Área, setor, divisão, departamento, grupo, equipe ou assemelhado, responsável pela Prática:">
														<b-input :disabled="canEdit" v-model="props.row.area"></b-input>
													</b-field>
												</div>
												<div class="column">
													<b-field label="Questões dos Critérios categoria AMEGSA Nível IV com os quais a prática tem mais relação: (Ex.: 2.d, 3.1b e 8.2a)">
														<b-input :disabled="canEdit" v-model="props.row.criteria_questions"></b-input>
													</b-field>
												</div>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Partes interessadas mais beneficiadas pela Prática">
														<b-input :disabled="canEdit" v-model="props.row.stakeholders"></b-input>
													</b-field>
												</div>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Resultados Alcançados">
														<b-input :disabled="canEdit" v-model="props.row.results" type="textarea"></b-input>
													</b-field>
													<p class="has-text-danger is-size-7">
														Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” da prática.
														Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
														Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
													</p>
												</div>
											</div>
										</template>
										<template v-if="props.row.practice_category == 'PEOS'">
											<h1 class="title is-6">Aplicável para categoria PEOS</h1>
											<div class="columns">
												<div class="column">
													<b-field label="Denominação do Programa de aumento da Eficiência">
														<b-input :disabled="canEdit" v-model="props.row.name"></b-input>
													</b-field>
													<p class="help is-danger">Práticas implantadas há mais de cinco anos não são elegíveis.</p>
												</div>
												<div class="column">
													<b-field label="Data de implantação">
														<b-datepicker :disabled="canEdit" v-model="props.row.implantation_start_dt" placeholder="Selecione a data" icon="calendar-today">
														</b-datepicker>
													</b-field>
												</div>
											</div>
											<div class="columns">
												<div class="column">
													<b-field label="Resumo do Programa">
														<b-input :disabled="canEdit" v-model="props.row.resume" type="textarea"></b-input>
													</b-field>
													<p class="has-text-danger is-size-7">
														Lembrete: Não são elegíveis Trabalhos relativos a softwares aplicativos, equipamentos, instrumentos, ferramentas, obras e outras soluções técnicas.
													</p>
												</div>
											</div>

											<div class="columns">
												<div class="column">
													<b-field label="Resultados Alcançados">
														<b-input :disabled="canEdit" v-model="props.row.results" type="textarea"></b-input>
													</b-field>
													<p class="has-text-danger is-size-7">
														Um ou mais tipos de resultados quantitativos relevantes, com demonstração do “antes” e “depois” do Programa.
														Podem ser apresentados aqui resultados estimados ou preliminares cuja demonstração, na futura inscrição do Trabalho, será aprimorada.
														Não são considerados elegíveis Trabalhos sem informação de resultados decorrentes do programa.
													</p>
												</div>
											</div>
										</template>
									</div>
								</div>
							</article>
						</template>
						<template slot="empty">
							<section class="section">
								<div class="content has-text-grey has-text-centered">
									<p>
										<span class="is-size-6">Inclua as práticas.</span><br><br>
									</p>
								</div>
							</section>
						</template>
					</b-table>
					<br><br>
					<div class="columns">
						<div class="column">
							<b-checkbox :disabled="canEdit" v-model="subscription.has_autonomy" native-value="1">
								<strong>Declaração de autonomia da organização candidata:</strong>
								<br>
								Declaramos ter funções e estruturas administrativas próprias e autônomas,
								no sentido de sermos responsáveis pelo planejamento das ações para atingir nossos objetivos,
								cumprir nossa missão e atender nossos clientes. Possuímos clientes como pessoas físicas ou outras pessoas jurídicas,
								consumidoras, usuárias ou compradoras regulares de nossos serviços/produtos no mercado que não são de nossa própria organização.
							</b-checkbox>
						</div>
					</div>
					<div class="column">
						<b-checkbox :disabled="canEdit" v-model="subscription.agree_examiners" native-value="1">
							Concordamos com a participação de empregados de empresas do setor como acompanhantes da banca de examinadores.
						</b-checkbox>
					</div>
				</template>
				<template v-if="subscription.subscription_category_id == 4">
					<div class="columns">
						<div class="column">
							<b-checkbox :disabled="canEdit" v-model="subscription.agree_sqfsa" native-value="1">
								<strong>Declaração de concordância com o Regulamento, autonomia e ausência de restrição da organização candidata:</strong>
								<br>
								Estamos cientes de que ao participar do SQFSA e submeter a candidatura de nossa organização concordamos com os
								termos e condições do Regulamento do ciclo, em todas as suas etapas.
							</b-checkbox>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-checkbox :disabled="canEdit" v-model="subscription.has_autonomy" :value="subscription.has_autonomy">
								Declaramos ter funções e estruturas administrativas próprias e autônomas, no sentido de sermos responsáveis pelo
								planejamento das ações para atingir nossos objetivos, cumprir nossa missão e atender nossos clientes. Possuímos clientes
								como pessoas físicas ou outras pessoas jurídicas, consumidoras, usuárias ou compradoras regulares de nossos
								serviços/produtos no mercado que não são de nossa própria organização.
							</b-checkbox>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-checkbox :disabled="canEdit" v-model="subscription.has_restriction" native-value="0">
								Declaramos neste ano e no ano anterior, não temos restrição de atuação transitada em julgado de qualquer natureza junto
								aos órgãos de defesa do consumidor e/ou perante as instituições ou agências públicas federais, estaduais e municipais em
								qualquer um dos três poderes.
							</b-checkbox>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<b-checkbox :disabled="canEdit" v-model="subscription.agree_examiners" native-value="1">
								Concordamos com a participação de empregados de empresas do setor como acompanhantes da banca de examinadores
								(aplicável as organizações candidatas ao Nível B 125 pontos, também denominado “Primeiros Passos para a Excelência”
								e Nível I 250 pontos, também denominado de “Compromisso com a Excelência”).
							</b-checkbox>
						</div>
					</div>
				</template>
				<br><br>
				<button class="button is-primary" v-if="!canEdit" @click="save()" :class="{'is-loading': isLoading}" :disabled="isLoading">Atualizar Candidatura</button>
			</template>
		</div>

		<b-modal :active.sync="isPraticasModalActive" has-modal-card>
			<praticas-modal :subscription="subscription" @added-practice="addPractice($event)"></praticas-modal>
		</b-modal>
	</section>
</template>
<script>

import subscriptionApi from '../../api/subscription'

export default {
	data() {
		return {
			subscription_category_id: "",
			isLoading: false,
			name: "",
			subscription: {
				places: [],
				contacts: [],
				practices: []
			},
			isPraticasModalActive: false
		}
	},
	watch: {
		"subscription_category_id"(newValue){
			this.subscription = {
				places: [],
				contacts: [],
				practices: []
			}
			this.subscription.subscription_category_id = newValue
		}
	},
	computed: {
		canEdit(){
			return (this.subscription.status != 'DEV')
			//return true
		}
	},
	created(){
		this.getData()

	},
	methods: {
		getData(){
			subscriptionApi.get(this.$route.params.id).then((res) => {
				this.subscription = res.data.result
				delete this.subscription["user"]
				delete this.subscription["companysize"]
				delete this.subscription["subcategory"]
				delete this.subscription["category"]
				delete this.subscription["group"]
				delete this.subscription["subgroup"]
				this.subscription["economic_activity_start"] = new Date(this.subscription["economic_activity_start"])
				this.subscription["implantation_start_dt"] = new Date(this.subscription["implantation_start_dt"])
				if (this.subscription.agree_examiners) {
					this.subscription.agree_examiners = this.subscription.agree_examiners.toString()
				}
				this.subscription.has_autonomy = (this.subscription.has_autonomy == 1)
				this.subscription.agree_examiners = (this.subscription.agree_examiners == 1)
				this.subscription.agree_sqfsa = (this.subscription.agree_sqfsa == 1)
				this.subscription.has_restriction = (this.subscription.has_restriction == 1)
			})
		},
		save(){
			this.$validator.validateAll().then((isValid) => {
				if (isValid) {
					this.isLoading = true
					if (this.subscription.status == 'DEV') {
						this.subscription.status = "ANL"
					}
					subscriptionApi.update(this.subscription).then(() => {
						this.isLoading = false
						this.$toast.open({
							message: 'Pedido atualizado com sucesso!',
							type: 'is-success'
						})
						this.$router.push("/candidaturas")
					}).catch((error) => {
						this.isLoading = false
						alert(error.data.message)
						this.getData()
					})
				}
			})
		},
		addPractice(practice){
			this.subscription.practices.push(practice)
		},
		removePractice(practice){
			var indexOf = this.subscription.practices.indexOf(practice)
			if (indexOf >= 0) {
				this.subscription.practices.splice(indexOf, 1)
			}
		}
	}
}

</script>
