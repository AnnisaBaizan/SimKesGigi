<?php

namespace App\Http\Controllers;

use App\Models\Pengsiperi;
use App\Models\Kartupasien;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PengsiperiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 1) {
            $pengsiperis = Pengsiperi::all();
        } elseif (auth()->user()->role === 2) {
            $pengsiperis = Pengsiperi::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $pengsiperis = Pengsiperi::where('user_id', auth()->id())->get();
        }

        return view('pages.pengsiperi.index')->with('pengsiperis', $pengsiperis);

        // return view('pages.pengsiperi.index', [
        //     'pengsiperis' => Pengsiperi::all()
        // ]);
        // return view('pages.pengsiperi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::all();
            $users = User::where('role', 3)->get();
        } elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        // $kartupasiens = kartupasien::all();
        $pengetahuans = Pertanyaan::where('kode', 1)->where('status', 1)->get();
        $perilakus = Pertanyaan::where('kode', 2)->where('status', 1)->get();

        return view('pages.pengsiperi.create')->with([
            'kartupasiens' => $kartupasiens,
            'pengetahuans' => $pengetahuans,
            'perilakus' => $perilakus,
            'users' => $users ?? null
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
        // dd($request);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            //pengetahuan
            'pengetahuan' => 'required|array',
            'pengetahuan.*' => 'numeric',
            'jumlah_pertanyaan_peng' => 'required|numeric',
            'jawaban_benar_peng' => 'required|numeric',
            'nilai_peng' => 'required|max:6|min:4',
            'kriteria' => 'required|max:6|min:4',
            //keterampilan
            'labialbukal' => 'required|max:3|min:1',
            'hasil_lb' => 'required|max:5|min:5',
            'lingualpalatal' => 'required|max:3|min:1',
            'hasil_lp' => 'required|max:5|min:5',
            'kunyah' => 'required|max:3|min:1',
            'hasil_k' => 'required|max:5|min:5',
            'interdental' => 'required|max:3|min:1',
            'hasil_i' => 'required|max:5|min:5',
            'gerakan' => 'required|max:3|min:1',
            'hasil_g' => 'required|max:5|min:5',
            'kesimpulan' => 'required|max:15|min:8',
            //perilaku
            'perilaku' => 'required|array',
            'perilaku.*' => 'numeric',
            'jumlah_pilihan' => 'required|numeric',
            'jumlah_yang_terpilih' => 'required|numeric',
            'nilai_peri' => 'required|max:6|min:4',
            'berperilaku' => 'required|max:7|min:7',
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
        // dd($pengsiperi);

        $pengsiperi->user_id = $validatedData['user_id'];
        $pengsiperi->pembimbing = $validatedData['pembimbing'];
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

        return redirect()->route('pengsiperi.index')->with('success', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function show(Pengsiperi $pengsiperi)
    {
        $pengetahuans = Pertanyaan::where('kode', 1)->get();
        $perilakus = Pertanyaan::where('kode', 2)->get();

        return view('pages.pengsiperi.show')->with([
            'pengsiperi' => $pengsiperi,
            'pengetahuans' => $pengetahuans,
            'perilakus' => $perilakus,
        ]);
        // return view('pages.pengsiperi.show')->with('pengsiperi', $pengsiperi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengsiperi  $pengsiperi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengsiperi $pengsiperi)
    {
        if (auth()->user()->role === 1) {
            $kartupasiens = kartupasien::where('user_id', $pengsiperi->user_id)
                ->where('pembimbing', $pengsiperi->pembimbing)
                ->get();
            // $kartupasiens = kartupasien::all();
            $users = User::where('role', 3)->get();
        } elseif (auth()->user()->role === 2) {
            $kartupasiens = kartupasien::where('pembimbing', auth()->user()->nimnip)->get();
        } else {
            $kartupasiens = kartupasien::where('user_id', auth()->id())->get();
        }

        // $kartupasiens = kartupasien::all();
        $pengetahuans = Pertanyaan::where('kode', 1)->where('status', 1)->get();
        $perilakus = Pertanyaan::where('kode', 2)->where('status', 1)->get();

        return view('pages.pengsiperi.edit')->with([
            'pengsiperi' => $pengsiperi,
            'kartupasiens' => $kartupasiens,
            'pengetahuans' => $pengetahuans,
            'perilakus' => $perilakus,
            'users' => $users ?? null
        ]);
        // return view('pages.pengsiperi.edit', compact('kartupasiens'))->with('pengsiperi', $pengsiperi);
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
            'user_id' => 'required',
            'pembimbing' => 'required',
            'kartupasien_id' => 'required',
            //pengetahuan
            'pengetahuan' => 'required|array',
            'pengetahuan.*' => 'numeric',
            'jumlah_pertanyaan_peng' => 'required|numeric',
            'jawaban_benar_peng' => 'required|numeric',
            'nilai_peng' => 'required|max:6|min:4',
            'kriteria' => 'required|max:6|min:4',
            //keterampilan
            'labialbukal' => 'required|max:3|min:1',
            'hasil_lb' => 'required|max:5|min:5',
            'lingualpalatal' => 'required|max:3|min:1',
            'hasil_lp' => 'required|max:5|min:5',
            'kunyah' => 'required|max:3|min:1',
            'hasil_k' => 'required|max:5|min:5',
            'interdental' => 'required|max:3|min:1',
            'hasil_i' => 'required|max:5|min:5',
            'gerakan' => 'required|max:3|min:1',
            'hasil_g' => 'required|max:5|min:5',
            'kesimpulan' => 'required|max:15|min:8',
            //perilaku
            'perilaku' => 'required|array',
            'perilaku.*' => 'numeric',
            'jumlah_pilihan' => 'required|numeric',
            'jumlah_yang_terpilih' => 'required|numeric',
            'nilai_peri' => 'required|max:6|min:4',
            'berperilaku' => 'required|max:7|min:7',
            //ortu
            'peran_ortu' => 'required|array',
            'peran_ortu.*' => 'numeric',
        ]);

        // If no checkboxes are checked, set lokasi to an empty array
        $pengetahuan = $request->has('pengetahuan') ? implode(',', $validatedData['pengetahuan']) : '';
        $perilaku = $request->has('perilaku') ? implode(',', $validatedData['perilaku']) : '';
        $peran_ortu = $request->has('peran_ortu') ? implode(',', $validatedData['peran_ortu']) : '';

        // Update data di database
        $pengsiperi->update([
            'user_id' => $validatedData['user_id'],
            'pembimbing' => $validatedData['pembimbing'],
            'kartupasien_id' => $validatedData['kartupasien_id'],
            'pengetahuan' => $pengetahuan,
            'jumlah_pertanyaan_peng' => $validatedData['jumlah_pertanyaan_peng'],
            'jawaban_benar_peng' => $validatedData['jawaban_benar_peng'],
            'nilai_peng' => $validatedData['nilai_peng'],
            'kriteria' => $validatedData['kriteria'],
            'labialbukal' => $validatedData['labialbukal'],
            'hasil_lb' => $validatedData['hasil_lb'],
            'lingualpalatal' => $validatedData['lingualpalatal'],
            'hasil_lp' => $validatedData['hasil_lp'],
            'kunyah' => $validatedData['kunyah'],
            'hasil_k' => $validatedData['hasil_k'],
            'interdental' => $validatedData['interdental'],
            'hasil_i' => $validatedData['hasil_i'],
            'gerakan' => $validatedData['gerakan'],
            'hasil_g' => $validatedData['hasil_g'],
            'kesimpulan' => $validatedData['kesimpulan'],
            'perilaku' => $perilaku,
            'jumlah_pilihan' => $validatedData['jumlah_pilihan'],
            'jumlah_yang_terpilih' => $validatedData['jumlah_yang_terpilih'],
            'nilai_peri' => $validatedData['nilai_peri'],
            'berperilaku' => $validatedData['berperilaku'],
            'peran_ortu' => $peran_ortu,
        ]);

        return back()->with('success', 'Pengetahuan, Keterampilan, Perilaku, dan peran orang tua Berhasil Diperbarui');
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
        return back()->with('success', 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua berhasil dihapus');
    }
}
