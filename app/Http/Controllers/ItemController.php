<?php

namespace App\Http\Controllers;

use App\Item;
use App\Mail\ItemClaimed;
use Illuminate\Http\Request;
use App\Http\Requests\ClaimItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\ItemClaimedNotification;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index', ['items' => Item::all()]);
    }

    public function show($id)
    {
        return view('items.show', ['item' => Item::findOrFail($id)]);
    }

    public function claim(ClaimItem $request, $id)
    {
        $item = Item::findOrFail($id);
        $identity = $request->input('identity');

        // This should really never happen unless someone is doing something
        // malicious, but we'll handle the case gracefully anyway.
        if ($item->hasBeenClaimed()) {
            return redirect()
                ->to("/bin/item/{$id}/claim-failed")
                ->with('identity', $item->claimed_by);
        }

        $item->claim($identity);
        $item->save();

        Mail::to($identity)->queue(new ItemClaimed($item));
        Mail::to('me@samrapdev.com')->queue(new ItemClaimedNotification($item));

        return redirect()
            ->to("/bin/item/{$id}/claim-successful")
            ->with('identity', $identity);
    }
}
