<template>
    <section class="" id="shipping-invoice" :CompanyDetails="CompanyDetails" :ShipFrom="ShipFromData" :Destination="DestinationData" :Particulars="ParticularsData" :Totals="Totals">
        <div class="row text-black my-5">
            <div class="col-6">
                <div class="w-50">
                    <p class="fs-6 text-black fw-bold">Company Name (会社名)</p>
                    <p class="text-black">
                        New Zealand Honey Co.
                        158 Stone Street. Wanaka,
                        Otago, New Zealand, 9305
                        +64 (0)3 489 8845
                        <br>
                        Business License #: 9429031533737
                        Contact Person: Rachael Gillam
                        Contact Email: projects@newzealandhoneyco.com
                    </p>
                </div>
            </div>

            <div class="col-6">
                <div class="w-50">
                    <p class="fs-6 text-black fw-bold">Shipping Invoice (シッピングインボイス)</p>
                    <p class="text-black">
                        Invoice #: 233-00001-490
                        <br>
                        Date: October 20, 2022
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row mt-5 mb-5" id="after1">
            <div class="col-4">
                <p class="fs-6 text-black fw-bold">Ship From (供給元)</p>
                <p class="fs-7 text-black">
                    New Zealand Honey Co.
                    3/180 Dukes Road North, Mosgiel, 9092, New Zealand
                    <br>
                    +64274485556
                </p>
            </div>

            <div class="col-4">
                <p class="fs-6 text-black fw-bold">(日本の最終目的地)</p>
                <p class="fs-6 text-black fw-bold">Final Destination in Japan</p>
                <p class="fs-7 text-black">
                    Amazon FBA
                    Amazon FBA
                    TYO6 - 西インター1丁目2-1 350-0282 - 坂戸市, 埼玉県
                    - Japan
                    <br>
                    +64274485556
                </p>
            </div>

            <div class="col-4">
                <p class="fs-6 text-black fw-bold">Importer of Record - IOR</p>
                <p class="fs-7 text-black">
                    Company Name: COVUE JAPAN K.K.
                    Japan Customs Number: P002AK300000
                    Address: 3/F, 1-6-19 Azuchimachi Chuo-ku,
                    Osaka, Japan 541-0052 Japan
                    Phone Number: +81 (50) 8881-2699
                </p>
            </div>
        </div>

        <table role="table" aria-busy="false" aria-colcount="5" class="table table-bordered" >
            <tbody role="rowgroup">
                <tr role="row" style="font-size:.7em;">
                    <td aria-colindex="1" role="cell">
                        <span for="">Product ID</span>
                        <p>1</p>
                    </td>
                    <td aria-colindex="2" role="cell"> 
                        <span for="">Product Name</span>
                        <p>Product 1</p>
                    </td>
                    <td aria-colindex="4" role="cell">
                        <span for="">SKU</span>
                        <p>A1234</p>
                    </td>
                    <td aria-colindex="5" role="cell">
                        <span for="">HS Code</span>
                        <p>B5678</p>
                    </td>
                    <td aria-colindex="6" role="cell">
                        <span for="">ASIN</span>
                        <p>C9000</p>
                    </td>
                    <td aria-colindex="3" role="cell"> 
                        <span for="">Country of Origin</span>
                        <p>Philippines</p>
                    </td>
                </tr>
                <tr >
                    <td aria-colindex="1" role="cell">
                        <span for="">QTY</span>
                        <p>1</p>
                    </td>
                    <td aria-colindex="3" role="cell"> 
                        <div class="d-flex flex-row gap-1">
                            <div>
                                <span for="">DOSP</span>
                                <p>1,500.00</p>
                            </div>
                            <div >
                                <span for="">AODSP</span>
                                <p>1,300.00</p>
                            </div>
                        </div>
                    </td>
                    <td aria-colindex="4" role="cell">
                        <span for="">AMZ SF</span>
                        <p>100</p>
                    </td>
                    <td aria-colindex="5" role="cell">
                        <span for="">AMZ FF</span>
                        <p>100</p>
                    </td>
                    <td aria-colindex="6" role="cell">
                        <span for="">TDOSP</span>
                        <p>1,300</p>
                    </td>
                    <td aria-colindex="7" role="cell">
                        <span for="">TAODSP</span>
                        <p>1,300</p>
                    </td>
                    
                </tr>
            </tbody>
            <tfoot style="font-size:.8em;">
                <tr role="row">
                    <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                        
                    </td>
                    <td class="bg-light-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                        <p class="text-dark">Total Declared Online Selling Price</p>
                        <p>¥ <span>1,300.00</span></p>
                    </td>
                </tr>
                <tr role="row">
                    <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                        
                    </td>
                    <td class="bg-light-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                        <p class="text-dark">AMZ Fees</p>
                        <p>¥ <span>200.00</span></p>
                    </td>
                </tr>
                <tr role="row">
                    <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                        
                    </td>
                    <td class="bg-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                        <p class="text-info">Total Adjusted Selling Price</p>
                        <p class="text-info">¥ <span>1,300.00</span></p>
                    </td>
                </tr>
            </tfoot>
        </table>
        

    </section>

</template>
<script>
    // import Helpers from '../Mixins/Helpers.js'
    import html2pdf from "html2pdf.js";
    
    export default {
        components: {
        },
        // mixins: [Helpers],
        props: ['CompanyDetails', 'ShipFromData','DestinationData','ParticularsData','Totals'],
        data() {
			return {
                
            }
        },
        methods:{
            
        },
        created(){
            console.log("Invoice Component");
            console.log(this.ShipFromData);
            console.log(this.a);
            console.log(this.ParticularsData);
            console.log(this.Totals);
        },
    }
</script>
