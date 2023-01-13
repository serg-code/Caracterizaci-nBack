<?php

namespace App\Interfaces;

interface ValidacionEncuesta
{

    public function validar(): void;

    public function obtenerErrores(): array;

    public function obtenerPuntaje(): int;
}
