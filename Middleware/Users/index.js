const { createApp } = Vue;

createApp({
    data() {
        return {
            campaign: [],
            currentDate: '',
            currentDate2: '',
        }
    },
    methods: {
        getContactUs: function (e) {
            e.preventDefault();
            const vue = this;
            var form = e.currentTarget;
            var data = new FormData(form);
            data.append("METHOD", "getContactUs");
        
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Contacting',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        }).then(function () {
                            window.location.reload();
                        });
                    } else {
                        Swal({
                            icon: 'error',
                            title: 'Error',
                            text: r.data
                        });
                    }
                });
        },
        getCampaign() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUserCampaign");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.campaign = [];
                    for (var p of r.data) {
                        if (p.status == 1) {
                            vue.campaign.push({
                                campaign_id: p.campaign_id,
                                name: p.name,
                                campaign_title: p.campaign_title,
                                categories: p.categories,
                                campaign_goal: p.campaign_goal,
                                rendered_goal: p.rendered_goal,
                                location: p.location,
                                campaign_deadline: p.campaign_deadline,
                                campaign_description: p.campaign_description,
                                image: p.image,
                                status: p.status,
                                date_created: p.date_created,
                            })
                        }
                    }
                });
        },
        goTo(da) {
            window.location.href = "donation.php?donationId=" + da;
        },
        updateCampaign() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getCampaign");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    for (var p of r.data) {
                        const dateString = p.campaign_deadline;
                        const campaignDate = new Date(dateString);
                        const nowYear = campaignDate.getFullYear();
                        const nowMonth = campaignDate.getMonth() + 1;
                        const nowDay = campaignDate.getDate();
                        const paddedMonth = nowMonth < 10 ? `0${nowMonth}` : nowMonth;
                        const campaDate = `${nowYear}-${paddedMonth}-${nowDay}`;

                        vue.currentDate = vue.currentDateMethod;
                        vue.currentDate2 = campaDate;

                        if (vue.currentDateMethod == campaDate) {
                            const vue = this;
                            var data = new FormData();
                            data.append("METHOD", "updateCampaign");
                            data.append("due", campaDate);
                            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                                .then(function (r) {

                                });
                        }

                    }
                });
        }
    },
    computed: {
        currentDateMethod() {
            const currentDate = new Date();
            const years = currentDate.getFullYear();
            const months = currentDate.getMonth() + 1;
            const days = currentDate.getDate();

            return `${years}-${months}-${days}`;
        },
    },
    created: function () {
        this.getCampaign();
        this.updateCampaign();
    }
}).mount('#index')