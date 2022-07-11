
$( document ).ready(function() {
    
// if (fecha_vendedores  !== 0) {
// fecha_vendedores.parents('.tr_fecha-label-checkbox').addClass("tr_color")

// }

$( window ).on( "load", function() {
    let fecha_vendedores = $(".fecha_vendedores").filter((i, v) => parseInt($(v).text().substr(9, 10), 10) % 2)
    fecha_vendedores.parents('.tr_fecha-label-checkbox').addClass("tr_color");
    let fecha_vendedores_texto;
    let tiene_color_2_el_anterior = false;


    fecha_vendedores.each(function () {

    
    // if ($( this ).parents('.tr_fecha-label-checkbox').hasClass('tr_color_2') = true) {
    //     tiene_color_1 = false;
    // }

    if ( fecha_vendedores_texto == undefined) {

        fecha_vendedores_texto =  $( this ).text();

    }else if ($( this ).text() != fecha_vendedores_texto){
        fecha_vendedores_texto = $( this ).text();
        
       if (tiene_color_2_el_anterior == true) {
         tiene_color_2_el_anterior = false;}else{
      $( this ).parents('.tr_fecha-label-checkbox').toggleClass("tr_color tr_color_2")
      tiene_color_2_el_anterior = true;
     }

    }else{
        if (tiene_color_2_el_anterior == true && $( this ).text() == fecha_vendedores_texto) {
        console.log('te lo cambie yo')
        console.log($( this ).text())

        $( this ).parents('.tr_fecha-label-checkbox').toggleClass("tr_color_2 tr_color");
        }
    }
});




    // $( this ).css('background-color', fecha_variante_color)
})
});
// let fecha_vendedores = $(".fecha_vendedores")
// fecha_vendedores.each(function () {
//     if (`($( this ).text().substr(9, 10), 10) % 2)` !== 0) {
//         $( this ).parents('.tr_fecha-label-checkbox').addClass("tr_color")
//     }
     
// })
