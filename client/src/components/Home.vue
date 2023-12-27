<script>
    export default{
        name: 'Home',
        data() {
            return {
                currentTime: this.getCurrentTime(),
            }
        },
        methods: {
            getCurrentTime() {
                const date = new Date();
                const options = {timeZone: 'Asia/Manila'};
                return date.toLocaleTimeString('en-US', options);
            },
            updateTime() {
                this.currentTime = this.getCurrentTime();
            }
        },
        mounted() {
            this.updateTime();
            this.intervalId = setInterval(this.updateTime, 1000);
        },
        destroyed() {
            clearInterval(this.intervalId)
        },
    }
</script>

<template>
    <div  class="h-full">
        <nav class="nav">
            <div class="nav-content">
                <div>
                    <img />
                </div>
                <div class="nav-links">
                    <ul>
                        <li><RouterLink to="/cycletime-create">Cycletime</RouterLink></li>
                        <li><RouterLink to="/headcount-create">Headcount</RouterLink></li>
                        <li><RouterLink to="/planning-create">Planning Request</RouterLink></li>
                        <li><RouterLink to="/overtime-create">Excess Hours</RouterLink></li>
                    </ul>
                </div>
                <div class="users">
                    <ul>
                        <li>Welcome: </li>
                    </ul>
                    <button class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
        <main>
            <div class="clock-container">
                <div class="clock">
                    <button class="btn btn-info" type="submit">In</button>
                    <button class="btn btn-danger" type="submit">Out</button>
                    <p>Current Time: {{ currentTime }}</p>
                </div>

            </div>
        </main>
    </div>
</template>

<style scoped>
    *{
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
    button{
        width: 5rem;
        margin: 3px;
    }
    li {
        margin-left: 2rem;
        list-style-type: none;
        color: #b3c100;
    }
    a{
        text-decoration: none;
        color: #b3c100;
        font-weight: bolder;
    }
    a:hover {
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
        width: 40rem;
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
        height: 2rem;
    }
    .users > ul {
        padding-right: 2rem;
    }
    .clock-container{
        position: relative;

    }
    .clock{
        width: 15rem;
        height: 5rem;
        position: absolute;
        top: 5rem;
        left: 3rem;
        display: grid;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

</style>
