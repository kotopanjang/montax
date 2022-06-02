<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $nomer;
    protected $email;
    protected $nama;
    protected $tipe;
    protected $harga;

    public function __construct($nomer,$email,$nama,$tipe,$harga)
    {
        parent::__construct();

        $this->nomer = $nomer;
        $this->email= $email;
        $this->nama= $nama;
        $this->tipe= $tipe;
        $this->harga= $harga;
    }

    public function getSnapToken()
    {
        $grandtotal = 0;
        $arritems = [];
        $baru = [
            'Tipe' => $this->tipe,
            'price' => $this->harga,
            'quantity' => 1,
            'name' => $this->tipe . " MEMBERSHIP" ,
        ];
        array_push($arritems, $baru);

        $grandtotal = $this->harga * 1;

        $params = [
            'transaction_details' => [
                'order_id' => $this->nomer,
                'gross_amount' => $grandtotal,
            ],
            'item_details' => $arritems,
            'customer_details' => [
                'first_name' => $this->nama,
                'email' => $this->email,
                'phone' => "",
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
        return $snapToken;
    }
}
?>
