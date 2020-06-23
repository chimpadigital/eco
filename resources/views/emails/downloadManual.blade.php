@component('mail::message')
# ¡Gracias por colaborar con el proyecto de la Fundación Ecoinclusión!
Anhelamos disfrutes de la lectura del Manual de Réplica. Para completar la información brindada, tienes a disposición 2 sesiones virtuales con un miembro del equipo para asesorarte en las posibles dudas o consultas que puedan surgir en el proceso.

Para reservar tus sesiones, haz click en el botón a continuación:

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
