<template>
    <div class="repair-output">
        <div class="title">
            <h1>Repair Output per Head(ROH)</h1>
        </div>
        <div class="info">
            <div class="data">
                <h5>Work Week</h5>
                <ul v-for="(week, id) in this.planningData" :key="id">
                    <li>{{ week.workweek }}</li>
                </ul>
            </div>
            <div class="data">
                <h5>Total Repair Output</h5>
                <ul v-for="(planning, key) in getTotalOutput" :key="key">
                    <li>{{ planning.total }}</li>
                </ul>
            </div>
            <div class="data">
                <h5>Total Headcount</h5>
                <ul v-for="(heads, index) in this.headcountData" :key="index">
                    <li>{{ heads.total_headcounts }}</li>
                </ul>
            </div>
            <div class="data">
                <h5>Repair Output per Head</h5>
                <ul v-for="(planning, key) in getTotalOutput" :key="key">
                    <li v-for="(heads, index) in this.headcountData" :key="index">{{ (planning.total/heads.total_headcounts).toFixed(2) }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>


<script>
import axiosClient from '@/axios/axios';
    export default {
        name: 'RepairOutputPerHead',
        data() {
            return {
                planningData: [],
                headcountData: [],
                totalData: "",
            };
        },
        mounted() {
            this.handleGetData();
        },
        methods: {
            async handleGetData() {
                try{
                    const planningResponse = await axiosClient.get('/planning');
                    this.planningData = planningResponse.data.info;
                    //console.log(planningResponse.data.info);
                    const headcountResponse = await axiosClient.get('/headcounts');
                    this.headcountData = headcountResponse.data.info;
                    //console.log(headcountResponse.data.info);
                }
                catch(error) {
                    console.error('Error fetching data:', error);
                }
            },
        },
        computed: {
            getTotalOutput() {
                return this.planningData.map((data) => {
                    return {
                        total: (data.output_monday +
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
        }
    }
</script>
<style scoped>
    *{
        margin: 0;
        padding: 0;
    }
    h5{
        margin: 5px;

    }
    ul{
        margin: 5px;
        list-style-type: none;
        border: 1px solid gray;
        border-radius: 5px;
    }
    .repair-output{
        margin-top: 5rem;
    }
    .title{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-bottom: 3rem;
    }
    .info {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .data{
        margin-right: 1rem;
    }

</style>
