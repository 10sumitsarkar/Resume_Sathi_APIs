<?php

namespace Modules\Movies\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Movies\Entities\MovieAttachment;

class MovieAttachmentController extends Controller
{

    public function upload_attachment(Request $request)
    {
        $path = 'movie_attachments';
        $img_name = 'file_' . time() . '.' . $request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path($path), $img_name);
        $imagePath = $path . '/' . $img_name;

        $data = [
            'file' => $imagePath,
            'file_type' => $request->file_type
        ];

        $data['movie_id'] = $request->action_id;
        $upload =  MovieAttachment::create($data);


        if ($upload) {
            $response['success'] = true;
            $response['data']['file'] = asset($upload->file);
            $response['data']['file_id'] = $upload->id;
            $response['message'] = 'Success! Attachment Added Successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error! Something Went Wrong.';
        }
        return $response;
    }


    public function delete_attachment(Request $request)
    {

        $attachment = MovieAttachment::find($request->id);

        if (File::exists($attachment->file)) {
            File::delete($attachment->file);
        }

        $delete =  MovieAttachment::where('id', $request->id)->delete();

        if ($delete) {
            $response['success'] = true;
            $response['message'] = 'Success! Attachment Deleted Successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error! Something Went Wrong.';
        }
        return $response;
    }
}
