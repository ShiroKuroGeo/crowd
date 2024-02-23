const { createApp } = Vue;

createApp({
    data(){
        return{
            donation: []
        }
    },
    methods:{
        getDonationWithUserAndCampaigns(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getDonationWithUserAndCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.donation = [];

                for(var cm of r.data){
                    if(cm.amount != 0){
                        vue.donation.push({
                            amount: cm.amount,
                            receipt: cm.receipt,
                            campaign_title:  cm.campaign_title,
                            name:  cm.name,
                            date_created:  cm.date_created,
                        })
                    }
                }
            });
        }
    },
    created:function(){
        this.getDonationWithUserAndCampaigns();
    }
}).mount('#donations')