<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\TableHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TableController extends Controller
{
    public function index(Request $request)
    {
        $table = Table::paginate(50);
        if ($request->ajax()) {
            return view('table.table', compact('table'));
        }
        return view('table.index',compact('table'));
    }

    public function myHistory (Request $request)
    {
        $history = TableHistory::where('user_id', \Auth::user()->id)->paginate(50);
        if ($request->ajax()) {
            return view('table.history', compact('history'));
        }
        return view('table.index', compact('history'));

    }

    public function show($id)
    {
        $show = Table::find($id);
        $history = TableHistory::where('company_id', $id)->get();
        return view('table.show', ['show' => $show, 'history' => $history]);
    }

    public function searchTable(Request $request)
    {
        $search = Table::orWhere('name', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('inn', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('city', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('country', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('federal_district', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('region', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('specialist', 'LIKE',  '%' . $request->search . '%')
            ->take(15)
            ->get();
        return response()->json($search);
    }

    public function addHistory($id, Request $request)
    {
        $show = Table::find($id);
        foreach($request->all() as $key=>$val){
            if (isset($val) && $val != '' && $val != 'on' && $key != 'history' && $key != 'contact_date' && $key != 'next_contact_date' && $key != 'dialogueType' && $key != 'dialogue_sense' && $key != 'arrangement'){
                $show->$key = $request->$val;
            }
        }
        $show->save();

        if ($request->history == 'on') {
            $history = new TableHistory;
            $history->contact_date = $request->contact_date;
            $history->next_contact_date = $request->next_contact_date;
            $history->dialogue_type = $request->dialogueType;
            $history->dialogue_sense = $request->dialogue_sense;
            $history->arrangement = $request->arrangement;
            $history->company_id = $id;
            $history->user_id = \Auth::user()->id;
            $history->save();
        }

        return ['success'];
    }

    public function import()
    {
        return 'Success!';
    }
}
