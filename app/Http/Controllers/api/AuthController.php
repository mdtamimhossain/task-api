<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Requests\Auth\VerificationRequest;
use App\Http\Services\AuthService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function App\Http\Controllers\randomNumber;

class AuthController extends Controller
{
    private AuthService $service;
    function __construct(AuthService $service)
    {
        $this->service=$service;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login (LoginRequest $request): JsonResponse
    {

        return response()->json($this->service->processLogin($request->all()));

    }

    /**
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register (RegistrationRequest $request): JsonResponse
    {

        return response()->json($this->service->processRegistration($request->all()));

    }

    /**
     * @param VerificationRequest $request
     * @return JsonResponse
     */
    public function verify (VerificationRequest $request): JsonResponse
    {

        return response()->json($this->service->processVerification($request->all()));

    }

    /**
     * @return JsonResponse
     */
    public function logout():JsonResponse
    {
        return response()->json($this->service->logout());
    }
}
