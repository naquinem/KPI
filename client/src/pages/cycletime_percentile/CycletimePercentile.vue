<template>
    <div class="cycletime-percentile">
        <div>
            <div class="cycletime-percentile-title">
                <h1>Cycletime Percentile</h1>
                <ul v-for="(error, key) in this.errorField" :key="key">
                    <li>{{ error }}</li>
                </ul>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Work Week</th>
                        <th>Repair Output</th>
                        <th>Repair Output &lt;&nbsp; = 3.5</th>
                        <th>Cycletime Percentile Goal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(planning) in this.planningData" :key="planning.id">
                        <td>{{ planning.workweek }}</td>
                        <td>{{ planning.total_output }}</td>
                        <td>{{  }}</td>
                        <td>87 %</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>


<script>
import axiosClient from '@/axios/axios';
    export default {
        name: 'CycletimePercentile',
        data() {
            return {
                planningData: [],
                //planningError: "",
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            async getData () {
                try{
                    const response = await axiosClient.get('/planning');
                    this.planningData = response.data.info;
                }
                catch (error) {
                    if(error.response.status === 401) {
                        this.planningError = error.response.data.message;
                    } else if (error.response.status === 422) {
                        this.planningError = error.response.data.message;
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
    .cycletime-percentile{
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .cycletime-percentile-title{
        margin-bottom: 2rem;
    }
</style>
