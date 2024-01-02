<template>
    <div class="daily-hit-rate">
        <div class="form">
            <form @submit.prevent="handleSubmit">
                <div>
                    <label for="workweek">Work Week</label>
                    <input v-model="workweeks" class="workweek" type="number" />
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
        }
    },
    methods: {
        async handleSubmit () {
            try{
                const data = {
                    workweek: this.workweeks,
                }
                const response = await axiosClient.post('/daily', data);
                if(response.status === 200) {
                    window.alert('Successfully send data');
                    this.$router.push('/planning-create');
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
    .daily-hit-rate{
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
