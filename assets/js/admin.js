const { createApp } = Vue; 

createApp({
    data(){
        return{
            totalUser: 0
        }
    },
    methods:{
        getAllUser:function(){

            const vue = this;
            var data = new FormData();
            data.append("method" , "getTotalUser");
            axios.post('../../includes/admin.php',data)
            .then(function(r){
                vue.totalUser = r.data;
            });
            
        },
    },
    created:function(){
        this.getAllUser();
    }
}).mount('#page-wrapper');