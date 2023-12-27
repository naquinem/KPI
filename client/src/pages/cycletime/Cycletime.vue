<template>
    <div class="index">
        <h1>Cycletime</h1>
        <div class="container">
            <div class="cycletime">
                <table>
                    <thead>
                        <tr>
                            <th colspan="8">Total Cycletime</th>
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
                    <tbody>
                        <tr v-for="(average, index) in getAverageCycletime" :key="index">
                            <td>{{ (average.monday).toFixed(2) }}</td>
                            <td>{{ (average.tuesday).toFixed(2) }}</td>
                            <td>{{ (average.wednesday).toFixed(2) }}</td>
                            <td>{{( average.thursday).toFixed(2) }}</td>
                            <td>{{ (average.friday).toFixed(2) }}</td>
                            <td>{{ (average.saturday).toFixed(2) }}</td>
                            <td>{{ (average.sunday).toFixed(2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">Total Cycletime</th>
                            <th rowspan="2">Total Shipment</th>
                            <th rowspan="2">Cycletime</th>
                            <th rowspan="2">Goal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
        },
        computed: {
            getAverageCycletime() {
                return this.getCycletimeData.map((cycletimeData, index) => {
                    const planningRequest = this.getPlanningData[index];
                    return {
                        monday: (cycletimeData.cycletime_monday / planningRequest.output_monday),
                        tuesday: (cycletimeData.cycletime_tuesday / planningRequest.output_tuesday),
                        wednesday: (cycletimeData.cycletime_wednesday / planningRequest.output_wednesday),
                        thursday: (cycletimeData.cycletime_thursday / planningRequest.output_thursday),
                        friday: (cycletimeData.cycletime_friday / planningRequest.output_friday),
                        saturday: (cycletimeData.cycletime_saturday / planningRequest.output_saturday),
                        sunday: (cycletimeData.cycletime_sunday / planningRequest.output_sunday),
                    };
                });
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
