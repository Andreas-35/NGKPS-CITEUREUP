<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentsController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('pages.resident.index', [
            'residents' => $residents,
        ]);
    }

    public function create()
    {
        return view('pages.resident.create');
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nij'                    => ['required', 'max:16'],
            'nama'                   => ['required', 'max:100'],
            'email'                  => ['required', 'email'],
            'gender'                 => ['required', Rule::in(['male', 'female'])],
            'birth_date'             => ['required', 'date'],
            'birth_place'            => ['required', 'max:100'],
            'status_pernikahan'      => ['required', Rule::in(['single', 'married','divorced'])],
            'address'                => ['required', 'max:700'],
            'phone'                  => ['nullable', 'max:20'], // ditambahkan phone
        ]);

        Resident::create($validateData);

        return redirect('/resident')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        return view('pages.resident.edit', [
            'resident' => $resident,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nij'                    => ['required', 'max:16'],
            'nama'                   => ['required', 'max:100'],
            'email'                  => ['required', 'email'],
            'gender'                 => ['required', Rule::in(['male', 'female'])],
            'birth_date'             => ['required', 'date'],
            'birth_place'            => ['required', 'max:100'],
            'status_perkawinan'      => ['required', Rule::in(['single', 'married','divorced'])],
            'address'                => ['required', 'max:700'],
            'phone'                  => ['required', 'max:20'],
        ]);

        Resident::findOrFail($id)->update($validatedData);

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();
        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}
