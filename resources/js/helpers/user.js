import token from './token'
import tokenStorage from './tokenStorage'

class user{

    loginResponse(res){
            const access_token = res.data.access_token
            const username  = res.data.email


            if (token.isValid(access_token)){
                tokenStorage.store(access_token,username)
            }


    }

    hasToken(){
         const storeToken = localStorage.getItem('token')
         if(storeToken){
             return token.isValid(storeToken) ? true : false
         }
         false
    }


    loggedIn(){
        return this.hasToken()
    }

    name(){
        if(this.loggedIn()){
            return tokenStorage.getItem('user')
        }
    }
    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

}



export default user  = new user()
