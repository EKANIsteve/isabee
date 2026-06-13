<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;
use App\Models\Arrondissement;

class ArrondissementSeeder extends Seeder
{
    public function run(): void
    {
        Arrondissement::truncate();

        $data = [

            // ADAMAOUA
            'Djérem' => ['Tibati', 'Ngaoundal'],
            'Faro-et-Déo' => ['Mayo-Baleo', 'Tignere', 'Galim-tignere', 'Kontcha'],
            'Mayo-Banyo' => ['Banyo', 'Bankim', 'Mayo-darle'],
            'Mbéré' => ['Meiganga', 'Djohong', 'Dir', 'Ngaoui'],
            'Vina' => ['Ngaoundere 1er', 'Ngaoundere 2e', 'Ngaoundere 3e', 'Belel', 'Mbe', 'Nganha', 'Nyambaka', 'Martap'],

            // CENTRE
            'Haute-Sanaga' => ['Mbancjock', 'Nanga Eboko', 'Minta', 'Nkoteng', 'Bibey', 'Lembe-Yezoum'],
            'Lekié' => ['Evodoula', 'Monatele', 'Obala', 'Okala', 'Saa', 'Elig-Mfomo', 'Ebebda', 'Batshenga', 'Lobo'],
            'Mbam-et-Inoubou' => ['Bafia', 'Bokito', 'Deuk', 'Makenene', 'Ndikinimeki', 'Ombessa', 'Kiki', 'Kon-Yambeta', 'Nitoukou'],
            'Mbam-et-Kim' => ['Ntui', 'Ngambe-Tikar', 'Ngoro', 'Yoko', 'Mbangassina'],
            'Méfou-et-Afamba' => ['Mfou', 'Esse', 'Soa', 'Awae', 'Afanloum', 'Assamba', 'Edzendouan', 'Nkolafamba'],
            'Méfou-et-Akono' => ['Ngoumou', 'Akono', 'Mbankomo', 'Bikok'],
            'Mfoundi' => ['Yaounde I','Yaounde II','Yaounde III','Yaounde IV','Yaounde V','Yaounde VI','Yaounde VII'],
            'Nyong-et-Kéllé' => ['Eseka','Bot-Makak','Makak','Messongo','Ngog-Mapubi','Matomb','Dibang','Nguibassal','Bondjock','Biyouha'],
            'Nyong-et-Mfoumou' => ['Akonolinga','Ayos','Endom','Mengang','Yakombo'],
            'Nyong-et-So\'o' => ['Dzend','Mbalmayo','Ngomedzap','Akoeman','Mengueme','Nkol-Metet'],

            // EST
            'Boumba-et-Ngoko' => ['MOLOUNDOU', 'SALAPOUMBE', 'GARI-GOMBO', 'YOKADOUMA'],
            'Haut-Nyong' => ['ABONG-MBANG','DOUME','LOMIE','MESSAMENA','NGUELEMENDOUKA','DIMAKO','NGOYLA','BEBEND','MBOUANZ','DJA','DOUMAINTANG','MESSOK','SAMALOMO','MBOMA'],
            'Kadey' => ['BATOURI','NDELELE','KETTE','NDEM-NAM','BOMBE','MBOTORO'],
            'Lom-et-Djerem' => ['BERTOUA 1er','BERTOUA 2e','BERTOUA 3e','BETARE-OYA','BELABO','GAROUA-BOULAÏ','DIANG','MANDJOU','NGOURA'],

            // EXTREME-NORD
            'Diamaré' => ['Dibombari','Loum','Manjo','Mbanga','Melong','Nkongsamba 1er','Nkongsamba 2e','Nkongsamba 32','NLONAKO','BARE-BAKEM','NJOMBE-PENJA','FIKO','MOMBO'],
            'Logone-et-Chari' => ['NKONDJOCK','Yabassi','YINGUI','NORD-MAKOMBE'],
            'Mayo-Danay' => ['DIZANGUE','Edea 1er','Edea 2e','Ndom','Ngambe','Pouma','MOUANKO','DIBAMBA','Ngwei','Nyanon','MASSOCK-SONGLOULOU'],
            // (Corrige les noms selon ta base si nécessaire)

            // LITTORAL
            'Moungo' => ['Douala I','Douala II','Douala III','Douala IV','Douala V','Douala VI'],
            'Nkam' => ['Garoua I','Garoua II','Garoua III','BIBEMI','PITOA','LAGDO','DEMBO','TCHEBOA','MAYO HOURNA','TOUROUA','BASCHEO','DEMSA'],
            'Sanaga-Maritime' => ['POLI','BEKA'],
            'Wouri' => ['GUIDER','MAYO-OULO','FIGUIL'],

            // NORD
            'Bénoué' => ['TOUBORO','Rey Bouba','MADINGRING','TCHOLLIRE'],
            'Faro' => ['BOGO','Maroua I','Maroua II','Maroua III','MERI','GAZAWA','PETTE','DARGALA','NDOUKOULA'],
            'Mayo-Louti' => ['KOUSSERI','MAKARY','LOGONE-BIRNI','GOULFEY','WAZA','FOTOKOL','BLANGOUA','DARAK','ZINA'],
            'Mayo-Rey' => ['KAR-HAY','DATCHEKA','YAGOUA','GUERE','MAGA','KALFOU','WINA','VELE','TCHATIBALI','GOBO','KAÏ-KAÏ'],

            // NORD-OUEST
            'Boyo' => ['KAELE','GUIDIGUIS','MINDIF','MOUTOURWA','MOULVOUDAYE','PORHI','TAIBONG'],
            'Bui' => ['MORA','TOKOMBERE','KOLOFATA'],
            'Donga-Mantung' => ['MOKOLO','BOURRHA','KOZA','HINA','MOGODE','MAYO-MASKOTA','SOULEDE-ROUA'],
            'Menchum' => ['Kumbo','JAKIRI','OKU','MBVEN','NONI','NKUM'],
            'Mezam' => ['Njinikom','BUM','FUNDONG','BELO'],
            'Momo' => ['Nkambe','NWA','AKO','MISAJE','NDU'],
            'Ngoketunjia' => ['WUM','FURU-AWA','MENCHUM VALLEY','FUNGOM'],

            // OUEST
            'Bamboutos' => ['BAMENDA I','BAMENDA II','BAMENDA III','BALI','TUBAH','BAFUT','SANTA'],
            'Haut-Nkam' => ['BATIBO','MBENGWI','NJIKWA','NGIE','WIDIKUM-MENKA'],
            'Hauts-Plateaux' => ['NDOP','BABESSI','BALIKUMBAT'],
            'Koung-Khi' => ['Mbouda','GALIM','BATCHAM','BABADJOU'],
            'Menoua' => ['BAFANG','BANA','BANDJA','KEKEM','BAKOU','BANKA','BANWA'],
            'Mifi' => ['BAHAM','BAMENDJOU','BANGOU','BATIE'],
            'Ndé' => ['POUMOUGNE','BAYANGAM','DJEBEM'],
            'Noun' => ['DSCHANG','PENKA-MICHEl','FOKOUE','NKONG-NI','SANTCHOU','FONGO TONGO'],

            // SUD
            'Dja-et-Lobo' => ['BAFOUSSAM I','BAFOUSSAM II','BAFOUSSAM III'],
            'Mvila' => ['BANGANGTE','BAZOU','TONGA','BASSAMBA'],
            'Océan' => ['FOUMBAN','FOUMBOT','MALENTOUEN','MASSANGAM','MAGBA','KOUTABA','BANGOURAIN','KOUOPTAMO','NJIMON'],
            'Vallée-du-Ntem' => ['BENGBIS','DJOUM','SANGMELIMA','ZOETELE','OVENG','MINTOM','MEYOMESSALA','MEYOMESSI'],

            // SUD-OUEST
            'Fako' => ['AMBAM','MA’AN','OLAMZE','KYE OSSI'],
            'Koupe-Manengouba' => ['Ebolowa I','Ebolowa II','BIWONG-BANE','MVANGAN','MENGONG','NGOULEMAKONG','EFOULAN','BIWONG BULU'],
            'Lebialem' => ['AKOM II','CAMPO','KRIBI I','KRIBI II','LOLODORF','MVENGUE','BIPINDI','LOKOUNDJE','NIETE'],
            'Manyu' => ['MUYUKA','TIKO','LIMBE I','LIMBE II','LIMBE III','Buea','WEST-COAST'],
            'Meme' => ['BANGEM','NGUTI','TOMBEL'],
            'Ndian' => ['FONTEM','ALOU','WABANE','AKWAYA','MAMFE','EYUMODJOCK','UPPER-BAYANG'],
            'Kumba' => ['KUMBA I','KUMBA II','KUMBA III','KONYE','BONGE'],

            // Fini
        ];

        foreach ($data as $depName => $arrondissements) {
            $dep = Departement::where('nom_departement', $depName)->first();
            if (!$dep) continue;

            foreach ($arrondissements as $arr) {
                Arrondissement::create([
                    'departement_id' => $dep->id,
                    'nom_arrondissement' => $arr
                ]);
            }
        }
    }
}