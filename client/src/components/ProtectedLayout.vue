<template>
    <div>
        <nav class="nav">
            <div class="nav-content">
                <div class="home">
                    <RouterLink to="/home">HOME</RouterLink>
                </div>
                <div class="nav-links">
                    <ul>
                        <li><RouterLink to="/planning-create">Planning Request</RouterLink></li>
                        <li><RouterLink to="/cycletime-create">Cycletime</RouterLink></li>
                        <li><RouterLink to="/overtime-create">Excess Hours</RouterLink></li>
                        <li><RouterLink to="/daily-hit">Daily Hit Rate</RouterLink></li>
                        <li><RouterLink to="/headcount-create">Headcount</RouterLink></li>
                    </ul>
                </div>
                <div class="users">
                        <div class="users-data">
                            <p>Welcome:</p>
                            <p class="users-info">{{ this.user.name }}</p>
                        </div>
                    <button @click="handleLogout()" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
        <RouterView />
    </div>

</template>
<script>
import { RouterView } from 'vue-router';
export default {
    data() {
        return {
            user: {},
        }
    },
    mounted() {
        this.getUser();
        this.getAuth();
    },
    methods: {
        getUser() {
            try {
                const userName = JSON.parse(sessionStorage.getItem('user'));
                this.user = userName;
            }
            catch (error) {
                console.log(error)
            }
        },
        getAuth() {
            if(!this.user) {
                this.$router.push('/')
            }
        },
        handleLogout(){
            window.alert('Successfully logout');
            setTimeout(() => {
                sessionStorage.removeItem('user');
                sessionStorage.removeItem('token');
                this.$router.push('/');
            }, 2000);
        }


    }
}

</script>
<style scoped>
    button{
        width: 5rem;
        margin: 3px;
    }
    li {
        margin-left: 2rem;
        list-style-type: none;
        color: #b3c100;
    }
    p{
        font-size: medium;
        font-weight: bold;
        color: #ced2cc;
        line-height: 4px;
    }
    a{
        text-decoration: none;
        color: #b3c100;
        font-weight: bolder;
    }
    a:hover {
        color: #ced2cc;
    }
    .users-data{
        margin-right: 5rem;
    }
    .users-info {
        color: #e94f61;
        font-size: medium;
        font-weight: 400;
    }
    .nav{
        background-color: #1f3f49;
        height: 4rem;
        display: flex;
        text-align: center;
        align-items: center;
    }
    .nav-links{
        font-size: medium;
        padding-top: 1rem;
    }
    .nav-links >ul {
        display: flex;
        justify-content: left;
        align-items: center;
        width: 50rem;
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
    .users{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .users > ul {
        padding-right: 2rem;
    }
    .home{
        margin-left: 4rem;
        font-size: x-large;
    }
</style>
