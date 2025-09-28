<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Experience;
use App\Models\Education;
use App\Models\ThemeSetting;
use App\Models\PortfolioStat;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $user = User::find(4);
        $user->load([
            'profile',
            'skills' => function($query) {
                $query->orderBy('order');
            },
            'services' => function($query) {
                $query->orderBy('order');
            },
            'projects' => function($query) {
                $query->orderBy('project_date')->with('technologies');
            },
            'testimonials' => function($query) {
                $query->orderBy('order');
            },
            'experiences' => function($query) {
                $query->orderBy('order');
            },
            'educations' => function($query) {
                $query->orderBy('order');
            },
            'themeSettings']);

        return view('main', compact('user'));
    }

    public function projectShow($username, $slug)
    {
        $user = User::where('name', $username)->firstOrFail();
        
        $project = Project::where('user_id', $user->id)
                         ->where('slug', $slug)
                         ->with('technologies')
                         ->firstOrFail();

        return view('portfolio.project', compact('user', 'project'));
    }
}   