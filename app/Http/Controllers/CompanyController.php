<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\PermissionUser;
use App\Models\ProductRegistration;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    //
    public function index()
    {
        return Company::select("companies.*", "countries.nicename as country")->join('countries', 'companies.country', '=', 'countries.id')->get();
    }


    public function fetchCompany($id)
    {
        return Company::select("companies.*", "countries.nicename as country_name")->join('countries', 'companies.country', '=', 'countries.id')->where('companies.id',$id)->first();
    }

    public function fetchCompanyProducts($company_id)
    {
        return Company::with('products')->where('id',$company_id)->get();
    }

    public function fetchContacts($id)
    {

        return User::select("id","company_id","users.fname","users.lname","users.email","users.contact_number","users.is_primary_contact")
            ->with('rolesperuser')
            ->where('company_id',$id)
            ->get();

        // return Company::select("companies.id", DB::raw("CONCAT(users.fname,' ',users.lname) as name"),"users.email","users.contact_number","users.is_primary_contact")
        //                 ->join('users', 'users.company_id', '=', 'companies.id')
        //                 ->where('companies.id',$id)->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'legal_company_name' => 'required',
            'brand_name' => 'required',
            'legal_company_address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'business_license' => 'required',
            'country' => 'required'
        ]);

        return Company::create($request->all());
    }

    public function update(Request $request){
        $request->validate([
            'legal_company_name' => 'required',
            'brand_name' => 'required',
            'legal_company_address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'business_license' => 'required',
            'country' => 'required'
        ]);

        $company = Company::find($request->id);
        $company->update($request->all());
        return $company;
    }

    public function delete($id){
        $company = Company::find($id);
        $company->delete();
        return response()->json("Record deleted!");
    }

    public function destroy($id)
    {
        ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {

                $company = Company::find($id);
                // Get all Users with Company ID = $company->id;
                $users = User::where('company_id', $company->id)->get();

                // Loop thru all users and delete all roles and permissions
                foreach ($users as $key) {
                    // Delete roles and permissions
                    RoleUser::where('user_id', $key->id)->delete();
                    PermissionUser::where('user_id', $key->id)->delete();
                    User::where('id', $key->id)->delete();
                }

                DB::commit();
            // If all is good
            return Company::destroy($id);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['message' => $e->getMessage()], 401);
        }
        ob_end_flush();
        // return Company::destroy($id);
    }
}
