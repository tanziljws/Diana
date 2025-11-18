<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'waktu',
        'lokasi',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Update agenda status based on current time
     * upcoming -> ongoing (when time reached) -> completed (when date passed)
     */
    public static function updateExpiredAgendas()
    {
        // Use Asia/Jakarta timezone for Indonesian time
        $now = Carbon::now('Asia/Jakarta');
        
        // Get all non-completed agendas
        $activeAgendas = self::whereIn('status', ['upcoming', 'ongoing'])->get();
        
        foreach ($activeAgendas as $agenda) {
            try {
                // Parse the agenda date and time in Jakarta timezone
                $agendaDateTime = Carbon::createFromFormat('Y-m-d H:i', $agenda->tanggal->format('Y-m-d') . ' ' . $agenda->waktu, 'Asia/Jakarta');
                $agendaDate = Carbon::parse($agenda->tanggal)->setTimezone('Asia/Jakarta');
                
                // If the date has completely passed (next day), mark as completed
                if ($agendaDate->lt($now->toDateString())) {
                    $agenda->update(['status' => 'completed']);
                }
                // If the agenda time has been reached but still same date, mark as ongoing
                elseif ($agendaDateTime->lte($now) && $agenda->status === 'upcoming') {
                    $agenda->update(['status' => 'ongoing']);
                }
            } catch (\Exception $e) {
                // If time parsing fails, just check date
                $agendaDateOnly = Carbon::parse($agenda->tanggal)->setTimezone('Asia/Jakarta');
                if ($agendaDateOnly->lt($now->toDateString())) {
                    $agenda->update(['status' => 'completed']);
                }
            }
        }
    }

    /**
     * Scope to get only active agendas (not completed)
     */
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'completed');
    }

    /**
     * Scope to get only upcoming and ongoing agendas
     */
    public function scopeUpcomingAndOngoing($query)
    {
        return $query->whereIn('status', ['upcoming', 'ongoing']);
    }
}
