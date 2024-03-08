<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscriber = Subscriber::all();
        $provider = Provider::all();

        return view('subscribers.subscriber', compact('subscriber', 'provider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'pid' => 'required|numeric',
        ]);

        $subscriber = new Subscriber([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'pid' => $request->input('pid'),
        ]);
        
        $subscriber->save();
        
        return redirect()->back()->with('success', 'Subscriber added successfully.');
    }

    public function edit($id)
    {
        $subscriber = Subscriber::find($id);
        $providers = Provider::all();

        return view('subscribers.edit', compact('subscriber', 'providers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'pid' => 'required|numeric',
        ]);

        $subscriber = Subscriber::find($id);
        $subscriber->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'pid' => $request->input('pid'),
        ]);

        return redirect()->route('subscribers.index')->with('success', 'Subscriber updated successfully.');
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();

        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted successfully.');
    }
}

