<template>
    <div class="container-fluid">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto my-5">
            <h1 class="text-dark">Login</h1>
            <form class="form-group mt-5" @submit.prevent="handleSubmit">
                <div class="error">
                    <ul v-if="Object.keys(this.errorFeild).length > 0">
                        <li class="">
                            {{ errorFeild }}
                        </li>
                    </ul>
                </div>
                <input v-model="email" type="email" class="form-control mt-5" placeholder="Email" required>
                <input v-model="password" type="password" class="form-control mt-2" placeholder="Password" required>
                <input type="submit" class="btn btn-primary my-3" @click="doLogin">
                <p>Don't have an account? <RouterLink to="/register">Register here</RouterLink>
                </p>
            </form>
        </div>
    </div>
</template>

<script>

import { RouterLink } from 'vue-router';
import axiosClient from '../axios/axios';
import csrfToken from '@/csrf/csrfToken';
    export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
            errorFeild: '',
        };
    },
    methods: {
        async handleSubmit() {
            await csrfToken();
            try {
                const data = {
                    email: this.email,
                    password: this.password
                };

                const response = await axiosClient.post('/login', data);
                localStorage.setItem('token', response.data.token);
                this.$router.push('/home');
            }
            catch (error) {
                if(error.response.status === 422) {
                    this.errorFeild = error.response.data.message
                    console.log(this.errorFeild)
                }
                if(error.response.status === 401) {
                    this.errorFeild = error.response.data.message
                    console.log(this.errorFeild)
                }
            }
        }
    },
    components: { RouterLink }
}
</script>
<style scoped>
.error{
    margin-left: -2px;
    font-family: Arial, Helvetica, sans-serif;
    color: rgba(245, 245, 245, 0.973);
    background-color: rgb(252, 97, 77);
    font-weight: 700;
    font-size: medium;
    width: 16.5rem;
    border-radius: 3px;
}
li{
    list-style-type: none;
}
</style>
