<?php

namespace App\Http\Controllers;

use App\Repositories\MedicoRepository;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    protected $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->medicoRepository->getAllMedicos();
        return view('Medico/read', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        //
    }
}
