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
                    <th>{{planningData[key].workweek}}</th>
                    <th>{{ data.total }}</th>
                    <th>{{ }}</th>
                    <th></th>
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
            }
        }
    }
</script>
