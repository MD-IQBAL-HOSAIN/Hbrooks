<?php

namespace App\Http\Controllers\frontend;


use App\Jobs\ProcessEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ContactsController extends Controller
{

    //Index Function
    public function index()
    {
        return view('frontend.layout.contacts');
    }


    //Send Mail Function
    public function sendMail(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string',
            'message' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
        ]);

        // Prepare the email data
        $emailData = [
            'recipient' => 'iqbalmd5692@gmail.com', // Admin email
            'user_email' => $validatedData['email'], // User email if needed
            'subject' => 'New Message from ' . $validatedData['name'],
            'name' => $validatedData['name'],
            'message' => $validatedData['message'],
            'phone' => $validatedData['phone'],
            'country' => $validatedData['country'],
        ];

        // Dispatch the job
        try {
            $users = User::all();
            foreach ($users as $key => $user) {

                ProcessEmail::dispatch($user->email);
            }
            return redirect()->back()->with('success', 'Thank you. Your message has been sent.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
    }
}
