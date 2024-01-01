<template>
    <div class="repair-output">

        <div>
            <div class="repair-output-title">
                <h1>Repair Output per Head</h1>
                <ul v-for="(error, key) in this.errorField" :key="key">
                    <li>{{ error }}</li>
                </ul>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Work Week</th>
                        <th>Total Output</th>
                        <th>Total Headcount</th>
                        <th>Repair Output per Head</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(repair) in this.repairOutput" :key="repairOutput.id">
                        <td>{{ repair.workweek }}</td>
                        <td>{{ repair.total_output }}</td>
                        <td>{{ repair.total_headcounts }}</td>
                        <td>{{ repair.repair_output_per_head }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axiosClient from '@/axios/axios';


export default {
    name: 'RepairOutput',
    data() {
        return {
            repairOutput: [],
            errorField: [],
        }
    },
    mounted() {
        this.getRepairOutput();
    },
    methods: {
        async getRepairOutput() {
            try{
                const response = await axiosClient.get('/headcounts');
                this.repairOutput = response.data.info;
            }
            catch(error) {
                if(error.response.status === 401){
                    this.errorField = error.response.data.message;
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
    .repair-output{
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .repair-output-title{
        margin-bottom: 2rem;
    }
</style>
