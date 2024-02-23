const { createApp } = Vue;

createApp({
    data(){
        return{
            profile: [],
        }
    },
    methods:{
        getProfileUser(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProfileUser");
            axios.post('../../Backend/Routes/regular/dashboard.php',data)
            .then(function(r){
                vue.profile = [];

                for(var p of r.data){
                    vue.profile.push({
                        name: p.name,
                        email: p.email,
                        country: p.country,
                        image: p.image,
                        totalAmount: p.totalAmount,
                    })
                }
            });
        },
        // updateProfile() {
        //     const vue = this;
        //     var data = new FormData();
        //     data.append("METHOD", "UpdateProfile");
        //     data.append("name", document.getElementById('updateName').value);
        //     data.append("email", document.getElementById('updateEmail').value);
        //     data.append("address", document.getElementById('updateAddress').value);
        
        //     axios.post('../../Backend/Routes/regular/dashboard.php', data)
        //         .then(function (r) {
        //             if (r.data == 200) {
        //                 // Use SweetAlert for success
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Update Successful',
        //                     text: 'Your profile has been updated successfully!',
        //                 }).then(() => {
        //                     vue.getProfileUser();
        //                 });
        //             } else {
        //                 // Use SweetAlert for error
        //                 Swal({
        //                     icon: 'error',
        //                     title: 'Update Failed',
        //                     text: 'Information not updated. Please try again.',
        //                 }).then(() => {
        //                     vue.getProfileUser();
        //                 });
        //             }
        //         });
        // }
        updateProfile() {
            const vue = this;
        
            // Get values from input fields
            const name = document.getElementById('updateName').value.trim();
            const email = document.getElementById('updateEmail').value.trim();
            const address = document.getElementById('updateAddress').value.trim();
        
            // Check if any of the fields is empty
            if (!name || !email || !address) {
                Swal.fire({
                    icon: 'error',
                    title: 'Update Failed',
                    text: 'Please fill in all the fields before updating your profile.',
                });
                return; // Stop execution if fields are empty
            }
        
            // Create FormData and append data
            var data = new FormData();
            data.append("METHOD", "UpdateProfile");
            data.append("name", name);
            data.append("email", email);
            data.append("address", address);
        
            // Send update request
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        // Use SweetAlert for success
                        Swal.fire({
                            icon: 'success',
                            title: 'Update Successful',
                            text: 'Your profile has been updated successfully!',
                        }).then(() => {
                            vue.getProfileUser();
                        });
                    } else {
                        // Use SweetAlert for error
                        Swal({
                            icon: 'error',
                            title: 'Update Failed',
                            text: 'Information not updated. Please try again.',
                        }).then(() => {
                            vue.getProfileUser();
                        });
                    }
                });
        }
        
    },
    created:function(){
        this.getProfileUser();
    }
}).mount('#profile')