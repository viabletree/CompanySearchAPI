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
        return $this->hasMany(Limited_partnership::class, 'CompanyID', 'id');
    }
    public function Mortgages()
    {
        return $this->hasMany(Mortgage::class, 'CompanyID', 'id');
    }
    public function previous_names()
    {
        return $this->hasMany(Previous_name::class, 'CompanyID', 'id');
    }
    public function RegAddress()
    {
        return $this->hasMany(Reg_address::class, 'CompanyID', 'id');
    }
    public function Returns()
    {
        return $this->hasMany(Returns::class, 'CompanyID', 'id');
    }
    public function SICCode()
    {
        return $this->hasMany(Sic_code::class, 'CompanyID', 'id');
    }
    public function Accounts()
    {
        return $this->hasMany(Account::class, 'CompanyID', 'id');
    }
    static function searchCompanies($request)
    {
        $params = $request->all();

        $query = static::select()->with(['Accounts', 'RegAddress', 'SICCode', 'LimitedPartnerships', 'Mortgages', 'Returns']);
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

        if (isset($params['filterBy']) && $params['filterBy'] == 'count') {
            $matches = $query->orderBy('id', 'DESC')->count();
        } else {
            if (isset($params['skip']) && isset($params['limit'])) {

                $matches = $query->orderBy('id', 'DESC')->skip(0)->take(10)->get();
            } else {
                $matches = $query->orderBy('id', 'DESC')->get();
            }
        }
        return $matches;
    }
}