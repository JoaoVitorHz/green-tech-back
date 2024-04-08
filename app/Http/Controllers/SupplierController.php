<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    private $rules = [
        'name_supplier' => ['required', 'string', 'max:255'],
        'email_supplier' => ['required', 'email', 'max:255'],
        'phone_supplier' => ['required', 'string', 'max:20'],
        'cep_supplier' => ['required', 'string', 'max:10'],
        'state_supplier' => ['required', 'string', 'max:255'],
        'city_supplier' => ['required', 'string', 'max:255'],
        'neighborhood_supplier' => ['required', 'string', 'max:255'],
        'address_supplier' => ['required', 'string', 'max:255'],
        'number_house_supplier' => ['required', 'string', 'max:50'],
    ];

    private $messages = [
        'name_supplier.required' => 'O campo nome é obrigatório.',
        'name_supplier.string' => 'O campo nome deve ser uma string.',
        'name_supplier.max' => 'O campo nome não pode exceder 255 caracteres.',

        'email_supplier.required' => 'O campo email é obrigatório.',
        'email_supplier.email' => 'O campo email deve ser um endereço de email válido.',
        'email_supplier.max' => 'O campo email não pode exceder 255 caracteres.',

        'phone_supplier.required' => 'O campo telefone é obrigatório.',
        'phone_supplier.string' => 'O campo telefone deve ser uma string.',
        'phone_supplier.max' => 'O campo telefone não pode exceder 20 caracteres.',
        
        'cep_supplier.required' => 'O campo CEP é obrigatório.',
        'cep_supplier.string' => 'O campo CEP deve ser uma string.',
        'cep_supplier.max' => 'O campo CEP não pode exceder 10 caracteres.',

        'state_supplier.required' => 'O campo estado é obrigatório.',
        'state_supplier.string' => 'O campo estado deve ser uma string.',
        'state_supplier.max' => 'O campo estado não pode exceder 255 caracteres.',

        'city_supplier.required' => 'O campo cidade é obrigatório.',
        'city_supplier.string' => 'O campo cidade deve ser uma string.',
        'city_supplier.max' => 'O campo cidade não pode exceder 255 caracteres.',

        'neighborhood_supplier.required' => 'O campo bairro é obrigatório.',
        'neighborhood_supplier.string' => 'O campo bairro deve ser uma string.',
        'neighborhood_supplier.max' => 'O campo bairro não pode exceder 255 caracteres.',

        'address_supplier.required' => 'O campo endereço é obrigatório.',
        'address_supplier.string' => 'O campo endereço deve ser uma string.',
        'address_supplier.max' => 'O campo endereço não pode exceder 255 caracteres.',

        'number_house_supplier.required' => 'O campo número é obrigatório.',
        'number_house_supplier.string' => 'O campo número deve ser uma string.',
        'number_house_supplier.max' => 'O campo número não pode exceder 50 caracteres.',
    ];

    public function Create(Request $request){
        $validator = Validator::make( $request->all(), this->$rules, this->$messages );

        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

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
  
    public function Read(Request $request){
        if (!isset($request['id'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $Supplier = Supplier::where('id', $request['id'])->first();
        return $Supplier;
    }

    public function Update(Request $request){
        if (!isset($request['id_supplier'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $validator = Validator::make( $request->all(), this->$rules, this->$messages );
        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

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
        if (!isset($request['id'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $Supplier = Supplier::where('id', $request['id'])->first();
        $Supplier->delete();

        return "Fornecedor apagado com sucesso apagado com sucesso!";
    }
}
