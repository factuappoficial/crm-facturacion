<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class ClientInvoicesExport implements FromView
{
    public function view(): View
    {
        $clientInvoices = Invoice::whereClientId(Auth::user()->client->id)
            ->where('status', '!=', Invoice::DRAFT)
            ->with('payments')->get();

        return view('excel.client_invoices_excel', compact('clientInvoices'));
    }
}
