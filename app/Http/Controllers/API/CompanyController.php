<?php

namespace App\Http\Controllers\API;

use App\Helpers\CustomResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Limited_partnership;
use App\Models\Mortgage;
use App\Models\Reg_address;
use App\Models\Returns;
use App\Models\Sic_code;
use App\Models\Previous_name;


class CompanyController extends Controller
{
    public $successStatus = 200;
    function get_companies(Request $request)
    {
        //$this->add_company_data($filename = '', $delimiter = ',');
        $companies = Company::searchCompanies($request);
        if ($companies->count()) {

            if (isset($request->filterBy) && $request->filterBy == 'count') {
                $data['count'] = $companies->count();
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
        $data = array(
            0 =>
            array(
                'CompanyName' => '! LTD',
                'CompanyNumber' => '08209948',
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => 'METROHOUSE 57 PEPPER ROAD',
                'RegAddress.AddressLine2' => 'HUNSLET',
                'RegAddress.PostTown' => 'LEEDS',
                'RegAddress.County' => 'YORKSHIRE',
                'RegAddress.Country' => '',
                'RegAddress.PostCode' => 'LS10 2RU',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '11/09/2012',
                'Accounts.AccountRefDay' => 30,
                'Accounts.AccountRefMonth' => 9,
                'Accounts.NextDueDate' => '30/06/2022',
                'Accounts.LastMadeUpDate' => '30/09/2020',
                'Accounts.AccountCategory' => 'DORMANT',
                'Returns.NextDueDate' => '09/10/2016',
                'Returns.LastMadeUpDate' => '11/09/2015',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '99999 - Dormant Company',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/08209948',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '25/09/2022',
                'ConfStmtLastMadeUpDate' => '11/09/2021',
            ),
            1 =>
            array(
                'CompanyName' => '!? LTD',
                'CompanyNumber' => 11399177,
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => 'THE STUDIO HATHERLOW HOUSE',
                'RegAddress.AddressLine2' => 'HATHERLOW',
                'RegAddress.PostTown' => 'ROMILEY',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'UNITED KINGDOM',
                'RegAddress.PostCode' => 'SK6 3DY',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '05/06/2018',
                'Accounts.AccountRefDay' => 30,
                'Accounts.AccountRefMonth' => 6,
                'Accounts.NextDueDate' => '31/03/2022',
                'Accounts.LastMadeUpDate' => '30/06/2020',
                'Accounts.AccountCategory' => 'TOTAL EXEMPTION FULL',
                'Returns.NextDueDate' => '03/07/2019',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '47710 - Retail sale of clothing in specialised stores',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/11399177',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '19/06/2022',
                'ConfStmtLastMadeUpDate' => '05/06/2021',
            ),
            2 =>
            array(
                'CompanyName' => '!BIG IMPACT GRAPHICS LIMITED',
                'CompanyNumber' => 11743365,
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '372 OLD STREET',
                'RegAddress.AddressLine2' => '335 ROSDEN HOUSE',
                'RegAddress.PostTown' => 'LONDON',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'UNITED KINGDOM',
                'RegAddress.PostCode' => 'EC1V 9LT',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '28/12/2018',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 12,
                'Accounts.NextDueDate' => '30/09/2022',
                'Accounts.LastMadeUpDate' => '31/12/2020',
                'Accounts.AccountCategory' => 'DORMANT',
                'Returns.NextDueDate' => '25/01/2020',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '18129 - Printing n.e.c.',
                'SICCode.SicText_2' => '59112 - Video production activities',
                'SICCode.SicText_3' => '63120 - Web portals',
                'SICCode.SicText_4' => '74201 - Portrait photographic activities',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/11743365',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '10/01/2022',
                'ConfStmtLastMadeUpDate' => '27/12/2020',
            ),
            3 =>
            array(
                'CompanyName' => '!GOBERUB LTD',
                'CompanyNumber' => 13404790,
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '30 MAZE GREEN ROAD',
                'RegAddress.AddressLine2' => '',
                'RegAddress.PostTown' => 'BISHOP\'S STORTFORD',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'ENGLAND',
                'RegAddress.PostCode' => 'CM23 2PJ',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '17/05/2021',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 5,
                'Accounts.NextDueDate' => '17/02/2023',
                'Accounts.LastMadeUpDate' => '',
                'Accounts.AccountCategory' => 'NO ACCOUNTS FILED',
                'Returns.NextDueDate' => '14/06/2022',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '62020 - Information technology consultancy activities',
                'SICCode.SicText_2' => '70229 - Management consultancy activities other than financial management',
                'SICCode.SicText_3' => '79110 - Travel agency activities',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/13404790',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '30/05/2022',
                'ConfStmtLastMadeUpDate' => '',
            ),
            4 =>
            array(
                'CompanyName' => '!NFOGENIE LTD',
                'CompanyNumber' => 13522064,
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '71-75 SHELTON STREET',
                'RegAddress.AddressLine2' => '',
                'RegAddress.PostTown' => 'LONDON',
                'RegAddress.County' => 'GREATER LONDON',
                'RegAddress.Country' => 'UNITED KINGDOM',
                'RegAddress.PostCode' => 'WC2H 9JQ',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '21/07/2021',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 7,
                'Accounts.NextDueDate' => '21/04/2023',
                'Accounts.LastMadeUpDate' => '',
                'Accounts.AccountCategory' => 'NO ACCOUNTS FILED',
                'Returns.NextDueDate' => '18/08/2022',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '58290 - Other software publishing',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/13522064',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '03/08/2022',
                'ConfStmtLastMadeUpDate' => '',
            ),
            5 =>
            array(
                'CompanyName' => '!NNOV8 LIMITED',
                'CompanyNumber' => 11006939,
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => 'OLD BARN FARM',
                'RegAddress.AddressLine2' => 'HARTFIELD ROAD',
                'RegAddress.PostTown' => 'EDENBRIDGE',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'ENGLAND',
                'RegAddress.PostCode' => 'TN8 5NF',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '11/10/2017',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 3,
                'Accounts.NextDueDate' => '31/12/2021',
                'Accounts.LastMadeUpDate' => '31/03/2020',
                'Accounts.AccountCategory' => 'MICRO ENTITY',
                'Returns.NextDueDate' => '08/11/2018',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '62090 - Other information technology service activities',
                'SICCode.SicText_2' => '70229 - Management consultancy activities other than financial management',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/11006939',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '24/10/2021',
                'ConfStmtLastMadeUpDate' => '10/10/2020',
            ),
            6 =>
            array(
                'CompanyName' => '!NSPIRED INVESTMENTS LTD',
                'CompanyNumber' => 'SC606050',
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '26 POLMUIR ROAD',
                'RegAddress.AddressLine2' => '',
                'RegAddress.PostTown' => 'ABERDEEN',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'SCOTLAND',
                'RegAddress.PostCode' => 'AB11 7SY',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '22/08/2018',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 8,
                'Accounts.NextDueDate' => '31/05/2022',
                'Accounts.LastMadeUpDate' => '31/08/2020',
                'Accounts.AccountCategory' => 'TOTAL EXEMPTION FULL',
                'Returns.NextDueDate' => '19/09/2019',
                'Returns.LastMadeUpDate' => '',
                'Mortgages.NumMortCharges' => 5,
                'Mortgages.NumMortOutstanding' => 5,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '68209 - Other letting and operating of own or leased real estate',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/SC606050',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '12/02/2022',
                'ConfStmtLastMadeUpDate' => '29/01/2021',
            ),
            7 =>
            array(
                'CompanyName' => '!NSPIRED LTD',
                'CompanyNumber' => 'SC421617',
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '26 POLMUIR ROAD',
                'RegAddress.AddressLine2' => '',
                'RegAddress.PostTown' => 'ABERDEEN',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'UNITED KINGDOM',
                'RegAddress.PostCode' => 'AB11 7SY',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '11/04/2012',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 3,
                'Accounts.NextDueDate' => '31/12/2022',
                'Accounts.LastMadeUpDate' => '31/03/2021',
                'Accounts.AccountCategory' => 'TOTAL EXEMPTION FULL',
                'Returns.NextDueDate' => '09/05/2017',
                'Returns.LastMadeUpDate' => '11/04/2016',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '70229 - Management consultancy activities other than financial management',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/SC421617',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '25/04/2022',
                'ConfStmtLastMadeUpDate' => '11/04/2021',
            ),
            8 =>
            array(
                'CompanyName' => '!NVERTD DESIGNS LIMITED',
                'CompanyNumber' => '09152972',
                'RegAddress.CareOf' => '',
                'RegAddress.POBox' => '',
                'RegAddress.AddressLine1' => '2 SANDROCKS LODGE',
                'RegAddress.AddressLine2' => 'ROCKY LANE',
                'RegAddress.PostTown' => 'HAYWARDS HEATH',
                'RegAddress.County' => '',
                'RegAddress.Country' => 'ENGLAND',
                'RegAddress.PostCode' => 'RH16 4RW',
                'CompanyCategory' => 'Private Limited Company',
                'CompanyStatus' => 'Active',
                'CountryOfOrigin' => 'United Kingdom',
                'DissolutionDate' => '',
                'IncorporationDate' => '30/07/2014',
                'Accounts.AccountRefDay' => 31,
                'Accounts.AccountRefMonth' => 7,
                'Accounts.NextDueDate' => '30/04/2022',
                'Accounts.LastMadeUpDate' => '31/07/2020',
                'Accounts.AccountCategory' => 'MICRO ENTITY',
                'Returns.NextDueDate' => '27/08/2016',
                'Returns.LastMadeUpDate' => '30/07/2015',
                'Mortgages.NumMortCharges' => 0,
                'Mortgages.NumMortOutstanding' => 0,
                'Mortgages.NumMortPartSatisfied' => 0,
                'Mortgages.NumMortSatisfied' => 0,
                'SICCode.SicText_1' => '58190 - Other publishing activities',
                'SICCode.SicText_2' => '',
                'SICCode.SicText_3' => '',
                'SICCode.SicText_4' => '',
                'LimitedPartnerships.NumGenPartners' => 0,
                'LimitedPartnerships.NumLimPartners' => 0,
                'URI' => 'http://business.data.gov.uk/id/company/09152972',
                'PreviousName_1.CONDATE' => '',
                'PreviousName_1.CompanyName' => '',
                'PreviousName_2.CONDATE' => '',
                'PreviousName_2.CompanyName' => '',
                'PreviousName_3.CONDATE' => '',
                'PreviousName_3.CompanyName' => '',
                'PreviousName_4.CONDATE' => '',
                'PreviousName_4.CompanyName' => '',
                'PreviousName_5.CONDATE' => '',
                'PreviousName_5.CompanyName' => '',
                'PreviousName_6.CONDATE' => '',
                'PreviousName_6.CompanyName' => '',
                'PreviousName_7.CONDATE' => '',
                'PreviousName_7.CompanyName' => '',
                'PreviousName_8.CONDATE' => '',
                'PreviousName_8.CompanyName' => '',
                'PreviousName_9.CONDATE' => '',
                'PreviousName_9.CompanyName' => '',
                'PreviousName_10.CONDATE' => '',
                'PreviousName_10.CompanyName' => '',
                'ConfStmtNextDueDate' => '13/08/2022',
                'ConfStmtLastMadeUpDate' => '30/07/2021',
            ),
        );
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
            $ps->CompanyNumber = $value['CompanyNumber'];
            $ps->NumGenPartners = $value['LimitedPartnerships.NumGenPartners'];
            $ps->NumLimPartners = $value['LimitedPartnerships.NumLimPartners'];

            $ps->save();
            $mg = new Mortgage;
            $mg->CompanyNumber = $value['CompanyNumber'];
            $mg->NumMortCharges = $value['Mortgages.NumMortCharges'];
            $mg->NumMortOutstanding = $value['Mortgages.NumMortOutstanding'];
            $mg->NumMortPartSatisfied = $value['Mortgages.NumMortPartSatisfied'];
            $mg->NumMortSatisfied = $value['Mortgages.NumMortSatisfied'];

            $mg->save();
            $mg = new Reg_address;
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
            $mg->CompanyNumber = $value['CompanyNumber'];
            $mg->NextDueDate = $value['Returns.NextDueDate'];
            $mg->LastMadeUpDate = $value['Returns.LastMadeUpDate'];


            $mg->save();

            $mg = new Sic_code;
            $mg->CompanyNumber = $value['CompanyNumber'];
            $mg->SicText_1 = $value['SICCode.SicText_1'];
            $mg->SicText_2 = $value['SICCode.SicText_2'];
            $mg->SicText_3 = $value['SICCode.SicText_3'];
            $mg->SicText_4 = $value['SICCode.SicText_4'];


            $mg->save();
            for ($i = 1; $i <= 10; $i++) {


                if (isset($value["PreviousName_$i.CONDATE"])) {
                    $pn = new  Previous_name;
                    $pn->CompanyNumber = $value['CompanyNumber'];
                    $pn->key = "PreviousName_$i";
                    $pn->CONDATE = $value["PreviousName_$i.CONDATE"];
                    if (isset($value["PreviousName_$i.CONDATE"])) {
                        $pn->CompanyName = $value["PreviousName_$i.CompanyName"];
                    }
                    $pn->save();
                }
            }

            //   dd($key, $value);
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