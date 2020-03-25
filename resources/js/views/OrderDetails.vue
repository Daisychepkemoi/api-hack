<template>
      <div class="contain">
<Navigation></Navigation>
    <div class="main" id="ordersdetails">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
           <p>   {{ error }}</p>
            <button @click.prevent="fetchData">
            Try Again
        </button>
        </div>

<div v-if="ordersdetails">   
  <H4>{{ordername.order_number}}  Order Details</H4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date CReated</th>
    </tr>
  </thead>
  <tbody v-if="ordersdetails">
    <tr v-for="details in ordersdetails">
      <th scope="row"></th>
      <td> {{ details.product }}</td>
      <td> {{ details.description }}</td>
      <td> {{ details.quantity }}</td>
      <td>{{ details.created_at }}</td>
      
    </tr>
   
  </tbody>
</table>
</div>


        
    </div>
  </div>
</template>
<script>
    import axios from 'axios';
    import Navigation from './navigation';

export default{
    components: { 
  'Navigation': Navigation 
},
    data() {
        return {
            loading: false,
            ordersdetails: null,
            ordername : null,
            error: null,
        };
    },
    mounted() {
    this.id = this.$route.params.id // id of the article
    this.fetchOrdedDetails(this.id)
    console.log(this.$route.params.id );
  },
    methods: {
        fetchOrdedDetails(id) {
   const token = sessionStorage.getItem('token')
   console.log(this.id);
   // const supplierid = sessionStorage.getItem('supplierid')
   // console.log("supplierid")
      const URL = `/api/order/${id}/orderdetails`
     axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          // this.fetchProduct()
                    this.ordersdetails = res.data.data;
                    this.ordername = res.data.orderName;
          console.log(res.data.data);
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },
    //             deleteProduct(id) {
    //   const token = sessionStorage.getItem('token')
    //   const URL = `/api/products/${id}/delete`
    //  axios({
    //     method: 'post',
    //     url: URL,
    //     headers: {
    //       'Content-Type': 'application/json',
    //       Authorization: `Bearer ${token}`
    //     }
    //   })
    //     .then(res=> {
    //       this.fetchProduct()

    //     })
    //     .catch(err => {
    //       // eslint-disable-next-line
    //       console.log(err)
    //     })
    }
  }
</script>

 
<style type="text/css">
.contain {
    width: 100%;
    /*height: 100%;*/
    background-color: ;
}

.contain .sidebar {
    width: 20%;
    float: left;
    height: 1000px;
    background-color: grey;
}

.contain .main {
    height: 600px;
    width: 80%;
    background-color: ;
    float: right;
}

.main table{
    background-color: ;
    font-size:12px;
}

.tables table {
    width: 80%;
    background-color: ;
    font-size: 12px;
    /*padding: 5%;*/
    margin-left: 5%;
    /*margin-right: 5%;*/
    margin-top: 20px;
}

</style>