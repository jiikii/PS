const { createApp } = Vue; 

createApp({
    data(){
        return{
            username:'',
            email:'',
            searchAppointment:'',
            appointmentPendBooked: 0,
            password:'',
            role: '0',
            appointments:[],
            id:0
        }
    },
    
    methods:{
        getAppointments:function(){
            var data = new FormData();
            const vue = this;
            data.append('method','getAppointments');
            axios.post('../../includes/adminAppointment.php',data)
            .then(function(r){
                vue.appointments = [];
                for(var v of r.data){
                    vue.appointments.push({
                        apptid: v.apptid,
                        firstname: v.firstname,
                        lastname: v.lastname,
                        name: v.name,
                        dateappt: v.dateappt,
                        reason: v.reason,
                        timeappt: v.timeappt,
                        type: v.type,
                        status: v.status,
                        created: v.created,
                        updated: v.updated,
                    })
                }
            })
        },

    },
    created:function(){
        this.getAppointments();
    },
    computed:{
        searchAppointments(){
            if(!this.searchAppointment){
                return this.appointments;
            }
    
            return this.appointments.filter(pr => pr.name.toLowerCase().includes(this.searchAppointment.toLowerCase()));
        },
        filterAppointments(){
            if(this.appointmentPendBooked == 0){
                return this.appointments;
            }
    
            return this.appointments.filter(pr => pr.status.toLowerCase().includes(this.appointmentPendBooked.toLowerCase()));
        }
    }
}).mount('#addAppointment-app');