<?php

namespace App\Rules;

use App\Models\adminModel1;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
     protected $request;
     public function __construct($request){
        $this->request = $request;
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $email = $this->request->input('email');
        $pass = $this->request->input('password');
        $loginStatus= False;

        $cekemail = adminModel1::where('email',$email)->count();
        if($cekemail>0){
            $adminPass = adminModel1::where('email',$email)->value('password');

            if(Hash::check($pass,$adminPass)){
                $loginStatus = TRUE;
            }
        }

        if($loginStatus){
            $ambilAdmin = adminModel1::where('email',$email)-> first();
            Session::put('loginStatus', TRUE);
            Session::put('ambilAdmin',$ambilAdmin);
        } else {
            $fail ("Email dan password Salah");
        }
    }
}
