<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Http\File;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Per slug


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = [
            [
                'name' => 'e-book Lite',
                'productor' => 'Microtech',
                'description' => 'e-book Lite e la combinazione ideale fra design e mobilità. E il portatile della famiglia e-book più leggero e sottile mai realizzato da Microtech, con i suoi 1,2 kg di peso ed i suoi 17 mm di spessore. Le sue dimensioni incredibilmente compatte lo rendono ideale per il viaggio e gli spostamenti. Basta metterlo nella borsa e-bag (scopri di più) o nello zaino e partire per una nuova avventura.',
                'price' => '259.00',
            ],
            [
                'name' => 'CoreBook Lite',
                'productor' => 'Microtech',
                'description' => 'E il laptop entry-level più coerente della Sua categoria. Adatto sia per il lavoro che per l intrattenimento CoreBook Lite è perfetto per svolgere la maggiorparte delle attività quotidiane, come produrre documenti, sfrecciare sul World Wide Web, ascoltare musica, scaricare la posta, effettuare e ricevere videochiamate per lo smart working e la DaaD con la foto-videocamera FHD integrata. Inoltre, grazie alla veloce memoria a stato solido ed al potente processore Intel di ultima generazione, CoreBook Lite non rimane mai indietro, in qualsiasi attività tu stia svolgendo. Fai di più mentre spendi meno, con il nuovo CoreBook Lite.',
                'price' => '349.00',
            ],
            [
                'name' => 'CoreBook',
                'productor' => 'Microtech',
                'description' => 'Il design è come l amore. Occorre preoccuparsi di ascoltare ed essere disposti a cambiare. Su queste basi abbiamo progettato il nuovo CoreBook, partendo dalla necessità di cambiare per soddisfare i bisogni dei nostri preziosi clienti. CoreBook offre le ultime tendenze in fatto di design: corpo sottile e leggero, un luminoso pannello IPS FHD con cornici ultra-sottili, rapporto schermo-superficie superiore al 90%, tastiera edge-to-edge, touchpad gigante con supporto alle touch gestures, ampia espandibilità e scalabilità della memoria e della capacità d archiviazione, una connettività potente e di ultima generazione. E il portatile che hai sempre sognato, pronto per soddisfare le tue esigenze.',
                'price' => '400.00',
            ],
            [
                'name' => 'e-book Pro',
                'productor' => 'Microtech',
                'description' => 'Qualche volta semplificare vuol dire aggiungere bellezza. Con e-book Pro abbiamo semplificato al massimo, realizzando un concentrato di bellezza e tecnologia. Il primo three-senses computer di cui ti innamorerai. Il risultato è un dispositivo compatto e facilmente trasportabile, progettato in ogni dettaglio per soddisfare la vista, il tatto e l\udito, grazie al suo design elegante e raffinato, ai materiali di prima qualità con cui è realizzato e alla sua tecnologia Quad Speaker integrata.',
                'price' => '420.00',
            ],
            [
                'name' => 'e-cube',
                'productor' => 'Microtech',
                'description' => 'In Microtech amiamo così tanto i dettagli perché li consideriamo come i mattoni della perfezione. Con la linea di mini-pc e-cube non un solo dettaglio è stato lasciato al caso. Ora il design non è solo un piacere per gli occhi, ma anche un vero capolavoro di ingegneria elettronica. Una linea di computer completi racchiusi in un corpo compatto e leggero. Piccoli ma potenti quanto basta per non farti sentire la mancanza del tuo vecchio ed ingombrante PC, i mini-pc e-cube sono uno sguardo sul futuro, grazie alla loro versatilità, alla leggerezza, ai consumi ridotti ed al grande corredo di connessioni disponibili. Sei pronto a dimenticarti di cavi, rumore, polvere ed ingombri?',
                'price' => '480.00',
            ],
        ];

        //popoliamo il db
        foreach ($products as $product) {
            $newProduct = new Product();

            $newProduct->name = $product['name'];
            $newProduct->productor = $product['productor'];
            $newProduct->description = $product['description'];
            $newProduct->price = $product['price'];
            $newProduct->slug = Str::slug($product['name'], '-');
         
            

            // $image = $faker->image(null, 640, 480);
            // $imageFile = new File($image);
            // $newProduct->image = Storage::disk('public')->putFile('images', $imageFile);

            //salvataggio
            $newProduct->save();
        }
    }
}
