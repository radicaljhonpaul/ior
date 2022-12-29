<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ProductCategory;
use App\Models\ProductRegistration;
use Illuminate\Support\Facades\File;
use App\Models\ProductRegistrationComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ProductRegistrationController extends Controller
{

    public function getProducts()
    {
        return ProductRegistration::join('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->leftJoin('product_registration_statuses', 'product_registration_statuses.id', '=', 'product_registrations.status')->get(['product_registrations.*', 'product_registration_statuses.label AS status','countries.nicename as country_name']);
    }

    public function getProductById($id)
    {
        return ProductRegistration::join('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->where('product_registrations.id',$id)->get(['product_registrations.*','countries.nicename as country_name']);
    }

    public function getProductsPending()
    {
        return ProductRegistration::join('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->leftJoin('product_registration_statuses', 'product_registration_statuses.id', '=', 'product_registrations.status')->where('product_registrations.status','4')->get(['product_registrations.*', 'product_registration_statuses.label AS status','countries.nicename as country_name']);
    }

    public function getProductsApproved()
    {
        return ProductRegistration::join('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->leftJoin('product_registration_statuses', 'product_registration_statuses.id', '=', 'product_registrations.status')->where('product_registrations.status','1')->get(['product_registrations.*', 'product_registration_statuses.label AS status','countries.nicename as country_name']);
    }

    public function getProductsDeclined()
    {
        return ProductRegistration::join('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->leftJoin('product_registration_statuses', 'product_registration_statuses.id', '=', 'product_registrations.status')->where('product_registrations.status','2')->get(['product_registrations.*', 'product_registration_statuses.label AS status','countries.nicename as country_name']);
    }

    public function getProductsDetails($id)
    {
        return ProductRegistration::leftJoin ('countries', 'countries.id', '=', 'product_registrations.country_of_origin')->leftJoin ('product_categories', 'product_categories.id', '=', 'product_registrations.product_categories_id')->where('product_registrations.id',$id)->get(['product_registrations.*','countries.nicename as country_name','product_categories.category_name'])->first();
    }

    public function addProduct(Request $request) {

        // return $request;
        $je_product = json_decode($request->product);

        $id = ProductRegistration::latest()->first();

        if(!$id){
            $pid = 1;
        } else {
            $id = ProductRegistration::latest()->first()->id;
            $pid = $id + 1;
        }

        if($request->product_label_text_file){
            $imageName = 'product_label_text.'.$request->product_label_text_file->extension();
            $request->product_label_text_file->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$pid), $imageName);
            $je_product->product_label_text = $imageName;
        }

        if($request->product_image){
            $imageName = 'product_image.'.$request->product_image->extension();
            $request->product_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$pid), $imageName);
            $je_product->product_image = $imageName;
        }

        if($request->barcode_image){
            $imageName = 'product_barcode_image.'.$request->barcode_image->extension();
            $request->barcode_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$pid), $imageName);
            $je_product->product_barcode_image = $imageName;
        }

        if($request->certificate_country_of_origin){
            $imageName = 'certificate_country_of_origin_product.'.$request->certificate_country_of_origin->extension();
            $request->certificate_country_of_origin->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$pid), $imageName);
            $je_product->certificate_country_of_origin_product = $imageName;
        }

        if($request->product_packaging_image){
            $imageName = 'product_packaging_image.'.$request->product_packaging_image->extension();
            $request->product_packaging_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$pid), $imageName);
            $je_product->product_packaging_image = $imageName;
        }



        return ProductRegistration::create((array)$je_product);

    }

    public function updateProduct(Request $request){
        // $request->validate([
        //     'product_name' => 'required',
        //     'product_url' => 'required',
        //     'model_number' => 'required',
        //     'product_material_composition' => 'required',
        //     'product_barcode' => 'required',
        //     'product_barcode_type' => 'required',
        //     'hs_code' => 'required',
        //     'asin' => 'required',
        //     'product_packaging_material_list' => 'required',

        // ]);

        // $product = ProductRegistration::find($request->id);
        // $product->update($request->all());
        // return $product;
        $je_product = json_decode($request->product);

        $product_registration = ProductRegistration::find($je_product->id);
        if($request->product_label_text_file){
            $imageName = 'product_label_text.'.$request->product_label_text_file->extension();
            $request->product_label_text_file->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_label_text = $imageName;
        }

        if($request->product_image){
            $imageName = 'product_image.'.$request->product_image->extension();
            $request->product_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_image = $imageName;
        }

        if($request->barcode_image){
            $imageName = 'product_barcode_image.'.$request->barcode_image->extension();
            $request->barcode_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_barcode_image = $imageName;
        }

        if($request->certificate_country_of_origin){
            $imageName = 'certificate_country_of_origin_product.'.$request->certificate_country_of_origin->extension();
            $request->certificate_country_of_origin->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->certificate_country_of_origin_product = $imageName;
        }

        if($request->product_packaging_image){
            $imageName = 'product_packaging_image.'.$request->product_packaging_image->extension();
            $request->product_packaging_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_packaging_image = $imageName;
        }


        /* Store $imageName name in DATABASE from HERE */


        $product_registration->update((array)$je_product);
    }

    public function bulkProductUpload(Request $request) {

		$responseStatus = [];
        $company_id = $request->company_id;

        if ($request->hasFile('csv') == false || $request->hasFile('zipped_images') == false) {
            // Return 400 if no file
            return response('No file', 400);
        } else {
            // Continue if has file uploaded

            // Allowed mime types
            $fileMimesCSV = array(
                'text/x-comma-separated-values',
                'text/comma-separated-values',
                'application/x-csv',
                'text/x-csv',
                'text/csv',
                'application/csv',
                'application/excel',
                'text/plain'
            );

            // return mime_content_type($request->file('csv')->getClientOriginalName());

            // Validate whether selected file is a CSV file

            if (in_array($request->file('csv')->getClientMimeType(), $fileMimesCSV)){

                $path = $request->file('csv')->getRealPath();
                $tmp_name = $request->file('csv')->getPathName();
                // $records = array_map('str_getcsv', file($path));

                $csvFile = fopen($tmp_name, 'r');

                // Skip the first line
                fgetcsv($csvFile);

                while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                {

                    $product_name = $getData[0];
                    $product_image = $getData[1];
                    $product_url = $getData[2];
                    $country_of_origin = $getData[3];
                    $certificate_country_of_origin_product = $getData[4];
                    $product_categories_id = $getData[5];
                    $hs_code = $getData[6];
                    $product_packaging_image = $getData[7];
                    $product_label_text = $getData[8];
                    $sku = $getData[9];
                    $asin = $getData[10];
                    $net_weight = $getData[11];

                    $status = 4;
                    $is_active = 1;

                    // $product_name = $getData[0];
                    // $product_image = $getData[1];
                    // $product_material_composition = $getData[2];
                    // $product_label_text = $getData[3];
                    // $product_barcode = $getData[4];
                    // $product_barcode_image = $getData[5];
                    // $product_barcode_type = $getData[6];
                    // $model_number = $getData[7];
                    // $asin = $getData[8];
                    // $product_packaging_image = $getData[9];
                    // $product_packaging_material_list = $getData[10];
                    // $country_of_origin = $getData[11];
                    // $certificate_country_of_origin_product = $getData[12];
                    // $hs_code = $getData[13];
                    // $msrp = $getData[14];
                    // $product_url = $getData[15];
                    // $dimension_of_product_packaging_cm = $getData[16];
                    // $dimension_of_product_cm = $getData[17];

                    // $is_product_heat_sensitive = $getData[18];

                    // if(strtolower($getData[18]) == 'yes'){
                    //     $is_product_heat_sensitive = 1;
                    // }else{
                    //     $is_product_heat_sensitive = 0;
                    // }

                    // $volume = $getData[19];
                    // $how_to_use = $getData[20];
                    // $precautions = $getData[21];
                    // $status = 4;

                    // $product_label = 0;
                    // $product_label_type = 0;
                    // $product_label_paid = 0;
                    // $is_active = 1;

                    $product = ProductRegistration::where('sku', $getData[9])->get();

                    if(sizeof($product) > 0){
                        
                        // Update Records
                        ProductRegistration::where('sku', $getData[4])
                        ->update(
                            [
                                'product_name' => $product_name,
                                'product_image' => $product_image,
                                'product_url' => $product_url,
                                'country_of_origin' => $country_of_origin,
                                'certificate_country_of_origin_product' => $certificate_country_of_origin_product,
                                'product_categories_id' => $product_categories_id,
                                'hs_code' => $hs_code,
                                'product_packaging_image' => $product_packaging_image,
                                'product_label_text' => $product_label_text,
                                'sku' => $sku,
                                'asin' => $asin,
                                'net_weight' => $net_weight,
                                // 'company_id' => $company_id,
                                // 'product_name' => $product_name,
                                // 'product_image' => $product_image,
                                // 'product_material_composition' => $product_material_composition,
                                // 'product_label_text' => $product_label_text,
                                // 'product_barcode' => $product_barcode,
                                // 'product_barcode_image' => $product_barcode_image,
                                // 'product_barcode_type' => $product_barcode_type,
                                // 'model_number' => $model_number,
                                // 'asin' => $asin,
                                // 'product_packaging_image' => $product_packaging_image,
                                // 'product_packaging_material_list' => $product_packaging_material_list,
                                // 'country_of_origin' => $country_of_origin,
                                // 'certificate_country_of_origin_product' => $certificate_country_of_origin_product,
                                // 'hs_code' => $hs_code,
                                // 'msrp' => $msrp,
                                // 'product_url' => $product_url,
                                // 'dimension_of_product_packaging_cm' => $dimension_of_product_packaging_cm,
                                // 'dimension_of_product_cm' => $dimension_of_product_cm,
                                // 'is_product_heat_sensitive' => $is_product_heat_sensitive,
                                // 'volume' => $volume,
                                // 'how_to_use' => $how_to_use,
                                // 'precautions' => $precautions,
                                // 'status' => $status,
                                // 'product_label' => $product_label,
                                // 'product_label_type' => $product_label_type,
                                // 'product_label_paid' => $product_label_paid,
                                // 'is_active' => $is_active,
                            ]
                        );

                    }else{
                        $country = Country::where('name', 'LIKE', "%{$country_of_origin}%")
                        ->orWhere('nicename', 'LIKE', "%{$country_of_origin}%")
                        ->get();

                        $product_category = ProductCategory::where('category_name', 'LIKE', "%{$product_categories_id}%")->get();

                        $product_registration = new ProductRegistration();
                        $product_registration->company_id = $company_id;
                        $product_registration->product_name = $product_name;
                        $product_registration->product_image = $product_image;
                        $product_registration->product_url = $product_url;
                        $product_registration->country_of_origin = $country[0]->id;
                        $product_registration->certificate_country_of_origin_product = $certificate_country_of_origin_product;
                        $product_registration->product_categories_id = $product_category[0]->id;
                        $product_registration->hs_code = $hs_code;
                        $product_registration->product_packaging_image = $product_packaging_image;
                        $product_registration->product_label_text = $product_label_text;
                        $product_registration->sku = $sku;
                        $product_registration->asin = $asin;
                        $product_registration->net_weight = $net_weight;

                        // $product_registration->company_id = $company_id;
                        // $product_registration->product_name = $product_name;
                        // $product_registration->product_image = $product_image;
                        // $product_registration->product_material_composition = $product_material_composition;
                        // $product_registration->product_label_text = $product_label_text;
                        // $product_registration->product_barcode = $product_barcode;
                        // $product_registration->product_barcode_image = $product_barcode_image;
                        // $product_registration->product_barcode_type = $product_barcode_type;
                        // $product_registration->model_number = $model_number;
                        // $product_registration->asin = $asin;
                        // $product_registration->product_packaging_image = $product_packaging_image;
                        // $product_registration->product_packaging_material_list = $product_packaging_material_list;
                        // $product_registration->country_of_origin = $country_of_origin;
                        // $product_registration->certificate_country_of_origin_product = $certificate_country_of_origin_product;
                        // $product_registration->hs_code = $hs_code;
                        // $product_registration->msrp = $msrp;
                        // $product_registration->product_url = $product_url;
                        // $product_registration->dimension_of_product_packaging_cm = $dimension_of_product_packaging_cm;
                        // $product_registration->dimension_of_product_cm = $dimension_of_product_cm;
                        // $product_registration->is_product_heat_sensitive = $is_product_heat_sensitive;
                        // $product_registration->volume = $volume;
                        // $product_registration->how_to_use = $how_to_use;
                        // $product_registration->precautions = $precautions;
                        // $product_registration->status = $status;
                        // $product_registration->product_label = $product_label;
                        // $product_registration->product_label_type = $product_label_type;
                        // $product_registration->product_label_paid = $product_label_paid;
                        // $product_registration->is_active = $is_active;
                        $product_registration->save();
                    }
                }
                // Close opened CSV file
                fclose($csvFile);

                array_push($responseStatus, [
                    'csv' => true,
                ]);
            }else{
                return response('Invalid File', 400);
                // Invalid file
            }

            // Wait for CSV Uploading to finish
            if($responseStatus[0]['csv'] == true){

                $fileMimesZippedFiles = array(
                    'application/zip',
                    'application/octet-stream',
                    'multipart/x-zip',
                    'application/zip-compressed',
                    'application/x-zip-compressed',
                    'application/x-zip',
                );

                // Validate whether selected file is a CSV file
                if (in_array($request->file('zipped_images')->getClientMimeType(), $fileMimesZippedFiles)){

                    $storageDestinationPath = public_path('storage/product_registrations/' . $company_id);

                    $zip = new ZipArchive();
                    $status = $zip->open($request->file("zipped_images")->getRealPath());

                    if ($status !== true) {
                        throw new \Exception($status);
                    } else{

                        if(!Storage::disk('local')->exists($storageDestinationPath)) {
                            Storage::makeDirectory($storageDestinationPath);
                        }
                        $zip->extractTo($storageDestinationPath);
                        $zip->close();
                    }


                    // check files and move to its own folders and path
                    $ProductRegistrationData = ProductRegistration::select('id','product_label_text','certificate_country_of_origin_product','product_image','product_packaging_image')->where('company_id', $company_id)->get();
                    foreach ($ProductRegistrationData as $key) {

                        $toPath = public_path('storage/product_registrations/' . $company_id. '/' .$key->id);
                        
                        if(!File::exists($toPath)){

                            mkdir($toPath, 0777, true);

                            $product_label_text = realpath($storageDestinationPath.'/'.$key->product_label_text);
                            // $product_barcode_image = $storageDestinationPath.'/'.$key->product_barcode_image;
                            $certificate_country_of_origin_product = $storageDestinationPath.'/'.$key->certificate_country_of_origin_product;
                            $product_image = $storageDestinationPath.'/'.$key->product_image;
                            $product_packaging_image = $storageDestinationPath.'/'.$key->product_packaging_image;

                            if(File::exists($product_label_text)){
                                rename($product_label_text, public_path('storage/product_registrations/' . $company_id. '/' .$key->id. '/' . $key->product_label_text));
                            }

                            // if(File::exists($product_barcode_image)){
                            //     rename($product_barcode_image, public_path('storage/public/product_registrations/' . $company_id. '/' .$key->id. '/' . $key->product_barcode_image));
                            // }

                            if(File::exists($certificate_country_of_origin_product)){
                                rename($certificate_country_of_origin_product, public_path('storage/product_registrations/' . $company_id. '/' .$key->id. '/' . $key->certificate_country_of_origin_product));
                            }

                            if(File::exists($product_image)){
                                rename($product_image, public_path('storage/product_registrations/' . $company_id. '/' .$key->id. '/' . $key->product_image));
                            }

                            if(File::exists($product_packaging_image)){
                                rename($product_packaging_image, public_path('storage/product_registrations/' . $company_id. '/' .$key->id. '/' . $key->product_packaging_image));
                            }

                        }

                    }

                    array_push($responseStatus, [
                        'zip' => true,
                    ]);

                }else{
                    return response('Invalid File', 400);
                    // Invalid file
                }
            }

        }

        return response('Files have been uploaded successfully', 200);
    }

    public function productRegistrationAction(Request $request) {
        $product_registration = ProductRegistration::find($request->id);
        $product_registration->update($request->all());
        return $product_registration;
    }

    public function destroyProduct($id)
    {
        return ProductRegistration::destroy($id);
    }


    public function updateProductRegistration(Request $request) {
        $je_product = json_decode($request->product);

        $product_registration = ProductRegistration::find($je_product->id);
        if($request->product_label_text_file){
            $imageName = 'product_label_text.'.$request->product_label_text_file->extension();
            $request->product_label_text_file->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_label_text = $imageName;
        }

        if($request->product_image){
            $imageName = 'product_image.'.$request->product_image->extension();
            $request->product_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_image = $imageName;
        }

        if($request->barcode_image){
            $imageName = 'product_barcode_image.'.$request->barcode_image->extension();
            $request->barcode_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_barcode_image = $imageName;
        }

        if($request->certificate_country_of_origin){
            $imageName = 'certificate_country_of_origin_product.'.$request->certificate_country_of_origin->extension();
            $request->certificate_country_of_origin->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->certificate_country_of_origin_product = $imageName;
        }

        if($request->packaging_image){
            $imageName = 'product_packaging_image.'.$request->packaging_image->extension();
            $request->packaging_image->move(storage_path('app/public/product_registrations/'.$je_product->company_id.'/'.$je_product->id), $imageName);
            $je_product->product_packaging_image = $imageName;
        }


        /* Store $imageName name in DATABASE from HERE */


        $product_registration->update((array)$je_product);

        return $product_registration;
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'comments' => 'required',
        ]);

        return ProductRegistrationComments::create($request->all());
    }


}
