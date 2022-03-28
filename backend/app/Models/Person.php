<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $fillable = ['name', 'cpf', 'email', 'phone', 'status_id'];

    public function status() {
        return $this->hasOne(PersonStatus::class, 'id', 'status_id');
    }
}
