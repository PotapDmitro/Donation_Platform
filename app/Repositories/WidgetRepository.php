<?php
namespace App\Repositories;
use App\Models\Donator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class WidgetRepository
{
    public function allDate(): Collection
    {
        return Donator::selectRaw("DATE_FORMAT(created_at, '%d-%m-%Y') as date, SUM(amount) as amount")
        ->groupByRaw("DATE_FORMAT(created_at, '%d-%m-%Y')")
        ->get();
    }

    public function allAmount(): stdClass
    {
        return DB::table('donators')->select(DB::raw("SUM(amount) as sumData"))
        ->get()->sole();
    }

    public function topAmount()
    {
        return Donator::select(DB::raw("max(amount) as amountDonator"))
        ->get()->sole();
    }

    public function nameDonator(): stdClass
    {
        return DB::table('donators')->select(DB::raw("name as nameDonator"))
        ->orderByDesc("amount")
        ->limit(1)
        ->get()->sole();
    }

    public function monthDate()
    {
        return DB::table('donators')->select(DB::raw("amount"))
            ->whereMonth("created_at", now()->endOfMonth())
            ->get();
    }
}
