<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appropriation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AppropriationController extends Controller
{
   /**
    * Display a listing of the appropriations.
    */
   public function index()
   {
      // Fetch all appropriations ordered by date_received
      $appropriations = Appropriation::orderBy('date_received', 'desc')->get();

      return view('budgeting.rapal', compact('appropriations'));
   }

   /**
    * Store a newly created appropriation in storage.
    */
   // public function store(Request $request)
   // {
   //    // Validate request data
   //    $request->validate([
   //       'document_type'   => 'required|in:GAA,SARO,SUBARO',
   //       'document_number' => 'required|string|max:50|unique:appropriations',
   //       'date_received'   => 'required|date',
   //       'amount'          => 'required|numeric|min:0',
   //       'status'          => 'required|in:Pending,In Progress,Completed',
   //    ]);

   //    // Create new appropriation record
   //    Appropriation::create($request->all());

   //    return redirect()->route('appropriations.index')->with('success', 'Appropriation created successfully.');
   // }
   public function store(Request $request)
   {
      try {
         $validated = $request->validate([
            'document_type' => 'required|string|max:255',
            'document_number' => 'required|string|unique:appropriations,document_number',
            'date_received' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:Pending,In Progress,Completed',
         ]);

         $dateReceived = Carbon::parse($request->date_received)->format('Y-m-d');

         $appropriation = new Appropriation();
         $appropriation->document_type = $validated['document_type'];
         $appropriation->document_number = $validated['document_number'];
         $appropriation->date_received = $dateReceived;
         $appropriation->amount = $validated['amount'];
         $appropriation->status = $validated['status'];
         $appropriation->save();

         return response()->json([
            'success' => true,
            'message' => 'Appropriation added successfully!'
         ]);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'Failed to save appropriation: ' . $e->getMessage()
         ], 500);
      }
   }
   /**
    * Display the specified appropriation.
    */
   public function show(Appropriation $appropriation)
   {
      return view('appropriations.show', compact('appropriation'));
   }

   /**
    * Show the form for editing the specified appropriation.
    */
   public function edit($id)
   {
      $appropriation = Appropriation::find($id);
      // ✅ This returns a SINGLE record

      if (!$appropriation) {
         return response()->json(['success' => false, 'message' => 'Record not found.'], 404);
      }

      return response()->json(['success' => true, 'data' => $appropriation]);
   }

   /**
    * Update the specified appropriation in storage.
    */
   public function update(Request $request, $id)
   {
      $request->validate([
         'document_type' => 'required|string',
         'document_number' => 'required|string',
         'date_received' => 'required|date',
         'amount' => 'required|numeric'
      ]);

      $appropriation = Appropriation::findOrFail($id);
      $appropriation->update([
         'document_type' => $request->document_type,
         'document_number' => $request->document_number,
         'date_received' => $request->date_received,
         'amount' => $request->amount,
      ]);

      return response()->json(['message' => 'Appropriation updated successfully']);
   }


   /**
    * Remove the specified appropriation from storage.
    */
   public function destroy($id)
   {
      try {
         $appropriation = Appropriation::findOrFail($id);
         $appropriation->delete();

         return response()->json([
            'success' => true,
            'message' => 'Appropriation deleted successfully!'
         ]);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'Failed to delete appropriation: ' . $e->getMessage()
         ], 500);
      }
   }
}
