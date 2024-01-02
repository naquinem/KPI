<template>
    <div class="daily-hit-rate">
        <div>
            <div class="daily-hit-rate-title">
                <h1>Daily Hit Rate</h1>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="7"><strong>Daily Planning Request</strong></th>
                            <th colspan="7"><strong>Total Shipments</strong></th>
                            <th colspan="7"><strong>Daily Percentage</strong></th>
                            <th rowspan="2">Total Percentage</th>
                            <th rowspan="2"><strong>GOAL</strong></th>
                        </tr>
                        <tr>
                            <th>WW</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr v-for="(daily) in this.dailyHitRateData" :key="daily.id">
                            <td>{{ daily.workweek }}</td>
                            <td>{{ daily.planning_monday }}</td>
                            <td>{{ daily.planning_tuesday }}</td>
                            <td>{{ daily.planning_wednesday }}</td>
                            <td>{{ daily.planning_thursday }}</td>
                            <td>{{ daily.planning_friday }}</td>
                            <td>{{ daily.planning_saturday }}</td>
                            <td>{{ daily.planning_sunday }}</td>
                            <td>{{ daily.output_monday }}</td>
                            <td>{{ daily.output_tuesday }}</td>
                            <td>{{ daily.output_wednesday }}</td>
                            <td>{{ daily.output_thursday }}</td>
                            <td>{{ daily.output_friday }}</td>
                            <td>{{ daily.output_saturday }}</td>
                            <td>{{ daily.output_sunday }}</td>
                            <td>{{ daily.percentage_monday }}</td>
                            <td>{{ daily.percentage_tuesday }}</td>
                            <td>{{ daily.percentage_wednesday }}</td>
                            <td>{{ daily.percentage_thursday }}</td>
                            <td>{{ daily.percentage_friday }}</td>
                            <td>{{ daily.percentage_saturday }}</td>
                            <td>{{ daily.percentage_sunday }}</td>
                            <td>{{ (daily.total_percentage/7*100).toFixed(2) }} %</td>
                            <td>87 %</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>


<script>
import axiosClient from '@/axios/axios';

    export default {
        name: 'DailyHitRate',
        data() {
            return {
                dailyHitRateData: [],
                //planningError: "",
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            async getData () {
                try{
                    const response = await axiosClient.get('/daily');
                    this.dailyHitRateData = response.data.info;
                }
                catch (error) {
                    if(error.response.status === 401) {
                        this.errorField = error.response.data.message;
                    } else if (error.response.status === 422) {
                        this.errorFiled = error.response.data.message;
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
    .daily-hit-rate{
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .daily-hit-rate-title{
        margin-bottom: 2rem;
    }
</style>
