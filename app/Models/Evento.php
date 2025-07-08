<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'hora_evento',
        'local'
    ];

    protected $casts = [
        'data_evento' => 'date',
        'hora_evento' => 'datetime:H:i',
    ];

    // Accessor para formatar a data
    public function getDataFormatadaAttribute()
    {
        return $this->data_evento ? $this->data_evento->format('d/m/Y') : null;
    }

    // Accessor para formatar a hora
    public function getHoraFormatadaAttribute()
    {
        return $this->hora_evento ? $this->hora_evento->format('H:i') : null;
    }

    // Scope para eventos futuros
    public function scopeFuturos($query)
    {
        return $query->where('data_evento', '>=', Carbon::today());
    }

    // Scope para eventos passados
    public function scopePassados($query)
    {
        return $query->where('data_evento', '<', Carbon::today());
    }

    // Scope para eventos de hoje
    public function scopeHoje($query)
    {
        return $query->where('data_evento', Carbon::today());
    }

    // Verificar se o evento já aconteceu
    public function jaAconteceu()
    {
        return $this->data_evento && $this->data_evento->isPast();
    }

    // Verificar se o evento é hoje
    public function ehHoje()
    {
        return $this->data_evento && $this->data_evento->isToday();
    }
}

