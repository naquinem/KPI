<script>

import csrfToken from '@/csrf/csrfToken';
import axiosClient from '@/axios/axios';


export default{
  name: 'Home',
  data() {
    return {
      first_name: '',
      last_name: '',
      contact_number: '',
      age: '',
      birth_date: '',
      address: ''
    }
  },
  methods: {
    async getData () {
      await csrfToken();
      try{
        const response = await axiosClient.get('/crud');
        if(response) {
          console.log(response);
        }
      }
      catch (error) {
        console.log(error);
      }
    }
  }
}
</script>

<template>
  <main>
    <button @click.prevent="getData" type="submit">Submit</button>
    <lu @change.prevent="getData">
      <li></li>
    </lu>
  </main>
</template>
