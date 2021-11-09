<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class sitesController extends Controller
{
    function index()
    {

        $sites = DB::table('sites')
            ->get();

        return view('admin.sites', compact('sites'));
    }

    function viewSite()
    {
        return view('admin.viewSite');
    }

    function addSite()
    {
        return view('admin.addSite');
    }

    function updateSitePage()
    {
        return view('admin.updateSite');
    }
    function ExportPDF($id)
    {

        $sites = DB::table("sites")
            ->where("sites.site_id", "=", $id)
            ->first();
        /*****************************************************************************/
        $sectorsOf2G = DB::table("sectors")
            ->join("2g", function ($join) {
                $join->on("sectors.sector_id", "=", "2g.sector_id");
            })->where("sectors.site_id", "=", $id)
            ->get();
        /*****************************************************************************/
        $sectorsOf3G = DB::table("sectors")
            ->join("3g", function ($join) {
                $join->on("sectors.sector_id", "=", "3g.sector_id");
            })
            ->where("sectors.site_id", "=", $id)
            ->get();
        /*****************************************************************************/
        $sectorsOf4G = DB::table("sectors")
            ->join("4G", function ($join) {
                $join->on("sectors.sector_id", "=", "4G.sector_id");
            })
            ->where("sectors.site_id", "=", $id)
            ->get();


        $pdf = App::make('dompdf');
        $pdf = PDF::loadView('admin.exportSitePDF', compact('sites', 'sectorsOf2G', 'sectorsOf3G', 'sectorsOf4G'));
        return $pdf->download($sites->name . ".pdf");
    }

    function addSectorNavi()
    {

        $siteIbfos =  DB::table("sites")
            ->where("sites.site_id", "=", session('siteName'))
            ->first();
        if (Session::has('siteName')) {

                return view('admin.addSector', compact('siteIbfos'));
        } else {
                return back()->with("message", "vous devez ajouter les informations du site d'abord");
        }
    }

    function addSectorsPage(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|unique:sites,name',
            'latitude' => 'required|min:4',
            'longitude' => 'required|min:4',
            'height' => 'required',
            'client' => 'required',
        ]);

        DB::table('sites')->insert([
            'user_id' => Session::get('LoggedUser'),
            'name' => $request->name,
            'mode' => $request->mode,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'height' => $request->height,
            'client' => $request->client,
        ]);

       $lastSiteInsertedIndex= DB::table("sites")
        ->limit(1)
        ->orderBy("site_id","desc")
        ->first();

        $request->session()->put('siteName', $lastSiteInsertedIndex->site_id);

        return back()->with('message', 'le site a été ajouter avec succée');
    }


    function insertSectors(Request $request) {
        
       

        if ($request->siteMode != "ConfigurationReduite") {
            $request->validate([



                'azimuth1'=> 'required',
                'cell_identification1'=> 'required',
                'channel_number1'=> 'required',
                'frequence_G9001'=> 'required',
    
                'threeGcell_identification1'=> 'required',
                'primary_scrambling_code1'=> 'required',
                'frequence_U9001'=> 'required',
    
                'physical_cell_identity1'=> 'required',
                'frequence_L8001'=> 'required',
    
    
    
                'azimuth2'=> 'required', 
                'cell_identification2'=> 'required',
                'channel_number2'=> 'required',
                'frequence_G9002'=> 'required',
    
                'threeGcell_identification2'=> 'required',
                'primary_scrambling_code2'=> 'required',
                'frequence_U9002'=> 'required',
    
                'physical_cell_identity2'=> 'required',
                'frequence_L8002'=> 'required',
    
    
    
                'azimuth3'=> 'required',
                'cell_identification3'=> 'required', 
                'channel_number3'=> 'required', 
                'frequence_G9003'=> 'required',
    
                'threeGcell_identification3'=> 'required',
                'primary_scrambling_code3'=> 'required',
                'frequence_U9003'=> 'required', 
    
                'physical_cell_identity3'=> 'required', 
                'frequence_L8003'=> 'required',

                'frequence_U21001'=> 'required',
                'requence_L18001'=> 'required',
                'frequence_U21002'=> 'required',
                'requence_L18002'=> 'required',
                'frequence_U21003'=> 'required', 
                'requence_L18003'=> 'required',
            ]);
        }else{
            $request->validate([
                'azimuth1'=> 'required',
                'cell_identification1'=> 'required',
                'channel_number1'=> 'required',
                'frequence_G9001'=> 'required',
    
                'threeGcell_identification1'=> 'required',
                'primary_scrambling_code1'=> 'required',
                'frequence_U9001'=> 'required',
    
                'physical_cell_identity1'=> 'required',
                'frequence_L8001'=> 'required',
    
    
    
                'azimuth2'=> 'required', 
                'cell_identification2'=> 'required',
                'channel_number2'=> 'required',
                'frequence_G9002'=> 'required',
    
                'threeGcell_identification2'=> 'required',
                'primary_scrambling_code2'=> 'required',
                'frequence_U9002'=> 'required',
    
                'physical_cell_identity2'=> 'required',
                'frequence_L8002'=> 'required',
    
    
    
                'azimuth3'=> 'required',
                'cell_identification3'=> 'required', 
                'channel_number3'=> 'required', 
                'frequence_G9003'=> 'required',
    
                'threeGcell_identification3'=> 'required',
                'primary_scrambling_code3'=> 'required',
                'frequence_U9003'=> 'required', 
    
                'physical_cell_identity3'=> 'required', 
                'frequence_L8003'=> 'required',
                
            ]);
        }
/* ***********************************first sector********************************** */
        
        $lastSiteInserted =
        DB::table("sites")
        ->limit(1)
        ->orderBy("site_id","desc")
        ->first();

        DB::table('sectors')->insert([
            'site_id' => $lastSiteInserted->site_id,
            'codeName' => 'sector 1',
            'azimuth' => $request->azimuth1,
        ]);

        $lastSectorInserted = 
        DB::table("sectors")
        ->limit(1)
        ->orderBy("sector_id","desc")
        ->first();

        DB::table('2g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification1,
            'channel_number' => $request->channel_number1,
            'frequence_G900' => $request->frequence_G9001,
        ]);

        DB::table('3g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification1,
            'primary_scrambling_code' => $request->channel_number1,
            'frequence_U900' => $request->frequence_G9001,
            'frequence_U2100' => $request->frequence_G9001,
            
        ]);

        DB::table('4g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'physical_cell_identity' => $request->physical_cell_identity1,
            'frequence_L800' => $request->frequence_L8001,
            'frequence_L1800' => $request->requence_L18001,            
        ]);

/* ***********************************second sector********************************** */

        DB::table('sectors')->insert([
            'site_id' => $lastSiteInserted->site_id,
            'codeName' => 'sector 2',
            'azimuth' => $request->azimuth2,
        ]);

        $lastSectorInserted = 
        DB::table("sectors")
        ->limit(1)
        ->orderBy("sector_id","desc")
        ->first();

        DB::table('2g')->insert([
            'sector_id' =>  $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification2,
            'channel_number' => $request->channel_number2,
            'frequence_G900' => $request->frequence_G9002,
        ]);

        DB::table('3g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification2,
            'primary_scrambling_code' => $request->channel_number2,
            'frequence_U900' => $request->frequence_G9002,
            'frequence_U2100' => $request->frequence_G9002,
            
        ]);

        DB::table('4g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'physical_cell_identity' => $request->physical_cell_identity2,
            'frequence_L800' => $request->frequence_L8002,
            'frequence_L1800' => $request->requence_L18002,            
        ]);

/* ***********************************thirth sector********************************** */

        DB::table('sectors')->insert([
            'site_id' => $lastSiteInserted->site_id,
            'codeName' => 'sector 3',
            'azimuth' => $request->azimuth3,
        ]);

        $lastSectorInserted = 
        DB::table("sectors")
        ->limit(1)
        ->orderBy("sector_id","desc")
        ->first();

        DB::table('2g')->insert([
            'sector_id' =>  $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification3,
            'channel_number' => $request->channel_number3,
            'frequence_G900' => $request->frequence_G9003,
        ]);

        DB::table('3g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'cell_identification' => $request->cell_identification3,
            'primary_scrambling_code' => $request->channel_number3,
            'frequence_U900' => $request->frequence_G9003,
            'frequence_U2100' => $request->frequence_G9003,
            
        ]);

        DB::table('4g')->insert([
            'sector_id' => $lastSectorInserted->sector_id,
            'physical_cell_identity' => $request->physical_cell_identity3,
            'frequence_L800' => $request->frequence_L8003,
            'frequence_L1800' => $request->requence_L18003,            
        ]);
        $sites = DB::table('sites')
            ->get();
            $request->session()->forget('siteName');
        return view('admin.sites',compact('sites'))->with('message', 'le site a été ajouter avec succée');

    }

    function deleteSite($id) {
        DB::table('sites')->where('site_id',$id)->delete();

        return back()->with('message','the site has been deleted successfuly');
    }
}

/* 

        $request->validate([
            'azimuth1' => 'required',
            'cell_identification1' => 'required',
            'channel_number1' => 'required',
            'frequence_G9001' => 'required',
            'threeGcell_identification1' => 'required',
            'primary_scrambling_code1' => 'required',
            'frequence_U9001' => 'required',
            'frequence_U21001' => 'required',
            'physical_cell_identity1' => 'required',
            'frequence_L8001' => 'required',
            'requence_L18001' => 'required',

            'azimuth2' => 'required',
            'cell_identification2' => 'required',
            'channel_number2' => 'required',
            'frequence_G9002' => 'required',
            'threeGcell_identification2' => 'required',
            'primary_scrambling_code2' => 'required',
            'frequence_U9002' => 'required',
            'frequence_U21002' => 'required',
            'physical_cell_identity2' => 'required',
            'frequence_L8002' => 'required',
            'requence_L18002' => 'required',

            'azimuth3' => 'required',
            'cell_identification3' => 'required',
            'channel_number3' => 'required|',
            'frequence_G9003' => 'required',
            'threeGcell_identification3' => 'required',
            'primary_scrambling_code3' => 'required',
            'frequence_U9003' => 'required',
            'frequence_U21003' => 'required',
            'physical_cell_identity3' => 'required',
            'frequence_L8003' => 'required',
            'requence_L18003' => 'required',
        ]);

*/