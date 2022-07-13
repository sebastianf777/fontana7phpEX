const user_input = document.getElementById('user_input');
const pw_input =  document.getElementById('user_password');

$(document).ready(function() {

    function acceso_denegado() {
        document.getElementById("litheader").className = "";
        document.getElementById("go").className = "denied";
        document.getElementById("go").value = "Acceso Denegado";
        error_login.parentNode.removeChild(error_login);
        setTimeout(() => {
        document.getElementById("go").className = "";
        document.getElementById("go").value = "Autorizar";
        }, 2000);
    }

    if (error_login != undefined) {
       acceso_denegado()
    }
    
$('#go').click(function AnimacionCargando() {
    if (user_input.value != '' || pw_input.value != '') {
        document.getElementById("litheader").className = "poweron";
        document.getElementById("go").className = "";
        document.getElementById("go").value = "Inicializando...";
    }
let error_login = document.getElementById('error_login');

    if (error_login != undefined) {
        acceso_denegado()
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