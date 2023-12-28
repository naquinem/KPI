<script>
import { RouterView } from 'vue-router';

export default {
    data() {
        return {
            user: {}
        }
    },
    mounted() {
        this.getUser();
        this.getAuth();
    },
    methods: {
        getUser() {
            try {
                const userName = JSON.parse(localStorage.getItem('user'));
                this.user = userName;
            }
            catch (error) {
                console.log(error)
            }
        },
        getAuth() {
            if(this.user) {
                this.$router.push('/home')
            }
        }

    }
}
</script>
<template>
    <div>
        <nav class="nav">
            <div class="nav-content">
                <div class="default">
                    <img />
                    <RouterLink to="/">Summary</RouterLink>
                </div>
                <div class="nav-links">
                    <ul>
                        <li><RouterLink to="/planning-request">Planning Request</RouterLink></li>
                        <li><RouterLink to="/cycletime">Cycletime</RouterLink></li>
                        <li><RouterLink to="/cycletime-percentile">Cycletime Percentile</RouterLink></li>
                        <li><RouterLink to="/repair-output">Repair Output</RouterLink></li>
                        <li><RouterLink to="/daily-hit-rate">Daily Hit Rate</RouterLink></li>
                        <li><RouterLink to="/excess-hours">Excess Hours</RouterLink></li>
                    </ul>
                </div>
            </div>
        </nav>
        <RouterView />
    </div>
</template>
<style scoped>
    *{
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
    li {
        margin-left: 2rem;
        list-style-type: none;
        color: #b3c100;
    }
    a{
        text-decoration: none;
        color: #ced2cc;
        font-weight: bolder;
        width: 6rem;
    }
    a:hover {
        color: #b3c100;
    }
    .default > a {
        margin-left: 40px;
        font-size: x-large;
        color: #b3c100;
    }
    .default > a:hover {
        margin-left: 40px;
        font-size: x-large;
        color: #ced2cc;
    }
    .nav{
        background-color: #1f3f49;
        height: 4rem;
        display: flex;
        text-align: center;
        align-items: center;
    }
    .nav-links >ul {
        display: flex;
        justify-content: left;
        align-items: center;
        width: 60rem;
    }
    .nav-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-align: center;
        width: 1280px;
        font-size: medium;
        color: #ced2cc;
    }

    button{
        color: #ced2cc;
        width: 5rem;
        margin: 3px;
    }
    button:hover{
        color: aliceblue;
    }
</style>
