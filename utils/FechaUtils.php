<?php
// utils/FechaUtils.php

require_once __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

class FechaUtils {

    public static function ahora() {
        return Carbon::now('America/Mexico_City');
    }

    public static function formatearFecha($fecha) {
        return Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM [de] YYYY');
    }

    public static function calcularVencimiento($dias = 30) {
        return self::ahora()->copy()->addDays($dias);
    }

    public static function esVencido($fechaFin) {
        return Carbon::parse($fechaFin)->isPast();
    }

    public static function tiempoRestante($fechaFin) {
        $fin = Carbon::parse($fechaFin);
        return $fin->diffForHumans(null, true); // Ej: "en 5 días"
    }

    public static function diferenciaEnDias($inicio, $fin) {
        return Carbon::parse($inicio)->diffInDays(Carbon::parse($fin));
    }

    public static function esHoy($fecha) {
        return Carbon::parse($fecha)->isToday();
    }

    public static function esFuturo($fecha) {
        return Carbon::parse($fecha)->isFuture();
    }

    public static function esFinDeSemana($fecha) {
        return Carbon::parse($fecha)->isWeekend();
    }
}
