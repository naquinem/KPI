<template>
    <div class="table-planning">
        <h1>Planning Request(Consolidated)</h1>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th colspan="7"><strong>Daily Planning Request</strong></th>
                    <th colspan="7"><strong>Total Shipments</strong></th>
                    <th><strong>Request</strong></th>
                    <th><strong>Shipped</strong></th>
                    <th><strong>Shipped to Request</strong></th>
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
                    <th>HDD</th>
                    <th>HDD</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(totalPlan, key) in getTotalOutput" :key="key">
                    <th>{{ planningData[key].workweek }}</th>
                    <th>{{ planningData[key].planning_monday }}</th>
                    <th>{{ planningData[key].planning_tuesday }}</th>
                    <th>{{ planningData[key].planning_wednesday }}</th>
                    <th>{{ planningData[key].planning_thursday }}</th>
                    <th>{{ planningData[key].planning_friday }}</th>
                    <th>{{ planningData[key].planning_saturday }}</th>
                    <th>{{ planningData[key].planning_sunday }}</th>
                    <th>{{ planningData[key].output_monday }}</th>
                    <th>{{ planningData[key].output_tuesday }}</th>
                    <th>{{ planningData[key].output_wednesday }}</th>
                    <th>{{ planningData[key].output_thursday }}</th>
                    <th>{{ planningData[key].output_friday }}</th>
                    <th>{{ planningData[key].output_saturday }}</th>
                    <th>{{ planningData[key].output_sunday }}</th>
                    <th>{{ totalPlan.totalPlanning }}</th>
                    <th>{{ totalPlan.totalOutput }}</th>
                    <th>{{ (totalPlan.totalOutput/totalPlan.totalPlanning*100).toFixed(2) }}</th>
                </tr>
            </tbody>
        </table>
    </div>

</template>


<script>
import axiosClient from '@/axios/axios';

    export default {
        name: 'PlanningRequest',
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
        computed: {
            getTotalOutput() {
                return this.planningData.map((data) => {
                    return {
                        totalOutput: (
                            data.output_monday +
                            data.output_tuesday +
                            data.output_wednesday +
                            data.output_thursday +
                            data.output_friday +
                            data.output_saturday +
                            data.output_sunday
                        ),
                        totalPlanning: (
                            data.planning_monday +
                            data.planning_tuesday +
                            data.planning_wednesday +
                            data.planning_thursday +
                            data.planning_friday +
                            data.planning_saturday +
                            data.planning_sunday
                        )
                    }
                })
            },
        }
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
