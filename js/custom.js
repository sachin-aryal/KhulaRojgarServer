/**
 * Created by sachin on 12/31/2015.
 */

function reload(){
    document.location.reload(true);
}

function displayMessage(message,messageType){
    noty({layout: 'topRight', text: message, type: messageType, timeout: 10000});
}

function clearDiv(divId,type){
    if(type=="class"){
        $("."+divId).empty()
    }else{
        $("#"+divId).empty()
    }
}

function validateUserForm(){
    var data ={username:$("#username").val(),password:$("#password").val(),role:$("#role").val()};
    var rv = true;
    $.each(data,function(key,val){
        var name = key;
        var value = val;
        if(!value){
            name = name[0].toUpperCase()+name.substring(1,name.length);
            displayMessage(name+ " is required field","error");
            rv=false;
            return false;
        }
    });
    if(!rv){
        return rv;
    }
    $.each(data,function(key,val){
        var name = key;
        var value = val;

        if(value.length<6){
            name = name[0].toUpperCase()+name.substring(1,name.length);
            displayMessage(name+ " length should be greater or equal to 6",'error');
            rv=false;
            return false;
        }

        if(name=="username"){
            var userNameReg =/^[a-zA-Z]{3,}[\.\-_]?[a-zA-Z0-9]{3,}$/;
            if(!value.match(userNameReg)){
                displayMessage("Username did not match the pattern(Start with alphabets(3 at least) and . or - or _ (only one or none) and end with alphabets or numeric(at least 3))","error")
                rv=false;
                return false;
            }
        }
    });
    if(!rv){
        return rv;
    }
    return true;
}


function clearDataFolder() {
    var n = noty({
        layout: 'center',
        text: "Are you sure? Don't do this process if report generation process in ongoing.",
        killer: true,
        buttons: [
            {
                addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {

                n.close();
                blockUi();
                displayMessage("System is clearing unnecessary data please do not generate report for some time!", "warning");
                blockUi();
                $.ajax({
                    type: 'POST',
                    url: hUrl.clearData,
                    success: function (data) {
                        displayMessage("System is ready. You can proceed", "information");
                        unBlockUi();
                    },
                    error: function (error) {
                        displayMessage("System is ready. You can proceed", "information");
                        unBlockUi();
                    }

                });
            }
            },
            {
                addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                n.close();
            }
            }
        ]
    })
}