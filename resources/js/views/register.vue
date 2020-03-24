
<template>
  <div class="main">
    <h4>Register</h4>
    <form @submit.prevent="registerUser">
      <label for="name">Name</label>
      <div>
          <input id="name" type="text" v-model="name" required autofocus>
      </div>

      <label for="email" >E-Mail Address</label>
      <div>
          <input id="email" type="email" v-model="email" required>
      </div>

      <label for="password">Password</label>
      <div>
          <input id="password" type="password" v-model="password" required>
      </div>

      <!-- <label for="password-confirm">Confirm Password</label> -->
      <!-- <div> -->
          <!-- <input id="password-confirm" type="password" v-model="password_confirmation" required> -->
      <!-- </div> -->

      <div>
          <button type="submit">Register</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
  export default {
  data() {
    return {
      name: '',
      email: '',
      password: ''
    }
  },
  methods: {

    registerUser() {
      const { name, email, password } = this
      const data = { name, email, password }
      const URL = '/api/register'
      axios({
        method: 'post',
        url: URL,
        headers: {
          Accept: 'application/json',
          Content: 'application/json'
        },
        data: data
      })
        .then(res => {
          sessionStorage.setItem('token', res.data.success.token)
          this.$router.push('/dashboard')
          console.log(res.data.success.token)
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err.res)
        })
    }
  }
}
</script>