<template>
    <div class="headcount">
        <div class="form">
            <form @submit.prevent="handleSubmit">
                <div>
                    <label for="headcount">Total Headcount</label>
                    <input v-model="headcount" class="headcount" type="text" />
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
            headcount: [],
        }
    },
    methods: {
        async handleSubmit () {
            try{
                const data = {
                    total_headcounts: this.headcount,
                }
                const response = await axiosClient.post('/headcounts', data);
                window.alert('Successfully send data');
                this.$router.push('/overtime-create');
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
    .headcount{
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
