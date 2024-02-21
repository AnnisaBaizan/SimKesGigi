<?php

namespace App\Http\Controllers;

use App\Models\Pengsiperi;
use App\Models\kartupasien;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PengsiperiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pengsiperi.index', [
            'pengsiperis' => Pengsiperi::all()
        ]);
        // return view('pages.pengsiperi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartupasiens = Kartupasien::all();
        $pengetahuans = Pertanyaan::where('kode', 1)->get();
        $perilakus = Pertanyaan::where('kode', 2)->get();
        
        return view('pages.pengsiperi.create')->with([
            'kartupasiens' => $kartupasiens,
            'pengetahuans' => $pengetahuans,
            'perilakus' => $perilakus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengsiperiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kartupasien_id' => 'required|max:9999999999999|min:1|numeric',
            //pengetahuan
            'pengetahuan' => 'required|array',
            'pengetahuan.*' => 'numeric',
            'jumlah_pertanyaan_peng' => 'required|max:3|min:1',
            'jawaban_benar_peng' => 'required|max:3|min:1',
            'nilai_peng' => 'required|max:5|min:4',
            'kriteria' => 'required|max:255',
            //keterampilan
            'labialbukal' => 'required|max:3|min:1',
            'hasil_lb' => 'max:255',
            'lingualpalatal' => 'required|max:3|min:1',
            'hasil_lp' => 'max:255',
            'kunyah' => 'required|max:3|min:1',
            'hasil_k' => 'max:255',
            'interdental' => 'required|max:3|min:1',
            'hasil_i' => 'max:255',
            'gerakan' => 'required|max:3|min:1',
            'hasil_g' => 'max:255',
            'kesimpulan' => 'max:255',
            //perilaku
            'perilaku' => 'required|array',
            'perilaku.*' => 'numeric',
            'jumlah_pilihan' => 'required|max:3|min:1',
            'jumlah_yang_terpilih' => 'required|max:3|min:1',
            'nilai_peri' => 'required|max:5|min:4',
            'berperilaku' => 'max:255',
            //ortu
            'peran_ortu' => 'required|array',
            'peran_ortu.*' => 'numeric',
        ]);

        
        // If no checkboxes are checked, set lokasi to an empty array
        $pengetahuan = $request->has('pengetahuan') ? implode(',', $validatedData['pengetahuan']) : '';
        $perilaku = $request->has('perilaku') ? implode(',', $validatedData['perilaku']) : '';
        $peran_ortu = $request->has('peran_ortu') ? implode(',', $validatedData['peran_ortu']) : '';

        // Simpan data ke dalam database
        $pengsiperi = new Pengsiperi();
        $pengsiperi->kartupasien_id = $validatedData['kartupasien_id'];

        $pengsiperi->pengetahuan = $pengetahuan;
        $pengsiperi->jumlah_pertanyaan_peng = $validatedData['jumlah_pertanyaan_peng'];
        $pengsiperi->jawaban_benar_peng = $validatedData['jawaban_benar_peng'];
        $pengsiperi->nilai_peng = $validatedData['nilai_peng'];
        $pengsiperi->kriteria = $validatedData['kriteria'];

        $pengsiperi->labialbukal = $validatedData['labialbukal'];
        $pengsiperi->hasil_lb = $validatedData['hasil_lb'];
        $pengsiperi->lingualpalatal = $validatedData['lingualpalatal'];
        $pengsiperi->hasil_lp = $validatedData['hasil_lp'];
        $pengsiperi->kunyah = $validatedData['kunyah'];
        $pengsiperi->hasil_k = $validatedData['hasil_k'];
        $pengsiperi->interdental = $validatedData['interdental'];
        $pengsiperi->hasil_i = $validatedData['hasil_i'];
        $pengsiperi->gerakan = $validatedData['gerakan'];
        $pengsiperi->hasil_g = $validatedData['hasil_g'];
        $pengsiperi->kesimpulan = $validatedData['kesimpulan'];
        
        $pengsiperi->perilaku = $perilaku;
        $pengsiperi->jumlah_pilihan = $validatedData['jumlah_pilihan'];
        $pengsiperi->jumlah_yang_terpilih = $validatedData['jumlah_yang_terpilih'];
        $pengsiperi->nilai_peri = $validatedData['nilai_peri'];
        $pengsiperi->berperilaku = $validatedData['berperilaku'];
        
        $pengsiperi->peran_ortu = $peran_ortu;
        
        $pengsiperi->save();

        return redirect('/pengsiperi')->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function show(Pengsiperi $pengsiperi)
    {
        return view('pages.pengsiperi.show')->with('pengsiperi', $pengsiperi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengsiperi $pengsiperi)
    {
        return view('pages.pengsiperi.edit')->with('pengsiperi', $pengsiperi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengsiperiRequest  $request
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengsiperi $pengsiperi)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:9999999999999|digits_between:1,4|numeric',
            'soal' =>'required'
        ]);
        Pengsiperi::where('id', $pengsiperi->id)
            ->update($validatedData);

        return back()->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengsiperi $pengsiperi)
    {
        Pengsiperi::destroy($pengsiperi->id);
        return back()->with('succes', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua berhasil dihapus');
    }
}
