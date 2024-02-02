const { createApp } = Vue;

createApp({
    data() {
        return {
            appointments: [],
            todos: [],
            historys: [],
            councilorUsername: '',
            description: '',
            pid: 0,
        }
    },
    methods: {
        getPiD(id){
            this.pid = id;
        },
        descriptionGet: function () {
            var data = new FormData();
            const vue = this;

            data.append('method', 'descriptionGet');
            data.append('description', vue.description);
            data.append('pid', vue.pid);
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    if(r.data == 200){
                        alert('Successfully send TODOS!');
                    }else{
                        alert('Something is wrong!. Please contact administrator!');
                    }
                })
        },
        getAppointments: function () {
            var data = new FormData();
            const vue = this;

            data.append('method', 'getAppointmentsCoun');
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    vue.appointments = [];
                    for (var v of r.data) {
                        vue.appointments.push({
                            apptid: v.apptid,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            name: v.name,
                            dateappt: v.dateappt,
                            reason: v.reason,
                            timeappt: v.timeappt,
                            type: v.type,
                            patient_id: v.patient_id,
                            status: v.status,
                            created: v.created,
                            updated: v.updated,
                        })
                    }
                })
        },
        getCouncilorToDo: function () {
            var data = new FormData();
            const vue = this;

            data.append('method', 'getCouncilorToDo');
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    vue.todos = [];
                    for (var v of r.data) {
                        vue.todos.push({
                            ucouncilor: v.ucouncilor,
                            upatient: v.upatient,
                            description: v.description,
                            status: v.status,
                            created_at: v.created_at,
                            updated_at: v.updated_at,
                            todo_id: v.todo_id,
                        })
                    }
                })
        },
        history: function () {
            var data = new FormData();
            const vue = this;

            data.append('method', 'history');
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    vue.historys = [];
                    for (var v of r.data) {
                        if (v.councilor == vue.councilorUsername) {
                            vue.historys.push({
                                apptid: v.apptid,
                                firstname: v.firstname,
                                lastname: v.lastname,
                                patient_id: v.patient_id,
                                name: v.name,
                                dateappt: v.dateappt,
                                timeappt: v.timeappt,
                                reason: v.reason,
                                councilor: v.councilor,
                                status: v.status,
                                type: v.type,
                                created: v.created,
                                updated: v.updated,
                            })
                        }
                    }
                })
        },
        myUsername: function () {
            var data = new FormData();
            const vue = this;

            data.append('method', 'returnCouncilorUsername');
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    vue.councilorUsername = r.data;
                })
        },
        accept(id) {
            var data = new FormData();
            const vue = this;

            data.append('method', 'accept');
            data.append('id', id);
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        window.location.reload();
                    }
                })
        },
        decline(id) {
            alert(id);
            var data = new FormData();
            const vue = this;

            data.append('method', 'decline');
            data.append('id', id);
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        window.location.reload();
                    }
                })
        },
        deleteThisId(id) {
            var data = new FormData();
            const vue = this;

            data.append('method', 'delete');
            data.append('id', id);
            axios.post('../../includes/adminAppointment.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        window.location.reload();
                    }
                })
        },
    },
    created: function () {
        this.getAppointments();
        this.getCouncilorToDo();
        this.myUsername();
        this.history();
    },
}).mount('#appointmentCoun');