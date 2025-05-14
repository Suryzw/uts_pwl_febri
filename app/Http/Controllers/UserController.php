<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
            'role' => 'required', // jika ada pilihan role
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role,
            'points' => 0
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($id) // Abaikan email milik user yang sedang diupdate
        ],
            'role' => 'required',
            'points' => 'nullable|numeric'
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'points' => $request->points
        ]);
        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }

    //Khusus User
    public function dashboard()
    {
        $user = auth()->user();
        $submissionCount = $user->wasteSubmissions()->count();
        // Hari ini
        $dailySubmission = $user->wasteSubmissions()
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Minggu ini
        $weeklySubmission = $user->wasteSubmissions()
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        // Bulan ini
        $monthlySubmission = $user->wasteSubmissions()
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        $wastePerCategory = DB::table('waste_submissions')
        ->join('waste_categories', 'waste_submissions.waste_category_id', '=', 'waste_categories.id')
        ->select('waste_categories.name as category_name', DB::raw('count(*) as total'))
        ->where('waste_submissions.user_id', $user->id)
        ->groupBy('waste_categories.name')
        ->get();

    // Untuk chart.js (array terpisah)
        $categoryNames = $wastePerCategory->pluck('category_name');
        $categoryCounts = $wastePerCategory->pluck('total');
        return view('users.dashboard', compact('user', 'submissionCount', 'dailySubmission', 'weeklySubmission','monthlySubmission','categoryNames', 'categoryCounts'));
    }
}


