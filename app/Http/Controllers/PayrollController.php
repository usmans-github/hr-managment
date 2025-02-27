<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {

           
            $totalPaid = Payroll::where('status', 'Paid')->sum('amount');

            
            $totalPending = Payroll::where('status', 'Pending')->sum('amount');

            $payrolls = Payroll::latest()->paginate(6);

            return view('admin.payrolls', compact('payrolls', 'totalPaid', 'totalPending'));
        }
    }

    public function employee()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->with('payrolls')->first();
        

        return view('employee.payslip', compact('employee'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with(['position', 'department'])->get();

        return view('admin.create-payroll', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'pay_period'  => 'required|date',
            'amount'      => 'required|numeric|min:0',
            'status'      => 'required|in:Pending,Paid',
        ]);

        
        $payroll = Payroll::create([
            'employee_id' => $request->employee_id,
            'pay_period'  => $request->pay_period,
            'amount'      => $request->amount,
            'status'      => $request->status,
        ]);

        return redirect('/payroll')->with('success', 'Payroll created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'status' => 'required'
        ]);

        $payroll = Payroll::findOrFail($id);

        $payroll->update(['status' => 'Paid']);

        $payroll->save();

        return redirect()->back()->with('success', 'Payroll marked as Paid!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
