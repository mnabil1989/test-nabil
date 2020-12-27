<?php

namespace Andalusia\Survey\Repositories;

use Andalusia\Survey\Models\SurveyQuestion as Model;

class QuestionRepository implements QuestionRepositoryInterface
{
    /*
     * Display a listing of the resource.
     *
     * @param int $paginate
     * @return array
     */
    public function all(int $paginate)
    {
        return Model::paginate($paginate)->appends('paginate', $paginate);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return object
     */
    public function create(array $data)
    {
        return Model::create($data);
    }

    /*
    * Display the specified resource.
    *
    * @param int $id
    * @return object
    */
    public function find(int $id)
    {
        return Model::find($id);
    }

    /*
     * update a resource in storage.
     *
     * @param array $data
     * @param int $id
     * @return array
     */
    public function update(array $data, int $id)
    {
        return Model::find($id)->update($data);
    }

    /*
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return array
    */
    public function delete(int $id)
    {
        return Model::find($id)->delete();
    }
}
