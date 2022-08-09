<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {

        $total = Application::all();
        $announcement = Announcement::all();

        $pending = Application::where('status', 'Pending')->count();
        $recommended = Application::where('status', 'Recommended')->count();
        $admitted = Application::where('status', 'Admitted')->count();
        $processed = Application::where('status', 'Processed')->count();
        $rejected = Application::where('status', 'Rejected')->count();

        return view('admin.dashboard')
            ->with(compact('pending'))
            ->with(compact('recommended'))
            ->with(compact('admitted'))
            ->with(compact('processed'))
            ->with(compact('rejected'))
            ->with(compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        //
        $field = Announcement::find($id);
        $input = $request->all();
        $field->update($input);
        return back();
    }
}
