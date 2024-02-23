const { createApp } = Vue;

createApp({
    data(){
        return{
            totalOfUsers: 0,
            totalOfAdmin: 0,
            totalOfDonation: 0,
            totalOfCampaign: 0,
            goalDonation: 0,
            showCampaign: [],
            users: [],
        }
    },
    methods:{
        getAllUser(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllUser");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.totalOfUsers = r.data.length;
                for(var us of r.data){
                    if(us.user_type == 2){
                        vue.totalOfAdmin = (vue.totalOfAdmin + us.user_type) - 1 ;
                    }
                }
            });
        },
        getAllDonations(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllDonations");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.totalOfDonation = r.data.length;
            });
        },
        getAllCampaigns(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.totalOfCampaign = r.data.length;
            });
        },
        showAllCampaigns(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllCampaigns");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.showCampaign = [];

                    for(var cm of r.data){
                        vue.showCampaign.push({
                            name: cm.name,
                            campaign_title: cm.campaign_title,
                            rendered_goal:  cm.rendered_goal,
                            campaign_goal:  cm.campaign_goal,
                        })
                    }
            });
        },
        showAllUsers(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllUser");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.users = [];

                for(var sr of r.data){
                    vue.users.push({
                        name: sr.name,
                        email: sr.email,
                        country: sr.country,
                        is_logged: sr.is_logged,
                        user_type: sr.user_type,
                    })
                }
            });
        },
        getChart:function() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getAllColumnTable");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                var chartData = [];

                r.data.forEach(function(d){
                    chartData.push({
                        'total': d.total,
                    })
                });
                var xValues = ['Users', 'Campaign', 'Donations'];
                var barColors = [
                    '#b91d47',
                    '#00aba9',
                    '#2b5797',
                ];

                new Chart("myChart", {
                    type: 'pie',
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: chartData.map(row => row.total)
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'World Wide Wine Production'
                        }
                    }
                });
            });
        },
    },
    created(){
        this.getAllUser();
        this.getAllCampaigns();
        this.getAllDonations();
        this.showAllUsers();
        this.showAllCampaigns();
        this.getChart();
    }
}).mount('#indexs')