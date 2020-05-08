<template>
    <div class="container">
       <form id="login-form" @submit.prevent="login" class="form" action="" method="post">
            <h3 class="text-center text-info">Đăng nhập</h3>
            <div class="form-group">
                <label for="email" class="text-info">Email:</label><br>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="password" id="password" class="form-control" placeholder="******" v-model="password" required>
            </div>
            <div class="form-group">
                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</template>
<style type="text/css" scoped="true">
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
        margin-left: 12px;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<script>
    export default {
        data(){
        return {
            email: null,
            password: null,
            error: false
        }
        },
        methods: {
            login(){
                var app = this
                axios.post('/login', {
                    email: app.email,
                    password: app.password
                })
                .then(response => {
                    this.$router.push({path:'/dashboard'})
                })
                .catch(error => {
                })      
            },
        }
    } 
</script>