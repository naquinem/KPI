<template>
    <div class="container-fluid relative">
        <div class="cycletime-container">

            <div class="planning">
                <h1>Planning Request</h1>
                <div class="error">
                    <ul v-if="Object.keys(this.errorField).length > 0">
                        <li>
                            {{ errorField }}
                        </li>
                    </ul>
                </div>
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <div>
                            <label for="workweek">Work Week</label>
                            <input v-model="workweek" type="text" placeholder="WW"/>
                        </div>
                        <div>
                            <label for="pmonday">Planning Request</label>
                            <input v-model="pmonday" type="text" placeholder="Mon">
                            <label for="psaturday">Planning Request</label>
                            <input v-model="ptuesday" type="text" placeholder="Tue"/>
                        </div>

                        <div>
                            <label for="pwednesday">Planning Request</label>
                            <input v-model="pwednesday" type="text" placeholder="Wed"/>
                            <label for="pthursday">Planning Request</label>
                            <input v-model="pthursday" type="text" placeholder="Thu"/>
                        </div>
                        <div>
                            <label for="pfriday">Planning Request</label>
                            <input v-model="pfriday" type="text" placeholder="Fri"/>
                            <label for="psaturday">Planning Request</label>
                            <input v-model="psaturday" type="text" placeholder="Sat"/>
                        </div>
                        <div>
                            <label for="psunday">Planning Request</label>
                            <input v-model="psunday" type="text" placeholder="Sun"/>
                            <label for="omonday">Total Output</label>
                            <input v-model="omonday" type="text" placeholder="Mon"/>
                        </div>
                        <div>
                            <label for="otuesday">Total Output</label>
                            <input v-model="otuesday" type="text" placeholder="Tue"/>
                            <label for="owednesday">Total Output</label>
                            <input v-model="owednesday" type="text" placeholder="Wed"/>
                        </div>
                        <div>
                            <label for="othursday">Total Output</label>
                            <input v-model="othursday" type="text" placeholder="Thu"/>
                            <label for="ofriday">Total Output</label>
                            <input v-model="ofriday" type="text" placeholder="Fri"/>
                        </div>
                        <div>
                            <label for="0saturday">Total Output</label>
                            <input v-model="osaturday" type="text" placeholder="Sat"/>
                            <label for="osunday">Total Output</label>
                            <input v-model="osunday" type="text" placeholder="Sun"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit Data</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axiosClient from '@/axios/axios';


export default {
    name: 'PlanningCreate',
    data() {
        return {
            workweek: '',
            pmonday: '',
            ptuesday: '',
            pwednesday: '',
            pthursday: '',
            pfriday: '',
            psaturday: '',
            psunday: '',
            omonday: '',
            otuesday: '',
            owednesday: '',
            othursday: '',
            ofriday: '',
            osaturday: '',
            osunday: '',
            errorField: [],
        }
    },
    methods: {
        async handleSubmit() {
            try{
                const data = {
                    workweek: this.workweek,
                    planning_monday: this.pmonday,
                    planning_tuesday: this.ptuesday,
                    planning_wednesday: this.pwednesday,
                    planning_thursday: this.pthursday,
                    planning_friday: this.pfriday,
                    planning_saturday: this.psaturday,
                    planning_sunday: this.psunday,
                    output_monday: this.omonday,
                    output_tuesday: this.otuesday,
                    output_wednesday: this.owednesday,
                    output_thursday: this.othursday,
                    output_friday: this.ofriday,
                    output_saturday: this.osaturday,
                    output_sunday: this.osunday,
                }
                const response = await axiosClient.post('/planning', data);
                if(response.status === 200) {
                    window.alert('Successfully send data');
                    this.$router.push('/cycletime-create');
                }
            }
            catch(error) {
                if(error) {
                    if(error.response.status === 401) {
                        this.errorField = error.response.data.error
                        console.log(errorField);
                    } else {
                        this.errorField = error.response.data.message;
                    }
                }
            }
        }
    }
}
</script>

<style scoped>
    input{
        margin-left: 1rem;
        font-size: small;
        width: 4rem;
        border-style: none;
        border-radius: 5px;
        text-align: center;
        margin-top: 5px;

    }
    label{
        font-size: small;
    }
    .form-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        text-align: center;
    }
    .form-group > div {
        display: grid;
        grid-template-columns: 1fr 1fr;
        text-align: center;
        border-radius: 3rem;
        justify-content: center;
        align-items: center;
        margin: 5px;
    }
    #btn-submit{
        margin-top: 3rem;
    }
    .planning{
        text-align: center;
        width: 40rem;
        height: 30rem;
    }
    .cycletime-container{
        border-radius: 5rem;
        position: absolute;
        top: 5rem;
        display: flex;
        justify-content: left;
        text-align: center;
        align-items: center;
        background-color: #ced2cc;
        box-shadow: #1f3f496e 4px 4px;
    }
    .error{
        margin-left: 5rem;
        font-family: Arial, Helvetica, sans-serif;
        color: rgba(245, 245, 245, 0.973);
        background-color: rgb(252, 97, 77);
        font-weight: 700;
        font-size: medium;
        width: 28rem;
        border-radius: 3px;
    }
    li{
        list-style-type: none;
    }
</style>
