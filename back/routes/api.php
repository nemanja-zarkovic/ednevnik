<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PredmetController;
use App\Http\Controllers\OdeljenjeController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\OcenaProfesorController;
use App\Http\Controllers\OcenaUcenikController;
use App\Http\Controllers\OcenaUnosController;
use App\Http\Controllers\UcenikNoviUnosController;
use App\Http\Controllers\UcenikPromenaOdeljenjaController;
use App\Http\Controllers\API\AuthController ;
use App\Http\Controllers\EksportOcenaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/login', function () {
    return response()->json(['Poruka' => 'Dobro dosli na login stranicu']);;
})->name('login');

Route::post('/login-ucenik', [AuthController::class, 'loginUcenik']);  //->name('login.ucenik');
Route::post('/login-profesor', [AuthController::class, 'loginProfesor']);//->name('login.ucenik');;
Route::post('/login-roditelj', [AuthController::class, 'loginRoditelj']);
Route::post('/login-admin', [AuthController::class, 'loginAdmin']);


Route::middleware(['auth:sanctum','ucenik_or_roditelj'])->group(function ()
{
    // Sve rute koje će koristiti ucenik ili roditelj
    //Route::get('/dashboard', 'UcenikController@dashboard')->name('ucenik_or_roditelj.dashboard');
    
    //ucenik, roditelj
    Route::get('/profesori-odeljenja/{odeljenjeId}/predmet/{predmetId}', [ProfesorController::class, 'profesorZaPredmetIOdeljenje']);
    //ovo je ruta gde ucenik bira da mu se prikaze ime i prezime profesora koji mu drzi neki konkretan predmet
    //u predavacu nam se cuvaju svi profesori koji predaju nekom odeljenju
    //a u uceniku imamo spoljni kljuc ka odeljenju, tj. kom odeljenju pripada ucenik

    //ucenik,roditelj OVA NAM IPAK NE TREBA JA MISLIM
    Route::get('/profesori-odeljenja/{odeljenjeId}', [ProfesorController::class, 'profesoriZaOdeljenje']);

    //rod, ucenik
    Route::get('/predmeti-ucenika/{ucenikId}', [PredmetController::class, 'predmetiZaUcenika'])->name('predmeti.ucenika');

    Route::get('/ocene-ucenika/{ucenikId}', [OcenaUcenikController::class, 'poslednjeOceneUcenika']);
    Route::get('/sve-ocene-ucenika/{ucenikId}', [OcenaUcenikController::class, 'sveOceneUcenika']);

    //IGNORISATI OVU RUTU:
    Route::get('/ocene-ucenika-po-predmetima/{ucenikId}', [OcenaUcenikController::class, 'oceneUcenikaPoPredmetima']);

    //ucenik i roditelj kada izaberu predmet mogu da vide sve ocene iz tog predmeta
    Route::get('ocene-iz-predmeta/{predmetId}/{ucenikId}', [OcenaUcenikController::class, 'oceneNaPredmetu']);
    
    Route::get('/eksport-ocena/{ucenikId}', [EksportOcenaController::class, 'EksportOcena']);

});


Route::middleware(['auth:sanctum','roditelj'])->group(function () 
{

    Route::get('/deca-roditelja/{roditeljId}', [UcenikController::class, 'uceniciZaRoditelja'])->name('ucenici.roditelja');

    Route::post('/logout-roditelj', [AuthController::class, 'logoutRoditelj']);

});

Route::middleware(['auth:sanctum','ucenik'])->group(function () 
{
    Route::post('/logout-ucenik', [AuthController::class, 'logoutUcenik']);

});


Route::middleware(['auth:sanctum','profesor'])->group(function () 
{
    //profesoru se prikazuju samo ona odeljenja kojima predaje
    Route::get('/odeljenja-profesora/{profesorId}', [OdeljenjeController::class, 'odeljenjaZaProfesora'])->name('odeljenja.profesora');;

    //profesor moze da vidi ucenike u okviru odeljenja kojima je predavac
    Route::get('/ucenici-odeljenja/{odeljenjeId}', [UcenikController::class, 'uceniciOdeljenja']);

    //profesor kada izabere ucenika moze da vidi sve ocene koje je dao tom uceniku
    Route::get('ocene-ucenika/{ucenikId}/{profesorId}', [OcenaProfesorController::class, 'index']);

    //profesor moze uceniku da unese novu ocenu
    Route::post('/unosocene', [OcenaUnosController::class, 'store']);

    Route::post('/logout-profesor', [AuthController::class, 'logoutProfesor']);

});


//Route::post('/registracija-admina', [AuthController::class, 'registracijaAdmina']);

Route::middleware(['auth:sanctum','admin'])->group(function () 
{
    //rute za registraciju 

Route::post('/registracija-ucenika', [AuthController::class, 'registracijaUcenika']);
Route::post('/registracija-roditelja', [AuthController::class, 'registracijaRoditelja']);
Route::post('/registracija-profesora', [AuthController::class, 'registracijaProfesora']);


//RUTE ZA PREGLED PROFESORA
Route::get('/profesori', [ProfesorController::class, 'index']);
//jedino admin ima pristup svim profesorima i svim podacima o profesorima (id, username...)
//na ovoj ruti izlistace se svi podaci iz baze o svim profesorima

Route::get('/profesori/{profesorId}', [ProfesorController::class, 'show']);


//RUTE ZA PREGLED PREDMETA

Route::get('/predmeti/{predmetId}', [PredmetController::class, 'show']);

Route::get('/predmeti', [PredmetController::class, 'index']);

//RUTE ZA PREGLED ODELJENJA

//admin moze da vidi sva odeljenja u sistemu
Route::get('/odeljenja', [OdeljenjeController::class, 'index']);
//ne koristim nikad:
Route::get('/odeljenja/{odeljenjeId}', [OdeljenjeController::class, 'show']);



//RUTE ZA PREGLED UCENIKA

//admin moze da vidi sve ucenike
Route::get('/ucenici', [UcenikController::class, 'index']);
Route::get('/ucenici/{ucenikId}', [UcenikController::class, 'show']);

//admin moze da kreira novog ucenika, da izmeni postojeceg ili da obrise ucenika?
Route::post('/ucenici', [UcenikController::class, 'store']); // ????

//RUTE ZA OCENE - uraditi sa resource ne sa get

//admin moze da vidi sve ocene
Route::resource('/ocene', OcenaController::class);

//ADMIN - DODAVANJE NOVOG UCENIKA U BAZU
Route::post('/noviucenik', [UcenikNoviUnosController::class, 'store']);
//ADMIN - IZMENA PODATKA O UCENIKU - PROMENA ODELJENJA
Route::put('/izmenaucenika/{id}', [UcenikPromenaOdeljenjaController::class, 'update']);

Route::post('/logout-admin', [AuthController::class, 'logoutAdmin']);

Route::delete('/obrisi-ocenu/{ucenikId}/{predmetId}/{razredId}/{datum}', [OcenaController::class, 'destroy']);

});
