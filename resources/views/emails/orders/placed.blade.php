@component('mail::message')
# Pedido Recibido

Gracias por tu pedido

**ID Pedido:** {{ $pedido->id }}

**Email del pedido:** {{ $pedido->correo }}

**Nombre del pedido:** {{ $pedido->nombrecompleto }}

**Coste del pedido:** {{ $pedido->precioACobrar}} €

**Obras Adquiridas**

{{$pedido->obras}}

Puedes tener mas detalles de tu pedido en nuestra pagina web!

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Hir a Art 4 You
@endcomponent

Gracias por confiar en nosotros!

Salutaciones,<br>
Equipo de Art 4 You
@endcomponent