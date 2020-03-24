<template>
    <div class="contain">
        <div class="sidebar">
          
           <ul>
                <li>
                    <router-link :to="{ name: 'products' }">Products</router-link>
                </li>
                <hr>-
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
            <div v-if="suppliersproducts" class="tables">
                <div style="width:70%; float:left;">
                    <H3> suppliers Products Data</H3>
                </div>
                <div style="width:30%; float:right; color:black;"><button class="btn-success" style="float:right; margin-right: 200px;">
                        <router-link :to="{ name: 'supplierproducts.create' }">New</router-link>
                    </button> </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Suppliers ID</th>
                            <th scope="col">Products ID</th>
                            <th scope="col">Created_At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="suppliersproducts">
                        <tr v-for="supplierproduct in suppliersproducts">
                            <th scope="row"></th>
                            <td> {{ supplierproduct.suppliers_id }}</td>
                            <td>{{ supplierproduct.products_id }}</td>
                            <td>{{ supplierproduct.created_at }}</td>
                            <td><button class="btn-info" @click="viewsupplier(supplier.id)"> View </button></td>
                            <td> <router-link :to="`/suppliersproducts/edit/${supplierproduct.id}`"><button class="btn-primary" >Edit</button></router-link> </td>
                            <td><button class="btn-danger" @click="deletesupplierproduct(supplierproduct.id)">Delete </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
export default{
    data() {
        return {
            loading: false,
            suppliersproducts: null,
            error: null,
        };0
    },
    created() {
        this.fetchsupplierproducts();
    },
    methods: {
        fetchsupplierproducts() {
          const token = sessionStorage.getItem('token')
      const URL = '/api/supplierProducts'
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          this.suppliersproducts = res.data.data
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },
          
                deletesupplierproduct(id) {
      const token = sessionStorage.getItem('token')
      const URL = `/suppliers/supplierProducts/${id}/delete`
     axios({
        method: 'post',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(_ => {
          this.fetchsupplierproducts()
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
