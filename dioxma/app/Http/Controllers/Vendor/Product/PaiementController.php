<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\ConfigPayRequest;
use App\Models\PaymentGateway;
use App\Models\Command;

class PaiementController extends Controller
{
    public function index()
    {
        $infoconfig = PaymentGateway::where('vendor_id', auth('vendor')->user()->id)->first();

        return view('dashboard.vendors.paiements.create',
        compact('infoconfig'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $Accountexist = PaymentGateway::where('vendor_id', auth('vendor')->user()->id)->first();
            if($Accountexist)
            {
                $Accountexist->API_KEY = $request->api_key;
                $Accountexist->SITE_ID = $request->site_id;
                $Accountexist->Secret_Key = $request->secret_key;

                $Accountexist->update();
                return redirect()->back()->with('success','les donnees sont mise à jour');

            }
            else
            {
                $configpay = PaymentGateway::create([
                    'vendor_id'=> auth('vendor')->user()->id,
                    'API_KEY'=> $request->api_key,
                    'SITE_ID'=> $request->site_id,
                    'Secret_Key'=> $request->secret_key,
                ]);

                //  dd($configpay);

                return redirect()->back()->with('success','les donnees sont enregistrées');
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
    public function commande()
    {
        try {
            $ListeCommand = Command::where('vendor_id', auth('vendor')->user()->id)->get();

            return view('dashboard.vendors.commande.liste',[
                'commandes'=>$ListeCommand,
             ]);

        } catch (Exception $th) {
            throw new Exception("Erreur survenue à l'affichage de la liste des commande", 1);

        }
    }
    public function livraison($commande)
    {
       try {
        $commande = Command::findorFail($commande);

        $commande->livraison_status = "Produit Livré";

        $commande->paiement_status = "Payé";

        $commande->save();

        return redirect()->back()->with('success','Bravo le statut a été changé');

       } catch (Exception $e) {
            throw new Exception("Erreur survenue lors du changement de status", 1);

       }
    }

}
