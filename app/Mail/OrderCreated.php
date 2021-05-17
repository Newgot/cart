<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $sum;
    protected $products;
    protected $info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sum, $products, $info)
    {
        $this->sum = $sum;
        $this->products = $products;
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'mail.order_created',
            [
                'sum' => $this->sum,
                'products' => $this->products,
                'info' => $this->info,
            ]
        );
    }
}
