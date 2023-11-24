const { createApp } = Vue; 

createApp({
    data(){
        return{
            pname:'',
            quantity:'',
            price:'',
            day:'',
            dateInserted: '',
            search: '',
            users:[],
            id:0
            
            
        }
    },
    methods:{
        addProduct:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","addProduct");
            
            axios.post('../includes/adminProduct.php',data)
            .then(function(r){
                if(r.data == 0){
                    alert('Added successfully ');
                    vue.getProduct();
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

        getProduct:function(){
            var data = new FormData();
            const vue = this;
            data.append('method','getProduct');
            axios.post('../includes/adminProduct.php',data)
            .then(function(r){
                vue.users = [];
                for(var v of r.data){
                    vue.users.push({
                        id: v.id,
                        pname: v.pname,
                        quantity: v.quantity,
                        price: v.price,
                        day: v.day,
                        dateInserted: v.dateInserted
                        
                    })
                    
                }
                // r.data.forEach(function(v){
                    
                // })
            })
        },
        deleteProduct:function(id){
            if(confirm("Are you sure you want to delete this product?")){
                var data = new FormData();
                const vue = this;
                data.append("method","deleteProduct");
                data.append("id",id);
                axios.post('../includes/adminProduct.php',data)
                .then(function(r){
                    vue.getProduct();
                })
            }
        },

        getProductById:function(id){
            var data = new FormData();
            const vue = this;
            data.append('method','getProductById');
            data.append("id",id);
            axios.post('../includes/adminProduct.php',data)
            .then(function(r){
                console.log(r.data);
                for(var v of r.data){
                    vue.pname = v.pname;
                    vue.quantity = v.quantity;
                    vue.price = v.price;
                    vue.id = v.id;
                }
                // r.data.forEach(function(v){
                    
                // })
            })
        },

        updateProduct:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","updateProduct");
            data.append("id",this.id);
            axios.post('../includes/adminProduct.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert('Product successfully updated');
                    vue.getProduct();
                    document.querySelector(".userform").reset();
                }
                
            });
            
        },

        searchUsers: function(search) {
            var data = new FormData();
            const vue = this;
            data.append('method', 'searchUsers');
            axios.post('../includes/adminProduct.php', data)
                .then(function(r) {
                    vue.users = [];
                    for (var v of r.data) {
                        if (v.pname.toLowerCase().includes(search.toLowerCase())) {
                            vue.users.push({
                                pname: v.pname,
                                quantity: v.quantity,
                                price: v.price,
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
        this.getProduct();
    }
}).mount('#product-app');