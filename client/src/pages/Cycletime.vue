<template>
    <div class="container">
        <div class="cycletime">
            <table>
                <thead>
                    <tr>
                        <th colspan="7">Total Cycletime</th>
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
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data, index) in this.getCycletimeData" :key="index">
                        <td>{{ data.workweek }}</td>
                        <td>{{ data.cycletime_monday }}</td>
                        <td>{{ data.cycletime_tuesday }}</td>
                        <td>{{ data.cycletime_wednesday }}</td>
                        <td>{{ data.cycletime_thursday }}</td>
                        <td>{{ data.cycletime_friday }}</td>
                        <td>{{ data.cycletime_saturday }}</td>
                        <td>{{ data.cycletime_sunday }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="planning">
            <table>
                <thead>
                    <tr>
                        <th colspan="7">Total Shipments</th>
                    </tr>
                    <tr>
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
                    <tr v-for="(data, index) in this.getPlanningData" :key="index">
                        <td>{{ data.output_monday }}</td>
                        <td>{{ data.output_tuesday }}</td>
                        <td>{{ data.output_wednesday }}</td>
                        <td>{{ data.output_thursday }}</td>
                        <td>{{ data.output_friday }}</td>
                        <td>{{ data.output_saturday }}</td>
                        <td>{{ data.output_sunday }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="7">Average Cycletime</th>
                    </tr>
                    <tr>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                        <th>Sun</th>
                    </tr>
                </thead>
                <tbody v-for="(cycletime) in this.getCycletimeData">
                    <tr v-for="(planning, index) in this.getPlanningData" :key="index">
                        <td>{{ cycletime.cycletime_monday/planning.output_monday }}</td>
                        <td>{{ cycletime.cycletime_tuesday/planning.output_tuesday }}</td>
                        <td>{{ cycletime.cycletime_wednesday/planning.output_wednesday }}</td>
                        <td>{{ cycletime.cycletime_thursday/planning.output_thursday }}</td>
                        <td>{{ cycletime.cycletime_friday/planning.output_friday }}</td>
                        <td>{{ cycletime.cycletime_saturday/planning.output_saturday }}</td>
                        <td>{{ cycletime.cycletime_sunday/planning.output_sunday }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
        </div>
    </div>
</template>


<script>
import axiosClient from '@/axios/axios';
import csrfToken from '@/csrf/csrfToken';

    export default {
        name: 'Cycletime',
        data() {
            return {
                getCycletimeData: [],
                getPlanningData: [],
            }
        },
        async mounted() {
            await this.handleGetCycletime();
            await this.handleGetPlanningData();
        },
        methods: {
            async handleGetCycletime() {
                await csrfToken();
                try{
                    const cycletime = await axiosClient.get('/cycletime');
                    this.getCycletimeData = cycletime.data.info;
                }
                catch(error) {
                    console.log(error);
                }
            },
            async handleGetPlanningData() {
                await csrfToken();
                try{
                    const planning = await axiosClient.get('/planning');
                    this.getPlanningData = planning.data.info;
                }
                catch(error) {
                    console.log(error);
                }
            },
        }
    }
</script>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        line-height: 20px;
        margin: 10px;
        border: 2px solid black;
    }
</style>
