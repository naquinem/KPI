<template>
    <form @submit.prevent="handleSubmit">
        <label for="email">Email</label>
        <input type="email" v-model="email"/>
        <label for="password">Password</label>
        <input type="password" v-model="password"/>
        <button type="submit">Login</button>
    </form>

</template>

<script>

    import axiosClient from '../axios/axios';
    import csrfToken from '@/csrf/csrfToken';

    export default {
        name: 'Login',
        data() {
            return {
                email: '',
                password: ''
            }
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
                        this.$router.push('/');
                }
                catch (error) {
                    console.log(error)
                }
            }
        },
    }
</script>