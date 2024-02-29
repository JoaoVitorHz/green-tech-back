<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Create(Request $request){

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
        $product = Product::where('id', $request['id'])->first();
        return $product;
    }

    public function Update(Request $request){
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
        $product = Product::where('id', $request['id'])->first();
        $product->delete();

        return "Produto apagado com sucesso!";
    }

   
}
