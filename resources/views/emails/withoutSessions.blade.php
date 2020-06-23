@component('mail::message')
# ¡Gracias por colaborar con el proyecto de la Fundación Ecoinclusión!

Nos ponemos en contacto para informarte de que ya han pasado 30 días desde la descarga del Manual y no has reservado tus sesiones virtuales de asistencia por tal motivo el enlace a dicho servicio ha caducado. Puedes obtener más información sobre el proyecto de la Fundación a través de nuestra web o bien en nuestro canal de Youtube.

Para poder seguir mejorando, nos encantará leer tu opinión sobre el servicio brindado. Te invitamos a completar la Encuesta de Satisfacción haciendo click en el botón a continuación

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
