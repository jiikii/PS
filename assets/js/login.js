
const { createApp } = Vue;

createApp({
    methods:{
        login:function(e){
            e.preventDefault();
            const data = new FormData(e.currentTarget);
            data.append("method","login");
            axios.post('includes/login.php',data)
            .then(function(r){
                if(r.data == 1){
                    window.location.href = "pages/admin/adminDashboard.php";
                }else if(r.data == 2){
                    window.location.href = "pages/patient/patientDashboard.php";
                }else if(r.data == 3){
                    window.location.href = "pages/counsilor/councilorDashboard.php";
                }else{
                    window.location.href = "pages/pageNotFound.php";
                } 
            })
        }
    },
    created:function(){
        
    }
}).mount('#login-app');
