const { createApp } = Vue;

createApp({
    data() {
        return {
            selectedCategories: [],
            selectUserCampaign: [],
            comments: [],
            donation: [],
            selectedDonation: [],
            needApprovalDonation: [],
            getCampaignUsingId: [],
            myDonation: [],
            allImages: '',
            gcashPicture: '',
            username: '',
            receiptProof: '',
            currentDate: '',
            createdat: '',
            profile: '',
            campaign_description: '',
            userId: 0,
            amountProof: 0,
            donationUserId: 0,
            campaignUserId: 0,
            thisCamId: 0,
        }
    },
    methods: {
        comment() {
            var searchURL = new URLSearchParams(window.location.search);
            var donationId = searchURL.get('donationId');

            if (document.getElementById('comment').value != null) {
                const vue = this;
                var data = new FormData();
                data.append("METHOD", "storeComment");
                data.append("comment", document.getElementById('comment').value);
                data.append("donationId", donationId);
                axios.post('../../Backend/Routes/regular/dashboard.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            document.getElementById('comment').value = null;
                            vue.getAllComment();
                        } else {
                            alert(r.data);
                        }
                    });
            } else {
                alert('Input fields');
            }
        },
        getAllComment() {
            var searchURL = new URLSearchParams(window.location.search);
            var donationId = searchURL.get('donationId');

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getComment");
            data.append("campaignId", donationId);
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.comments = [];

                    for (var p of r.data) {
                        vue.comments.push({
                            comment: p.comment,
                            name: p.name,
                        })
                    }
                });
        },
        getCampaignOfUser() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getCampaignOfUser");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.selectUserCampaign = [];

                    for (var p of r.data) {
                        vue.selectUserCampaign.push({
                            campaign_id: p.campaign_id,
                            image: p.image,
                            campaign_title: p.campaign_title,
                            campaign_goal: p.campaign_goal,
                            categories: p.categories,
                            location: p.location,
                            status: p.status,
                        })
                    }
                });
        },
        getNeedApprovalOfUser() {
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('id');

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getNeedApprovalOfUser");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.needApprovalDonation = [];
                    
                    for (var cm of r.data) {
                        if(cm.camp_id == id){
                            vue.needApprovalDonation.push({
                                camp_id: cm.camp_id,
                                amount: cm.amount,
                                receipt: cm.receipt,
                                campaign_title: cm.campaign_title,
                                name: cm.name,
                                created_at: cm.created_at,
                            })
                        }
                    }
                });
        },
        selectedProofDonate(id) {

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getNeedApprovalOfUser");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.selectedDonation = [];

                    for (var cm of r.data) {
                        if (cm.camp_id == id) {
                            vue.amountProof = cm.amount;
                            vue.receiptProof = cm.receipt;
                            vue.selectedDonation.push({
                                camp_id: cm.camp_id,
                                amount: cm.amount,
                                receipt: cm.receipt,
                                campaign_title: cm.campaign_title,
                                name: cm.name,
                                created_at: cm.created_at,
                            })
                        }
                    }
                });
        },
        approved(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "doGetPassApproval");
            data.append("donateId", id);
            data.append("amount", vue.amountProof);
            data.append("picture", vue.receiptProof);
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank You',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            vue.deleteApproval(id);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                });
        },
        deleteApproval(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "deleteApproval");
            data.append("id", id);
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    window.location.reload();
                });
        },
        getDonationOfUser() {
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('id');

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getDonationOfUser");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.donation = [];

                    for (var cm of r.data) {
                        if (cm.amount != 0 && cm.fk_campaign_id == id) {
                            vue.donation.push({
                                amount: cm.amount,
                                receipt: cm.receipt,
                                campaign_title: cm.campaign_title,
                                name: cm.name,
                                date_created: cm.date_created,
                                proofUrl: cm.proofUrl,
                            })
                        }
                    }
                });
        },
        getViewAllIDonated() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getViewAllIDonated");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.myDonation = [];

                    for (var cm of r.data) {
                        if (cm.amount != 0) {
                            vue.myDonation.push({
                                amount: cm.amount,
                                receipt: cm.receipt,
                                campaign_title: cm.campaign_title,
                                name: cm.name,
                                date_created: cm.date_created,
                                proofUrl: cm.proofUrl,
                            })
                        }
                    }
                });
        },
        dateToString: function (date) {
            let d = new Date(date);
            return d.toDateString();
        },
        getCampaign() {
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('cat');
            var donationId = searchURL.get('donationId');

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUserCampaign");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.selectedCategories = [];
                    vue.image = [];
                    for (var p of r.data) {
                        if (p.categories == id) {
                            if (p.status == 1)
                                vue.selectedCategories.push({
                                    fk_user_id: p.fk_user_id,
                                    campaign_id: p.campaign_id,
                                    campaign_title: p.campaign_title,
                                    categories: p.categories,
                                    rendered_goal: p.rendered_goal,
                                    campaign_goal: p.campaign_goal,
                                    location: p.location,
                                    campaign_deadline: p.campaign_deadline,
                                    campaign_description: p.campaign_description,
                                    image: p.image,
                                    validId: p.validId,
                                    gcashPicture: p.gcashPicture,
                                    status: p.status,
                                    date_created: p.date_created,
                                })
                        }
                    }
                });
        },
        getCampaignId() {
            var searchURL = new URLSearchParams(window.location.search);
            var id = searchURL.get('cat');
            var donationId = searchURL.get('donationId');

            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getUserCampaign");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.allImages = [];
                    for (var p of r.data) {
                        if (p.campaign_id == donationId) {
                            vue.allImages = p.image;
                            vue.gcashPicture = p.gcashPicture;
                            vue.donationUserId = p.fk_user_id;
                            vue.campaign_description = p.campaign_description;
                            vue.campaignUserId = p.fk_user_id;
                            vue.profile = p.profilePicture;
                            vue.username = p.name;
                            vue.createdat = p.date_created;
                        }
                    }
                });
        },
        getCampaignUsing(id) {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "dogetCampaignUsingId");
            data.append("campaignId", id);
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    vue.getCampaignUsingId = [];
                    vue.thisCamId = id;
                    for (var p of r.data) {
                        vue.getCampaignUsingId.push({
                            campaign_title: p.campaign_title,
                            categories: p.categories,
                            campaign_goal: p.campaign_goal,
                            location: p.location,
                            campaign_deadline: p.campaign_deadline,
                            campaign_description: p.campaign_description,
                            image: p.image,
                            validId: p.validId,
                            gcashPicture: p.gcashPicture,
                            status: p.status,
                            date_created: p.date_created,
                            proofUrl: p.proofUrl,
                        })
                    }
                });
        },
        goTo(da) {
            window.location.href = "donation.php?donationId=" + da;
        },
        // doDonate(id) {
        //     if (document.getElementById('amount').value != null && document.getElementById('proof').files[0] != null) {
        //         const vue = this;
        //         var data = new FormData();
        //         data.append("METHOD", "doDonate");
        //         data.append("donateId", id);
        //         data.append("amount", document.getElementById('amount').value);
        //         data.append("proof", document.getElementById('proof').files[0]);
        //         axios.post('../../Backend/Routes/regular/dashboard.php', data)
        //             .then(function (r) {
        //                 if (r.data == 200) {
        //                     alert('Donate Successfully');
        //                     document.getElementById('amount').value = null;
        //                     document.getElementById('proof').value = null;
        //                     document.getElementById('check').classList.remove('visually-hidden');
        //                 } else {
        //                     document.getElementById('uncheck').classList.remove('visually-hidden');
        //                 }
        //             });
        //     } else {
        //         alert('Input fields');
        //     }
        // },
        doDonate(id) {
            if (document.getElementById('amount').value != null && document.getElementById('proof').files[0] != null) {
                const vue = this;
                var data = new FormData();
                data.append("METHOD", "doDonate");
                data.append("donateId", id);
                data.append("amount", document.getElementById('amount').value);
                data.append("proof", document.getElementById('proof').files[0]);

                axios.post('../../Backend/Routes/regular/dashboard.php', data)
                    .then(function (r) {
                        if (r.data == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thank You',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            document.getElementById('amount').value = null;
                            document.getElementById('proof').value = null;
                            document.getElementById('check').classList.remove('visually-hidden');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });

                            document.getElementById('uncheck').classList.remove('visually-hidden');
                        }
                    });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Input fields are required',
                });
            }
        },
        getProfileUser() {
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "getProfileUser");
            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    for (var p of r.data) {
                        vue.userId = p.user_id;
                    }
                });
        },
        updateThisCampaign(e) {
            e.preventDefault();
            const vue = this;
            var form = e.currentTarget;
            var data = new FormData(form);
            data.append("METHOD", "doUpdateUserCampaign");

            axios.post('../../Backend/Routes/regular/dashboard.php', data)
                .then(function (r) {
                    if (r.data == 200) {
                        // Use SweetAlert for success
                        Swal.fire({
                            icon: 'success',
                            title: 'Update Successful',
                            text: 'Campaign has been updated successfully!',
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        // Use SweetAlert for error
                        Swal({
                            icon: 'error',
                            title: 'Update Failed',
                            text: 'Error: ' + r.data,
                        });
                    }
                });
        },
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
        this.getAllComment();
        this.getProfileUser();
        this.getCampaignId();
        this.getViewAllIDonated();
        this.getCampaignOfUser();
        this.getDonationOfUser();
        this.getNeedApprovalOfUser();
        this.getCampaignUsing();
    }
}).mount('#preview')