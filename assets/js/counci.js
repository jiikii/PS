const { createApp } = Vue;

createApp({
    data() {
        return {
            appointments: [],
        }
    },
    methods: {
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
    },
}).mount('#appointmentCoun');