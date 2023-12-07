const { createApp } = Vue;

createApp({
    data() {
        return {
            bookedAppointments: [],
            SelectedBookedAppointments: [],
            date: '',
            time: '',
            name: '',
            councilor: '',
            reason: '',
            type: '',
        }
    },
    methods: {
        saveBooking: function () {
            var v = this;
            if (v.date == "" || v.time == "" || v.name == "" || v.councilor == "" || v.reason == "" || v.type == "") {
                alert("Required!");
            } else {
                var data = new FormData();
                data.append('method', 'saveBooking');
                data.append('date', v.date);
                data.append('time', v.time);
                data.append('name', v.name);
                data.append('councilor', v.councilor);
                data.append('reason', v.reason);
                data.append('type', v.type);
                axios.post('../../includes/patients.php', data).then(function (r) {
                    if (r.data == 200) {
                        alert("Book Send!");
                    } else if (r.data == 400) {
                        alert("Something is not Right");
                    } else {
                        alert(r.data);
                    }
                });
            }
        },
        bookedAppointment() {
            var v = this;
            var data = new FormData();
            data.append('method', 'bookedAppointment');
            axios.post('../../includes/patients.php', data).then(function (r) {
                for (var ba of r.data) {
                    v.bookedAppointments.push({
                        apptid: ba.apptid,
                        patient_id: ba.patient_id,
                        name: ba.name,
                        dateappt: ba.dateappt,
                        timeappt: ba.timeappt,
                        reason: ba.reason,
                        councilor: ba.councilor,
                        status: ba.status,
                        type: ba.type,
                        created: ba.created,
                        updated: ba.updated,
                    });
                }
            });
        },
        selectedBooked(id) {
            var v = this;
            var data = new FormData();
            data.append('method', 'bookedAppointment');
            axios.post('../../includes/patients.php', data).then(function (r) {
                v.SelectedBookedAppointments = [];
                for (var ba of r.data) {
                    if (ba.apptid) {
                        v.SelectedBookedAppointments.push({
                            apptid: ba.apptid,
                            patient_id: ba.patient_id,
                            name: ba.name,
                            dateappt: ba.dateappt,
                            timeappt: ba.timeappt,
                            reason: ba.reason,
                            councilor: ba.councilor,
                            status: ba.status,
                            type: ba.type,
                            created: ba.created,
                            updated: ba.updated,
                        });
                    }
                }
            });
        },
        cancel(id) {
            var v = this;
            var data = new FormData();
            data.append('method', 'cancelAppointment');
            data.append('id', id);
            axios.post('../../includes/patients.php', data).then(function (r) {
                if(r.data == 200){
                    alert("Cancelled Appointment!");
                }else if(r.data == 400){
                    alert("Cannot cancel this appointment!");
                }else{
                    alert(r.data);
                }
            });
        },
        StringDate(date) {
            let dateObject = new Date(date);
            let day = dateObject.getDate();
            let month = dateObject.getMonth() + 1;
            let year = dateObject.getFullYear();
            return `${month}/${day}/${year}`;
        },
        StringTime(timeString) {
            let [hours, minutes] = timeString.split(':');

            let amPm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;

            let formattedTime = `${hours}:${minutes} ${amPm}`;

            return formattedTime;
        }
    },
    created() {
        console.log("Testing");
        this.bookedAppointment();
    }
}).mount('#patient-user');