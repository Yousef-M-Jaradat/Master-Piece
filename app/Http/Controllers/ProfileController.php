<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\orderItems;
use App\Models\orders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $userId = auth()->user()->id;
        $orders = Orders::where('customerId', $userId)->get();
        $orderItems = [];

        foreach ($orders as $item) {
            $orderItems[] = OrderItems::where('customerId', $userId)
                ->where('orderId', $item->id)
                ->with('product')
                ->get();
        }

        return view('template.profile.profile', [
            'user' => $request->user(),
            'orderItems' => $orderItems,
            'orders' => $orders,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd("dddddddddddd");
        // Debugging: Log the request data
        logger($request->all());
// dd($request->file('image'));
        // dd("dddddddddddd");
        // Process and save the file
        if ($request->hasFile('image')) {
            // dd("dddddddddddddd");
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            // $imagePath = $request->file('image')->store('images/admins', 'public'); // Adjust the storage path as needed
            $request->user()->image = $imageName;
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
