<?php

namespace Andalusia\Booking\Repositories;

use Andalusia\Booking\Models\Booking as Model;

class BookingRepository implements BookingRepositoryInterface
{
    /*
     * Display a listing of the resource.
     *
     * @param int $paginate
     * @param bool $allow_pagination
     * @return array
     */
    public function all(int $paginate, bool $allow_pagination = true)
    {
        if($allow_pagination)
            return Model::paginate($paginate)->appends('paginate', $paginate);
        return Model::all();
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return object
     */
    public function create(array $data)
    {
        return Model::book($data);
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
