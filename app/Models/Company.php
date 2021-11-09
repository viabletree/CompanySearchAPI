<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

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
            case isset($params['companyNumber']): {
                    $query->where('companyNumber', $params['companyNumber']);
                    break;
                }
            case isset($params['companyName']): {
                    $query->where('companyName', 'LIKE', '%' . $params['companyName'] . '%');
                    break;
                }
        }
        $matches = $query->orderBy('id', 'DESC')->get();
        return $matches;
    }
}