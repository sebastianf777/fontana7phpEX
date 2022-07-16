function saveFunction(){
    let checkboxes = document.querySelectorAll('.fecha_checkbox'); // <-- select the checkboxes
    let checked = {};
for (let i = 0; i < checkboxes.length; i += 1) {
if (checkboxes[i].checked) {
    // localStorage.setItem(checkboxes[i].name, checkboxes[i].value)
    checked[checkboxes[i].name] = checkboxes[i].value;
}
// <-- no need for else, because we simply override
}
localStorage.setItem('checked_boxes', JSON.stringify(checked)); // <-- localStorage can only store `String` values
}
// $( document ).ready(function() {
    
// });
$( window ).on( "load", function() {
  
    // let checkboxElements = {};
    // let checkboxElements = JSON.parse(localStorage.getItem('checked_boxes')) || {};
    // let arrayChecboxElements = Object.entries(checkboxElements);
    
    (function restoreCheckboxes () {
        let checkboxes = document.querySelectorAll('.fecha_checkbox'); // <-- select the checkboxes
        let checkboxStates = localStorage.getItem('checked_boxes');

        if (checkboxStates) {
           checkboxStates = JSON.parse(checkboxStates); // <-- parse string to object
          for (let i = 0; i < checkboxes.length; i += 1) {
              if (checkboxStates.hasOwnProperty(checkboxes[i].name)) {
              checkboxes[i].checked = true;
            }
          }
        }
      })();
    let fecha_vendedores = $(".fecha_vendedores");
    // let fecha_vendedores = $(".fecha_vendedores").filter((i, v) => parseInt($(v).text().substr(9, 10), 10) % 2);
    fecha_vendedores.parents('.tr_fecha-label-checkbox').addClass("tr_color");
    let fecha_vendedores_texto;
    let tiene_color_2_el_anterior = false;

    fecha_vendedores.each(function (index, element) {

    if ( fecha_vendedores_texto == undefined) {

        fecha_vendedores_texto =  $( element ).text();

    }else if ($( element ).text() != fecha_vendedores_texto){
        fecha_vendedores_texto = $( element ).text();
        
       if (tiene_color_2_el_anterior == true) {
         tiene_color_2_el_anterior = false;}else{
      $( element ).parents('.tr_fecha-label-checkbox').toggleClass("tr_color tr_color_2")
      tiene_color_2_el_anterior = true;
     }

    }else{
        if (tiene_color_2_el_anterior == true && $( element ).text() == fecha_vendedores_texto) {


        $( element ).parents('.tr_fecha-label-checkbox').toggleClass("tr_color_2 tr_color");
        }
    }
    // $(".fecha_checkbox").click(function savefunction(e){
    //     let checkboxes = document.querySelectorAll('.fecha_checkbox'); // <-- select the checkboxes
    //     for (let i = 0; i < checkboxes.length; i += 1) { // <-- iterate
    //       if (checkboxes[i].checked) {
    //         // store values  
    //         localStorage.setItem(e[i].name, e[i].value); // <-- stores a value
    //       } 
    //       else { 
    //         // <-- this branch is optional (I don't know if you need it)
    //     //     // remove previously stored values
    //     if (localStorage.getItem(e[i].name)) { // <-- check for existance
    //     localStorage.removeItem(e[i].name); // <-- remove a value
    //     }
    //      }
    //     }
    //   })


//       fecha_checkbox.click(function savefunction(){
//         let checkboxes = document.querySelectorAll('.fecha_checkbox'); // <-- select the checkboxes
//         let checked = {};
//   for (let i = 0; i < checkboxes.length; i += 1) {
//     if (checkboxes[i].checked) {
//         console.log(this.name)
//         console.log(this.value)
//       this[i].name =this[i].value;
//     }
//     // <-- no need for else, because we simply override
//   }
//   localStorage.setItem('checked_boxes', JSON.stringify(checked)); // <-- localStorage can only store `String` values
// })
    

});




    // $( this ).css('background-color', fecha_variante_color)
})

// let fecha_vendedores = $(".fecha_vendedores")
// fecha_vendedores.each(function () {
//     if (`($( this ).text().substr(9, 10), 10) % 2)` !== 0) {
//         $( this ).parents('.tr_fecha-label-checkbox').addClass("tr_color")
//     }
     
// })
