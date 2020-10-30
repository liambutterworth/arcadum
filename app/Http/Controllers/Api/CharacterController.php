<?php

namespace App\Http\Controllers\Api;

// use App\Contracts\CharacterRepository;
// use Illuminate\Http\Request;
use App\Http\Requests\CharacterQueryRequest;
use App\Http\Params\ParamQuery;
use App\Http\Params\Filters\StringFilter;
use App\Models\Character;
use Symfony\Component\HttpFoundation\ParameterBag;

class CharacterController extends Controller
{
    public function index(CharacterQueryRequest $request)
    {
        dd($request->all());
        return $request->execute();

        // return $request->query(Character::class);

        // $query->for(Character::class);
        // $query->filter->string('name');
        // return $query->get();

        // $query->filter->relation('site', 11);
        // $query->include('classes');

        // $query->filter(StringFilter::class, 'name');
        // $query->filter(DateFilter::class, 'created_at');
        // $query->filter(RelationFilter::class, 'classes');

        // $query->filters([
        //     StringFilter::for('name'),
        //     DateFilter::for('created_at'),
        // ]);

        $query->include('classes');

        // $query->filter->string('name');
        // $query->filter->date('created_at');
        // $query->filter->relation('race');

        // $query->filter(StringFilter::class, 'name');
        //
        // $query->filters([
        //     'name' => StringFilter::class,
        // ]);
        //
        // $query->filters([
        //     StringFilter::for('name'),
        // ]);

        // return Character::paginate();
    }

    public function show(int $id, ParamQuery $query)
    {
        // return Character::with(request('include', []))->find($id);
        // return IncludeParam::for(Company::class)->find($id);
        return $query->for(Company::class)->find($id);
    }

    // public function show(int $id): JsonResponse
    // {
    //     $character = $this->repository->find($id);
    //     return $this->response($character);
    // }
    //
    // public function store(Request $request): JsonResponse
    // {
    //     $data = $request->all();
    //     $character = $this->repository->create($data);
    //     return $this->response($character);
    // }
    //
    // public function update(int $id, Request $request): JsonResponse
    // {
    //     $data = $request->all();
    //     $character = $this->repository->update($data);
    //     return $this->response($character);
    // }
    //
    // public function destroy(int $id): JsonResponse
    // {
    //     $this->respository->delete($id);
    //     return $this->response();
    // }
}
