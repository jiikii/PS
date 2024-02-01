const { createApp } = Vue;

createApp({
    data() {
        return {
            bookedAppointments: [],
            SelectedBookedAppointments: [],
            councilors: [],
            mentalInfos: [],
            selectedCouncilors: [],
            date: '',
            time: '',
            counsilorSelected: '',
            name: '',
            councilor: '',
            reason: '',
            search: '',
            type: '',
            myId: 0,
            usernameID: '',
            pic: '',
        }
    },
    methods: {
        getUsername(id) {
            var vue = this;
            var data = new FormData();
            data.append('method', 'councillor');
            axios.post('../../includes/patients.php', data).then(function (r) {
                vue.selectedCouncilors = [];
                vue.councilor = id;
                for (var v of r.data) {
                    if (v.user_id == id) {
                        vue.selectedCouncilors.push({
                            user_id: v.user_id,
                            firstname: v.firstname,
                            lastname: v.lastname,
                            location: v.location,
                            username: v.username,
                            email: v.email,
                            role: v.role,
                            phoneNumber: v.phoneNumber,
                            profile: v.profile,
                            created: v.created,
                            updated: v.updated,
                        })
                    }
                }
            });
        },
        saveBooking: function () {
            var v = this;
            if (v.date == "" || v.time == "" || v.name == "" || v.reason == "" || v.type == "") {
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
                        window.location.reload();
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
            data.append('method', 'bookedAppointmentAll');
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
                    if (ba.apptid == id) {
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
        getCouncillor() {
            var vue = this;
            var data = new FormData();
            data.append('method', 'councillor');
            axios.post('../../includes/patients.php', data).then(function (r) {
                vue.councilors = [];

                for (var v of r.data) {
                    vue.councilors.push({
                        user_id: v.user_id,
                        firstname: v.firstname,
                        lastname: v.lastname,
                        location: v.location,
                        username: v.username,
                        email: v.email,
                        role: v.role,
                        status: v.status,
                        profile: v.profile,
                        created: v.created,
                        updated: v.updated,
                    })
                }
            });
        },
        getMentalInfo() {
            var vue = this;
            var data = new FormData();
            data.append('method', 'mentalInfo');
            axios.post('../../includes/patients.php', data).then(function (r) {
                vue.mentalInfos = [];
                for (var v of r.data) {
                    vue.mentalInfos.push({
                        mentid: v.mentid,
                        img: v.img,
                        descript: v.descript,
                        treatment: v.treatment,
                        datecreated: v.datecreated,
                        updated: v.updated,
                    })
                }
            });
        },
        getMyId() {
            var vue = this;
            var data = new FormData();
            data.append('method', 'getMyId');
            axios.post('../../includes/patients.php', data).then(function (r) {
                for (var v of r.data) {
                    vue.myId = v.user_id;
                }
            });
        },
        getCalendar() {
            var vue = this;
            var data = new FormData();
            data.append('method', 'bookedAppointment');
            axios.post('../../includes/patients.php', data).then(function (r) {
                
                var eventsData = r.data.map(function (event) {
                    if (event.patient_id == vue.myId && event.councilor === event.councilor) {
                        return {
                            title: event.name,
                            start: event.dateappt + 'T' + event.timeappt,
                            color: 'blue'
                        };
                    } else {
                        return {
                            title: event.name,
                            start: event.dateappt + 'T' + event.timeappt,
                            color: 'red'
                        };
                    }
                });

                var calendarEl = document.getElementById("calendar");

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                    },
                    height: 900,
                    contentHeight: 800,
                    aspectRatio: 3,
                    nowIndicator: true,
                    initialView: "dayGridMonth",
                    editable: true,
                    dayMaxEvents: true,
                    navLinks: true,
                    events: eventsData
                });

                calendar.render();
            });
        },
        getPicture(id) {
            this.pic = id;
        },
        cancel(id) {
            var v = this;
            var data = new FormData();
            data.append('method', 'cancelAppointment');
            data.append('id', id);
            axios.post('../../includes/patients.php', data).then(function (r) {
                if (r.data == 200) {
                    alert("Cancelled Appointment!");
                } else if (r.data == 400) {
                    alert("Cannot cancel this appointment!");
                } else {
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
        this.bookedAppointment();
        this.getMentalInfo();
        this.getCouncillor();
        this.getMyId();
        this.getCalendar();
    },
    computed: {
        searchMentalInfo() {
            if (!this.search) {
                return this.mentalInfos;
            }

            return this.mentalInfos.filter(pr => pr.descript.toLowerCase().includes(this.search.toLowerCase()))
        }
    }
}).mount('#patient-user');