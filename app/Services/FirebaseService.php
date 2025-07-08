<?php

namespace App\Services;

use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService
{
    private $firestore;
    
    public function __construct()
    {
        $keyFilePath = storage_path('app/firebase/recetasparaguayas.json');
        $keyFileData = json_decode(file_get_contents($keyFilePath), true);
        
        $this->firestore = new FirestoreClient([
            'projectId' => 'recetasparaguayas-94298',
            'keyFile' => $keyFileData
        ]);
    }
    
    public function getCollection($collection)
    {
        return $this->firestore->collection($collection);
    }
    
    public function createDocument($collection, $data)
    {
        return $this->firestore->collection($collection)->add($data);
    }
    
    public function getDocument($collection, $id)
    {
        return $this->firestore->collection($collection)->document($id)->snapshot();
    }
    
    public function updateDocument($collection, $id, $data)
    {
        return $this->firestore->collection($collection)->document($id)->update($data);
    }
    
    public function deleteDocument($collection, $id)
    {
        return $this->firestore->collection($collection)->document($id)->delete();
    }
    
    public function getAllDocuments($collection)
    {
        return $this->firestore->collection($collection)->documents();
    }
}