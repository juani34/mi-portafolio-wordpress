<?php
/*
Plugin Name: Recomendador por Clima
Description: Muestra productos según el clima usando una API externa.
Version: 1.0
*/

add_shortcode('productos_por_clima', 'mostrar_productos_recomendados');

function mostrar_productos_recomendados() {
    // Simular respuesta de API (en realidad usarías wp_remote_get())
    $clima = obtener_clima_ficticio(); // Función ficticia

    if ($clima == 'lluvia') {
        $categoria = 'paraguas';
    } elseif ($clima == 'calor') {
        $categoria = 'bebidas-frias';
    } else {
        $categoria = 'ofertas';
    }

    // Mostrar productos de la categoría
    return do_shortcode("[products category='$categoria' limit='3']");
}

function obtener_clima_ficticio() {
    $climas_posibles = ['lluvia', 'calor', 'nublado'];
    return $climas_posibles[array_rand($climas_posibles)];
}
?>