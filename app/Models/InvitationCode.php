<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'consumed_at',
        'guest_id',
    ];

    public function host(): BelongsTo {
        return $this->belongsTo(User::class, 'guest_id');
    }
    public function guest(): BelongsTo {
        return $this->belongsTo(User::class, 'guest_id');
    }
}
