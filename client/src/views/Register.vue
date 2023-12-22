<template>
    <h1>Register Page</h1>
    <form @submit.prevent="handleSubmit">
        <label for="email">Name</label>
        <input type="text" v-model="name"/>
        <label for="email">Email</label>
        <input type="email" v-model="email"/>
        <label for="password">Password</label>
        <input type="password" v-model="password"/>
        <label for="password">Password</label>
        <input type="password" v-model="cpassword"/>
        <button type="submit">Login</button>
    </form>

</template>

<script>

    import axiosClient from '../axios/axios';
    import csrfToken from '../csrf/csrfToken';

    export default {
        name: 'Register',
        data() {
            return {
                name: '',
                email: '',
                password: '',
                cpassword: '',
            }
        },
        
        methods: {
            async handleSubmit() {
                await csrfToken();
                try {
                    const data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.cpassword,
                    };
                    
                    const response = await axiosClient.post('/register', data);

                    return this.$router.push('/login');
                }
                catch (error) {
                    console.log(error);
                }
                
            }
        },
    }
</script>