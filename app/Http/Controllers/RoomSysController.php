<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomSysController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลที่เกี่ยวข้องทั้งหมด (Room, RoomType, Bookings)
        $rooms = Room::with('roomType', 'bookings')->get();

        // Return JSON Data & success status
        return response()->json([
            'status' => 'success',
            'data' => $rooms
        ]);
    }
}
