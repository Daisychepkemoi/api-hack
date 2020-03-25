<template>
    <div class="contain">
       <Navigation></Navigation>
        <div class="main" id="suppliers">
            <div class="loading" v-if="loading">
                Loading...
            </div>
            <div v-if="error" class="error">
                <p> {{ error }}</p>
                <button @click.prevent="fetchData">
                    Try Again
                </button>
            </div>
            <div v-if="suppliers" class="tables">
                <div style="width:70%; float:left;">
                    <H3> suppliers Data</H3>
                </div>
                <div style="width:30%; float:right; color:black;"><button class="btn-success" style="float:right; margin-right: 200px;">
                        <router-link :to="{ name: 'suppliers.create' }">New</router-link>
                    </button> </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created_At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="suppliers">
                        <tr v-for="supplier in suppliers">
                            <th scope="row"></th>
                            <td> {{ supplier.name }}</td>
                            <td>{{ supplier.created_at }}</td>
                            <td><router-link :to="`/suppliers/${supplier.id}/supplierproducts`"><button class="btn-info" > View Products</button></router-link> </td>
                            <td> <router-link :to="`/suppliers/edit/${supplier.id}`"><button class="btn-primary" >Edit</button></router-link> </td>
                            <td><button class="btn-danger" @click="deletesupplier(supplier.id)">Delete </button></td>
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
            suppliers: null,
            error: null,
        };0
    },
    created() {
        this.fetchsuppliers();
    },
    methods: {
        fetchsuppliers() {
          const token = sessionStorage.getItem('token')
      const URL = '/api/suppliers'
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          
          this.suppliers = res.data.data
          // sessionStorage.setItem('supplierid', res.data.data.id)
          // console.log(res.data.data)
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },
          
                deletesupplier(id) {
      const token = sessionStorage.getItem('token')
      const URL = `/api/suppliers/${id}/delete`
     axios({
        method: 'post',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(_ => {
          this.fetchsuppliers()
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    }
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

.main .tables {
    background-color: ;
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
