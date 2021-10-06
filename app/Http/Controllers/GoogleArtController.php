<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Exhibit;
use App\Models\Home;
use App\Models\Partner;
use Illuminate\Http\Request;

class GoogleArtController extends Controller
{
    public function index()
    {
        /*
        select * from homes
        */
        /*
        select
            home.id AS id,
            home.name AS name,
            home.thumbnail AS thumbnail,
            sum(home.jumlah) AS items
        from
            (
                select
                    art_place.countries.id AS id,
                    art_place.countries.name AS name,
                    art_place.countries.thumbnail AS thumbnail,
                    count(art_place.partners.id) AS jumlah
                from
                    (
                        art_place.countries
                        left join art_place.partners on(
                            art_place.countries.id = art_place.partners.country_id
                        )
                    )
                where
                    art_place.countries.thumbnail != ''
                group by
                    art_place.countries.id
                union
                select
                    art_place.countries.id AS id,
                    art_place.countries.name AS name,
                    art_place.countries.thumbnail AS thumbnail,
                    count(art_place.exhibits.id) AS jumlah
                from
                    (
                        art_place.countries
                        left join art_place.exhibits on(
                            art_place.countries.id = art_place.exhibits.country_id
                        )
                    )
                where
                    art_place.countries.thumbnail != ''
                group by
                    art_place.countries.id
                union
                select
                    art_place.countries.id AS id,
                    art_place.countries.name AS name,
                    art_place.countries.thumbnail AS thumbnail,
                    count(art_place.assets.country_id) AS jumlah
                from
                    (
                        art_place.countries
                        left join art_place.assets on(
                            art_place.countries.id = art_place.assets.country_id
                        )
                    )
                where
                    art_place.countries.thumbnail != ''
                group by
                    art_place.countries.id
            ) home
        group by
            home.id
        */
        return view('google-art/country', [
            'countries' => Home::get()
        ]);
    }

    public function entity($id)
    {
        /*
        select 
            countries.name as country, 
            partners.id, 
            partners.name, 
            partners.logo, 
            partners.thumbnail, 
            partners.description
        from 
            partner
        inner join
            countries on countries.id = partners.country_id
        where
            partners.country_id = $id
        AND
            deleted_at is null
        */
        $partner = Partner::select('countries.name as country', 'partners.id', 'partners.name', 'partners.logo', 'partners.thumbnail', 'partners.description')
        ->join('countries', 'countries.id', '=', 'partners.country_id')
        ->where('partners.country_id', '=', $id)
        ->get();

        /*
        select 
            count(partners.id) as jumlah
        from 
            partner
        inner join
            countries on countries.id = partners.country_id
        where
            partners.country_id = $id
        AND
            deleted_at is null
        */
        $jumlahpartner = Partner::selectRaw('count(partners.id) as jumlah')
        ->join('countries', 'countries.id', '=', 'partners.country_id')
        ->where('partners.country_id', '=', $id)
        ->get();

        /*
        select 
            countries.name as countryName, 
            exhibits.id, 
            exhibits.name, 
            exhibits.description, 
            exhibits.background
        from 
            exhibits
        inner join
            countries on exhibits.country_id = countries.id
        where
            exhibits.country_id = $id
        AND
            deleted_at is null
        */
        $exhibit = Exhibit::select('countries.name as countryName', 'exhibits.id', 'exhibits.name', 'exhibits.description', 'exhibits.background')
        ->join('countries', 'exhibits.country_id', '=', 'countries.id')
        ->where('exhibits.country_id', '=', $id)
        ->get();

        $jumlahexhibit = Exhibit::selectRaw('count(exhibits.id) as jumlah')
        ->join('countries', 'exhibits.country_id', '=', 'countries.id')
        ->where('exhibits.country_id', '=', $id)
        ->get();

        return view('google-art/entity', [
            'partners' => $partner,
            'exhibits' => $exhibit,
            'jumlahExhibit' => json_decode($jumlahexhibit),
            'jumlahPartner' => json_decode($jumlahpartner),
            'id' => $id
        ]);
    }

    public function partner($id)
    {
        $exhibit = Exhibit::select('countries.name as countryName', 'exhibits.id', 'exhibits.name', 'exhibits.description', 'exhibits.background')
        ->join('countries', 'exhibits.country_id', '=', 'countries.id')
        ->where('exhibits.partner_id', '=', $id)
        ->get();

        $jumlahexhibit = Exhibit::selectRaw('count(exhibits.id) as jumlah')
        ->join('countries', 'exhibits.country_id', '=', 'countries.id')
        ->where('exhibits.partner_id', '=', $id)
        ->get();

        $categories = Category::select('categories.id', 'categories.name', 'categories.thumbnail')
        ->selectRaw('COUNT(assets.id) AS jumlah')
        ->leftJoin('assets', 'assets.category_id', '=', 'categories.id')
        ->where('categories.partner_id', '=', $id)
        ->groupBy('categories.id')
        ->get();

        $jumlahCategory = Category::selectRaw('count(categories.id) as jumlah')
        ->join('partners', 'categories.id', '=', 'partners.id')
        ->where('partner_id', '=', $id)
        ->get();
        return view('google-art.partner', [
            'id' => $id,
            'exhibits' => $exhibit,
            'jumlahExhibit' => json_decode($jumlahexhibit),
            'categories' => $categories,
            'jumlahCategory' => $jumlahCategory
        ]);
    }

    public function exhibit($id)
    {
        return view('google-art.exhibit', [
            'id' => $id
        ]);
    }

    public function collection($id)
    {
        /*
        select * from asset where assets.category_id = $id
        */
        $collections = Asset::where('assets.category_id', '=', $id)
        ->get();

        $param1 = Category::select('partners.name')
        ->Join('partners','categories.partner_id','=','partners.id')
        ->where('categories.id', '=', $id)
        ->get();
        
        $param2 = Category::select('name')
        ->where('id', '=', $id)
        ->get();
        
        $param3 = Asset::selectRaw('count(assets.id) as jumlah')
        ->where('assets.category_id', '=', $id)
        ->get();

        return view('google-art.collection', [
            'collections' => $collections,
            'param1' => json_decode($param1),
            'param2' => json_decode($param2),
            'param3' => json_decode($param3)
        ]);
    }

    public function asset($id)
    {
        return view('google-art.asset', [
            'id' => $id
        ]);
    }
}
