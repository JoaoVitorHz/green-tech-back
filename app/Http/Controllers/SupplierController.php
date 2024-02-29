<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function Create(Request $request){

        $Supplier = Supplier::create([
            'name' => $request['name_supplier'],
            'email' => $request['email_supplier'],
            'phone' => $request['phone_supplier'],
            'cep' => $request['cep_supplier'],
            'state' => $request['state_supplier'],
            'city' => $request['city_supplier'],
            'neighborhood' => $request['neighborhood_supplier'],
            'address' => $request['address_supplier'],
            'number' => $request['number_house_supplier']
        ]);

        return $Supplier;
    }

    public function ReadAll(){
        $Supplier = Supplier::all();
        return $Supplier;
    }

    public function Update(Request $request){
        $Supplier = Supplier::where('id', $request['id_supplier'])->first();

        if(!$Supplier) {
            throw new HttpException(404, "Nenhum registro encontrado (".$id.")");
        }

        $Supplier->name = $request->name_supplier;
        $Supplier->email = $request->email_supplier;
        $Supplier->phone = $request->phone_supplier;
        $Supplier->cep = $request->cep_supplier;
        $Supplier->state = $request->state_supplier;
        $Supplier->city = $request->city_supplier;
        $Supplier->neighborhood = $request->neighborhood_supplier;
        $Supplier->address = $request->address_supplier;
        $Supplier->number = $request->number_house_supplier;
        $Supplier->save();

        return $Supplier;
    }

    public function Delete(Request $request){
        $Supplier = Supplier::where('id', $request['id'])->first();
        $Supplier->delete();

        return "Fornecedor apagado com sucesso apagado com sucesso!";
    }
}
