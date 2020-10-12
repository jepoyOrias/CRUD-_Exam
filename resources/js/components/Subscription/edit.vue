<template>
    <div>
        <div class="card">
            <div class="card-header">
        <h3>Membership Subscription</h3>
            </div>

            <div class="card-body">
                     <form @submit.prevent="updateSusbscription">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" v-model="form.name">
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
            let id = this.$route.params.id
            axios.get('/api/subscription/'+id)
            .then(({data}) => (this.form = data))
            .catch(
                console.log('error')
            )

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
        updateSusbscription(){
                    let id = this.$route.params.id
                        axios.patch('/api/subscription/'+id,this.form)
                        .then(res =>{
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Membership subscription up-to-date'
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
