<?php
namespace App\Repositories\FilesUpload;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FilesUpload
{

    /**
     * Function that handles the uploads from dropzone and handles the uploaded file/image. Accepts following parameters:
     * @request - instance of Illuminate\Http\Request;
     * @return array
     */
    public function postUpload( Request $request ) {


        //Validate files
        $request->validate([
            'file' => 'mimeTypes:image/jpeg,application/pdf,image/gif,image/png,application/vnd.openxmlformats-officedocument.wordprocessingml.document,'.
                'application/msword,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/svg+xml,'.
                'application/vnd.oasis.opendocument.spreadsheet,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);

        $file = $request->file( 'file' );

        $ext_num        = 0 - ( strlen( $file->getClientOriginalExtension() ) + 1 );
        $clean_filename = mb_substr( $file->getClientOriginalName(), 0, $ext_num );
        $slug_filename  = Str::slug( $clean_filename, '_' );
        $filename       = $slug_filename
            . '_'
            . Str::random( 4 )
            . '.'
            . $file->getClientOriginalExtension();

        $uploaded_file = Storage::putFileAs( env( 'TEMP_DIR', 'temp' ), $file, $filename );
        $contentType    = mime_content_type( storage_path( 'app/' . $uploaded_file ) );

        if ( $uploaded_file ) {
            return response()->json( [
                'path'         => $uploaded_file,
                'originalName' => $slug_filename . '.' . $file->getClientOriginalExtension(),
                'fileName' => $filename,
                'mime'         => $contentType
            ] );
        } else {
            return response()->json( 'error', 400 );
        }
    }

    /**
     * Function that handles the processing of images that were uploaded through dropzone
     * @uploadedFile - instance of Illuminate\Http\Request;
     * @directory - instance of Illuminate\Http\Request;
     * @return string
     */
    public function processFeaturedImage($uploadedFile, $directory){

        $file = json_decode($uploadedFile);

        $filePath = '';

        if (Storage::exists($file->path)) {
            $fileMoved = Storage::move($file->path, 'public/'. $directory . $file->fileName);
            if ($fileMoved) {
                $filePath = $directory . $file->fileName;

                //Resize image with ImageIntervention
                $image = Image::make(Storage::path('public/'. $filePath))->resize(509, 450);
                $image->save();
            }
        }
        return $filePath;
    }

    /**
     * Function that handles the processing of banner images that were uploaded through dropzone
     * @uploadedFile - instance of Illuminate\Http\Request;
     * @directory - instance of Illuminate\Http\Request;
     * @return string
     */
    public function processBannerImage($uploadedFile, $directory){

        $file = json_decode($uploadedFile);

        $filePath = '';

        if (Storage::exists($file->path)) {
            $fileMoved = Storage::move($file->path, 'public/'. $directory . $file->fileName);
            if ($fileMoved) {
                $filePath = $directory . $file->fileName;

                //Resize image with ImageIntervention
                $image = Image::make(Storage::path('public/'. $filePath))->resize(1920, 300);
                $image->save();
            }
        }
        return $filePath;
    }

    /**
     * Function that handles the processing of attachments that were uploaded through dropzone
     * @uploadedFile - instance of Illuminate\Http\Request;
     * @directory - string;
     * @return string
     */
    public function processAttachments($uploadedFile, $directory){

        $file = json_decode($uploadedFile);

        $filePath = '';

        if (Storage::exists($file->path)) {
            $fileMoved = Storage::move($file->path, 'public/'. $directory . $file->fileName);
            if ($fileMoved) {
                $filePath = $directory . $file->fileName;
            }
        }
        return $filePath;
    }

    /**
     * Function that handles the logic of deleting uploaded file/image from dropzone
     * @request - instance of Illuminate\Http\Request;
     * @return Response
     */
    public function deleteUpload( Request $request ) {
        $data['path'] = $request->input( 'path' );
        Storage::delete( $data['path'] );

        return response()->json( $data );
    }
}
