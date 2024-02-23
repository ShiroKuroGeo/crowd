const { createApp } = Vue;

createApp({
    data(){
        return{
            markDone: []
        }
    },
    methods:{
        preview(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.markDone = [];

                for(var cm of r.data){
                    if(cm.status == 3){
                        vue.markDone.push({
                            campaign_id : cm.campaign_id,
                            name : cm.name,
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
                        })
                    }
                }
            });
        },
    },
    created:function(){
        this.preview();
    }
}).mount('#marks')