

$(document).ready(function() {

    
$('#go').click(function AnimacionCargando() {
let error_login = document.getElementById('error_login');
    if (error_login != undefined) {
        document.getElementById("litheader").className = "";
        document.getElementById("go").className = "denied";
        document.getElementById("go").value = "Access Denied";
        error_login.parentNode.removeChild(error_login);
    }else{
        document.getElementById("litheader").className = "poweron";
        document.getElementById("go").className = "";
        document.getElementById("go").value = "Inicializando...";
    }
        
})

    //$("input:text:visible:first").focus();
    // let state = false;
    // $('#accesspanel').on('submit', function(e) {

    //     e.preventDefault();

    //     state = !state;

    //     if (state) {
    //         document.getElementById("litheader").className = "poweron";
    //         document.getElementById("go").className = "";
    //         document.getElementById("go").value = "Initializing...";
    //     }else{
    //         document.getElementById("litheader").className = "";
    //         document.getElementById("go").className = "denied";
    //         document.getElementById("go").value = "Access Denied";
    //     }

    // });

});