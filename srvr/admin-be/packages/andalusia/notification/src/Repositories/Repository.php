<?php

namespace Andalusia\Notification\Repositories;

use Andalusia\Notification\Models\Notification as Model;

class Repository implements RepositoryInterface
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
        $object = Model::find($id);

        // this is to check whether the notification is being updated from the admin panel or from the user side.
        // if from the user side then in this case the notification will be marked as read
        // and will be deleted if the type field is `normal`
        if($data['is_read'])
        {
            /**
             *
             * @todo validating whether the user has the privileges to mark the notification as read
             */

            return $object->type == 'offer' ? $object->update(['is_read' => true]) : $object->delete();
        }
        return $object->update($data);
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
