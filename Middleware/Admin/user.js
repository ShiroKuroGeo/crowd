const { createApp } = Vue;

createApp({
    data(){
        return{
            users: [],
            usersStatus: '',
            selectedId: [],
        }
    },
    methods:{
        getAllUser(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllUser");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.users = [];

                for(var sr of r.data){
                    vue.users.push({
                        user_id: sr.user_id,
                        name: sr.name,
                        email: sr.email,
                        country: sr.country,
                        image: sr.image,
                        is_logged: sr.is_logged,
                        user_type: sr.user_type,
                    })
                }
                
                if(r.data.length == 0){
                    vue.usersStatus = false;
                }else {
                    vue.usersStatus = true;
                }
            });
        },
        selectedUser(user_id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllUser");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.selectedId = [];

                for(var sr of r.data){
                    if(sr.user_id == user_id){
                        vue.selectedId.push({
                            user_id: sr.user_id,
                            name: sr.name,
                            email: sr.email,
                            country: sr.country,
                            image: sr.image,
                            is_logged: sr.is_logged,
                            user_type: sr.user_type,
                        })
                    }
                }
            });
        },
        deleteID(user_id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deleteId");
            data.append("ID", user_id);
        
            axios.post('../../Backend/Routes/admin/dashboard.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        // Use SweetAlert for success
                        Swal.fire({
                            icon: 'success',
                            title: 'Delete Successful',
                            text: 'The user has been successfully deleted!',
                        }).then(() => {
                            vue.windowReload();
                        });
                    } else {
                        // Use SweetAlert for error
                        Swal({
                            icon: 'error',
                            title: 'Delete Denied',
                            text: 'Deletion denied. Please try again.',
                        }).then(() => {
                            vue.windowReload();
                        });
                    }
                });
        },
        windowReload(){
            location.reload();
        }
    },
    created:function(){
        this.getAllUser();
    }
}).mount('#users')