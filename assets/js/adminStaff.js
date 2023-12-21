const { createApp } = Vue;

createApp({
    data() {
        return {
            username: '',
            email: '',
            password: '',
            role: '0',
            users: [],
            id: 0
        }
    },
    methods: {
        addStaff: function (e) {
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method", "addStaff");

            axios.post('../../includes/adminStaff.php', data)
                .then(function (r) {
                    if (r.data == 0) {
                        alert('User Added successfully ');
                        vue.getStaff();
                        document.querySelector(".userform").reset();
                    }
                    else if (r.data == 1) {
                        alert('user already exists');
                    }
                    else {
                        alert("Error saving user");
                    }
                });

        },

        getUsers: function () {
            var data = new FormData();
            const vue = this;
            data.append('method', 'getUsers');
            axios.post('../../includes/adminStaff.php', data)
                .then(function (r) {
                    vue.users = [];
                    for (var v of r.data) {
                        vue.users.push({
                            id: v.user_id,
                            username: v.username,
                            email: v.email,
                            role: v.role,
                            status: v.status,
                        })
                    }
                })
        },
        saveUser: function (e) {
            e.preventDefault();
            var form = e.currentTarget;

            //const vue = this;
            var data = new FormData(form);
            data.append("method", "saveUser");
            axios.post('../../includes/register.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        alert('User Register successfully ');
                        window.location.reload();
                    }
                    else if (r.data == 400) {
                        alert('User already exists');
                    }
                    else {
                        alert("Error saving user");
                    }
                });

        },
        deleteStaff: function (id) {
            if (confirm("Are you sure you want to delete this user?")) {
                var data = new FormData();
                const vue = this;
                data.append("method", "deleteStaff");
                data.append("id", id);
                axios.post('../../includes/adminStaff.php', data)
                    .then(function (r) {
                        if (r.data == 1) {
                            alert('Successfully Delete!');
                            window.location.reload();
                        } else {
                            alert(r.data);
                        }
                    })
            }
        },

        getStaffById: function (id) {
            var data = new FormData();
            const vue = this;
            data.append('method', 'getStaffById');
            data.append("id", id);
            axios.post('../../includes/adminStaff.php', data)
                .then(function (r) {
                    for (var v of r.data) {
                        vue.username = v.username;
                        vue.email = v.email;
                        vue.role = v.role;
                        vue.id = v.user_id;
                    }
                })
        },

        updateStaff: function (e) {
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method", "updateStaff");
            data.append("id", this.id);
            axios.post('../../includes/adminStaff.php', data)
                .then(function (r) {
                    if (r.data == 1) {
                        alert('User successfully updated');
                        vue.getStaff();
                        document.querySelector(".userform").reset();
                    }

                });

        },
    },
    created: function () {
        this.getUsers();
    }
}).mount('#addStaff-app');