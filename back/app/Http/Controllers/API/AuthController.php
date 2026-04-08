<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ucenik;
use App\Models\Roditelj;
use App\Models\Profesor;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginRoditelj(Request $request) 
    {
        if (!Auth::guard('roditelj')->attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $roditelj = Auth::guard('roditelj')->user();
    
        $token = $roditelj->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Authorized',
            'roditelj' => $roditelj,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    
    public function loginProfesor(Request $request) 
    {
        if (!Auth::guard('profesor')->attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $profesor = Auth::guard('profesor')->user();
    
        $token = $profesor->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Authorized',
            'profesor' => $profesor,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    
    public function loginUcenik(Request $request) 
    {
        if (!Auth::guard('ucenik')->attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $ucenik = Auth::guard('ucenik')->user();
    
        $token = $ucenik->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Authorized',
            'ucenik' => $ucenik,
            'access_token' => $token,
            'token_type' => 'Bearer',
            //'redirect_url' => route('predmeti.ucenika', ['ucenikId' => $ucenik->id]),
        ]);
    }

    public function loginAdmin(Request $request) 
    {
        if (!Auth::guard('administrator')->attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $admin = Auth::guard('administrator')->user();
    
        $token = $admin->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Authorized',
            'admin' => $admin,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    } 

    public function logoutAdmin()
    {


       // auth()->guard('ucenik')->logout();
       $admin = auth()->user();
       $admin->currentAccessToken()->delete();

     //   return response()->json(['message' => 'Učenik uspešno odjavljen']);

        return response()->json([
            'message' => 'Admin uspešno odjavljen',
            'redirect_url' => route('login'),
        ]);

    }
  /*  {
        $data = json_decode($request->getContent(), true);

        $username = $data["username"];
        $pass = $data["password"];

        if(Auth::guard('administrator')->attempt(['username' => $username, 'password' => $pass])){
            //$parent = Auth::guard('student')->user();
        
            $admin = Admin::where('username',$username)->firstOrFail();
            $token = $admin->createToken('auth_token')->plainTextToken;

            return response()->json([
            'success' => 'Uspesno ste se ulogovali',
            'data' => $admin,
            'token' => $token,
            ], 200);
        }
        //return redirect()->route('')->with('success', 'Uspesno ste se ulogovali');
        return response()->json(['message' => 'Niste se uspešno ulogovali'],401);
        //return redirect()->route('')->withErrors('success', 'Uspesno ste se ulogovali');
    }*/

  //  public function registracijaAdmina(Request $request){

    /*    $existingAdmin = Admin::where('email', $email)->first();

      if (!$existingAdmin) {
       // Dodaj novog admina
       Admin::create([
        'ime' => $ime,
        'prezime' => $prezime,
        'username' => $username,
        'password' => $hashedPassword,
        'email' => $email,
        ]);
        } else {
            return response()->json(['message' => 'Vec postoji registrovan admin sa tim podacimna']);
        } */

   /*     $validator=Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'email' => 'required|email|unique:uceniks',
            'username'=>'required|string|max:255|unique:uceniks',
            'password'=>'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $admin=Admin::create([
           'ime'=>$request->ime,
           'prezime'=>$request->prezime, 
           'email' => $request->email,
           'username'=>$request->username, 
           'password'=>Hash::make($request->password),
            
        ]);

        $token=$admin->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data'=>$admin,
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    } */

    
    public function logoutProfesor()
    {
      /*  auth()->guard('profesor')->logout();

        return response()->json(['message' => 'Profesor uspešno odjavljen']); */

        $profesor = auth()->user();
        $profesor->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Profesor uspešno odjavljen',
            'redirect_url' => route('login'),
        ]);
    }

    public function logoutUcenik()
    {


       // auth()->guard('ucenik')->logout();
       $ucenik = auth()->user();
       $ucenik->currentAccessToken()->delete();

     //   return response()->json(['message' => 'Učenik uspešno odjavljen']);

        return response()->json([
            'message' => 'Učenik uspešno odjavljen',
            'redirect_url' => route('login'),
        ]);

    }

    public function logoutRoditelj()
    {
        /*auth()->guard('roditelj')->logout();

        return response()->json(['message' => 'Roditelj uspešno odjavljen']);*/

       $roditelj = auth()->user();
       $roditelj->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Roditelj uspešno odjavljen',
            'redirect_url' => route('login'),
        ]);

    }

    
    public function registracijaUcenika(Request $request){

        $validator=Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:uceniks',
            'password'=>'required|string|min:8',
            'email' => 'required|email|unique:uceniks',
            'odeljenjeId' => 'exists:odeljenjes,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'notsuccess', 'errors' => $validator->errors()], 422);
        }

        $ucenik=Ucenik::create([
           'ime'=>$request->ime,
           'prezime'=>$request->prezime, 
           'username'=>$request->username, 
           'password'=>Hash::make($request->password),
           'email' => $request->email,
           'odeljenjeId' => $request->odeljenjeId, 
            
        ]);

        $token=$ucenik->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=>'success',
            'data'=>$ucenik
        ]);
    }


    public function registracijaRoditelja(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'ime' => 'required|string|max:255',
        'prezime' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:roditeljs',
        'password' => 'required|string|min:8',
        'email' => 'required|email|unique:roditeljs',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $roditelj = Roditelj::create([
        'ime' => $request->ime,
        'prezime' => $request->prezime,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'email' => $request->email,
    ]);
    $token = $roditelj->createToken('auth_token')->plainTextToken;
    return response()->json([
        'data' => $roditelj,
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
    }

public function registracijaProfesora(Request $request)
{
$validator = Validator::make($request->all(), [
    'ime' => 'required|string|max:255',
    'prezime' => 'required|string|max:255',
    'username' => 'required|string|max:255|unique:profesors',
    'password' => 'required|string|min:8',
    'email' => 'required|email|unique:profesors',
    'predmetId' => 'required|exists:predmets,id',
]);

if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
}

$profesor = Profesor::create([
    'ime' => $request->ime,
    'prezime' => $request->prezime,
    'username' => $request->username,
    'password' => Hash::make($request->password),
    'email' => $request->email,
    'predmetId'=>$request->predmetId,
]);

$token = $profesor->createToken('auth_token')->plainTextToken;
return response()->json([
    'data' => $profesor,
    'access_token' => $token,
    'token_type' => 'Bearer',
]);
}


}

