<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\CompanyLanguage;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyOffer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'company_id',
        'headline',
        'job_title',
        'introduce',
        'thumbnail',
        'application_period',
        'deadline',
    ];

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function language(){
        return $this->hasOne(CompanyLanguage::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('registration');
    }
}
