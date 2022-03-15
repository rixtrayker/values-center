<?php

namespace App\Http\Controllers;

use App\Models\EduCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EduCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = EduCenter::latest()->paginate(5);
        return view('educenters.index', compact('records'));
        // return view('products.index', compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:edu_centers,name',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        EduCenter::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EduCenter  $eduCenter
     * @return \Illuminate\Http\Response
     */
    public function show(EduCenter $eduCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EduCenter  $eduCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(EduCenter $eduCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EduCenter  $eduCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EduCenter $eduCenter)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:edu_centers,name,'.$id,
        ], []);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);

        $eduCenter->update($request->all());
        // $record = EduCenter::findOrFail($id);
        // $record->update(($request->all()));
        return redirect()->route('educenters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EduCenter  $eduCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(EduCenter $eduCenter)
    {
        //
    }
}
