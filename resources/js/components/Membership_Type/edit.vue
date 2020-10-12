<template>
    <div>
        <div class="card">
            <div class="card-body">
             <form @submit.prevent="updateMembershipType">
            <div class="form-group">
                <label for="exampleInputEmail1">Membership Title</label>
                <input type="text" class="form-control" v-model="form.membershiptype_title">
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Membership Description</label>
                <input type="text" class="form-control" v-model="form.membershiptype_description">
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" v-model="form.membershiptype_price">
            </div>



      <router-link to="/home" class="btn btn-danger">Close</router-link>
        <button type="submit" class="btn btn-primary" :data-dismiss="dismiss">Save</button>
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
            axios.get('/api/type/'+id)
            .then(({data}) => (this.form = data))
            .catch(
                console.log('error')
            )

        },
        data(){
            return{
                form:{
                    membershiptype_title:'',
                    membershiptype_description:'',
                    membershiptype_price:'',
                },

            }

        },

    methods:{
        updateMembershipType(){
                let id = this.$route.params.id
                axios.patch('/api/type/'+id,this.form)
                .then(()=>{
                    this.$router.push('/home');
                    Notification.updateSuccess();
            })
            .catch(error => this.errors = error.response.data.errors)


                },
    }
}
</script>
