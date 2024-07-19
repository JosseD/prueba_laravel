<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function create()
    {
        
    }



    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'date' => 'required|date|after_or_equal:today',
        ]);

        // Crear 

        $user = Auth::user()->id;

       Task::create([
        'title' => $request->input('title'),
        'date' => $request->input('date'),
        'description' => $request->input('description'),
        'user_id' => $user,
       ]);
        // $user->task()->create([
        //     'title' => $request->input('title'),
        //     'date' => $request->input('date'),
        //     'description' => $request->input('description'),
           
        // ]);

        return  redirect()->back()->with('bien');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task)
    {

        // Actualizar el estado de la tarea
        $task->status = 'Realizado';
        $task->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'El estado de la tarea ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('inicio');
    }
}