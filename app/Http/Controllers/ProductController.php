<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Create(Request $request){
        $product = Product::create([
            'code' => $request['code'],
            'name' => $request['name'],
            'describe' => $request['describe'],
            'price' => $request['price'],
            'category' => $request['category'],
            'supplier' => $request['supplier'],
            'qtd' => $request['qtd'],
        ]);

        return $product;
    }

    public function ReadAll(){
        $product = Product::all();
        return $product;
    }

    public function Update(Request $request){
        $product = Product::where('id', $request['id'])->first();

        if(!$product) {
            throw new HttpException(404, "Nenhum registro encontrado (".$id.")");
        }

        $product->code = $request->code;
        $product->name = $request->name;
        $product->describe = $request->describe;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->supplier = $request->supplier;
        $product->qtd = $request->qtd;
        $product->save();

        return $product;
    }

    public function Delete(Request $request){
        $product = Product::where('id', $request['id'])->first();
        $product->delete();

        return "Produto apagado com sucesso!";
    }
}
