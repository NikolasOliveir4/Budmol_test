<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    
    // Mostrar a lista de eventos
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Exibir o formulário de criação de um evento
    public function create()
    {
        return view('events.create');
    }

    // Armazenar um novo evento
    public function store(Request $request)
    {
    
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'location' => 'required',
            'capacity' => 'required|integer',
            'status' => 'required',
        ]);

        Event::create($request->only(['title', 'description', 'start_at', 'end_at', 'location', 'capacity', 'status']));

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    // Exibir o formulário para editar um evento
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Atualizar o evento no banco
    public function update(Request $request, Event $event)
{

    // Validação dos dados
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'start_at' => 'required|date',
        'end_at' => 'required|date|after:start_at',
        'location' => 'required|string|max:255',
        'capacity' => 'required|integer|min:1',
        'status' => 'required|in:open,closed,cancelled',
    ]);

    // Atualiza o evento
    $event->update($validatedData);

    return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
}
    // Deletar um evento
    public function destroy(Event $event)
    {
        // Cancelar todas as inscrições antes de excluir o evento
        $event->inscriptions()->delete();

        // Excluir o evento
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento e suas inscrições excluídos com sucesso!');
    }


    // Inscrever um participante no evento
    public function inscribe(Event $event)
    {
        // Verifica se o evento ainda está com inscrições abertas e se a capacidade não foi atingida
        if ($event->status == 'open' && $event->inscriptions()->count() < $event->capacity) {
            $event->inscriptions()->create([
                'user_id' => auth()->id(), // Associe o participante ao evento
            ]);

            return redirect()->route('events.index')->with('success', 'Inscrição realizada com sucesso!');
        }

        return redirect()->route('events.index')->with('success', 'Não foi possível realizar a inscrição. Verifique a disponibilidade.');
    }

    // Cancelar inscrição
    public function cancelInscription(Event $event)
    {
        $event->inscriptions()->where('user_id', auth()->id())->delete();

        return redirect()->route('events.index')->with('success', 'Inscrição cancelada!');
    }
    
    public function showParticipants(Event $event)
    {
        $participants = $event->participants()->with('user')->get();

        return view('events.participants', compact('event', 'participants'));
    }

}
