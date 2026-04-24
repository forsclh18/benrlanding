<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Message;
use App\Models\Testimonial;   // ← huruf besar T
use App\Models\Profile;
use App\Models\User;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Cache::remember('admin_dashboard_services_count', 900, function () {
            return Service::count();
        });

        $totalPortfolios = Cache::remember('admin_dashboard_portfolios_count', 900, function () {
            return Portfolio::count();
        });

        $totalTeams = Cache::remember('admin_dashboard_teams_count', 900, function () {
            return Team::count();
        });

        $totalMessages = Cache::remember('admin_dashboard_messages_count', 900, function () {
            return Message::count();
        });

        $totalTestimonials = Cache::remember('admin_dashboard_testimonials_count', 900, function () {
            return Testimonial::count();   // ← huruf besar T
        });

        $totalUsers = Cache::remember('admin_dashboard_users_count', 900, function () {
            return User::count();
        });

        $totalProfiles = Cache::remember('admin_dashboard_profiles_count', 900, function () {
            return Profile::count();
        });

        $totalSliders = Cache::remember('admin_dashboard_sliders_count', 900, function () {
            return Slider::count();
        });

        $unreadMessages = Cache::remember('admin_dashboard_unread_messages', 900, function () {
            return Message::where('is_read', false)->count();
        });

        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalPortfolios',
            'totalTeams',
            'totalMessages',
            'totalTestimonials',
            'totalUsers',
            'totalProfiles',
            'totalSliders',
            'unreadMessages',
            'recentMessages'
        ));
    }
}