<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;



class VisitorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Request $request): void
    {
        $this->recordVisitor($request);
        $this->deleteOldVisitors();
    }

    
          //  'language' =>  '',//$agent->languages(),
           //'robot' =>  '',//$agent->robot(),

    protected function recordVisitor(Request $request)
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

       
        Visitor::create([
            'ip_address' => $request->ip(),
            'visited_at' => now(),
            'browser' => $agent->browser(),
             'os' => $agent->platform(),
             'device' => $agent->device(),
             'isrobot' => $agent->robot(),
            'user_agent' => $request->userAgent(), // Request sınıfındaki userAgent metodunu kullanın
            'referer' => $request->headers->get('referer'),
            'page' =>  $request->url(),
        ]);


    }


    protected function deleteOldVisitors()
    {
        $oneYearAgo = Carbon::now()->subYear();
        Visitor::where('visited_at', '<', $oneYearAgo)->delete();
    }




}
