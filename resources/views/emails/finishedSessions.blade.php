@component('mail::message')
# ¡Gracias por querer replicar nuestro proyecto!

Para descargar el Manual de Réplica y los archivos adjuntos que lo complementan, es necesario cumplir algunos pasos previos a la entrega del mismo. Como el desarrollo de cualquier proyecto social, el Manual implica responsabilidad y obligaciones que debes conocer antes de adquirir todo el material necesario para implementar dicha tecnología en tu localidad. 

Para continuar con este desafío, haz click en el siguiente botón:

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
