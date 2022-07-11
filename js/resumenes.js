
$( window ).on( "load", function() {
    let fecha_vendedores = $(".fecha_vendedores").filter((i, v) => parseInt($(v).text().substr(9, 10), 10) % 2)
    fecha_vendedores.parents('.tr_fecha-label-checkbox').addClass("tr_color");
    let fecha_vendedores_texto;
    let tiene_color_2_el_anterior = false;

console.log("hi")
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
        console.log('te lo cambie yo')
        console.log($( element ).text())

        $( element ).parents('.tr_fecha-label-checkbox').toggleClass("tr_color_2 tr_color");
        }
    }
});




    // $( this ).css('background-color', fecha_variante_color)
})

// let fecha_vendedores = $(".fecha_vendedores")
// fecha_vendedores.each(function () {
//     if (`($( this ).text().substr(9, 10), 10) % 2)` !== 0) {
//         $( this ).parents('.tr_fecha-label-checkbox').addClass("tr_color")
//     }
     
// })
