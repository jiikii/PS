const { createApp } = Vue; 

createApp({
    data(){
        return{
            totalUser: 0,
            appointmentsTotal: 0,
            appointmentsTotal: '',
            appointmentsTotal: '',
            descript: '',
            searchForMentalInformation: '',
            MentalInformation: [],
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
        getAppointments:function(){
            const vue = this;
            var data = new FormData();
            data.append('method','getAppointments');
            axios.post('../../includes/adminAppointment.php',data)
            .then(function(r){
                vue.appointmentsTotal = r.data.length
            })
        },
        addMentalInformation:function(){
            const vue = this;
            var data = new FormData();
            data.append('method','addMentalInformation');
            data.append('file', document.getElementById('file').files[0]);
            data.append('description', vue.descript);
            axios.post('../../includes/adminAppointment.php',data)
            .then(function(r){
                alert(r.data);
            })
        },
        getMentalInformation:function(){
            const vue = this;
            var data = new FormData();
            data.append('method','getMentalInformation');
            axios.post('../../includes/adminAppointment.php',data)
            .then(function(r){
                vue.MentalInformation = [];
                for(var v of r.data){
                    vue.MentalInformation.push({
                        mentid: v.mentid,
                        img: v.img,
                        descript: v.descript,
                        status: v.status,
                        datecreated: v.datecreated,
                        updated: v.updated
                    })
                    
                }
            })
        },
        deleteMentalInfo:function(id){
            const vue = this;
            var data = new FormData();
            data.append('method','deleteMentalInfo');
            data.append('id',id);
            axios.post('../../includes/adminAppointment.php',data)
            .then(function(r){
                if(r.data == 1){
                    window.location.reload();
                }else {
                    alert(r.data);
                }
            })
        },
    },
    created:function(){
        this.getAllUser();
        this.getAppointments();
        this.getMentalInformation();
    },
    computed:{
        searchForMental(){
            if(!this.searchForMentalInformation){
                return this.MentalInformation;
            }

            return this.MentalInformation.filter(p => p.descript.toLowerCase().includes(this.searchForMentalInformation.toLowerCase()))
        }
        
    }   
}).mount('#page-wrapper');