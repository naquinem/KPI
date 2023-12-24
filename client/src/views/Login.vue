<template>
    <div class="container-fluid">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto my-5">
            <h1>Login</h1>
            <form class="form-group mt-5" @submit.prevent="handleSubmit">
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

    export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
            //errorFeild: '',
        };
    },
    methods: {
        async handleSubmit() {
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
                console.log(error);
            }
        }
    },
    components: { RouterLink }
}
</script>
