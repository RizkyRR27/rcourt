<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReward;
use Illuminate\Support\Facades\Auth;


class RewardController extends Controller
{

    public function index()
    {
        // Tampilkan halaman pilih hadiah
        $rewards = UserReward::where('user_id', Auth::id())
            ->where('reward_type', 'pending')
            ->get();
        return view('user.rewards', compact('rewards'));
    }

    public function history()
    {
        $rewards = UserReward::where('user_id', Auth::id())
            ->where('reward_type', '!=', 'pending')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('user.reward-history', compact('rewards'));
    }

    public function choose(Request $request, $id)
    {
        $reward = UserReward::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Simpan pilihan user
        // Pilihan: 'discount', 'tumbler', 'towel', 'voucher'
        $reward->update([
            'reward_type' => $request->choice,
            // Jika fisik (tumbler/handuk), is_used false (nanti dikasih admin).
            // Jika diskon, is_used false (nanti dipakai pas checkout).
            'is_used' => false
        ]);

        return redirect()->back()->with('success', 'Hadiah berhasil dipilih! Tunjukkan ke Admin atau gunakan saat Checkout.');
    }
}
