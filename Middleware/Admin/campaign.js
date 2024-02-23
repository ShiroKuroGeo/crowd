const { createApp } = Vue;

createApp({
    data() {
        return {
            totalOfCampaign: 0,
            showCampaign: [],
        }
    },
    methods: {
        getAllCampaigns() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php', data)
                .then(function (r) {
                    vue.totalOfCampaign = r.data.length;
                });
        },
        showAllCampaigns() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php', data)
                .then(function (r) {
                    vue.showCampaign = [];

                    for (var cm of r.data) {
                        vue.showCampaign.push({
                            image: cm.image,
                            name: cm.name,
                            campaign_id: cm.campaign_id,
                            campaign_title: cm.campaign_title,
                            campaign_description: cm.campaign_description,
                            campaign_deadline: cm.campaign_deadline,
                            rendered_goal: cm.rendered_goal,
                            campaign_goal: cm.campaign_goal,
                            status: cm.status,
                        })
                    }
                });
        },
        preview(campaign_id) {
            window.location.href = "preview.php?id=" + campaign_id;
        },
    },
    created: function () {
        this.getAllCampaigns();
        this.showAllCampaigns();
    }
}).mount('#campaigns')