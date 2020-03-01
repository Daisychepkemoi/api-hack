<template>
    <div>
              <!-- <div style="width:75%; background-color:green;"> -->
                <!-- <H5> <router-link :to="{ name: 'logout' }">logout</router-link></h5> </div> -->
             

<div class="contain">
    <div class="sidebar">
        <!--  <router-link :to="{ name: 'login' }">Login</router-link> |
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'products' }">Products</router-link> |
            <router-link :to="{ name: 'suppliers' }">supplier</router-link> |
            <router-link :to="{ name: 'supplierProducts' }">supplierProducts</router-link> |
            <router-link :to="{ name: 'orders' }">Orders</router-link> | -->
        <ul>
            <li>
            <router-link :to="{ name: 'products' }">Products</router-link>
            </li>
            <hr>
             <li>
            <router-link :to="{ name: 'suppliers' }">supplier</router-link>
            </li>
            <hr>
             <li>
            <router-link :to="{ name: 'supplierProducts' }">supplierProducts</router-link>
            </li>
            <hr>
              <li>
            <router-link :to="{ name: 'orders' }">Order</router-link>
            </li>
            <hr>
              <li>
            <router-link :to="{ name: 'orderDetails' }">Order Details</router-link>
            </li>
            <hr>
           
            
        </ul>
    </div>
  
</div>





        <div class="main">
          <h4>  Welcome, {{ name }}</h4>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {

  data() {
    return {
      name: ''
    }
  },
  mounted() {
    this.fetchUserDetails()
  },
  methods: {
    /**
     * [fetchUserDetails used to fetch user details]
     * @return {[type]} [none]
     */
    fetchUserDetails() {
      const token = sessionStorage.getItem('token')
      const URL = `/api/users/${token}`

      axios({
        method: 'get',
        url: URL,
        headers: {
          Accept: 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          this.name = res.data.name
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  /*margin-top: 60px;*/
}
.navig {
    margin-top: 0px !important;
    height: 75px;
    background-color: black; 

}
.navig h4{
    text-align: left;
    margin-left: 100px;
    color: black ! important;
    text-transform: uppercase;
    font-size: 30px;
    padding-top: 20px;
}
h4 a{
    color: black;
}
h5 a{
    display: inline-block;
    float: right;
}
ul li {
    list-style: none;
    /*padding: 20px;*/
    color: black;

}
li a {
    color: black;
    text-transform: initial;
}
.contain{
    width: 100%;
    /*height: 100%;*/
    background-color: ;
}
.contain .sidebar{
    width: 20%;
    float: left;
    height: 1000px;
    background-color: grey;
}
.contain .main{
    height: 600px;
    width: 80%;
    background-color: ;
    float: right;
}


/*table {
    /*width: 70%;*/
    /*background-color: red;*/
    /*margin-left: 30%;*/
/*}*/
@import'~bootstrap/dist/css/bootstrap.css'
</style>

<!-- <template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link> |
            <router-link :to="{ name: 'users.index' }">Users</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script> -->