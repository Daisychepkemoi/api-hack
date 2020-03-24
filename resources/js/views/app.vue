<template>
    <div>
         <div class="navig" id="navig" style="background-color:red">
            <div style="width:25%; background-color:; float:left;"> <h4><router-link :to="{ name: 'home' }">Home</router-link></h4> 
              </div>
              <!-- <div style="width:75%; background-color:green;"><h5><router-link :to="{ name: 'login' }">Login</router-link> <router-link :to="{ name: 'logout' }">logout</router-link></h5> </div> -->



</div>





        <div class="containers">
            <router-view></router-view>
        </div>
        </div>
</template>
<script>
export default{}
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