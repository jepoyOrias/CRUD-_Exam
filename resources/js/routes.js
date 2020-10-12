
let login = require('./components/Auth/Login.vue').default;
let register = require('./components/Auth/Register.vue').default;
let logout = require('./components/Auth/Logout.vue').default;

//Home
let home = require('./components/Dashboard/Home.vue').default;

//Membership Type
let create = require('./components/Membership_Type/create.vue').default;
let edit = require('./components/Membership_Type/edit.vue').default;


let addsubscription = require('./components/Subscription/create.vue').default;
let editsubscription = require('./components/Subscription/edit.vue').default;


export const routes = [
    { path: '/', component: login, name:'/' },
    { path: '/sign-up', component: register, name:'sign-up' },
    { path: '/logout', component: logout, name:'logout' },

    { path: '/home', component: home, name:'home' },

    { path: '/add/membership/type', component: create, name:'add-membershipType' },
    { path: '/edit/membership/type/:id', component: edit, name:'edit-membershipType' },


    //subscription
    { path: '/add/subscription', component: addsubscription, name:'subscription' },
    { path: '/edit/subscription/:id', component: editsubscription, name:'edit-subscirption' },



  ]
