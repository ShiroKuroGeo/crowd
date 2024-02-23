const { createApp } = Vue;

createApp({
    data(){
        return{
            
        }
    },
    methods:{
        loginForm:function(){
            var data = new FormData();
            data.append("METHOD","login");
            data.append("Username", document.getElementById('email').value);
            data.append("Password", document.getElementById('password').value);
            axios.post('Backend/Routes/user.php',data)
            .then(function(r){
                if(r.data == 1){
                    window.location.href = "Frontend/users/index.php";
                }else if(r.data == 2){
                    window.location.href = "Frontend/Admin/index.php";
                }else{
                    document.getElementById('wrongValidations').classList.remove('visually-hidden');
                }
            });
        },
        registerForm:function(){
            if(document.getElementById('gcashqrcode').value != '' && document.getElementById('name').value != '' && document.getElementById('registerEmail').value != '' && document.getElementById('registerpPassword').value != '' && document.getElementById('country').value != ''){
                if(document.getElementById('registerpPassword').value == document.getElementById('confirm').value){
                    var data = new FormData();
                    data.append("METHOD","register");
                    data.append("gcashqrcode", document.getElementById('gcashqrcode').files[0]);
                    data.append("name", document.getElementById('name').value);
                    data.append("email", document.getElementById('registerEmail').value);
                    data.append("password", document.getElementById('registerpPassword').value);
                    data.append("confirm", document.getElementById('confirm').value);
                    data.append("country", document.getElementById('country').value);
                    axios.post('Backend/Routes/user.php',data)
                    .then(function(r){
                        if(r.data == 200){
                            alert('Successfully Registered');
                            window.location.reload();
                        }else{
                            alert('Register not successfull');
                        }
                    });
                }else{
                    document.getElementById('alertPassword').classList.remove('visually-hidden');
                }
            }else{
                document.getElementById('emptyFields').classList.remove('visually-hidden');
            }
        },
    },
    created:function(){

    }
}).mount('#IndexForm')