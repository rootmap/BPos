<?php

namespace App\Http\Controllers;

use App\RetailPosSummary;
use App\RetailPosSummaryDateWise;
use App\Product;
use App\LoginActivity;
use App\CashierPunch;
use Illuminate\Http\Request;
use Auth;
class RetailPosSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Product";
    private $sdc;
    public function __construct(){ $this->sdc = new StaticDataController(); }


    public function index(RetailPosSummary $dashboard)
    {

        if(\Auth::check()){

            if(count($this->sdc->dataMenuAssigned())==0)
            {
                return redirect('login')->with(Auth::logout());
            }

        //print_r($dash); die();
        $Todaydate=date('Y-m-d');
        if(RetailPosSummaryDateWise::where('report_date',$Todaydate)->count()==0)
        {
            RetailPosSummaryDateWise::insert([
               'report_date'=>$Todaydate
            ]);
            $tabToday=RetailPosSummaryDateWise::where('report_date',$Todaydate)->first();
        }
        else
        {
            $tabToday=RetailPosSummaryDateWise::where('report_date',$Todaydate)->first();
        }

        $dbDash=\DB::select(\DB::raw("SELECT d.* FROM (select IFNULL((SELECT total_sales FROM dashboard_total_sales WHERE store_id='".Auth::user()->store_id."'),0.00) AS total_sales,
IFNULL((SELECT total_cost FROM dashboard_total_cost WHERE store_id='".Auth::user()->store_id."'),0.00) AS total_cost,
IFNULL((SELECT total_profit FROM dashboard_total_profit WHERE store_id='".Auth::user()->store_id."'),0.00) AS total_profit) AS d"));
        


        $product=Product::where('quantity','<=','10')->where('store_id',Auth::user()->store_id)->orderBy('quantity','ASC')->limit(50)->get();
        //dd($product);
        return view('apps.pages.dashboard.index',[
            'product'=>$product,
            'tod'=>$tabToday,
            'dbDash'=>$dbDash
        ]);

        }
        else
        {
            return redirect(url('login'));
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RetailPosSummary  $retailPosSummary
     * @return \Illuminate\Http\Response
     */
    public function show(RetailPosSummary $retailPosSummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RetailPosSummary  $retailPosSummary
     * @return \Illuminate\Http\Response
     */
    public function edit(RetailPosSummary $retailPosSummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RetailPosSummary  $retailPosSummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetailPosSummary $retailPosSummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RetailPosSummary  $retailPosSummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(RetailPosSummary $retailPosSummary)
    {
        //
    }
}
