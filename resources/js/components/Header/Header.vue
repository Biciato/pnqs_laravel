<template>
	<nav class="navbar is-info" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<!-- navbar items, navbar burger... -->
			<a class="navbar-item">
				<img src="/images/logo-pnqs.png" alt="">
				<h1>&nbsp;&nbsp;PNQS</h1>
			</a>
			<div class="navbar-burger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="navbar-menu">
			<div class="navbar-start">

			</div>
			<div class="navbar-end" v-if="loggedin">
				<a class="navbar-item">Minhas candidaturas</a>
                <div class="navbar-item has-dropdown is-hoverable">
					<a href="#" class="navbar-link">
						<font-awesome-icon icon="user-circle" />
					</a>
					<div class="navbar-dropdown">
						<a href="/logout">Sair</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</template>

<script>

export default {
    props: ['loggedin'],
	data() {
		return {
		}
	},
	methods: {
	}
}
</script>
