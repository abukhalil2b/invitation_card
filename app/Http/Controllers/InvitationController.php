<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    // Display list of invitations.
    public function dashboard()
    {
        $invitations = Invitation::all();

        $totalRemain = $invitations->whereNull('used_at')->count();

        $totalPresent = $invitations->whereNotNull('used_at')->count();

        return view('dashboard', compact('invitations', 'totalRemain', 'totalPresent'));
    }

    // Display a form for the admin to create an invitation.
    public function create()
    {
        if (auth()->id() == 1) {

            return view('invitations.create');
        }
        abort(403);
    }

    // Store the invitation and generate a QR code.
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'recipient_phone'  => 'required|digits:8',
        ]);

        // Generate a unique token
        $token = Str::random(32);

        // Create the invitation record
        $invitation = Invitation::create([
            'recipient_phone' => $request->recipient_phone,
            'name'  => $request->name,
            'token' => $token,
        ]);

        // Create a URL that will be encoded in the QR code.
        // This URL is used by the guard to validate the invitation.
        $url = route('invitation.validate', ['token' => $token]);

        // Generate the QR code image (as an SVG or HTML output)
        $qrCode = QrCode::size(200)->generate($url);

        return view('invitations.show', compact('invitation', 'qrCode'));
    }

    // Validate the invitation when a QR code is scanned.
    public function validateInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return view('invitations.invalid');
        }

        if ($invitation->used_at) {
            return view('invitations.already_used');
        }

        // Mark the invitation as used (one-time use)
        $invitation->update(['used_at' => now()]);

        return view('invitations.valid', compact('invitation'));
    }

    public function index()
    {

        $invitations = Invitation::limit(300)->get()->map(function ($inv) {
            return [
                'name' => $inv->name,
                'qr_code' => QrCode::size(200)->generate(route('invitation.validate', ['token' => $inv->token]))
            ];
        });

        return view('invitations.index', compact('invitations'));
    }

    // Show  invitation
    public function show(Invitation $invitation)
    {
        $url = route('invitation.validate', ['token' => $invitation->token]);

        $qrCode = QrCode::size(200)->generate($url);

        return view('invitations.show', compact('invitation', 'qrCode'));
    }

    // Show form to edit invitation
    public function edit(Invitation $invitation)
    {
        return view('invitations.edit', compact('invitation'));
    }

    // Update invitation details
    public function update(Request $request, Invitation $invitation)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Update invitation fields
        $invitation->update([
            'name' => $request->name,
            'recipient_phone' => $request->recipient_phone,
            'used_at' => NULL
        ]);

        return redirect()->route('dashboard')->with('success', 'Invitation updated successfully!');
    }

    // Delete invitation
    public function destroy(Invitation $invitation)
    {
        // Delete invitation
        $invitation->delete();

        return redirect()->route('dashboard')->with('success', 'Invitation deleted successfully!');
    }
}
