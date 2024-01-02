<template>
    <div class="excess-hours">

        <div>
            <div class="excess-hours-title">
                <h1>Repair Output per Head</h1>
                <ul v-for="(error, key) in this.errorField" :key="key">
                    <li>{{ error }}</li>
                </ul>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Work Week</th>
                        <th>Regular Hours</th>
                        <th>Total Work Hours</th>
                        <th>Direct Heads (BRS, Assembler, and EAs)</th>
                        <th>Total Excess Hours</th>
                        <th>Average Excess Hours</th>
                        <th>GOAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(overtime) in this.overTime" :key="overtime.id">
                        <td>{{ overtime.workweek }}</td>
                        <td>{{ overtime.total_regular_hours }}</td>
                        <td>{{ overtime.total_work_hours }}</td>
                        <td>{{ overtime.total_headcounts }}</td>
                        <td>{{ overtime.total_overtime }}</td>
                        <td>{{ overtime.average_overtime }} %</td>
                        <td>15 %</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axiosClient from '@/axios/axios';


export default {
    name: 'ExcessHours',
    data() {
        return {
            overTime: [],
            errorField: [],
        }
    },
    mounted() {
        this.getOverTime();
    },
    methods: {
        async getOverTime() {
            try{
                const response = await axiosClient.get('/overtime');
                this.overTime = response.data.info;
            }
            catch(error) {
                if(error.response.status === 401){
                    this.errorField = error.response.data.message;
                }
            }

        }
    },

}
</script>
<style scoped>
    *{
        margin: 0;
        padding: 0;
    }
    ul,li{
        list-style-type: none;
        text-decoration: none;
    }
    .excess-hours{
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .excess-hours-title{
        margin-bottom: 2rem;
    }
</style>
