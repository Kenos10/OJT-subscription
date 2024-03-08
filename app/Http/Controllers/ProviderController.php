<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Subscriber;

class ProviderController extends Controller
{
    public function index()
    {
        $provider = Provider::all();
        return view('providers.provider', compact('provider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pname' => 'required|string|max:30',
            'pnum' => 'required|numeric',
        ]);

        $provider = new Provider([
            'pname' => $request->input('pname'),
            'pnum' => $request->input('pnum'),
        ]);
        
        $provider->save();
        
        return redirect()->back()->with('success', 'Provider added successfully.');
    }

    public function edit($id)
    {
        $provider = Provider::find($id);
    
        if (!$provider) {
            return redirect()->route('providers.index')->with('error', 'Provider not found.');
        }
    
        return view('providers.edit', compact('provider'));
    }    

    public function update(Request $request, $id)
    {
        $request->validate([
            'pname' => 'required|string|max:30',
            'pnum' => 'required|numeric',
        ]);
    
        $provider = Provider::find($id);
    
        if (!$provider) {
            return redirect()->route('providers.index')->with('error', 'Provider not found.');
        }
    
        $provider->update([
            'pname' => $request->input('pname'),
            'pnum' => $request->input('pnum'),
        ]);
    
        return redirect()->route('providers.index')->with('success', 'Provider updated successfully.');
    }
        
public function destroy($id)
{
    $provider = Provider::find($id);

    if (!$provider) {
        return redirect()->route('providers.index')->with('error', 'Provider not found.');
    }

    $subscribersDeleted = $provider->subscribers()->delete();

    $provider->delete();

    if ($subscribersDeleted) {
        return redirect()->route('providers.index')->with('success', 'Provider and associated subscribers deleted successfully.');
    } else {
        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully. No associated subscribers found.');
    }
}

}