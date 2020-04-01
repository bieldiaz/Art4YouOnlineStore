<?php

namespace App\Mail;

use App\Pedidos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedidos $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->to($this->pedido->correo, $this->pedido->nombrecompleto)
            ->bcc('another@another.com')
            ->subject('Gracias por tu compra!')
            ->markdown('emails.orders.placed');
    }
}
