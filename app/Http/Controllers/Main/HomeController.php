<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Main\Media;
use App\Models\Main\MediaCategory;

class HomeController extends Controller
{
    /**
    * index
    */
    public function index()
    {
        $partners = [
            ['name' => 'Smile and Learn', 'url' => 'https://eduemocion.com/wp-content/uploads/2020/02/Logo-Smile-and-Learn-horizontal-300x123.png'],
            ['name' => 'Finny the Shark', 'url' => 'https://static.wikia.nocookie.net/finny-the-shark/images/2/2e/Finny_the_Shark.png/revision/latest?cb=20240203010503'],
            ['name' => 'CITAM Schools', 'url' => 'https://citamschools.sc.ke/web/image/website/1/logo?unique=33d783b'],
            ['name' => 'Starehe Boys Centre', 'url' => 'https://upload.wikimedia.org/wikipedia/en/8/86/The%2BStarehe%2BLion%2BCrest.jpg'],
            ['name' => 'Masinga Girls', 'url' => 'https://masingagirls.sc.ke/wp-content/uploads/2021/12/Logo-01-1.png'],
            // ['name' => 'Safarilink', 'url' => 'https://atta.travel/static/1ef725b6-d400-425d-875ec5445ea87afa/opengraphimage_83f4e8796336604b59d7216d0ecd81a5_4a7c7e45a350/Safarilink-Logo-1200px-x-1200px-1.png'],
            // ['name' => 'Unknown School Logo', 'url' => 'https://banner2.cleanpng.com/20180805/zpj/f850f1bbe854162a38c3abfb0e4c21ea.webp'],
            ['name' => 'ICT Authority', 'url' => 'https://www.kenyaengineer.co.ke/wp-content/uploads/2020/06/ICT-Authority-Logo.jpg'],
            ['name' => 'Alliance High School', 'url' => 'https://w7.pngwing.com/pngs/585/112/png-transparent-alliance-high-school-american-high-school-national-secondary-school-education-school-text-trademark-logo-thumbnail.png'],
            ['name' => 'Random School', 'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwV7-YsX7Chq8I7sdUxUniQcM6cqWh8kiQgQ&s'],
        ];

        $data = [
            'partners' => $partners,
            'random_course_module' => Media::inRandomOrder()->limit(1)->first(),
            'course_categories' => MediaCategory::orderBy('id', 'asc')->get(),
            'top_course_modules' => Media::inRandomOrder()->limit(6)->get()
        ];

        return response([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }


    /**
    * filter
    */
    public function filter(string $media_category_id){
        return Media::where('media_category_id', $media_category_id)->inRandomOrder()->limit(6)->get();
    }


    /**
    * search
    */
    public function search(string $term){
        $items = Media::where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('description','LIKE','%'.$term.'%');
        })->inRandomOrder()->limit(6)->get();
        return $items;
    }

}
