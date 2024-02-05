<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\QuotationImage;
use App\Http\Requests\StoreQuotationRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (
            auth()
            ->user()
            ->hasRole('admin') ||
            auth()
            ->user()
            ->hasRole('staff')
        ) {
            // If the user has 'admin' or 'staff' role
            $quotations = Quotation::with('user')
                ->where('status', '<=', 3)
                ->get();
        } else {
            // If the user does not have 'admin' or 'staff' role
            $quotations = Quotation::with('user')
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('staff.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuotationRequest $request)
    {
        $quotation = Quotation::create($request->except('images') + ['user_id' => auth()->id(), 'status' => 0]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Check if the uploaded file is valid
                if ($image->isValid()) {
                    // Store the image in the public disk (storage/app/public)
                    $path = $image->store('quotations', 'public');

                    // Insert each image path with the corresponding quotation_id into the quotation_images table
                    QuotationImage::create([
                        'quotation_id' => $quotation->id,
                        // Change the path from 'public/quotations' to 'storage/quotations'
                        'image' => str_replace('public/', 'storage/', $path),
                    ]);
                }
            }
        }

        alert()->success('Quotation has been submitted');
        return redirect()->route('quotation.index');
    }

    /**
     * Display the specified resource.
     */
    public function downloadFile(Quotation $quotation)
{
    // Get the file path from the 'file' column in the quotations table
    $filePath = $quotation->file;
    // Check if the file exists
    if (Storage::exists($filePath)) {
        // Get the original file name and extension
        $originalFileName = pathinfo($filePath, PATHINFO_FILENAME);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Define the filename for download (you can use the original filename)
        $filename = $originalFileName . '.' . $extension;

        // Return the file as a download response
        return Response::download(storage_path("app/{$filePath}"), $filename);
    } else {
        abort(404, 'File not found');
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        alert()->success('Quotation has been deleted');
        return redirect()->route('quotation.index');
    }

    public function cancel(Quotation $quotation)
    {
        $quotation->update(['status' => 1]);

        alert()->success('Successfully changed to Cancelled');
        return redirect()->route('quotation.index');
    }

    public function complete(Quotation $quotation, Request $request)
    {

        $data = ['status' => 2];
        $request->validate([
            'file' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('quotation');
        }
        $quotation->update($data);

        alert()->success('Successfully changed to Completed');
        return redirect()->route('quotation.index');
    }

    public function archive(Quotation $quotation)
    {
        $quotation->update(['status' => 4]);

        alert()->success('Quotation has been archived');
        return redirect()->route('quotation.index');
    }

    public function restore(Quotation $quotation)
    {
        $quotation->update(['status' => 0]);

        alert()->success('Quotation has been restore');
        return redirect()->route('quotation.index');
    }

    public function archiveTable()
    {
        $archives = Quotation::where('status', '=', '4')->get();

        return view('archive.index', compact('archives'));
    }
}
