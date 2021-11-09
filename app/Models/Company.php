<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $hidden = ['id', 'created_at', 'updated_at'];
    public function LimitedPartnerships()
    {
        return $this->hasMany(Limited_partnership::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function Mortgages()
    {
        return $this->hasMany(Mortgage::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function previous_names()
    {
        return $this->hasMany(Previous_name::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function RegAddress()
    {
        return $this->hasMany(Reg_address::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function Returns()
    {
        return $this->hasMany(Returns::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function SICCode()
    {
        return $this->hasMany(Sic_code::class, 'CompanyNumber', 'CompanyNumber');
    }
    static function searchCompanies($request)
    {
        $params = $request->all();

        $query = static::select()->with(['RegAddress', 'SICCode', 'LimitedPartnerships', 'Mortgages', 'Returns']);
        // if (isset($params['companyNumber'])) {
        // }
        // if (isset($params['companyName'])) {
        //     $query->where('companyName', $params['companyName']);
        // }
        switch ($params) {
            case isset($params['CompanyNumber']): {
                    $query->where('CompanyNumber', $params['CompanyNumber']);
                    break;
                }
            case isset($params['CompanyName']): {
                    $query->where('CompanyName', 'LIKE', '%' . $params['CompanyName'] . '%');
                    break;
                }
            case isset($params['CompanyStatus']): {
                    $query->where('CompanyStatus', 'LIKE', '%' . $params['CompanyStatus'] . '%');
                    break;
                }
            case isset($params['PostTown']): {
                    $query->whereHas('RegAddress', function ($q) use ($params) {
                        $q->where('PostTown', 'LIKE', '%' . $params['PostTown'] . '%');
                    });
                    break;
                }
            case isset($params['Country']): {
                    $query->where('CountryOfOrigin', 'LIKE', '%' . $params['Country'] . '%')->orWhereHas('RegAddress', function ($q) use ($params) {
                        $q->where('County', 'LIKE', '%' . $params['Country'] . '%');
                    });
                    break;
                }
            case isset($params['PostCode']): {
                    $query->whereHas('RegAddress', function ($q) use ($params) {
                        $q->where('PostCode', 'LIKE', '%' . $params['PostCode'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_1']): {
                    $query->whereHas('SICCode', function ($q) use ($params) {
                        $q->where('SicText_1', 'LIKE', '%' . $params['SicText_1'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_2']): {
                    $query->whereHas('SICCode', function ($q) use ($params) {
                        $q->where('SicText_2', 'LIKE', '%' . $params['SicText_2'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_3']): {
                    $query->whereHas('SICCode', function ($q) use ($params) {
                        $q->where('SicText_3', 'LIKE', '%' . $params['SicText_3'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_4']): {
                    $query->whereHas('SICCode', function ($q) use ($params) {
                        $q->where('SicText_4', 'LIKE', '%' . $params['SicText_4'] . '%');
                    });
                    break;
                }
        }
        $matches = $query->orderBy('id', 'DESC')->get();
        return $matches;
    }
}