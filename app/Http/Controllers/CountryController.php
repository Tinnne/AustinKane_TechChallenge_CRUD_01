<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::orderByRaw('LOWER(country)')->paginate(10);
        return view("homepage", compact("countries"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "country" => "required|string",
            "continent" => "required|string",
            "capital" => "required|string",
            "population" => "required|integer",
        ]);

        $slug = Str::slug($request->country);
        Country::create([
            "country" => $request->country,
            "continent" => $request->continent,
            "capital" => $request->capital,
            "population" => $request->population,
            "slug" => $slug
        ]);

        return redirect("/");
    }

    public function edit($slug)
    {
        $countryedit = Country::where("slug", $slug)->first();
        $countries = Country::orderByRaw('LOWER(country)')->paginate(10);

        return view("homepage", compact('countryedit', 'countries'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            "country" => "required|string",
            "continent" => "required|string",
            "capital" => "required|string",
            "population" => "required|integer",
        ]);

        $country = Country::where('slug', $slug)->first();
        $newSlug = Str::slug($request->country);

        $country->update([
            "country" => $request->country,
            "continent" => $request->continent,
            "capital" => $request->capital,
            "population" => $request->population,
            "slug" => $newSlug
        ]);

        return redirect('/');
    }

    public function delete($slug)
    {
        $country = Country::where('slug', $slug)->first();
        $country->delete();

        return redirect('/');
    }
}
