<template>
	<section class="section">
		<nav class="level">
			<div class="level-left">
				<h2 class="title">Minhas Candidaturas</h2>
			</div>
			<div class="level-right">
				<div class="level-item">
					<a href="/solicitacao-elegibilidade" class="button is-primary">Nova Candidatura</a>
				</div>
			</div>
		</nav>
		<hr>
		<div class="columns">
			<div class="column">
				<b-table :data="tableData.length <= 0 ? [] : tableData" :striped="isStriped" :loading="isLoading">
					<template slot-scope="props">
						<b-table-column :field="'id'" :label="'#'">
							{{props.row.id}}
						</b-table-column>
						<b-table-column :field="'name'" :label="'Razão Social'">
							{{props.row.name}}
						</b-table-column>
						<b-table-column :field="'name'" :label="'Categoria'">
							{{props.row.category_name}}
						</b-table-column>
						<b-table-column :field="'date'" :label="'Data'">
							{{props.row.created_at | date}}
						</b-table-column>
						<b-table-column width="200" :field="'status'" :label="'Status'">
							<span class="tag" :class="{'is-warning': props.row.status == 'ANL', 'is-danger': props.row.status == 'REP', 'is-warning': props.row.status == 'DEV', 'is-success': props.row.status == 'APR'}">
								<template v-if="props.row.status == 'ANL'">Em Análise</template>
								<template v-else-if="props.row.status == 'APR'">Aprovado</template>
								<template v-else-if="props.row.status == 'REP'">Reprovado</template>
								<template v-else-if="props.row.status == 'DEV'">Em Revisão</template>
							</span>
						</b-table-column>
						<b-table-column width="200" :field="''" :label="''">
							<button type="button" class="button is-small is-primary" @click="view(props.row.id)">Ver Candidatura</button>
							<button type="button" class="button is-small" :disabled="props.row.status != 'ANL'" @click='remove(props.row.id)'>Excluir</button>
						</b-table-column>
						</template>
					<template slot="empty">
						<section class="section">
							<div class="content has-text-grey has-text-centered">
								<p>
									<b-icon	icon="emoticon-sad"	size="is-large"></b-icon>
								</p>
								<p>
									<span class="is-size-6">Nenhuma candidatura encontrada.</span><br><br>
								</p>
							</div>
						</section>
					</template>
					<template slot="footer">
						<div class="has-text-right is-size-6 has-text-grey">
							{{tableData.length}} candidaturas encontradas
						</div>
					</template>
				</b-table>
			</div>

		</div>
	</section>
</template>


<script>

export default {
    props: ['subscriptions'],
	data() {
		const tableData = []
		return {
			tableData,
			isLoading: false,
			isStriped: true
		}
	},
	created(){
		this.tableData = this.subscriptions;
	},
	methods: {
		remove(id){
			if (confirm("Tem certeza que deseja excluir essa candidatura?")) {
				/* SubscriptionService.remove(id).then(() => {
					this.isLoading = false
					this.$toast.open({
						message: 'Pedido removido com sucesso!',
						type: 'is-success'
					})
					this.load()
				}).catch((error) => {
					this.isLoading = false
					alert(error)
				}) */
			}
		},
		view(id){
			window.location.assign(`/candidatura/${id}`);
		}
	}
}
</script>
