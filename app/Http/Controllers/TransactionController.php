<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::where('user_role',null)->get();
        return view('transaction.create',compact('users'));
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'amount' => 'required',
            'method' => 'required',
            'tid' => 'required',
            'currency' => 'required',
        ]);
    
       if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
        $transaction = new Transaction();
            $transaction->user_id = $request->user_id;
            $transaction->amount = $request->amount;
            $transaction->method = $request->method;
            $transaction->tid = $request->tid;
            $transaction->currency = $request->currency;
            $transaction->save();
        if($transaction){
        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
        }else{
        return redirect()->route('transaction.index')->with('error', 'Error While Saving transaction.');  
        }
    }
    

    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    public function edit()
    {
        $transaction_id = $_GET['transaction_id'];
        $transaction = Transaction::find($transaction_id);
        $users = User::where('user_role','employee')->get();
        return view('transaction.edit', compact('users','transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
          $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'amount' => 'required',
            'method' => 'required',
            'tid' => 'required',
            'currency' => 'required',
            ]);
    
        if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
        $data = [
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'method' => $request->method,
            'tid' => $request->tid,
            'currency' => $request->currency,
        ];
        $transaction->update($data);
        return redirect()->route('transaction.index')->with('success', 'Transaction Updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
       
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }
}
