<template>
    <div>
        <div class="card">
            <div class="card-header">
        <h3>Membership Subscription</h3>
            </div>

            <div class="card-body">
                     <form @submit.prevent="addMemberSubscription">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control " autoComplete="off" v-model="form.name">
            </div>
            <div class="form-group">
                <label for="">Choose Membership Type</label>
                <select class="custom-select" v-model="form.subscription_id">
                    <option  v-for="sub in subs" :key="sub.id" :value="sub.id">{{sub.membershiptype_title}}</option>
                </select>
            </div>
        <router-link to="/home" class="btn btn-danger">Close</router-link>
        <button type="submit" class="btn btn-primary" >Save</button>
        </form>
            </div>


        </div>

    </div>
</template>

<script>
export default {
    created(){
        if(!user.loggedIn()){
                    this.$router.push({name: '/'})
                }

          this.getMembership();


        },
        data(){
            return{


                  form:{
                      name:'',
                    subscription_id:'',
                  },

                subs:{},


            }

        },

    methods:{
        addMemberSubscription(){
                        axios.post('/api/subscription/',this.form)
                        .then(res =>{
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Membership subscription successfully added'
                                    })
                                })
                               this.$router.push('/home')

                },
                getMembership(){
                        axios.get('/api/type')
                        .then(({data}) => this.subs = data)
                        .catch()
                },
    }
}
</script>
