<?php

namespace App\Http\Controllers;

use App\Models\ShippingInvoices;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF as PDF;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use setasign\Fpdi\PdfParser\StreamReader;
use setasign\Fpdi\Tcpdf\Fpdi;

class ShippingInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingInvoices  $shippingInvoices
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingInvoices $shippingInvoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingInvoices  $shippingInvoices
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingInvoices $shippingInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingInvoices  $shippingInvoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingInvoices $shippingInvoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingInvoices  $shippingInvoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingInvoices $shippingInvoices)
    {
        //
    }

    public function storeShippingInvoice(Request $request){
        // return json_decode($request);
        // return dd($request->file('invoiceFile'));
        // return dd($request->file('fosr'));
        // return dd($request->fosr);
        // return dd($request->invoiceFile);
        // return $request->file('invoiceFile')->getClientOriginalName();
        // return $request->fosr->extension();
        // return $request->invoiceBase->extension();
        // return $request->invoiceBase->getSize();

        $invoiceBase = $request->file('invoiceBase');
        $fosr = $request->file('fosr');
        $simulator_report = $request->file('simulator_report');
        $company_id = 1;
        $shipping_invoice_id = 1;

        // $toPath = public_path('storage/shipping_invoice/' . $company_id. '/' .$shipping_invoice_id);

        // if(!File::exists(public_path('storage/shipping_invoice/' . $company_id. '/' .$shipping_invoice_id . '/' . $invoiceBase->getClientOriginalName()))){
        //     mkdir($toPath, 0777, true);
        //     $request->invoiceBase->move($toPath, $invoiceBase->getClientOriginalName());
        // }

        $toPath = public_path('storage/shipping_invoice/' . $company_id. '/' .$shipping_invoice_id);
        $final_file_name = 'invoice_.pdf';
        
        if($request->hasFile('fosr') && $request->hasFile('simulator_report') && $request->hasFile('invoiceBase')){
            if(!File::exists(public_path('storage/shipping_invoice/' . $company_id. '/' .$shipping_invoice_id . '/' . $final_file_name))){
                mkdir($toPath, 0777, true);

                $pdf = PDFMerger::init();
                $pdf->addPDF($invoiceBase, 'all');
                $pdf->addPDF($fosr, 'all');
                $pdf->addPDF($simulator_report, 'all');
                $pdf->merge();
                $pdf->save(public_path('storage/shipping_invoice/' . $company_id. '/' .$shipping_invoice_id . '/' . $final_file_name));
            }
        }
        
    }
}
