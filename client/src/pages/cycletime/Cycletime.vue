<template>
    <div class="index">
        <h1>Cycletime</h1>
        <div class="container">
            <div class="cycletime">
                <table>
                    <thead>
                        <tr>
                            <th colspan="8">Total Cycletime</th>
                            <th colspan="7">Total Shipments</th>
                            <th colspan="7">Average Cycletime</th>
                            <th rowspan="2">TTL CT</th>
                            <th rowspan="2">TTL Ship</th>
                            <th rowspan="2">CT</th>
                            <th rowspan="2">Goal</th>
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
                        <tr v-for="(cycletime) in this.getCycletimeData" :key="cycletime.id">
                            <td>{{ cycletime.workweek }}</td>
                            <td>{{ cycletime.cycletime_monday }}</td>
                            <td>{{ cycletime.cycletime_tuesday }}</td>
                            <td>{{ cycletime.cycletime_wednesday }}</td>
                            <td>{{ cycletime.cycletime_thursday }}</td>
                            <td>{{ cycletime.cycletime_friday }}</td>
                            <td>{{ cycletime.cycletime_saturday }}</td>
                            <td>{{ cycletime.cycletime_sunday }}</td>
                            <td>{{ cycletime.output_monday }}</td>
                            <td>{{ cycletime.output_tuesday }}</td>
                            <td>{{ cycletime.output_wednesday }}</td>
                            <td>{{ cycletime.output_thursday }}</td>
                            <td>{{ cycletime.output_friday }}</td>
                            <td>{{ cycletime.output_saturday }}</td>
                            <td>{{ cycletime.output_sunday }}</td>
                            <td>{{ cycletime.average_monday }}</td>
                            <td>{{ cycletime.average_tuesday }}</td>
                            <td>{{ cycletime.average_wednesday }}</td>
                            <td>{{ cycletime.average_thursday }}</td>
                            <td>{{ cycletime.average_friday }}</td>
                            <td>{{ cycletime.average_saturday }}</td>
                            <td>{{ cycletime.average_sunday }}</td>
                            <td>{{ cycletime.total_cycletime }}</td>
                            <td>{{ cycletime.total_output }}</td>
                            <td>{{ (cycletime.total_cycletime / cycletime.total_output).toFixed(2) }}</td>
                            <td>3.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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

            }
        },
        async mounted() {
            await this.handleGetCycletime();
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
        },
    }
</script>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1{
        font-size: xx-large;
        font-weight: 900;
    }
    th,td {
        margin-left: 30px;
        border: 1px solid black;
        width: 10rem;
    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        line-height: 20px;
        margin: 40px;
        width: 70rem;
    }
    .index {
        display: grid;
        grid-template-columns: 1fr;
        text-align: center;
    }

</style>
