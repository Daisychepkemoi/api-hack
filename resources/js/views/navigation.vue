    <template>
     <div class="contain">
        <div class="sidebar">
          
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
                    <router-link :to="{ name: 'orders' }">Order</router-link>
                </li>
               
                <hr>
            </ul>
        </div>
    </div>
    </template>

    <style type="text/css">
        
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
    </style>