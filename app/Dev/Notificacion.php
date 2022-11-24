<?php

namespace App\Dev;

class Notificacion
{

    public function __construct(
        public string $estado,
        public readonly $datos
    )
    {
    }
}
