<?php

namespace App\Http\Controllers;

use App\Baju;
use App\StokBaju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokBajuController extends Controller
{
    public function index(){
        $stokBaru = DB::table('stok_baju')
                            ->rightJoin('baju', 'baju.id', '=', 'stok_baju.baju_id')
                            ->where('baju_id', null)
                            ->orderByDesc('baju.id')
                            ->get();
        $stokKosong = StokBaju::with('baju')->where('small' , 0)
                                ->where('medium' , 0)
                                ->where('large', 0)
                                ->where('extralarge' , 0)
                                ->orderByDesc('id')
                                ->get();
        $stokIsi = StokBaju::with('baju')->where('small' , '<>' , 0)
                            ->orWhere('medium' , '<>' , 0)
                            ->orWhere('large' , '<>', 0)
                            ->orWhere('extralarge', '<>' , 0)
                            ->orderByDesc('id')
                            ->get();
        return view('stok.index', [
            'stokBaru' => $stokBaru,
            'stokKosong' => $stokKosong,
            'stokIsi' => $stokIsi
        ]);
    }

    public function create($id){
        $baju = Baju::where('id' , $id)->get()->first();
        return view('stok.add', [
            'baju' => $baju
        ]);
    }

    public function edit($id){
        $data = StokBaju::where('id' , $id)->with('baju')->get()->first();
        return view('stok.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request , $id){
        $oldStok = $this->getOldStok($id);

        
        $request->validate([
            'small' => 'required|integer',
            'medium' => 'required|integer',
            'large' => 'required|integer',
            'extralarge' => 'required|integer'
        ]);

        $newStok = $request->except('baju_id');
        $newStok['small'] = $newStok['small'] + $oldStok->small;
        $newStok['medium'] = $newStok['medium'] + $oldStok->medium;
        $newStok['large'] = $newStok['large'] + $oldStok->large;
        $newStok['extralarge'] = $newStok['extralarge'] + $oldStok->extralarge;
        
        StokBaju::find($id)->update($newStok);
        return redirect()->route('stok.index')->with('status' , 'Berhasil update stok baru !');

    }

    public function getOldStok($id){
        $data = StokBaju::where('id' , $id)->get()->first();
        return $data;
    }

    public function store(Request $request){
        $request->validate([
            'small' => 'required|integer',
            'medium' => 'required|integer',
            'large' => 'required|integer',
            'extralarge' => 'required|integer'
        ]);
        $data = $request->all();
        StokBaju::create($data);
        return redirect()->route('stok.index')->with('status' , 'Berhasil menambahkan stok baru !');
    }

    public function destroy($id){
        $stok = StokBaju::findOrFail($id);
        $stok->delete();

        return redirect()->route('stok.index')->with('status' , 'Berhasil menghapus stok !');


    }
}
