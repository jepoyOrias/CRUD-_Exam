<template>
    <div >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">

                            <h1>Sign in</h1>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="login">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="form.email">
                                    <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.password">
                                    <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                                </div>

                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                            <hr>
                            <div class="row ml-1">
                            <router-link to="/sign-up">Create account</router-link>
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
                email: '',
                password:'',
            },
            errors:{},
        }
    },
    methods: {
            login(){
               axios.post('/api/auth/login',this.form)
               .then( res => {

                   user.loginResponse(res)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })

                   this.$router.push({name: 'home'})
                   })

               .catch(error => this.errors = error.response.data.errors)
               .catch(
                   Toast.fire({
                        icon: 'error',
                        title: 'Invalid email or password is'
                    })
               )
            }
    }

}
</script>
<style  scoped>
        hr{

            border: 1px solid gray;
        }
 </style>
