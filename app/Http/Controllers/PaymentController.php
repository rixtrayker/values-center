<?php

namespace App\Http\Controllers;

use App\Models\EduCenter;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function __construct()
    {
        view()->share('pageName', 'payment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Payment::all();
        return view('payments.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eduCenters = EduCenter::all();
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['serial'] = '0';
        $request['image'] = '0';
        $request['user_id'] = Auth::id();

        if ($request->paying_method == 'vodafone_cash') {
            if ($request->bank_id) {
                $request['bank_id'] = null;
            }
        }
        if ($request->paying_method == 'bank') {
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
        }
        if ($request->paying_method == 'cash') {
            if ($request->bank_id) {
                $request['bank_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
        }

        $validator = Validator::make($request->except('_token'), [
            'serial' => 'required|string',
            'reason' => 'required|string',
            'payment_amount' => 'required|integer',
            'refund_discount' => 'nullable|integer',
            'image_file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'paying_method' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'student_lecture_id' => 'nullable|exists:lecture_student,id',
            'edu_center_id' => 'nullable|exists:edu_centers,id',
            'vf_acc_id' => 'nullable|required_if:paying_method,vodafone_cash|exists:v_cashes,id',
            'is_vf_trans' => 'nullable|in:0,1',
            'bank_id' => 'nullable|required_if:paying_method,bank|exists:banks,id',
            'registration_id' => 'nullable|exists:registrations,id',
            'authenticate_id' => 'nullable|exists:authenticates,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        // $path = Storage::putFile('payment-images', new File($request->image));
        $record = Payment::create($request->except(['_token','image_file']));
        $record->serial = 'PAY_'.$record->id;
        $image_name = $record->serial.'.'.$request->image_file->extension();
        $request->file('image_file')->storeAs('payment-images', $image_name);
        $record->image = $image_name;
        $record->save();
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        if ($request->paying_method == 'vodafone_cash') {
            if ($request->bank_id) {
                $request['bank_id'] = null;
            }
        }
        if ($request->paying_method == 'bank') {
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
        }
        if ($request->paying_method == 'cash') {
            if ($request->bank_id) {
                $request['bank_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
            if ($request->is_vf_trans) {
                $request['vf_acc_id'] = null;
            }
        }
        $validator = Validator::make($request->except('_token'), [
            'reason' => 'required|string',
            'payment_amount' => 'required|integer',
            'refund_discount' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',//|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'paying_method' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'student_lecture_id' => 'nullable|exists:lecture_student,id',
            'edu_center_id' => 'nullable|exists:edu_centers,id',
            'vf_acc_id' => 'nullable|required_if:paying_method,vodafone_cash|exists:v_cashes,id',
            'is_vf_trans' => 'nullable|in:0,1',
            'bank_id' => 'nullable|required_if:paying_method,bank|exists:banks,id',
            'registration_id' => 'nullable|exists:registrations,id',
            'authenticate_id' => 'nullable|exists:authenticates,id',
            'status' => 'required|integer|in:0,1,2',
        ], []);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        if ($request->image_file) {
            $request->file('image_file')->storeAs('payment-images', $payment->image);
        }
        $payment->update($request->except(['_token','serial','user_id','image_file']));
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        Storage::delete('payment-images/'.$payment->image);
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
