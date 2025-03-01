<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;
class AuthenticationController extends Controller
{
    public function sendOtp(Request $request)
    {        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric|digits_between:10,15',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()], 401);
        }
        $phoneNumber = $request->phone_number;
        $role = $request->role;
        $user = User::where('phone_number', $phoneNumber)->first();
        if (!$user) {
            $user = User::create([
                'phone_number' => $phoneNumber,
                'role' => $role,
            ]);
        }
        $otp = rand(100000, 999999);
        DB::table('phone_otps')->updateOrInsert(
            ['phone_number' => $phoneNumber], 
            ['otp' => $otp, 'created_at' => now()]
        );
        $whatsappResponse = $this->sendOtpToWhatsApp($phoneNumber, $otp);
    
        if (!$whatsappResponse['status']) {
            return response()->json(['status' => false, 'message' => 'Failed to send OTP via WhatsApp'], 500);
        }
        return $this->json_response('success', 'OTP', 'OTP sent successfully via WhatsApp', 200);
    }

    // Function to send OTP via WhatsApp API
    private function sendOtpToWhatsApp($phoneNumber, $otp)
    {
        $whatsappApiUrl = "https://demo.digitalsms.biz/api/"; 
        $whatsappApiKey = "145eea6b8729b1dabfea2d707a759ea9"; 
        $message = urlencode("Your verification OTP is: $otp");
    
        // Build the request URL
        $requestUrl = "{$whatsappApiUrl}?apikey={$whatsappApiKey}&mobile={$phoneNumber}&msg={$message}";
    
        // Send request using HTTP Client
        $response = Http::get($requestUrl);
    
        // Check response status
        if ($response->successful()) {
            return ['status' => true, 'message' => 'OTP sent via WhatsApp'];
        } else {
            return ['status' => false, 'message' => 'Failed to send OTP via WhatsApp'];
        }
    }
    

        public function verifyOtp(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required|numeric|digits_between:10,15',
                'otp' => 'required|digits:6',
            ]);
        
            if ($validator->fails()) {
                return $this->json_response('error', 401, 'Validation failed', false, $validator->errors());
            }
            $otpRecord = DB::table('phone_otps')->where('phone_number', $request->phone_number)->first();
        
            if (!$otpRecord || $otpRecord->otp != $request->otp) {
                return $this->json_response('error', 401, 'Invalid OTP', false);
            }
        
            // Delete OTP after successful verification
            DB::table('phone_otps')->where('phone_number', $request->phone_number)->delete();
        
            // Retrieve user
            $user = User::where('phone_number', $request->phone_number)->first();
        
            if (!$user) {
                return $this->json_response('error', 404, 'User not found', false);
            }
        
            // Generate Token
            $token = $user->createToken('auth_token')->plainTextToken;
        
            return $this->json_response('success', 200, 'User authenticated successfully', true, [
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone_number' => $user->phone_number,
                ]
            ]);
        }
        public function test(){
            echo "Hello Testing";
        }
        }

