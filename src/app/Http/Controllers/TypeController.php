<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Type::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('type.index', ['types' => Type::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Type::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('types.form');
    }

    public function store(TypeRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Type::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $type = Type::create($request->validated());
        Toastr::success('New type created');
        return redirect(route('types.show', [$type]));
    }

    public function show(Type $type): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Type::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('types.show', ['type' => $type]);
    }

    public function edit(Type $type): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Type::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('types.form', ['type' => $type]);
    }

    public function update(TypeRequest $request, Type $type): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Type::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $type->update($request->validated());
        $type->save();

        Toastr::success('Type modified');
        return redirect(route('types.show', [$type]));
    }

    public function destroy(Type $type): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Type::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Type deleted: $type->id");
        $type->delete();
        return redirect(route('types.index'));
    }
}
