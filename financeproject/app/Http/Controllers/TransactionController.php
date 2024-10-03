<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        // Fetch all transactions
        $transactions = Transaction::all();

        return response()->json($transactions);
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'description' => 'required|string|max:255',
        'amount'      => 'required|numeric',
        'type'        => 'required|in:income,expense',
        'date'        => 'required|date',
    ]);

    // Create a new transaction (without user_id since no authentication)
    $transaction = Transaction::create([
        'description' => $request->description,
        'amount' => $request->amount,
        'type' => $request->type,
        'date' => $request->date,
    ]);

    return response()->json([
        'message' => 'Transaction added successfully!',
        'transaction' => $transaction,
    ], 201);
}


    /**
     * Display the specified transaction.
     */
    public function show($id)
    {
        // Find the transaction by ID (no user filtering)
        $transaction = Transaction::findOrFail($id);

        return response()->json($transaction);
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric',
            'type'        => 'required|in:income,expense',
            'date'        => 'required|date',
        ]);

        // Find and update the transaction
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'date' => $request->date,
        ]);

        return response()->json([
            'message' => 'Transaction updated successfully!',
            'transaction' => $transaction,
        ]);
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy($id)
    {
        // Find and delete the transaction
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted successfully!',
        ]);
    }
}
