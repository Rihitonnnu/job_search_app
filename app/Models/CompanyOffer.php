<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\CompanyLanguage;


class CompanyOffer extends Model
{
    use HasFactory;

    protected $fillable=[
        'company_id',
        'headline',
        'job_title',
        'introduce',
    ];

    public function company(){
        return $this->belongsToMany(Company::class);
    }

    public function company_language(){
        return $this->hasOne(CompanyLanguage::class);
    }
}
