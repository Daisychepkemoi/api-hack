   <template>
 <div class="login" id="login">
 <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" v-model="input.email"  placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" v-model="input.password" placeholder="Password">
  </div>
  <!-- <button v-on:click="sendData()" class="btn btn-primary">Submit</button> -->
   <button @click="login">Login</button>
</form>
 </div>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'HelloWorld',
        data () {
            return {
                ip: "",
                input: {
                    email: "",
                    password: ""
                },
                response: ""
            }
        },


 methods: {
            login() {
                let data = {
                    username: this.input.email,
                    password: this.input.password
                };

                axios.post('/api/login', data)
                    .then(({data}) => {
                        // TODO: store data
                        // auth.login(data.token, data.user);
                        // console.log(data.token);
                        alert(response.data.success.token);
                        // this.$router.push('/products');
                    })
                    .catch(({response}) => {
                        alert(response.data.error);
                    });
            }
        }}


       
</script>