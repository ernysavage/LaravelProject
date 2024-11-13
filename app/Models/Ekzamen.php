<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekzamen extends Model
{
    use HasFactory;

    protected $fillable = ['score', 'stud_id', 'pred_id'];

    public function stud() {
        return $this->belongsTo(Student::class, 'stud_id', 'id');
    }

    public function pred() {
        return $this->belongsTo(Predmet::class, 'pred_id', 'id');
    }
}
