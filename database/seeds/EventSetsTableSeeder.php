<?php

use Illuminate\Database\Seeder;

class EventSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Rock
        DB::table('eventsets')->insert(array(
            'name' => 'Kaleo EXPRESS-World-Tour-2017',
            'shortDescription' => 'Mit ihren Singles „Way Down We Go“ und „All The Pretty Girls“ platzierten KALEO ihren neuartigen Alternative-Rocksound über Wochen in den internationalen Chart-Spitzen.',
            'longDescription' => 'Mit ihren Singles „Way Down We Go“ und „All The Pretty Girls“ platzierten KALEO ihren neuartigen Alternative-Rocksound über Wochen in den internationalen Chart-Spitzen. Währenddessen absolvierten die vier Isländer ihre über 30 Konzerte umfassende EXPRESS-World-Tour 2017.',
            'teaserImage' =>'/kaleo.png',
            'bannerImage' =>'/kaleo_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Patti Smith',
            'shortDescription' => 'Die seltenen und durchweg atemberaubenden Konzerte von Patti Smith and her band stellen rare Highlights im Konzertgeschehen dar.',
            'longDescription' => '2011 erhielt Patti Smith den "Polar Music Prize", der als der inoffizielle "Nobelpreis für Musik" gilt und vom schwedischen König verliehen wird. Das "Time Magazine" wählte sie zu den 100 wichtigsten Menschen unserer Zeit. Die seltenen und durchweg atemberaubenden Konzerte von Patti Smith and her band stellen rare Highlights im Konzertgeschehen dar.',
            'teaserImage' =>'/patti_smith.png',
            'bannerImage' =>'/patti_smith_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Eric Clapton',
            'shortDescription' => 'Die einzigen Headline-Shows in Europa: Musiklegende Eric Clapton kommt nach vier Jahren endlich wieder nach Deutschland!',
            'longDescription' => 'Bei dieser Nachricht dürften Rock- und Blues-Freunde eine leichte Gänsehaut bekommen: Gitarrengott Eric Clapton kommt Anfang Juli 2018 für zwei Shows nach Deutschland!',
            'teaserImage' =>'/eric_clapton.png',
            'bannerImage' =>'/eric_clapton_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Arctic Monkeys',
            'shortDescription' => 'Die Arctic Monkeys kommen im Frühsommer 2018 für zwei Live-Shows nach Deutschland!',
            'longDescription' => 'Die Arctic Monkeys sind eine vierköpfige britische Indie-Rock-Band mit Einflüssen aus Post-Punk und Garage Rock. Sie wurde 2002 im englischen Sheffield gegründet und veröffentlichte 2006 ihr Debütalbum, welches Platz eins der britischen Charts erreichte.',
            'teaserImage' =>'/arctic_monkeys.png',
            'bannerImage' =>'/arctic_monkeys_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Kaiser Chiefs',
            'shortDescription' => 'Der Musikstil der Kaiser Chiefs bewegt sich zwischen Indie-Rock und Garage-Rock und ist beeinflusst von Bands wie The Beach Boys.',
            'longDescription' => 'Die Kaiser Chiefs sind eine englische Rockband. Sie wurde Anfang 2003 in Leeds gegründet und ging aus der Garage-Rock-Band Parva hervor.',
            'teaserImage' =>'/kaiser_chiefs.png',
            'bannerImage' =>'/kaiser_chiefs_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Tool',
            'shortDescription' => 'Tool ist eine US-amerikanische Progressive-Metal- bzw. Alternative-Metal-Band aus Los Angeles.',
            'longDescription' => 'Tool ist eine US-amerikanische Progressive-Metal- bzw. Alternative-Metal-Band aus Los Angeles. Derzeitige Mitglieder sind Sänger Maynard James Keenan, Gitarrist Adam Jones, Bassist Justin Chancellor und Schlagzeuger Danny Carey. Paul d’Amour spielte auf der EP Opiate und dem ersten Album Undertow den Bass.',
            'teaserImage' =>'/tool.png',
            'bannerImage' =>'/tool_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 1,
        ));

        //Pop
        DB::table('eventsets')->insert(array(
            'name' => 'ZAZIMUT',
            'shortDescription' => 'ZAZ reTournée! ZAZ, die Grande Dame des French Pop, ist wieder unterwegs in Europa!',
            'longDescription' => 'ZAZ, die Grande Dame des French Pop, ist wieder unterwegs in Europa! Gerade noch en route für ZAZIMUT, dem charitativen Konzert-Projekt der sozial engagierten Sängerin, kündigt sie ihr neues Album für Herbst 2018 und eine begleitende Tour für Frühjahr 2019 an.',
            'teaserImage' =>'/zaz.png',
            'bannerImage' =>'/zaz_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Elton John - Farewell Yellow Brick Road',
            'shortDescription' => 'Abschied vom Tourneegeschäft: Elton John spielt 2019 auf seiner großen „Farewell Yellow Brick Road“-Tour in Deutschland!',
            'longDescription' => 'Nach mehr als einem halben Jahrhundert im Tourgeschäft und einer unvergleichlichen Karriere, die unsere kulturelle Landschaft immer wieder aufs Neue definiert und Elton John unumstößlich zu einem weltweiten Kultstar gemacht hat, kündigte der Superstar heute mit einem exklusiven VR180 Livestream auf YouTube die Details seiner finalen Tournee mit dem klangvollen Namen ‘Farewell Yellow Brick Road’ an.',
            'teaserImage' =>'/elton_john.png',
            'bannerImage' =>'/elton_john_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Matt Simons',
            'shortDescription' => 'Im Oktober kommt US-Singer-Songwriter Matt Simons für Konzerte nach Deutschland!',
            'longDescription' => 'Matt Simons meldet sich mit einer neuen Single und einem umwerfenden Video zurück: „We Can Do Better“ ist ein klares Statement zum Zustand unserer Welt, verpackt in eine hübsche Melodie und eine zündende Hook, wie wir es von Simons gewohnt sind. Im zugehörigen Musikfilm tanzen und spielen sieben entzückende Kids in verschiedenen Rollen. Fluffige Leichtigkeit ist und bleibt das Markenzeichen des Musikers aus Palo Alto.',
            'teaserImage' =>'/matt_simons.png',
            'bannerImage' =>'/matt_simons_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Philipp Poisel - 10 Jahre Clubtour',
            'shortDescription' => 'Philipp Poisel geht im Herbst auf „10 Jahre Clubtour“ durch Deutschland!',
            'longDescription' => 'Das Jahr 1 nach der Arenatour von Philipp Poisel mit 120.000 Zuschauern, einem Nummer 1 Album und einer ausgiebigen Open Air Tour steht wieder ganz im Zeichen der Clubs und Hallen, dem Schweiß, der von der Decke tropft, und der Nähe zum Publikum. Und es ist gleichzeitig das Jahr 10 nach der ersten Tour. Das schreit nach Jubiläum.',
            'teaserImage' =>'/philipp_poisel.png',
            'bannerImage' =>'/philipp_poisel_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'Beck',
            'shortDescription' => 'Beck Hansen, der Mastermind hinter der seit Jahren weltweit erfolgreichen Alternative-Band Beck, lässt sich nicht so leicht in musikalische Schubladen packen.',
            'longDescription' => 'Machmal fragt man sich, wie es dem Typen wohl gehen mag, der damals die Beatles für sein Plattenlabel abgelehnt hat. Ähnliches könnte man sich auch über all die A&R Kollegen fragen, die Becks Demo von ›Loser‹ mit den besten Wünschen returnierten – und damit eine der Hymnen der Neunziger verpassten, deren Wirkung bis heute nachhallt. Sein dazugehöriges Major-Debut ›Mellow Gold‹ von 1994 war, passend zur Alternative Music Explosion der Neunziger Jahre, ein wilder Ritt durch alle musikalischen Stile und nahm in Teilen schon vorweg, dass man Beck nicht auf eine Sorte Musik würde festnageln können: Keines seiner Alben klingt wie das andere.',
            'teaserImage' =>'/beck.png',
            'bannerImage' =>'/beck_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        DB::table('eventsets')->insert(array(
            'name' => 'George Ezra',
            'shortDescription' => 'George Ezra präsentiert sein neues Album „Staying At Tamara’s” live!',
            'longDescription' => 'George Ezra ist fürwahr ein Teufelskerl… fast scheint es so, als könne er hier, dort und überall gleichzeitig sein. Seine sensationelle Out-of-the-box-Erfolgsstory gründete auf der einzigen Sache, die wirklich zählt: seine Songs. Lieder, die ihm nicht zuletzt eine weltweite Tournee bescherten, die zwei Jahre andauerte.',
            'teaserImage' =>'/george_ezra.png',
            'bannerImage' =>'/george_ezra_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 2,
        ));

        //Klassik
        DB::table('eventsets')->insert(array(
            'name' => 'Max Richter',
            'shortDescription' => 'Nicht vielen zeitgenössischen Klassik-Komponisten gelingt der Sprung in die Albumcharts. Max Richter ist einer davon. Mit einem berührenden Werk geht er nun noch einmal über sein bisheriges Schaffen hinaus.',
            'longDescription' => 'Nicht vielen zeitgenössischen Klassik-Komponisten gelingt der Sprung in die Albumcharts. Max Richter ist einer davon. Mit einem berührenden Werk geht er nun noch einmal über sein bisheriges Schaffen hinaus.',
            'teaserImage' =>'/max_richter.png',
            'bannerImage' =>'/max_richter_gross.png',
            'eventCount' => random_int(1, 3),
            'category_id' => 3,
        ));

    }
}
