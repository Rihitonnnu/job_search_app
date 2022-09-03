<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyOffer;

class CompanyLanguage extends Model
{
    use HasFactory;

    protected $fillable=[
        'company_offer_id',
        'ruby',
        'javascript',
        'java',
        'python',
        'c',
        'php',
    ];

    public function offer(){
        return $this->belongsTo(CompanyOffer::class,'company_offer_id');
    }
}
