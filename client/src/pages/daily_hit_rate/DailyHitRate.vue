<template>
    <div class="table-planning">
        <h1>Daily Hit Rate</h1>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th colspan="7"><strong>Daily Planning Request</strong></th>
                    <th colspan="7"><strong>Total Shipments</strong></th>
                    <th colspan="7"><strong>Daily Percentage</strong></th>
                    <th rowspan="2">Daily Hit Rate Percentage</th>
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
                <tr v-for="(planning) in this.planningData" :key="planning.id">
                    <td>{{ planning.workweek }}</td>
                    <td>{{ planning.planning_monday }}</td>
                    <td>{{ planning.planning_tuesday }}</td>
                    <td>{{ planning.planning_wednesday }}</td>
                    <td>{{ planning.planning_thursday }}</td>
                    <td>{{ planning.planning_friday }}</td>
                    <td>{{ planning.planning_saturday }}</td>
                    <td>{{ planning.planning_sunday }}</td>
                    <td>{{ planning.output_monday }}</td>
                    <td>{{ planning.output_tuesday }}</td>
                    <td>{{ planning.output_wednesday }}</td>
                    <td>{{ planning.output_thursday }}</td>
                    <td>{{ planning.output_friday }}</td>
                    <td>{{ planning.output_saturday }}</td>
                    <td>{{ planning.output_sunday }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</template>


<script>
import axiosClient from '@/axios/axios';

    export default {
        name: 'DailyHitRate',
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

<style>
* {
    margin: 0;
    padding: 0;
}

tr {
    font-size: small;
    text-align: center;
}
h1 {
    margin: 30px;
}
.table-planning {
    margin: 40px;
    text-align: center;
}
</style>
