<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str; // Per slug
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::orderBy('created_at', 'asc')->paginate(9);


        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //get from data
        $data= $request->all();
        
        //validation
        $request->validate($this->Validation());

        $data['slug'] = Str::slug($data['name'], '-');

        if (!empty($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        //salvataggio nel db
        $newProduct = new Product();
        $newProduct->fill($data);
        $saved = $newProduct->save();

        if ($saved) {
            return redirect()->route('products.index');
        } else {
            return redirect()->route('homepage');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        // 404 check
        $this->errorPages($product);


        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();

        // 404 check
        $this->errorPages($product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //validation
        $request->validate($this->Validation());

        $product = Product::find($id);

        $data['slug'] = Str::slug($data['name'], '-');

        if (!empty($data['image'])) {
            // RIMUOVERE VECCHIA IMG
            if (!empty($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        $updated = $product->update($data);

        if($updated){
            return redirect()->route('products.show', $product->slug);
        } else {
            return redirect()->route('homepage');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $name = $product->name;
        $image = $product->image;
        $deleted = $product->delete();

        if($deleted){
            if (!empty($image)) {
                Storage::disk('public')->delete($image);
            }
            return redirect()->route('products.index')->with('deleted', $name);
        } else{
            return redirect()->route('homepage');
        }
    }

    //funzione per la validazione
    private function Validation() {
        return [
            'name'=> 'required',
            'productor'=> 'required',
            'description' => 'required',
            'price'=> 'required|regex:/^\d*(\.\d{2})?$/'
        ];
    }

    private function errorPages($var)
    {
        if (empty($var)) {
            abort(404);
        }
    }

}
