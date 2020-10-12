<template>
    <div>

    </div>
</template>

<script>
export default {

    created(){
        if(user.loggedIn()){
             localStorage.removeItem("user");
             localStorage.removeItem("token")
            user.clear();


            this.$router.push({name: '/'})

        }
    }
}
</script>
