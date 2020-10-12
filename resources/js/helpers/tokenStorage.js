class tokenStorage{


    storeToken(token){
        localStorage.setItem('token',token);
    }

    storeUser(user){
        localStorage.setItem('user',user);
    }



    store(token,user,email){

        this.storeToken(token)
        this.storeUser(user)
    }

    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    getToken(){
        localStorage.getItem('token')
        localStorage.getItem('user')
    }

}

export  default tokenStorage = new tokenStorage();
