<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\MediaImageRequest;
use App\Http\Requests\Store\MediaImagesRequest;
use App\Http\Resources\Resources\MediumResoruce;
use App\Http\Resources\Resources\SagaResource;
use App\Models\Medium;
use App\Models\Saga;
use App\Models\Subtype;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function addImage(MediaImageRequest $request, $id)
    {
        try {
            $type = Subtype::findOrFail($request->type);
            if ($type->subtype == 'Media') {
                $entity = Medium::findOrFail($id);
                $entity->addMediaFromRequest('image')->toMediaCollection('medias');
                return new MediumResoruce($entity);
            } else if ($type->subtype == 'Saga') {
                $entity = Saga::findOrFail($id);
                $entity->addMediaFromRequest('image')->toMediaCollection('sagas');
                return new SagaResource($entity);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage(), 500]);
        }
    }

    public function addImages(MediaImagesRequest $request, $id)
    {
        try {
            $type = Subtype::findOrFail($request->type);
            if ($type->subtype == 'Media') {
                $entity = Medium::findOrFail($id);
                $this->add($request->images, 'medias', $entity);
                return new MediumResoruce($entity);
            } else if ($type->subtype == 'Saga') {
                $entity = Saga::findOrFail($id);
                $this->add($request->images, 'sagas', $entity);
                return new SagaResource($entity);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage(), 500]);
        }
    }

    public function add($images, $type, $entity)
    {
        foreach($images as $image){
            $entity->addMedia($image)->toMediaCollection($type);
        }
    }


}
