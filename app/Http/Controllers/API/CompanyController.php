<?php

namespace App\Http\Controllers\API;

use App\Helpers\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Limited_partnership;
use App\Models\Mortgage;
use App\Models\Reg_address;
use App\Models\Returns;
use App\Models\Sic_code;
use App\Models\Previous_name;
use Exception;;


class CompanyController extends Controller
{
    public $successStatus = 200;
    function get_companies(Request $request)
    {
        //$this->add_company_data($filename = '', $delimiter = ',');

        $companies = Company::searchCompanies($request);
        if ($companies->count()) {
            // dd($companies[0]->reg_addresses);

            if (isset($request->filterBy) && $request->filterBy == 'count') {
                $data['count'] = $companies;
            } else {
                $data['companies'] = $companies;
            }
            $response = response()->json(CustomResponse::make_response(true, __('found successfully', ['total' => $companies->count()]), $data), $this->successStatus);
        } else {
            $response = response()->json(CustomResponse::make_response(false, __('not found')), $this->successStatus);
        }
        return $response;
    }


    function add_company_data()
    {
        include(public_path() . '/abc.php');
        $x = 1;
        try {


            // dd(1, $data);
            foreach ($data as $key => $value) {
                $company = new Company;
                $company->CompanyName = $value['CompanyName'];
                $company->CompanyNumber = $value['CompanyNumber'];
                $company->CompanyCategory = $value['CompanyCategory'];
                $company->CompanyStatus = $value['CompanyStatus'];
                $company->CountryOfOrigin = $value['CountryOfOrigin'];
                $company->DissolutionDate = $value['DissolutionDate'];
                $company->IncorporationDate = $value['IncorporationDate'];
                $company->URI = $value['URI'];
                $company->ConfStmtNextDueDate = $value['ConfStmtNextDueDate'];
                $company->ConfStmtLastMadeUpDate = $value['ConfStmtLastMadeUpDate'];
                $company->save();


                $ps = new Limited_partnership;
                $ps->CompanyID = $company->id;
                $ps->CompanyNumber = $value['CompanyNumber'];
                $ps->NumGenPartners = $value['LimitedPartnerships.NumGenPartners'];
                $ps->NumLimPartners = $value['LimitedPartnerships.NumLimPartners'];

                $ps->save();
                $mg = new Mortgage;
                $mg->CompanyID = $company->id;
                $mg->CompanyNumber = $value['CompanyNumber'];
                $mg->NumMortCharges = $value['Mortgages.NumMortCharges'];
                $mg->NumMortOutstanding = $value['Mortgages.NumMortOutstanding'];
                $mg->NumMortPartSatisfied = $value['Mortgages.NumMortPartSatisfied'];
                $mg->NumMortSatisfied = $value['Mortgages.NumMortSatisfied'];

                $mg->save();
                $mg = new Reg_address;
                $mg->CompanyID = $company->id;
                $mg->CompanyNumber = $value['CompanyNumber'];
                $mg->CareOf = $value['RegAddress.CareOf'];
                $mg->POBox = $value['RegAddress.POBox'];
                $mg->AddressLine1 = $value['RegAddress.AddressLine1'];
                $mg->AddressLine2 = $value['RegAddress.AddressLine2'];
                $mg->PostTown = $value['RegAddress.PostTown'];
                $mg->County = $value['RegAddress.County'];
                $mg->PostCode = $value['RegAddress.PostCode'];


                $mg->save();
                $mg = new Returns;
                $mg->CompanyID = $company->id;
                $mg->CompanyNumber = $value['CompanyNumber'];
                $mg->NextDueDate = $value['Returns.NextDueDate'];
                $mg->LastMadeUpDate = $value['Returns.LastMadeUpDate'];


                $mg->save();

                $mg = new Sic_code;
                $mg->CompanyID = $company->id;
                $mg->CompanyNumber = $value['CompanyNumber'];
                $mg->SicText_1 = $value['SICCode.SicText_1'];
                $mg->SicText_2 = $value['SICCode.SicText_2'];
                $mg->SicText_3 = $value['SICCode.SicText_3'];
                $mg->SicText_4 = $value['SICCode.SicText_4'];


                $mg->save();
                $mg = new Account;
                $mg->CompanyID = $company->id;
                $mg->CompanyNumber = $value['CompanyNumber'];
                $mg->AccountRefDay = $value['Accounts.AccountRefDay'];
                $mg->AccountRefMonth = $value['Accounts.AccountRefMonth'];
                $mg->NextDueDate = $value['Accounts.NextDueDate'];
                $mg->LastMadeUpDate = $value['Accounts.LastMadeUpDate'];
                $mg->AccountCategory = $value['Accounts.AccountCategory'];


                $mg->save();
                for ($i = 1; $i <= 10; $i++) {


                    if (isset($value["PreviousName_$i.CONDATE"])) {
                        $pn = new  Previous_name;
                        $pn->CompanyID = $company->id;
                        $pn->CompanyNumber = $value['CompanyNumber'];
                        $pn->key = "PreviousName_$i";
                        $pn->CONDATE = $value["PreviousName_$i.CONDATE"];
                        if (isset($value["PreviousName_$i.CONDATE"]) && $value["PreviousName_$i.CONDATE"]) {
                            $pn->CompanyName = $value["PreviousName_$i.CompanyName"];
                            $pn->save();
                        }
                    }
                }

                //   dd($key, $value);
                $x++;
            }
        } catch (Exception $ex) {
            dd($ex);
        }
        dd($data);
    }
    function csvToArray($filename = '', $delimiter = ',')
    {
        $filename = public_path('BasicCompanyData-2021-11-01-part1_6.csv');

        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {

                    $header = $row;
                } else {
                    dd($header, $row);
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}