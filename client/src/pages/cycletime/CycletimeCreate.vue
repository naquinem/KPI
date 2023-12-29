<template>
    <div class="container-fluid relative">
        <div class="cycletime-container">

            <div class="cycletime">
                <form @submit.prevent="handleSubmit">
                    <h1>Cycletime</h1>
                    <div class="error">
                        <ul v-if="Object.keys(this.errorField).length > 0">
                            <li>
                                {{ errorField }}
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="workweek">Work Week</label>
                            <input v-model="workweek" type="text"/>
                        </div>
                        <div>
                            <label for="monday">Monday</label>
                            <input v-model="monday" type="text">
                        </div>
                        <div>
                            <label for="tuesday">Tuesday</label>
                            <input v-model="tuesday" type="text"/>
                        </div>
                        <div>
                            <label for="wednesday">Wednesday</label>
                            <input v-model="wednesday" type="text"/>
                        </div>
                        <div>
                            <label for="thursday">Thursday</label>
                            <input v-model="thursday" type="text"/>
                        </div>
                        <div>
                            <label for="friday">Friday</label>
                            <input v-model="friday" type="text"/>
                        </div>
                        <div>
                            <label for="saturday">Saturday</label>
                            <input v-model="saturday" type="text"/>
                        </div>
                        <div>
                            <label for="sunday">Sunday</label>
                            <input v-model="sunday" type="text"/>
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
    name: 'CycletimeCreate',
    data() {
        return {
            workweek: '',
            monday: '',
            tuesday: '',
            wednesday: '',
            thursday: '',
            friday: '',
            saturday: '',
            sunday: '',
            errorField: [],
        }
    },
    methods: {
        async handleSubmit() {
            try{
                const data = {
                    workweek: this.workweek,
                    cycletime_monday: this.monday,
                    cycletime_tuesday: this.tuesday,
                    cycletime_wednesday: this.wednesday,
                    cycletime_thursday: this.thursday,
                    cycletime_friday: this.friday,
                    cycletime_saturday: this.saturday,
                    cycletime_sunday: this.sunday
                }
                const response = await axiosClient.post('/cycletime', data);
                if(response.status === 200) {
                    this.$router.push('/planning-create');
                }
            }
            catch(error) {
                if(error.response.status === 401) {
                    this.errorField = error.response.data.error;
                } else {
                    this.errorField = error.response.data.message;
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
    }
    .cycletime{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 25rem;
        height: 28rem;
    }
    .form-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        text-align: center;
        width: 28rem;
        margin-left: 10rem;
    }
    .form-group > div {
        display: grid;
        grid-template-columns: 1fr 1fr;
        text-align: center;
        border-radius: 3rem;
        justify-content: center;
        align-items: center;
        margin: 6px;
    }
    .cycletime-container{
        box-shadow: #1f3f496e 4px 4px;
        position: absolute;
        top: 5rem;
        left: 5rem;
        display: flex;
        justify-content: left;
        text-align: center;
        align-items: center;
        background-color: #ced2cc;
        border-radius: 5rem;
        width: 36rem;
    }
    .error{
        margin-left: 12rem;
        font-family: Arial, Helvetica, sans-serif;
        color: rgba(245, 245, 245, 0.973);
        background-color: rgb(252, 97, 77);
        font-weight: 700;
        font-size: medium;
        width: 25rem;
        border-radius: 3px;
    }
    li{
        list-style-type: none;
    }
</style>
