$(".fecha_resumenes").filter((i, v) => parseInt($(v).text().substr(9, 10), 10) % 2 !== 0).addClass("odd");
