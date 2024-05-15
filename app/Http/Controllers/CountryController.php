<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceSteps;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\CountryService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('services')->get();
        return view('country.index', compact('countries'));
    }
    public function service_index()
    {
        $services = Service::with('countries')->get();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        $users = User::where('user_role','employee')->get();
        return view('country.create',compact('users'));
    }
    public function service_create()
        {
            $countries = Country::all();
            return view('service.create',compact('countries'));
        }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'flag' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'dimensions:min_width=700,min_height=450,max_width=800,max_height=500',
            ],
        ]);
        $imageName = time().'.'.$request->flag->extension();
        $request->flag->move(public_path('img/flags/'), $imageName);
        $imagePath = '/public/img/flags/'.$imageName; 
        $country = new Country();
        $country->name = $request->name;
        $country->flag = $imagePath; 
        $country->save();
    
        return redirect()->route('countries.index')
                         ->with('success', 'Country created successfully.');
    }

    public function store_service(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'countries' => 'required|array',
        ]);
        $service = Service::firstOrCreate(['name' => $request->input('service_name')]);
        $countries = $request->input('countries');
        foreach ($request->input('countries') as $country_id) {
            CountryService::create([
                'service_id' => $service->id,
                'country_id' => $country_id,
            ]);
        }
        return redirect()->route('services.index')->with('success', 'Service Created Successfully.');
    }
    

    public function show(Country $country)
    {
        return view('country.show', compact('country'));
    }

    public function edit()
    {
        $country_id = $_GET['country_id'];
        $country = Country::with('steps')->where('id',$country_id)->first();
        return view('country.edit', compact('country'));
    }
    public function edit_service()
    {
        $service_id = $_GET['service_id'];
        $service = Service::find($service_id);
        $country_ids = DB::table('country_service')
                ->where('service_id', $service_id)
                ->pluck('country_id')
                ->toArray();
        $countries = Country::whereIn('id', $country_ids)->get();
        return view('service.edit', compact('service','countries'));
    }
   public function update(Request $request, Country $country)
    {
    $country = Country::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'flag' => [
            'nullable',
            'image',
            'mimes:jpeg,png,jpg,gif',
            'dimensions:min_width=200,min_height=100,max_width=200,max_height=100',
            Rule::dimensions()->ratio(2),
            'max:2048', // max 2MB
        ],
    ]);

    if ($request->hasFile('flag')) {
        $imageName = time().'.'.$request->flag->extension();
        $request->flag->move(public_path('img/flags/'), $imageName);
        $imagePath = '/public/img/flags/'.$imageName; 
        $country->flag = $imagePath;
    }
    $country->name = $request->name;
    $country->save();

    return redirect()->route('countries.index')
                     ->with('success', 'Country updated successfully.');
    }
    public function update_service(Request $request, $id)
    {
         $request->validate([
        'countries' => 'required|array',
        'steps' => 'required|array',
        'steps.*' => 'required|string',
        ]);
        $service = Service::find($id);
        foreach ($request->input('countries') as $country_id) {
            
        $countryService = CountryService::where('country_id', $country_id)
                                        ->where('service_id', $service->id)
                                        ->first();

            foreach ($request->input('steps') as $step) {
                $serviceStep = new ServiceSteps();
                $serviceStep->country_service_id = $countryService->id;
                $serviceStep->name = $step;
                $serviceStep->save();
            }
        }
    
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

     public function service_destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
    }
}
