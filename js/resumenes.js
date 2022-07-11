let fecha_vendedores = $(".fecha_vendedores").filter((i, v) => parseInt($(v).text().substr(9, 10), 10) % 2)

if (fecha_vendedores  !== 0) {
fecha_vendedores.parents('.tr_fecha-label-checkbox').addClass("tr_color")
}

// let fecha_vendedores = $(".fecha_vendedores")
// fecha_vendedores.each(function () {
//     if (`($( this ).text().substr(9, 10), 10) % 2)` !== 0) {
//         $( this ).parents('.tr_fecha-label-checkbox').addClass("tr_color")
//     }
     
// })
