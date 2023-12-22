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
                            <td>{{ average.monday }}</td>
                            <td>{{ average.tuesday }}</td>
                            <td>{{ average.wednesday }}</td>
                            <td>{{ average.thursday }}</td>
                            <td>{{ average.friday }}</td>
                            <td>{{ average.saturday }}</td>
                            <td>{{ average.sunday }}</td>
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
                        <tr v-for="(average, key) in cycletimeIncrement" :key="key">
                            <td>{{ average.totalCycletime }}</td>
                            <td>4324</td>
                            <td>23432</td>
                            <td>32423</td>
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
                return this.getCycletimeData.map((cycletime, index) => {
                    const planning = this.getPlanningData[index];
                    return {
                    monday: (cycletime.cycletime_monday / planning.output_monday).toFixed(2),
                    tuesday: (cycletime.cycletime_tuesday / planning.output_tuesday).toFixed(2),
                    wednesday: (cycletime.cycletime_wednesday / planning.output_wednesday).toFixed(2),
                    thursday: (cycletime.cycletime_thursday / planning.output_thursday).toFixed(2),
                    friday: (cycletime.cycletime_friday / planning.output_friday).toFixed(2),
                    saturday: (cycletime.cycletime_saturday / planning.output_saturday).toFixed(2),
                    sunday: (cycletime.cycletime_sunday / planning.output_sunday).toFixed(2),
                    };
                });
            },
            cycletimeIncrement() {
                return this.getCycletimeData.map((cycletime) => {
                    // Convert the cycletime values to integers
                    const monday = parseInt(cycletime.cycletime_monday);
                    const tuesday = parseInt(cycletime.cycletime_tuesday);
                    const wednesday = parseInt(cycletime.cycletime_wednesday);
                    const thursday = parseInt(cycletime.cycletime_thursday);
                    const friday = parseInt(cycletime.cycletime_friday);

                    // Calculate the total cycletime for Monday to Friday
                    const totalCycletime = monday + tuesday + wednesday + thursday + friday;

                    return {
                    totalCycletime,
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
