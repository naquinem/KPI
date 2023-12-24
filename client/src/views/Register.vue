<template>
    <div class="container-fluid">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto my-5">
            <h1>Register</h1>
            <form class="form-group mt-5" @submit.prevent="handleSubmit">
                <input v-model="name" type="text" class="form-control mt-5" placeholder="Username">
                <input v-model="email" type="email" class="form-control mt-2" placeholder="Email">
                <input v-model="password" type="password" class="form-control mt-2" placeholder="Password">
                <input v-model="cpassword" type="password" class="form-control mt-2" placeholder="Confirm Password">
                <input type="submit" class="btn btn-primary my-3">
                <p>Already have an account? <RouterLink to="/login">Login here</RouterLink>
                </p>
            </form>
        </div>
    </div>
</template>

<script>

    import { RouterLink } from 'vue-router';
    import axiosClient from '../axios/axios';


    export default {
    name: 'Register',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            cpassword: '',
        };
    },
    methods: {
        async handleSubmit() {
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
    components: { RouterLink }
}
</script>
