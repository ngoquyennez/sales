<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.index',['sales'=>sale::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = DB::table('medicines')->get();
        return view('sales.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $medicine_id = $request->input('medicine_id');
        $quantity = $request->input('quantity');
        $sale_date = $request->input('sale_date');
        $customer_phone = $request->input('customer_phone');
        
        $validatedData = $request->validate([
           
            'medicine_id' => 'required',
            'quantity' => 'required',
            'sale_date' => 'required',
            'customer_phone' => 'required',
           
        ]);
        DB::table('sales')->insert([
          
            'medicine_id' => $medicine_id,
            'quantity' => $quantity,
            'sale_date' => $sale_date,
            'customer_phone' => $customer_phone,
           
        ]);
        return redirect()->route('sales.index')->with('success', 'Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $saleid)
    {
        $medicines = DB::table('medicines')->get();
        $sale = Sale::find($saleid);
        return view('sales.edit', compact('medicines','sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sale $sale)
    {
        $medicine_id = $request->input('medicine_id');
        $quantity = $request->input('quantity');
        $sale_date = $request->input('sale_date');
        $customer_phone = $request->input('customer_phone');
        
        $validatedData = $request->validate([
           
            'medicine_id' => 'required',
            'quantity' => 'required',
            'sale_date' => 'required',
            'customer_phone' => 'required',
           
        ]);
        $sale ->update([
          
            'medicine_id' => $medicine_id,
            'quantity' => $quantity,
            'sale_date' => $sale_date,
            'customer_phone' => $customer_phone,
           
        ]);
        return redirect()->route('sales.index')->with('success', 'edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $saleid)
    {
        $sale = Sale::find($saleid);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'deleted successfully.');
    }
}
