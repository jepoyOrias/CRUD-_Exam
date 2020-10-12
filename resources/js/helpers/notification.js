class notification{

    signinSuccess(){
        new Noty({

            type:'success',
            layout:'topCenter',
            text: 'Signed in successfuly',
            timeout: 1000,

        }).show();
    }
    notSignin(){
        new Noty({

            type:'danger',
            layout:'topCenter',
            text: 'Email or Password is invalid',
            timeout: 1000,

        }).show();
    }

    success(){
        new Noty({

            type:'success',
            layout:'topCenter',
            text: 'Successfully Done',
            timeout: 1000,

        }).show();
    }
    updateSuccess(){
        new Noty({

            type:'success',
            layout:'center',
            text: 'Info is now Up-to-date',
            timeout: 2000,

        }).show();
    }
}

export  default Notification = new notification();
