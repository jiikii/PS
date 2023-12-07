const { createApp } = Vue; 

createApp({
    data(){
        return{
            username:'',
            email:'',
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
    }
}).mount('#addAppointment-app');