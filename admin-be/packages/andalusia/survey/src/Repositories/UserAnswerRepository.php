<?php

namespace Andalusia\Survey\Repositories;

use Andalusia\Survey\Models\SurveyUserAnswer as Model;
use Andalusia\Survey\Models\SurveyUserInfo;

class UserAnswerRepository implements UserAnswerRepositoryInterface
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
     * Store a newly created resource in storage (User Info).
     *
     * @param int $survey_id
     * @return int
     */
    public function createUserInfo(int $survey_id)
    {
        $survey_user_info = SurveyUserInfo::create([
            'survey_id' => $survey_id
        ]);

        return $survey_user_info->id;
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
