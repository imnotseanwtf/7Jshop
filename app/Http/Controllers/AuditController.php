<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::with('user')
            ->where('new_values', 'like', '%"status"%')
            ->get();

        return view('auditingTable.index', compact('audits'));
    }
}
