<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h3>Add new membership type</h3>
             <form @submit.prevent="addMembershipType">
            <div class="form-group">
                <label for="exampleInputEmail1">Membership Title</label>
                <input type="text" class="form-control" v-model="form.membershiptype_title">
                  <small class="text-danger" v-if="errors.membershiptype_title">{{errors.membershiptype_title[0]}}</small>
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Membership Description</label>
                <input type="text" class="form-control" v-model="form.membershiptype_description">
                  <small class="text-danger" v-if="errors.membershiptype_description">{{errors.membershiptype_description[0]}}</small>
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" v-model="form.membershiptype_price">
                 <small class="text-danger" v-if="errors.membershiptype_price">{{errors.membershiptype_price[0]}}</small>
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


        },
        data(){
            return{
                form:{
                    membershiptype_title:'',
                    membershiptype_description:'',
                    membershiptype_price:'',
                },
                errors:{}

            }

        },

    methods:{
        addMembershipType(){
                        axios.post('/api/type/',this.form)
                        .then(res =>{

                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Membership type successfully added'
                                    })
                                    this.$router.push('/home')
                                })
                        .catch(error => this.errors = error.response.data.errors)

                },
    }
}
</script>
