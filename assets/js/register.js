const { createApp } = Vue; 

createApp({
    data(){
        return{
            username:'',
            email:'',
            password:'',
            role:''
            
        }
    },
    methods:{
        saveUser:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            //const vue = this;
            var data = new FormData(form);
            data.append("method","saveUser");            
            axios.post('../includes/register.php',data)
            .then(function(r){
                if(r.data == 200){
                    alert('User Register successfully ');
                    document.querySelector(".userform").reset();
                    window.location.href = "../index.php"; 
                }
                else if(r.data == 400){
                    alert('User already exists');
                }
                else{
                    // alert("Error saving user");
                    alert(r.data);
                }
            });
            
        },
    },
}).mount('#register-app');