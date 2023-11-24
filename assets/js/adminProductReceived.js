const { createApp } = Vue; 

createApp({
    data(){
        return{
            supplier: '',
            productn:'',
            quant:'',
            rprice:'',
            day_add:'',
            dateInserted: '',
            search: '',
            users:[],
            id:0
            
            
        }
    },
    methods:{
        addProductReceived:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","addProductReceived");
            
            axios.post('../includes/adminProductReceived.php',data)
            .then(function(r){
                if(r.data == 0){
                    alert('Added successfully ');
                    vue.getProductReceived();
                    document.querySelector(".userform").reset();
                }
                else if(r.data == 1){
                    alert('Product already exists');
                }
                else{
                    alert("Error saving user");
                }
            });
            
        },

        getProductReceived:function(){
            var data = new FormData();
            const vue = this;
            data.append('method','getProductReceived');
            axios.post('../includes/adminProductReceived.php',data)
            .then(function(r){
                vue.users = [];
                for(var v of r.data){
                    vue.users.push({
                        id: v.id,
                        supplier: v.supplier,
                        productn: v.productn,
                        quant: v.quant,
                        rprice: v.rprice,
                        day_add: v.day_add,
                        dateInserted: v.dateInserted
                        
                    })
                    
                }
                // r.data.forEach(function(v){
                    
                // })
            })
        },
        deleteProductReceived:function(id){
            if(confirm("Are you sure you want to delete this product received?")){
                var data = new FormData();
                const vue = this;
                data.append("method","deleteProductReceived");
                data.append("id",id);
                axios.post('../includes/adminProductReceived.php',data)
                .then(function(r){
                    vue.getProductReceived();
                })
            }
        },

        getProductReceivedById:function(id){
            var data = new FormData();
            const vue = this;
            data.append('method','getProductReceivedById');
            data.append("id",id);
            axios.post('../includes/adminProductReceived.php',data)
            .then(function(r){
                console.log(r.data);
                for(var v of r.data){
                    vue.supplier = v.supplier;
                    vue.productn = v.productn;
                    vue.quant = v.quant;
                    vue.rprice = v.rprice;
                    vue.id = v.id;
                }
                // r.data.forEach(function(v){
                    
                // })
            })
        },

        updateProductReceived:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","updateProductReceived");
            data.append("id",this.id);
            axios.post('../includes/adminProductReceived.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert('Product Received successfully updated');
                    vue.getProductReceived();
                    document.querySelector(".userform").reset();
                }
                
            });
            
        },
        searchUsers: function(search) {
            var data = new FormData();
            const vue = this;
            data.append('method', 'searchUsers');
            axios.post('../includes/adminProductReceived.php', data)
                .then(function(r) {
                    vue.users = [];
                    for (var v of r.data) {
                        if (v.supplier.toLowerCase().includes(search.toLowerCase()) || v.productn.toLowerCase().includes(search.toLowerCase())) {
                            vue.users.push({
                                supplier: v.supplier,
                                productn: v.productn,
                                quant: v.quant,
                                rprice: v.rprice,
                                id: v.id

                            })
                        }
                    }
                    // r.data.forEach(function(v){

                    // })
                })
        }
    },
    created:function(){
        this.getProductReceived();
    }
}).mount('#productReceived-app');