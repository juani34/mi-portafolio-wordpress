// 1. Mostrar el Popup en el footer
add_action('wp_footer', 'mostrar_popup_leads');
function mostrar_popup_leads() {
    echo '
    <div id="popup-leads" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); z-index:9999;">
        <button id="cerrar-popup" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:20px; cursor:pointer;">×</button>
        <h3>¡Oferta Especial!</h3>
        <p>Regístrate y obtén un 20% de descuento.</p>
        <form id="form-leads">
            <input type="email" id="email-lead" placeholder="Tu email" required style="width:100%; padding:8px; margin-bottom:10px;">
            <button type="submit" style="background:#4CAF50; color:#fff; border:none; padding:10px 15px; cursor:pointer;">Enviar</button>
        </form>
    </div>
    ';
}

// 2. Cargar jQuery y el script AJAX
add_action('wp_enqueue_scripts', 'cargar_scripts_popup');
function cargar_scripts_popup() {
    wp_enqueue_script('jquery');
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            // Mostrar popup después de 3 segundos
            setTimeout(function() {
                $("#popup-leads").fadeIn();
            }, 3000);

            // Cerrar popup
            $("#cerrar-popup").on("click", function() {
                $("#popup-leads").fadeOut();
            });

            // Enviar formulario via AJAX
            $("#form-leads").on("submit", function(e) {
                e.preventDefault();
                var email = $("#email-lead").val();
                $.ajax({
                    url: ajaxurl, // Variable global de WordPress
                    type: "POST",
                    data: {
                        action: "guardar_lead",
                        email: email
                    },
                    success: function(response) {
                        $("#popup-leads").html("<p>¡Gracias! Te enviaremos la oferta a " + email + ".</p>");
                    },
                    error: function() {
                        alert("Error. Por favor, inténtalo de nuevo.");
                    }
                });
            });
        });
    ');
}

// 3. Procesar el AJAX en el servidor
add_action('wp_ajax_guardar_lead', 'guardar_lead'); // Para usuarios logueados
add_action('wp_ajax_nopriv_guardar_lead', 'guardar_lead'); // Para invitados
function guardar_lead() {
    if (isset($_POST['email'])) {
        $email = sanitize_email($_POST['email']);
        // Guardar en la base de datos (ejemplo simplificado)
        global $wpdb;
        $wpdb->insert('wp_leads', array('email' => $email));
        wp_send_json_success('Email guardado');
    }
    wp_die();
}
