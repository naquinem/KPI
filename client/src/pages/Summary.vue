<template>
    <div class="container-fluid">
        <Nav></Nav>
        <div class="d-flex">
            <aside class="authentication">
                <ul class="nav d-flex flex-column">
                    <li class="pt-4"><RouterLink to="/login" class="text-decoration-none">Login</RouterLink></li>
                    <li class="pt-4"><RouterLink to="/register" class="text-decoration-none  text-primary ">Register</RouterLink></li>
                </ul>
            </aside>
            <main class="content">
                <h1>Summary</h1>
            </main>
        </div>
    </div>
</template>

<script>
import Nav from './nav/Nav.vue';
    export default {
        name: 'Summary',
        components: {
            Nav
        }
    }
</script>
<style>
    *{
        display: absolute;
    }
    @media (min-width:480px){
        *{
            margin: 0;
            padding: 0;
        }
    }
</style>
