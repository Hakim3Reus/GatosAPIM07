<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CatImage;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class CatImageSeeder extends Seeder
{
    public function run(): void
    {
        // Crea una instancia del cliente HTTP
        $client = new Client();

        // Realiza la petición GET para obtener las imágenes
        $response = $client->get('https://cataas.com/api/cats?&skip=0&limit=100000');

        // Decodifica la respuesta JSON a un array de PHP
        $data = json_decode($response->getBody(), true);

        // Recorre cada elemento de los datos y lo inserta en la base de datos
        foreach ($data as $item) {
            CatImage::create([
                '_id' => $item['id'],  // ID único de la imagen
                'mimetype' => $item['mimetype'],  // Tipo MIME (por ejemplo, 'image/jpeg')
                'size' => isset($item['size']) ? $item['size'] : "0",  // Tamaño de la imagen, predeterminado a 0 si no existe
                'tags' => json_encode($item['tags']),  // Convierte el array de etiquetas a JSON
            ]);
        }
    }
}
