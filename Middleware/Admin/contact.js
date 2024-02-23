const { createApp } = Vue;

createApp({
    data(){
        return{
            contact: [],
            message: ''
        }
    },
    methods:{
        getContact(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getContact");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                vue.contact = [];

                for(var cm of r.data){
                    vue.contact.push({
                        contact_id: cm.contact_id,
                        name: cm.name,
                        email: cm.email,
                        address: cm.address,
                    })
                }
            });
        },
        toModal(contact_id){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getContact");
            axios.post('../../Backend/Routes/admin/dashboard.php',data)
            .then(function(r){
                for(var cm of r.data){
                    if(cm.contact_id == contact_id){
                        vue.message = cm.message
                    }
                }
            });
        }
    },
    created:function(){
        this.getContact();
    }
}).mount('#contact')