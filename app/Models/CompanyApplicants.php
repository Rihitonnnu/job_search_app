<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyApplicants extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_id',
        'subject_application',
        'name',
        'grade',
        'university',
        'department',
        'course',
        'interest_area',
        'strong_point',
    ];

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }
}
