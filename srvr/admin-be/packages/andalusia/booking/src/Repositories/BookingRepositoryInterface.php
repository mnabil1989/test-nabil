<?php

namespace Andalusia\Booking\Repositories;

Interface BookingRepositoryInterface
{
    /*
     * Display a listing of the resource.
     *
     * @param int $paginate
     * @param bool $allow_pagination
     * @return array
     */
    public function all(int $paginate, bool $allow_pagination);

    /*
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return object
     */
    public function create(array $data);

    /*
    * Display the specified resource.
    *
    * @param int $id
    * @return object
    */
    public function find(int $id);

    /*
     * update a resource in storage.
     *
     * @param array $data
     * @param int $id
     * @return array
     */
    public function update(array $data, int $id);

    /*
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return array
    */
    public function delete(int $id);
}
