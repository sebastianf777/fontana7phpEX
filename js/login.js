

$(document).ready(function() {

    
$('#go').click(function AnimacionCargando() {
    document.getElementById("litheader").className = "poweron";
            document.getElementById("go").className = "";
            document.getElementById("go").value = "Initializing...";
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