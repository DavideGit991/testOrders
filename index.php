<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="app.css">
    <title>Orders</title>
</head>
<body>
    <div id="app">
    
        <select @change="onChange()" v-model="key">
            <option disabled selected>Ordina per data </option>
            <option value="asc">Ascendente</option>
            <option  value="desc">Discendente</option>
        </select>
         
        <div class="box">
            <div class="flex around ">
                <h5 class="w-30 text-center b-b-title">
                    Ordine
                </h5>
                <h5 class="w-30 text-center b-b-title">
                    Nome
                </h5>
                <h5 class="w-30 text-center b-b-title">
                    Data
                </h5>
            </div>
            <div v-for="(order,i) in orders" :key="i" class="flex between b-b  ">
                <div class="box-number w-20 text-center ">
                    <h6>{{order.id}}</h6>
                </div>
                <div class=" box-name w-30 text-center">
                    <h6>{{order.name}} {{order.lastname}}</h6> 
                    
                </div> 
                <div class="box-date w-30 text-center">
                    <h6>{{order.date_order}}</h6> 
                </div>                      
            </div>
        </div>
    
    </div>

</body>
</html>


<script >

    new Vue({
        el:'#app',
        data() {
            return {
                sort:false,
                key:'',
                orders:[],

                show:true,
            }
        },

        methods: 
            {
             onChange(event)
                { 
                    // console.log(this.key);
                     if (this.key == 'asc')
                         {
                             this.show=false;
                             this.sort=true;
                             $.ajax(
                             {
                                 'url': 'http://localhost/testOrders/api/order/getAsc.php',
                                 'method': 'GET',
                                 'success': (res)=>{
                                     this.orders=res.data;
                                 },
                                 'error':()=>{
                                     alert('errore!');
                                 }
                             });         
                         }
                         else
                         {
                            this.show=false;
                            this.sort=true;
                             $.ajax(
                                 {
                                     'url': 'http://localhost/testOrders/api/order/getDesc.php',
                                     'method': 'GET',
                                     'success': (res)=>{
                                         this.orders=res.data;
                                         
                                     },
                                     'error':()=>{
                                         alert('errore!');
                                     }
                                 }); 
                         }  
                        //  console.log(this.orders);
                },

            },   
            mounted() {
                $.ajax(
                {
                    'url': 'http://localhost/testOrders/api/order/getDesc.php',
                    'method': 'GET',
                    'success': (res)=>{
                        this.orders=res.data;
                    },
                    'error':()=>{
                        alert('errore!');
                    }
                });   
            },
        });

            
</script>