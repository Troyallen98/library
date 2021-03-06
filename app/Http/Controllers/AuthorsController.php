<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;
use App\Http\Requests\AuthorsRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = \Faker\Factory::create(1);
        $author = Author::create(
            [
                'name' => $faker->name
            ]
            );
            return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {

        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        Log::info("try");
        try {
            Log::info("start try");
            $validated = $request->validated();

            if($validated){
                $author->update([
                    'name' => $request->input('name')
                ]);

                return new AuthorResource($author);
            } else {
                Log::info("error");
                throw ValidationException::withMessages(['your error message']);
            }
            Log::info("end try");
        } catch (ValidationException $e){
            Log::info("error");
            throw ValidationException::withMessages(['your error message']);
        }
        Log::info("end");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $book)
    {
            $book->delete();
            return response(null, 204);
    }
}
