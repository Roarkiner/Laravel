<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        [
                'title' => "Harry Potter à l'école des sorciers",
                'author' => "J. K. Rowling",
                'publication_year' => 1997,
                'genre' => "Fantasy",
                'synopsis' => "Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l'effroyable V., le mage dont personne n'ose prononcer le nom."
            ],
            [
                'title' => "Timbré",
                'author' => "Terry Pratchett",
                'publication_year' => 2004,
                'genre' => "Fantasy",
                'synopsis' => "Moite von Lipwig, imposteur et arnaqueur, va devoir faire face à un choix capital : soit être pendu haut et court pour ses précédentes frasques, soit remettre sur pied l'ancien système des Postes d'Ankh-Morpork, tombé en désuétude depuis des lustres. Le choix est moins aisé qu'il n'y paraît, car le « poste » en question est bien plus dangereux et complexe qu'on ne pourrait le croire… Aidé de ses collègues facteurs et de l'irritable mais ô combien ravissante Adora Belle Chercœur, Moite von Lipwig devra faire face à la concurrence de la Compagnie des Sémaphores…"
            ],
            [
                'title' => "Harry Potter et la Chambre des Secrets",
                'author' => "J. K. Rowling",
                'publication_year' => 1998,
                'genre' => "Fantasy",
                'synopsis' => "Harry Potter fait une rentrée fracassante en voiture volante à l'école des sorciers. Cette deuxième année ne s'annonce pas de tout repos... surtout depuis qu'une étrange malédiction s'est abattue sur les élèves. Entre les cours de potion magique, les matches de Quidditch et les combats de mauvais sorts, Harry trouvera-t-il le temps de percer le mystère de la Chambre des Secrets ? Un livre magique pour sorciers confirmés."
            ]
        ]);
    }
}
