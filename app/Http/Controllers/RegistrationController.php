<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    const NUM_VIP_ACCESS = 10;
    const NUM_EARLY_BIRD_ACCESS = 20;

    /**
     * Landing Page view.
     */
    public function index(): View
    {
        $max_access_privilege = self::NUM_EARLY_BIRD_ACCESS + self::NUM_VIP_ACCESS;

        $registrations = Registration::count();
        $message = "Register with the form below";
        if ($registrations <= self::NUM_VIP_ACCESS) {
            $message = self::NUM_VIP_ACCESS - $registrations . ' VIP Access Left';
        } elseif ($registrations <= $max_access_privilege) {
            $message = $max_access_privilege - $registrations . ' Early-bird Access Left';
        }

        return view('welcome')->with("available_slots", $message);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  RegistrationRequest  $request
     * @return Response|JsonResponse
     */
    public function register(RegistrationRequest $request): Response|JsonResponse
    {
        Registration::create($request->validated());

        $registrations = Registration::count();
        $max_access_privilege = self::NUM_EARLY_BIRD_ACCESS + self::NUM_VIP_ACCESS;

        $message = 'Thank you for registering!';
        $available_msg = "Register with the form below";

        if ($registrations <= self::NUM_VIP_ACCESS) {
            $message .= ' You have received VIP access.';
            $available_msg = self::NUM_VIP_ACCESS - $registrations . ' VIP Access Left';
        } elseif ($registrations <= $max_access_privilege) {
            $message .= ' You have received early-bird access.';
            $available_msg = $max_access_privilege - $registrations . ' Early-bird Access Left';
        }

        return response()->json([
            'message' => $message,
            'available' => $available_msg,
        ]);
    }
}
