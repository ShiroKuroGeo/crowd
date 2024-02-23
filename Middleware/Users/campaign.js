const { createApp } = Vue;

createApp({
    data(){
        return{

        }
    },
    methods:{
        // storeCampaign:function(e){
        //     e.preventDefault();
        //     const vue = this;
        //     var data = e.currentTarget;
        //     var data = new FormData(data);
        //     data.append("METHOD","storeCampaign");
        //     axios.post('../../Backend/Routes/regular/dashboard.php',data)
        //     .then(function(r){
        //         if(r.data == 200){
        //             alert("Created Successfully");
        //             window.location.href = "/crowd/Frontend/users/storeDonation.php";
        //             document.getElementById('check').classList.remove('visually-hidden');
        //         }else{
        //             document.getElementById('uncheck').classList.remove('visually-hidden');
        //         }
        //     });
        // }
        storeCampaign: function (e) {
            e.preventDefault();
            const vue = this;
            var data = e.currentTarget;
            var formData = new FormData(data);
            formData.append("METHOD", "storeCampaign");
        
            axios.post('../../Backend/Routes/regular/dashboard.php', formData)
                .then(function (r) {
                    if (r.data == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Created Successfully',
                            showConfirmButton: false,
                            timer: 3000 // 3 seconds
                        }).then(function () {
                            // Reload the page after 3 seconds
                            window.location.reload();
                        });
        
                        document.getElementById('check').classList.remove('visually-hidden');
                    } else {
                        Swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
        
                        document.getElementById('uncheck').classList.remove('visually-hidden');
                    }
                });
        },
               
    },
    created:function(){

    }
}).mount('#campaign')