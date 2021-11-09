<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function reg_addresses()
    {
        return $this->hasMany(Reg_address::class, 'CompanyNumber', 'CompanyNumber');
    }
    public function sic_codes()
    {
        return $this->hasMany(Sic_code::class, 'CompanyNumber', 'CompanyNumber');
    }
    static function searchCompanies($request)
    {
        $params = $request->all();

        $query = static::select();
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
                    $query->whereHas('reg_addresses', function ($q) use ($params) {
                        $q->where('PostTown', 'LIKE', '%' . $params['PostTown'] . '%');
                    });
                    break;
                }
            case isset($params['Country']): {
                    $query->whereHas('reg_addresses', function ($q) use ($params) {
                        $q->where('County', 'LIKE', '%' . $params['Country'] . '%');
                    });
                    break;
                }
            case isset($params['PostCode']): {
                    $query->whereHas('reg_addresses', function ($q) use ($params) {
                        $q->where('PostCode', 'LIKE', '%' . $params['PostCode'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_1']): {
                    $query->whereHas('sic_codes', function ($q) use ($params) {
                        $q->where('SicText_1', 'LIKE', '%' . $params['SicText_1'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_2']): {
                    $query->whereHas('sic_codes', function ($q) use ($params) {
                        $q->where('SicText_2', 'LIKE', '%' . $params['SicText_2'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_3']): {
                    $query->whereHas('sic_codes', function ($q) use ($params) {
                        $q->where('SicText_3', 'LIKE', '%' . $params['SicText_3'] . '%');
                    });
                    break;
                }
            case isset($params['SicText_4']): {
                    $query->whereHas('sic_codes', function ($q) use ($params) {
                        $q->where('SicText_4', 'LIKE', '%' . $params['SicText_4'] . '%');
                    });
                    break;
                }
        }
        $matches = $query->orderBy('id', 'DESC')->get();
        return $matches;
    }
}