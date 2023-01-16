<?php

namespace App\Interfaces;

interface ValidacionEncuesta
{

    public function validar();

    public function obtenerErrores(): array;

    public function obtenerPuntaje(): int;

    public function obtenerPreguntas(): array;

    public function obtenerSeccion(): array;
}
