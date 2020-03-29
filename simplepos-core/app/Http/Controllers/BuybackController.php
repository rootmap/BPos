<?php

namespace App\Http\Controllers;
use App\Product;
use App\Store;
use App\Buyback;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class BuybackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Buyback ";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }

    

    

    public function createBarcode()
    {
        $pro=Product::where('store_id',$this->sdc->storeID())->get();
        return view('apps.pages.settings.barcode',compact('pro'));
    }

    public function genarateBarcode(Request $request)
    {
        $this->validate($request,[
            'barcode'=>'required',
            'quantity'=>'required'
        ]);
        
        $count=Product::where('id',$request->barcode)->count();
        if($count==0)
        {
            return redirect(url('settings/barcode'))->with('error','Invalid Product, Please select product or barcode!');
        }
        
        $pro=Product::find($request->barcode);
        
        $storeName=Store::where('store_id',$this->sdc->storeID())->first();
        
        $barcodedata=$this->sdc->GenarateBarcode($pro->barcode);

        $htmlBarcode='<table width="100%" cellpadding="1" cellspacing="1">';
        $d=1;
        for($i=1; $i<=$request->quantity; $i++)
        {
            
            if($d==1)
            {
                $htmlBarcode .='<tr>';
                $htmlBarcode .='<td>
                                        <table>
                                            <tr>
                                                <td valign="middle" rowspan="3"> '.substr($storeName->name,0,15).' </td>
                                                <td align="center">'.substr($pro->name,0,15).'</td>
                                            </tr>
                                            <tr>
                                                <td><img src="data:image/png;base64,'.$barcodedata.'" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><b>Tk. '.$pro->price.'</b></td>
                                            </tr>
                                        </table>
                                        
                                        
                                </td>';
            }
            else
            {
                $htmlBarcode .='<td>
                                        <table>
                                            <tr>
                                                <td  valign="middle" rowspan="3"> '.substr($storeName->name,0,15).' </td>
                                                <td align="center">'.substr($pro->name,0,15).'</td>
                                            </tr>
                                            <tr>
                                                <td><img src="data:image/png;base64,'.$barcodedata.'" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><b>Tk. '.$pro->price.'</b></td>
                                            </tr>
                                        </table>
                </td>';
            }

            if($d==6)
            {
                $htmlBarcode .='</tr>';
                $d=0;
            }
            else
            {
                if($i==$request->quantity)
                {
                    if($d==1)
                    {
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                    }
                    elseif($d==2)
                    {
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                    }
                    elseif($d==3)
                    {
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                    }
                    elseif($d==4)
                    {
                        $htmlBarcode .='<td></td>';
                        $htmlBarcode .='<td></td>';
                    }
                    elseif($d==5)
                    {
                        $htmlBarcode .='<td></td>';

                    }

                    $htmlBarcode .='</tr>';
                }
            }
            
            
            

            $d++;
        }

        $htmlBarcode .='</table>';

        $this->sdc->PDFLayout("Print Barcode",$htmlBarcode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
}
