<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\Media;

class DashboardController extends Controller
{

    /**
    * index
    */
    public function index()
    {
        $data = [
            'total_users'        => User::count(),
            'total_media'        => Media::count(),
            'total_Views'        => Media::sum('views'),
            'total_organizations'=> User::where('account_type_id',2)->count(),
            'top_uploaders' => User::withCount('uploadedMedia') ->orderBy('uploaded_media_count', 'desc') ->take(5) ->get(),
        ];

        return response([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }

    /**
    * searchSuggestions
    */
    public function searchSuggestions(Request $request)
    {
        // $q = strtolower($request->query('q', ''));
        // $data = [
        //     'Angular tutorial1',
        //     'Angular autocomplete',
        //     'YouTube search style',
        //     'Debounce input in Angular',
        //     'RxJS subject example',
        //     'TypeScript best practices',
        //     'Angular dropdown component',
        //     'Component communication',
        //     'Keyboard navigation list',
        //     'Recent searches',
        //     'Query suggestions'
        // ];
        // $filtered = collect($data)->filter(fn ($item) => str_contains(strtolower($item), $q))->values()->take(8);
        // return response()->json($filtered);

        $q = strtolower($request->query('q', ''));
        $results = Media::query()->whereRaw('LOWER(title) LIKE ?', ['%' . $q . '%'])->limit(8)->get(['id', 'title']);
        return response()->json($results);
    }

    /**
    * index2
    */
    public function index2()
    {
        $mCurrentUser = auth()->user();
        // $myInterests  = InterestUser::with('interest')->where('user_id', $mCurrentUser->id)->get();
        // if($mCurrentUser->role_id==1){
        //     $myInterests = InterestUser::with('interest')->distinct()->get();
        // }
        $data = [
            'latest_media'      => Media::with(['liveStreamStatus','status'])->where('status_id',2)->orderBy('created_at', 'desc')->limit(5)->get(), // Latest
            'featured_media'    => Media::with(['liveStreamStatus','status'])->where('status_id',2)->orderBy('views', 'desc')->limit(5)->get(), // Top Views
            // 'recommended_media' => Media::inRandomOrder()->limit(5)->get(), // Random
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
    public function filter(string $category_id, string $term)
    {
        return Media::with('status')->orderBy('created_at', 'desc')->paginate(10);
    }







    /**
    * systemStats
    */
    public function systemStats()
    {
        // Get_Disk_Usage_GB
        $diskStats = $this->getDiskUsage();

        // Windows_path
        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            $memSwap = $this->getWindowsMemoryUsage();

            return [
                'disk'   => $diskStats,            // GB
                'memory' => $memSwap['memory'],   // GB
                'swap'   => $memSwap['swap'],     // GB
            ];
        }

        // Linux_path
        if (!file_exists('/proc/meminfo')) {
            return [
                'disk'   => $diskStats,
                'memory' => ['total_gb' => 0, 'used_gb' => 0, 'usage_percent' => 0],
                'swap'   => ['total_gb' => 0, 'used_gb' => 0, 'usage_percent' => 0],
            ];
        }

        $data = file('/proc/meminfo', FILE_IGNORE_NEW_LINES);
        $memInfo = [];

        foreach ($data as $line) {
            list($key, $value) = explode(':', $line);
            $memInfo[$key] = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT); // KB
        }

        // Convert_KB_to_GB
        $memTotal = $memInfo['MemTotal'] / 1024 / 1024;
        $memAvailable = $memInfo['MemAvailable'] / 1024 / 1024;
        $memUsed = $memTotal - $memAvailable;
        $memUsagePercent = ($memUsed / $memTotal) * 100;

        $swapTotal = $memInfo['SwapTotal'] / 1024 / 1024;
        $swapFree = $memInfo['SwapFree'] / 1024 / 1024;
        $swapUsed = $swapTotal - $swapFree;
        $swapUsagePercent = ($swapTotal>0) ? (($swapUsed/$swapTotal)*100) : 0;

        return [
            'disk' => $diskStats,
            'memory' => [
                'total_gb' => round($memTotal, 2),
                'used_gb'  => round($memUsed, 2),
                'usage_percent' => round($memUsagePercent, 2),
            ],
            'swap' => [
                'total_gb' => round($swapTotal, 2),
                'used_gb'  => round($swapUsed, 2),
                'usage_percent' => round($swapUsagePercent, 2),
            ]
        ];
    }

    /**
    * getDiskUsage
    */
    private function getDiskUsage()
    {
        $diskTotal = @disk_total_space('/');
        $diskFree  = @disk_free_space('/');
        $diskUsed  = ($diskTotal > 0) ? ($diskTotal - $diskFree) : 0;

        return [
            'total_gb'      => $diskTotal > 0 ? round($diskTotal / 1024 / 1024 / 1024, 2) : 0,
            'used_gb'       => $diskUsed > 0 ? round($diskUsed / 1024 / 1024 / 1024, 2) : 0,
            'free_gb'       => $diskFree > 0 ? round($diskFree / 1024 / 1024 / 1024, 2) : 0,
            'usage_percent' => $diskTotal > 0 ? round(($diskUsed / $diskTotal) * 100, 2) : 0,
        ];
    }

    /**
    * getWindowsMemoryUsage
    */
    private function getWindowsMemoryUsage()
    {
        $output = shell_exec('wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value');
        $lines = explode("\n", trim($output));
        $memData = [];

        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line);
                $memData[$key] = (int) trim($value);
            }
        }

        // Convert_KB_to_GB
        $memTotal = ($memData['TotalVisibleMemorySize'] ?? 0) / 1024 / 1024;
        $memFree  = ($memData['FreePhysicalMemory'] ?? 0) / 1024 / 1024;
        $memUsed  = $memTotal - $memFree;
        $memUsagePercent = $memTotal > 0 ? ($memUsed / $memTotal) * 100 : 0;

        return [
            'memory' => [
                'total_gb' => round($memTotal, 2),
                'used_gb'  => round($memUsed, 2),
                'usage_percent' => round($memUsagePercent, 2),
            ],
            'swap' => [
                'total_gb' => 0,
                'used_gb'  => 0,
                'usage_percent' => 0,
            ]
        ];
    }

}
