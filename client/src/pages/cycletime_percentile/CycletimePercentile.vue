<template>
    <div>
        <h1>Cycletime Percentile</h1>
        <table>
            <thead>
                <tr>
                    <th>Work Week</th>
                    <th>Repair Output</th>
                    <th>Repair Output &lt;&nbsp; = 3.5</th>
                    <th>80&#37; Percentile</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, key) in getPlanning" :key="key">
                    <td>{{planningData[key].workweek}}</td>
                    <td>{{ data.total }}</td>
                    <td v-for="(average, index) in getAverageCycletime" :key="index">
                        {{ (
                                        average.monday +
                                        average.tuesday +
                                        average.wednesday +
                                        average.thursday +
                                        average.friday +
                                        average.saturday +
                                        average.sunday
                                    ).toFixed(2)
                                }}
                    </td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
</template>


<script>
import axiosClient from '@/axios/axios';
    export default {
        name: 'CycletimePercentile',
        data() {
            return {
                planningData: [],
                getCycletimeData: [],
            }
        },
        mounted(){
            this.getData();
        },
        methods: {
            async getData () {
                try{
                    const response = await axiosClient.get('/planning');
                    this.planningData = response.data.info;
                    const response1 = await axiosClient.get('/cycletime');
                    this.getCycletimeData = response1.data.info;
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
        computed: {
            getPlanning() {
                return this.planningData.map((data) => {
                    return {
                        total: (
                            data.output_monday +
                            data.output_tuesday +
                            data.output_wednesday +
                            data.output_thursday +
                            data.output_friday +
                            data.output_saturday +
                            data.output_sunday
                        )
                    }
                })
            },
            getAverageCycletime() {
                return this.getCycletimeData.map((cycletimeData, index) => {
                    const planningRequest = this.planningData[index];
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

        }
    }
</script>
