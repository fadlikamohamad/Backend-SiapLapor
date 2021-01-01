<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function get_all_report() {
        //return response()->json(Report::all(), 200);

        $list_report = Report::all();
        return response([
            'status' => true,
            'message' => 'Daftar Report',
            'data' => $list_report
        ], 200);
    }

    public function get_detail_report($id) {
        $report = Report::where('id', $id)->get();
        return response([
            'status' => true,
            'message' => 'Detail Report',
            'data' => $report
        ], 200);
        //return response()->json(Report::where('id', $id)->get(), 200);
    }

    public function delete_data_report($id) {
        $check_report = Report::firstWhere('id', $id);
        if ($check_report) {
            Report::destroy($id);
            return response([
                'status' => true,
                'message' => 'Data dihapus',
            ],200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Report tidak ditemukan'
            ],404);
        }
    }

    public function get_user_report($userId) {
        // return response()->json(Report::where('user_id', $userId)->get(), 200);
        $reports = Report::where('user_id', $userId)->get();
        return response([
            'status' => true,
            'message' => 'User Report',
            'data' => $reports
        ], 200);
    }

    public function insert_data_report(Request $request) {
        $insert_report = new Report;
        $insert_report->nik = $request->nik;
        $insert_report->nama = $request->nama;
        $insert_report->telepon = $request->telepon;
        $insert_report->alamat = $request->alamat;
        $insert_report->isi_laporan = $request->isi_laporan;
        $insert_report->user_id = $request->user_id;
        $insert_report->created_at = Carbon::now();
        $insert_report->save();
        return response([
            'status' => true,
            'message' => 'Report disimpan',
            'data' => $insert_report
        ],200);
    }
}
