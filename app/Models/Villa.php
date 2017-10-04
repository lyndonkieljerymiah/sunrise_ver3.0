<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $table = "villas";

    protected $fillable = [
        "villa_no",
        "location",
        "electricity_no",
        "water_no",
        "qtel_no",
        "villa_class",
        "capacity",
        "description",
        "rate_per_month"
    ];

    public function getByStatus($status = 'occupied') {
        return $this->where('status', $status)->orderBy('villa_no')->get();
    }

}
