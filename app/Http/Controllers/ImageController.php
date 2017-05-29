<?php

namespace App\Http\Controllers;

use App\Devices;
use App\Http\Requests\CreateImageRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->disk = 'image_disk';
    }

    public function index() {
        return view('layouts.images.index', [
            'images' => Image::orderBy('id')->paginate(10)
        ]);
    }

    public function show($id) {
        $this->authorize('action', Image::class);
        return view('layouts.images.show', [
            'image' => Image::findOrFail($id)
        ]);
    }

    public function add() {
        $this->authorize('action', Image::class);
        return view('layouts.images.new', [
           'image' => new Image()
        ]);
    }

    public function create(CreateImageRequest $request) {
        $this->authorize('action', Image::class);
        $file = $request->file('file');
        $filename = $this->fixedStore($file, '', $this->disk);
        $nameimg = $request->input('image_name');
        try {
            $image = Image::create([
                'filename' => $filename,
                'image_name' => $nameimg
            ]);
        } catch (\Exception $exception) {
            Storage::disk($this->disk)->delete($filename);
            throw $exception;
        }

        return redirect(route('images.index'));
    }

    public function fixedStore($file, $path, $disk) {
        $this->authorize('action', Image::class);
        $folder = Storage::disk($disk)->getAdapter()->getPathPrefix();
        $temp = tempnam($folder, '');
        $filename = pathinfo($temp, PATHINFO_FILENAME);
        $extension = $file->extension();

        try {
            $basename = $file->storeAs($path, "$filename.$extension", $disk);
        } catch (\Exception $exception) {
            throw $exception;
        } finally {
            unlink($temp);
        }

        return $basename;
    }

    public function remove($id) {
        $this->authorize('action', Image::class);
        return view('layouts.images.remove', [
            'image' => Image::findOrFail($id)
        ]);
    }

    public function destroy($id) {
        $this->authorize('action', Image::class);
        $image = Image::findOrFail($id);
        Storage::disk($this->disk)->delete($image->filename);
        $image->delete();

        return redirect(route('images.index'));
    }
}
