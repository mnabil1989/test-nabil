<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource as MainResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Response;


class FilesController extends Controller
{
    /**
     * uploading files
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function files(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attachments'   => 'required|array',
            'attachments.*' => 'required|file|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $attachments_path = [];
        foreach ($request->file('attachments') as $key => $attachment)
        {
            $filename           = $key . time() . '.' . $attachment->getClientOriginalExtension();
            $date               = date('FY');
            $path               = $attachment->move(storage_path('app/public/appointments/' . $date), $filename);
            $attachments_path[] = '/appointments/' . $date . '/' . $filename;
        }
        return response()->json(['attachments' => $attachments_path]);
    }

     /**
     * @OA\Post(
     *   path="/api/appointments/files",
     *   summary="endpoint for upload files ",
     *   tags={"appointments files"},
     *     	@OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="attachments[]",
     *                      description="attachments[]",
     *                      type="file",
     *                      @OA\Items(type="string", format="binary")
     *                   ),
     *               ),
     *           ),
     *       ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="",
     *         type="string",
     *         description="file download path"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="the array files of attachments not found",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:",
     *         type="string",
     *         description="the array files of attachments  not found"
     *       )
     *     )
     *    )
     *   )
     * )
     */

    function filesUpload(Request $request)
    {
        $files = $request->file('attachments');

        if($request->hasFile('attachments'))
        {
            foreach ($files as $file) {

                $paths[] = request()->getHost(). '/api/appointments/' .$file->store('files');
            }
            return $paths;
        }
        return response()->json("the array files of attachments[]  not found", 400);


    }

     /**
     * @OA\Post(
     *   path="/api/appointments/files/{fileName}",
     *   summary="download a appointments files",
     *   tags={"appointments files"},
     *   @OA\Response(
     *     response=201,
     *     description="Success"
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:the file not supotrted for view. OR the file not exists .OR the File Name not found ",
     *         type="string",
     *         description="the file not supotrted for view"
     *       )
     *     )
     *    )
     *   )
     * )
     */
    function filesDownload($fileName)
    {

        if($fileName)
        {
            $path=storage_path('app'. DIRECTORY_SEPARATOR .'files'. DIRECTORY_SEPARATOR .(string)$fileName);

            if(file_exists($path)){
               $fileExtension= strtolower(explode( '.', $fileName )[1]);

            switch($fileExtension ){
                case 'png' :
                    $contentType = 'image/png' ;
                break;
                case 'jpg' :
                    $contentType = 'image/jpeg' ;
                break;
                case 'jpeg' :
                    $contentType = 'image/jpeg' ;
                break;
                case '.docx' :
                    $contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ;
                break;
                case '.doc' :
                    $contentType = 'application/msword' ;
                break;
                case 'txt' :
                    $contentType = 'text/plain' ;
                break;
                case 'xls' :
                    $contentType = 'application/vnd.ms-excel' ;
                case 'xlsx' :
                    $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ;
                break;

                default :

                 return response()->json("the file not supotrted for view", 400);
                break;

             }

                return Response::make(file_get_contents($path), 200, [
                    'Content-Type' => $contentType ,
                    'Content-Disposition' => 'inline; filename="'.$fileName.'"'
                ]);
           }

           return response()->json("the file not exists", 400);

        }
        return response()->json("the File Name not found", 400);



    }


}
