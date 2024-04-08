<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $rules = [
        'productCode' => ['required', 'string', 'max:255'],
        'productName' => ['required', 'string', 'max:255'],
        'productDesc' => ['nullable', 'string', 'max:500'],
        'productPrice' => ['required', 'numeric', 'min:0'],
        'productCategory' => ['required', 'string', 'max:255'],
        'name_supplier' => ['required', 'string', 'max:255'],
        'productQtd' => ['required', 'integer', 'min:0'],
    ];

    private $messages = [
        'productCode.required' => 'O campo código é obrigatório.',
        'productCode.string' => 'O campo código deve ser uma string.',
        'productCode.max' => 'O campo código não pode exceder 255 caracteres.',

        'productName.required' => 'O campo nome é obrigatório.',
        'productName.string' => 'O campo nome deve ser uma string.',
        'productName.max' => 'O campo nome não pode exceder 255 caracteres.',

        'productDesc.nullable' => 'O campo descrição pode ser nulo.',
        'productDesc.string' => 'O campo descrição deve ser uma string.',
        'productDesc.max' => 'O campo descrição não pode exceder 500 caracteres.',

        'productPrice.required' => 'O campo preço é obrigatório.',
        'productPrice.numeric' => 'O campo preço deve ser um número.',
        'productPrice.min' => 'O campo preço deve ser no mínimo 0.',

        'productCategory.required' => 'O campo categoria é obrigatório.',
        'productCategory.string' => 'O campo categoria deve ser uma string.',
        'productCategory.max' => 'O campo categoria não pode exceder 255 caracteres.',

        'name_supplier.required' => 'O campo fornecedor é obrigatório.',
        'name_supplier.string' => 'O campo fornecedor deve ser uma string.',
        'name_supplier.max' => 'O campo fornecedor não pode exceder 255 caracteres.',

        'productQtd.required' => 'O campo quantidade é obrigatório.',
        'productQtd.integer' => 'O campo quantidade deve ser um número inteiro.',
        'productQtd.min' => 'O campo quantidade deve ser no mínimo 0.',
    ];

    public function Create(Request $request){

        $validator = Validator::make( $request->all(), this->$rules, this->$messages );

        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

        $product = Product::create([
            'code' => $request['productCode'],
            'name' => $request['productName'],
            'describe' => $request['productDesc'],
            'price' => $request['productPrice'],
            'category' => $request['productCategory'],
            'supplier' => $request['name_supplier'],
            'qtd' => $request['productQtd'],
        ]);

        return $product;
    }

    public function ReadAll(){
        $product = Product::all();
        return $product;
    }
    
    public function Read(Request $request){
        if (!isset($request['id'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $product = Product::where('id', $request['id'])->first();
        return $product;
    }

    public function Update(Request $request){
        if (!isset($request['productId'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $validator = Validator::make( $request->all(), this->$rules, this->$messages );
        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

        $product = Product::where('id', $request['productId'])->first();
        
        if(!$product) {
            throw new HttpException(404, "Nenhum registro encontrado (".$request['productId'].")");
        }

        $product->code = $request->productCode;
        $product->name = $request->productName;
        $product->describe = $request->productDesc;
        $product->price = $request->productPrice;
        $product->category = $request->productCategory;
        $product->supplier = $request->name_supplier;
        $product->qtd = $request->productQtd;
        $product->save();

        return $product;
    }

 
    public function Delete(Request $request){
        if (!isset($request['id'])) {
            return response()->json( [ 'errors' => 'Algo deu errado.' ], 400);
        }

        $product = Product::where('id', $request['id'])->first();
        $product->delete();

        return "Produto apagado com sucesso!";
    }

   
}
