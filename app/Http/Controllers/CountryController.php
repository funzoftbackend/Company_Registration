<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\DomainSteps;
use App\Models\DomainPrices;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\ServiceDomain;
use App\Models\CountryDomain;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with(['domains.service' => function ($query) {
            $query->distinct();
        }])->distinct()->get();
        return view('country.index', compact('countries'));
    }
    public function service_index()
    { 
       $services = Service::with('domains')->get();
       foreach($services as $service){
          foreach($service->domains as $domain){
              $countryDomains = CountryDomain::where('domain_id',$domain->id)->get();
              foreach($countryDomains as $countryDomain){
                  $domain->steps = DomainSteps::where('country_domain_id',$countryDomain->id)->get();
              }
          }
       }
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
       $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'flag' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'dimensions:min_width=700,min_height=450,max_width=800,max_height=500',
            ],
        ]);
        if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
        }
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
        $validator = Validator::make($request->all(), [
            'service_name' => 'required',
            'countries' => 'required|array',
        ]);
        if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
            }
        $service = Service::firstOrCreate(['name' => $request->input('service_name')]);
        $country_ids = $request->input('countries');
        return redirect()->route('service.create',['service_id' => $service->id,'country_ids' => implode(',', $country_ids)])->with('success' ,'Service Created Successfully.');
    }
   public function domain_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domains' => 'required|array',
            'domains.*' => 'required|string|max:255',
            'prices' => 'required|array',
            'prices.*' => 'required|array',
            'unit' => 'required|array',
            'unit.*' => 'required|array',
            'package_name' => 'required|array',
            'package_name.*' => 'required|array',
            'countries' => 'required|array',
            'countries.*' => 'required|integer|exists:countries,id',
        ]);
        if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
        }
        $domains = $request->input('domains');
        $prices = $request->input('prices');
        $units = $request->input('unit');
        $packageNames = $request->input('package_name');
        $countries = $request->input('countries');
        foreach ($domains as $domainIndex => $domain) {
            
            $serviceDomain = ServiceDomain::create([
                'service_id' => $request->service_id,
                'name' => $domain,
            ]);
    
            foreach ($countries as $country) {
                CountryDomain::create([
                    'domain_id' => $serviceDomain->id,
                    'country_id' => $country,
                ]);
            }
            if (isset($prices[$domainIndex+1]) && isset($units[$domainIndex+1]) && isset($packageNames[$domainIndex+1])) {
                foreach ($prices[$domainIndex+1] as $priceIndex => $price) {
                    DomainPrices::create([
                        'domain_id' => $serviceDomain->id,
                        'price' => $price,
                        'unit' => $units[$domainIndex+1][$priceIndex],
                        'package_name' => $packageNames[$domainIndex+1][$priceIndex],
                    ]);
                }
            }
        }
    
        return redirect()->route('services.index')->with('success', 'Service Domains Created Successfully.');
    }



    public function show(Country $country)
    {
        return view('country.show', compact('country'));
    }

    public function edit()
    {
        $country_id = $_GET['country_id'];
        $country = Country::where('id',$country_id)->first();
        return view('country.edit', compact('country'));
    }
    public function edit_service()
    {
        $service_id = $_GET['service_id'];
        $service = Service::find($service_id);
        $domains = ServiceDomain::where('service_id',$service_id)->get();
        foreach($domains as $domain){
        $country_ids = DB::table('country_domain')
                ->where('domain_id', $domain->id)
                ->pluck('country_id')
                ->toArray();
        }
        $countries = Country::whereIn('id', $country_ids)->get();
        return view('service.edit', compact('domains','service','countries'));
    }
   public function update(Request $request, Country $country)
    {
    $country = Country::findOrFail($country->id);
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'flag' => [
            'nullable',
            'image',
            'dimensions:min_width=110,min_height=110,max_width=120,max_height=120',
        ],
    ]);
     if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
        }
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
         $validator = Validator::make($request->all(), [
        'countries' => 'required|array',
        'steps' => 'required|array',
        'steps.*' => 'required|string',
        'domains' => 'required|array',
        ]);
        if ($validator->fails()) {
                return redirect()->back()->withInput()->with('error', $validator->errors()->first());
        }
        $service = Service::find($id);
        foreach ($request->input('countries') as $country_id) {
        foreach($request->input('domains') as $domain){
        $countrydomains = CountryDomain::where('country_id', $country_id)
                                        ->where('domain_id', $domain)
                                        ->get();
            foreach($countrydomains as $countrydomain){
            foreach ($request->input('steps') as $index => $step) {
                $serviceStep = new DomainSteps();
                $serviceStep->country_domain_id = $countrydomain->id;
                $serviceStep->name = $step;
                $serviceStep->level = $index + 1;
                $serviceStep->save();
            }
            }
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
