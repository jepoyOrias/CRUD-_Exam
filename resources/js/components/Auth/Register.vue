<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">

                            <h1>Sign up</h1>
                        </div>
                        <div class="card-body">
                             <form class="user" @submit.prevent="signup">
                    <div class="form-group">

                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Name" v-model="form.name">
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>

                    <div class="form-group">

                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" v-model="form.email">
                        <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                        <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Confirm password" v-model="form.password_confirmation">
                        <small class="text-danger" v-if="errors.confirm_password">{{errors.password_confirmation[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div>
                             </form>
                            <hr>
                            <div class="row ml-1">
                            <router-link to="/" >Sign in Here</router-link>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {

created(){
        if(user.loggedIn()){
            this.$router.push({name: 'home'})
        }
    },

     data(){
        return{
            form: {
                name: null,
                email: null,
                password: null,
                confirm_password: null,
            },
            errors:{}
        }
    },
    methods: {
            signup(){
               axios.post('/api/auth/signup',this.form)
               .then( res => {
                   user.loginResponse(res)

                   this.$router.push({name: 'home'})
                     Toast.fire({
                        icon: 'success',
                        title: 'Account  Successfully Created'
                    })

                   })


               .catch(error => this.errors = error.response.data.errors)
            }
    }
}
</script>
