<template>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-two-fifths">
                    <div class="card is-rounded">
                        <div class="card-content">
                            <h1 class="title">Cadastre-se</h1>
                            <hr />
                            <b-field label="Nome">
                                <b-input
                                    type="text"
                                    v-model="name"
                                    :class="{ 'is-loading': isLoading }"
                                    :disabled="isLoading"
                                ></b-input>
                            </b-field>
                            <b-field label="E-mail">
                                <b-input
                                    type="text"
                                    v-model="email"
                                    :class="{ 'is-loading': isLoading }"
                                    :disabled="isLoading"
                                ></b-input>
                            </b-field>
                            <b-field label="CNPJ">
                                <b-input
                                    type="text"
                                    v-model="cnpj"
                                    :class="{ 'is-loading': isLoading }"
                                    :disabled="isLoading"
                                ></b-input>
                            </b-field>
                            <b-field label="Senha">
                                <b-input
                                    type="password"
                                    v-model="password"
                                    :class="{ 'is-loading': isLoading }"
                                    :disabled="isLoading"
                                ></b-input>
                            </b-field>
                            <div
                                class="has-text-centered"
                                v-if="errors.length > 0"
                            >
                                <template v-for="error in errors">
                                    <span
                                        v-bind:key="error"
                                        class="has-text-danger is-size-7"
                                        >{{ error }}</span
                                    >
                                </template>
                            </div>
                            <br />
                            <br />
                            <div class="field is-grouped">
                                <p class="control">
                                    <a
                                        class="button is-primary"
                                        :class="{ 'is-loading': isLoading }"
                                        @click="signup()"
                                        >Cadastrar</a
                                    >
                                    <br />
                                </p>
                                <p class="control">
                                    <a
                                        class="button"
                                        :class="{ 'is-loading': isLoading }"
                                        @click="back()"
                                        >Cancelar</a
                                    >
                                    <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            cnpj: "",
            isLoading: false,
            masks: {
                cnpj: {
                    delimiters: [".", ".", "/", "-"],
                    blocks: [2, 3, 3, 4, 2],
                    numericOnly: true
                }
            },
            errors: []
        };
    },
    methods: {
        signup() {
            this.isLoading = true;
            axios
                .post(
                    "/register",
                    {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password,
                        CNPJ: this.cnpj
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
                    message: 'Cadastrado com sucesso!',
                    type: 'is-success'
                }))
                .then(() => window.location.replace('/'))
                .catch(() => {
                    this.$buefy.toast.open({
                        duration: 5000,
                        message: `Algo deu errado. por favor, Tente novamente!!!`,
                        type: 'is-danger'
                    })
                    this.isLoading = false;
                })
        },
        back() {
            window.location.replace("/login");
        }
    }
};
</script>
