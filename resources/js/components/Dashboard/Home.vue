<template>
    <div>
        <nav>
            <div class="row justify-content-end">
                  <router-link to="/logout" class="btn btn-danger">Logout</router-link>
            </div>
        </nav>
        <h1 id="info">Welcome Back</h1>
        <h1 id="info">{{infos}}</h1>
        <router-link to="/add/subscription" class="btn btn-success"  >Add Subscription</router-link>
        <h2 class="row mt-5 ml-2">Membership</h2>



            <!-- TABLE -->


                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body">
                               <table class="table">
                            <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Membership Type</th>
                            <th scope="col">Subscription Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="sub in subs" :key="sub.id">
                            <td>{{sub.name}}</td>
                            <td>{{sub.membershiptype_title}}</td>
                            <td>{{sub.membership_date}}</td>
                            <td>
                                <router-link :to="{name: 'edit-subscirption', params:{id:sub.id}}" class="btn btn btn-primary">Edit</router-link>
                                <a @click="deleteSubs(sub.id)" class="btn btn btn-danger"><font color="#fff">Delete</font></a>
                            </td>
                            </tr>
                        </tbody>
                        </table>


                        </div>
                    </div>
                    </div>

                </div>

    <div class="row justify-content-end mt-5 mb-2">

        <router-link to="/add/membership/type" class="btn btn-success"  >Add Membership Type</router-link>
    </div>
        <div class="row mt-5">
            <div class="col-md-4" v-for="type in types" :key="type.id">
                <div class="card mb-5">
                    <div class="card-header bronze">
                            <h3>{{type.membershiptype_title}}</h3>
                    </div>
                    <div class="card-body">
                            <p>{{type.membershiptype_description}}</p>
                           <p>${{type.membershiptype_price}}</p>
                        </div>
                        <div class="row mb-2 mt-2 ml-2">
                            <div class="col-6">
                                <router-link :to="{name: 'edit-membershipType', params:{id:type.id}}" class="btn btn btn-primary">Edit</router-link>
                                                 <a @click="deleteType(type.id)" class="btn btn btn-danger"><font color="#fff">Delete</font></a>
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
        if(!user.loggedIn()){
                    this.$router.push({name: '/'})
                }
            this.getMembership()
            this.getSubscription()

        },
        data(){
            return{
                infos: localStorage.getItem("user"),
                form:{
                    membershiptype_title:'',
                    membershiptype_description:'',
                    membershiptype_price:'',

                },
                memberships:'',
                subscription:'',
                types:'',
                subs:'',


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
                                })
                                this.dismiss = "modal";
                                this.form ={};

                },
                getMembership(){
                        axios.get('/api/type')
                        .then(({data}) => this.types = data)
                        .catch()
                },
                 deleteType(id){
                Swal.fire({
                title: 'Are you sure you want to delete this data?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/type/'+id)
                    .then(()=>{

                        this.types = this.types.filter(type => {
                            return type.id != id

                        })

                    }

                    )
                    .catch(()=>{

                    })
                    Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )

                }
                    })
            },
            getSubscription(){
                        axios.get('/api/subscription')
                        .then(({data}) => this.subs = data)
                        .catch()
                },
                 deleteSubs(id){
                Swal.fire({
                title: 'Are you sure you want to delete this data?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/subscription/'+id)
                    .then(()=>{

                        this.subs = this.subs.filter(sub => {
                            return sub.id != id

                        })

                    }

                    )
                    .catch(()=>{

                    })
                    Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                            )

                }
                    })
            },
        }
}
</script>

<style scoped>

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  min-height: 300px;
  max-height: 300px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.bronze{
    background-color: #318fb5;
    color: white;
}



</style>
