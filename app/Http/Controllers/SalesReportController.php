<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesReportRequest;
use App\Http\Requests\UpdateSalesReportRequest;
use App\Models\SalesDate;
use App\Models\SalesReport;
use Illuminate\Http\Request;
use PDF;

class SalesReportController extends Controller
{
    public function index()
    {
        $salesReports = SalesDate::with('salesReports')->get();

        return view('admin.salesReport.index', compact('salesReports'));
    }

    public function create()
    {
        return view('admin.salesReport.create');
    }

    public function store(SalesReportRequest $request)
    {
        // Check if a SalesDate with the given date already exists
        $salesDate = SalesDate::firstOrCreate(['date' => $request->date]);

        // Create the SalesReport with the found or created SalesDate id
        SalesReport::create(
            $request->validated() + [
                'sales_date_id' => $salesDate->id,
                'user_id' => auth()->user()->id,
            ],
        );

        alert()->success('New sales has been added');
        return redirect()->route('sales-report.index');
    }

    public function edit(SalesReport $salesReport)
    {
        $salesReport->load('salesDate');
        return view('admin.salesReport.edit', compact('salesReport'));
    }

    // public function show(SalesReport $salesReport)
    // {
    //     $salesReport->load('salesDate');

    //     return view('admin.salesReport.show', compact('salesReport'));
    // }

    public function view($salesDateId)
    {
        // Step 1: Get the specific SalesDate by ID
        $salesDate = SalesDate::findOrFail($salesDateId);

        // Step 2: Extract the month and year from the date
        $month = $salesDate->date->format('m');
        $year = $salesDate->date->format('Y');

        // Step 3: Find all SalesDate records with the same month and year
        $relatedSalesDates = SalesDate::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        // Step 4: Load all the related sales reports for the found SalesDate records
        $relatedSalesDates->load('salesReports');

        return view('admin.salesReport.show', compact('salesDate', 'relatedSalesDates'));
    }
    
     public function salesReport($salesDateId)
    {
        // Step 1: Get the specific SalesDate by ID
        $salesDate = SalesDate::findOrFail($salesDateId);

        // Step 2: Extract the month and year from the date
        $month = $salesDate->date->format('m');
        $year = $salesDate->date->format('Y');

        // Step 3: Find all SalesDate records with the same month and year
        $relatedSalesDates = SalesDate::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        // Step 4: Load all the related sales reports for the found SalesDate records
        $relatedSalesDates->load('salesReports');

        $pdf = PDF::loadView('pdf.salesReport', compact('relatedSalesDates'));

        return $pdf->inline();
    }
    
    public function update(UpdateSalesReportRequest $request, SalesReport $salesReport)
    {
        $salesReport->update($request->validated());

        alert()->success('Sale has been updated');
        return redirect()->route('sales-report.index', compact('salesReport'));
    }

    public function destroy(SalesReport $salesReport)
    {
        $salesReport->delete();

        alert()->success('Sale has been deleted');
        return redirect()->back();
    }

    public function delete(SalesDate $salesDate)
    {
        $salesDate->delete();

        alert()->success('Sale has been deleted');
        return redirect()->route('sales-report.index');
    }
}
