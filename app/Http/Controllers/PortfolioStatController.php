<?php

namespace App\Http\Controllers;

use App\Models\PortfolioStat;
use Illuminate\Http\Request;

class PortfolioStatController extends Controller
{
    public function index()
    {
        $portfolioStats = PortfolioStat::first();
        return view('admin.portfolio_stats.index', compact('portfolioStats'));
    }

    public function edit(PortfolioStat $portfolioStat)
    {
        return view('admin.portfolio_stats.edit', compact('portfolioStat'));
    }

    public function update(Request $request, PortfolioStat $portfolioStat)
    {
        $validated = $request->validate([
            'projects_completed' => 'required|integer|min:0',
            'happy_clients' => 'required|integer|min:0',
            'awards_won' => 'required|integer|min:0',
            'years_experience' => 'required|integer|min:0'
        ]);

        $portfolioStat->update($validated);

        return redirect()->route('admin.portfolio-stats.index')
            ->with('success', 'Portfolio stats updated successfully.');
    }
}