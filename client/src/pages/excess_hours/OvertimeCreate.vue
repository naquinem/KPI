<template>
    <div class="excess-hours">
        <div class="form">
            <form @submit.prevent="handleSubmit">
                <div>
                    <label for="workweeks">Work Week</label>
                    <input v-model="workweeks" class="workweeks" type="text" />
                </div>
                <div>
                    <label for="totalhours">Total Work Hours</label>
                    <input v-model="totalhours" class="totalhours" type="text" />
                </div>
                <div>
                    <label for="regularhours">Regular Hours</label>
                    <input v-model="regularhours" class="regularhours" type="text" />
                </div>
                <button type="submit" class="btn btn-primary">Submit Data</button>
            </form>
        </div>
    </div>
</template>
<script>
import axiosClient from '@/axios/axios';

export default {
    name: 'HeadcountCreate',
    data() {
        return {
            workweeks: '',
            totalhours: '',
            regularhours: '',
        }
    },
    methods: {
        async handleSubmit () {
            try{
                const data = {
                    workweek: this.workweeks,
                    total_work_hours: this.totalhours,
                    total_regular_hours: this.regularhours,
                }
                const response = await axiosClient.post('/overtime', data);
                if(response.status === 200) {
                    window.alert('Successfully send data');
                    this.$router.push('/daily-hit');
                }
            }
            catch (error) {
                console.log(error.response.data)
            }

        }
    }
}
</script>
<style scoped>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    input{
        margin: 1rem;
    }
    button{
        width: 8rem;
        height: 2rem;
    }
    .excess-hours{
        position: relative;

    }
    .form{
        position: absolute;
        top: 9rem;
        left: 20rem;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        width: 15rem;
        height: 10rem;
        border: 1px solid black;
        line-height: 1.5rem;
    }
</style>
