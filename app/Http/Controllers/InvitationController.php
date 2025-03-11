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

        $totalRemain = $invitations->whereNull('status')->count();

        $totalPresent = $invitations->whereNotNull('status')->count();

        return view('dashboard', compact('invitations', 'totalRemain', 'totalPresent'));
    }

    // Display a form for the admin to create an invitation.
    public function create()
    {
        return view('invitations.create');
    }

    // Store the invitation and generate a QR code.
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            // Optionally include email validation if needed:
            // 'email' => 'nullable|email'
        ]);

        // Generate a unique token
        $token = Str::random(32);

        // Create the invitation record
        $invitation = Invitation::create([
            'name'  => $request->name,
            'token' => $token,
            // 'email' => $request->email,  // if you collect an email address
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
}
