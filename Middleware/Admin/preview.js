const { createApp } = Vue;

createApp({
    data(){
        return{
            selectedCampaign: [],
            statusShow: true,
            profile: [],
        }
    },
    methods:{
        updateUser(id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","updateUserStatus");
            data.append("user_id",id);
            data.append("status",document.getElementById('select').value);
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                if(r.data == 200){
                    alert('Updated');
                }else{
                    alert(r.data);
                }
            });
        },
        getProfileUser(){
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('userId');

            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProfileUser");
            data.append("user_id",id);
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
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
        preview(){
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('id');

            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.selectedCampaign = [];

                for(var cm of r.data){
                    if(cm.campaign_id == id){
                        vue.selectedCampaign.push({
                            name: cm.name,
                            userId: cm.fk_user_id,
                            campaign_id: cm.campaign_id,
                            campaign_title: cm.campaign_title,
                            campaign_description: cm.campaign_description,
                            campaign_deadline:  cm.campaign_deadline,
                            rendered_goal:  cm.rendered_goal,
                            campaign_goal:  cm.campaign_goal,
                            date_created:  cm.date_created,
                            location:  cm.location,
                            categories:  cm.categories,
                            image:  cm.image,
                            status:  cm.status,
                            gcashPicture: cm.gcashPicture,
                            validId: cm.validId,
                        })
                        if(cm.status != 0){
                            vue.statusShow = false;
                        }
                    }
                }
            });
        },
        accepted(id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","updateCampaign");
            data.append("id",id);
            data.append("status",1);
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                if(r.data == 200){
                    alert("Accepted");
                    vue.preview();
                }else{
                    alert(r.data);
                }
            });
        },
        done(id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","updateCampaign");
            data.append("id",id);
            data.append("status",3);
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                if(r.data == 200){
                    alert("Mark as Done");
                    vue.preview();
                }else{
                    alert(r.data);
                }
            });
        },
        rejected(id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","updateCampaign");
            data.append("id",id);
            data.append("status",2);
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                if(r.data == 200){
                    alert("Campaign Decline");
                    vue.preview();
                }else{
                    alert(r.data);
                }
            });
        },
    },
    created:function(){
        this.preview();
        this.getProfileUser();
    }
}).mount('#previews')