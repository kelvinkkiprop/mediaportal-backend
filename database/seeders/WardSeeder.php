<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Add
use App\Models\Other\Ward;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default
        $items = [
            //01_Mombasa
            //1_CHANGAMWE
            ["id"=>1, "county_id"=>1, "constituency_id"=>1, "name"=>"PORT REITZ"],
            ["id"=>2, "county_id"=>1, "constituency_id"=>1, "name"=>"KIPEVU"],
            ["id"=>3, "county_id"=>1, "constituency_id"=>1, "name"=>"AIRPORT"],
            ["id"=>4, "county_id"=>1, "constituency_id"=>1, "name"=>"CHANGAMWE"],
            ["id"=>5, "county_id"=>1, "constituency_id"=>1, "name"=>"CHAANI"],
            //002_JOMVU
            ["id"=>6, "county_id"=>1, "constituency_id"=>2, "name"=>"JOMVU KUU"],
            ["id"=>7, "county_id"=>1, "constituency_id"=>2, "name"=>"MIRITINI"],
            ["id"=>8, "county_id"=>1, "constituency_id"=>2, "name"=>"MIKINDANI"],
            //003_KISAUNI
            ["id"=>9, "county_id"=>1, "constituency_id"=>3, "name"=>"MJAMBERE"],
            ["id"=>10, "county_id"=>1, "constituency_id"=>3, "name"=>"JUNDA"],
            ["id"=>11, "county_id"=>1, "constituency_id"=>3, "name"=>"BAMBURI"],
            ["id"=>12, "county_id"=>1, "constituency_id"=>3, "name"=>"MWAKIRUNGE"],
            ["id"=>13, "county_id"=>1, "constituency_id"=>3, "name"=>"MTOPANGA"],
            ["id"=>14, "county_id"=>1, "constituency_id"=>3, "name"=>"MAGOGONI"],
            ["id"=>15, "county_id"=>1, "constituency_id"=>3, "name"=>"SHANZU"],
            //004_NYALI
            ["id"=>16, "county_id"=>1, "constituency_id"=>4, "name"=>"FRERE TOWN"],
            ["id"=>17, "county_id"=>1, "constituency_id"=>4, "name"=>"ZIWA LA NG'OMBE"],
            ["id"=>18, "county_id"=>1, "constituency_id"=>4, "name"=>"MKOMANI"],
            ["id"=>19, "county_id"=>1, "constituency_id"=>4, "name"=>"KONGOWEA"],
            ["id"=>20, "county_id"=>1, "constituency_id"=>4, "name"=>"KADZANDANI"],
            //005_LIKONI
            ["id"=>21, "county_id"=>1, "constituency_id"=>5, "name"=>"MTONGWE"],
            ["id"=>22, "county_id"=>1, "constituency_id"=>5, "name"=>"SHIKA ADABU"],
            ["id"=>23, "county_id"=>1, "constituency_id"=>5, "name"=>"BOFU"],
            ["id"=>24, "county_id"=>1, "constituency_id"=>5, "name"=>"LIKONI"],
            ["id"=>25, "county_id"=>1, "constituency_id"=>5, "name"=>"TIMBWANI"],
            //006_MVITA
            ["id"=>26, "county_id"=>1, "constituency_id"=>6, "name"=>"MJI WA KALE/MAKADARA"],
            ["id"=>27, "county_id"=>1, "constituency_id"=>6, "name"=>"TUDOR"],
            ["id"=>28, "county_id"=>1, "constituency_id"=>6, "name"=>"TONONOKA"],
            ["id"=>29, "county_id"=>1, "constituency_id"=>6, "name"=>"SHIMANZI/GANJONI"],
            ["id"=>30, "county_id"=>1, "constituency_id"=>6, "name"=>"MAJENGO"],


            //02_Kwale
            //007_MSAMBWENI
            ["id"=>31, "county_id"=>2, "constituency_id"=>7, "name"=>"GOMBATO BONGWE"],
            ["id"=>32, "county_id"=>2, "constituency_id"=>7, "name"=>"UKUNDA"],
            ["id"=>33, "county_id"=>2, "constituency_id"=>7, "name"=>"KINONDO"],
            ["id"=>34, "county_id"=>2, "constituency_id"=>7, "name"=>"RAMISI"],
            //008_LUNGALUNGA
            ["id"=>35, "county_id"=>2, "constituency_id"=>8, "name"=>"PONGWE/KIKONENI"],
            ["id"=>36, "county_id"=>2, "constituency_id"=>8, "name"=>"DZOMBO"],
            ["id"=>37, "county_id"=>2, "constituency_id"=>8, "name"=>"MWERENI"],
            ["id"=>38, "county_id"=>2, "constituency_id"=>8, "name"=>"VANGA"],
            //009_MATUGA
            ["id"=>39, "county_id"=>2, "constituency_id"=>9, "name"=>"TSIMBA GOLINI"],
            ["id"=>40, "county_id"=>2, "constituency_id"=>9, "name"=>"WAA"],
            ["id"=>41, "county_id"=>2, "constituency_id"=>9, "name"=>"TIWI"],
            ["id"=>42, "county_id"=>2, "constituency_id"=>9, "name"=>"KUBO SOUTH"],
            ["id"=>43, "county_id"=>2, "constituency_id"=>9, "name"=>"MKONGANI"],
            //010_KINANGO
            ["id"=>44, "county_id"=>2, "constituency_id"=>10, "name"=>"NDAVAYA"],
            ["id"=>45, "county_id"=>2, "constituency_id"=>10, "name"=>"PUMA"],
            ["id"=>46, "county_id"=>2, "constituency_id"=>10, "name"=>"KINANGO"],
            ["id"=>47, "county_id"=>2, "constituency_id"=>10, "name"=>"MACKINNON ROAD"],
            ["id"=>48, "county_id"=>2, "constituency_id"=>10, "name"=>"CHENGONI/SAMBURU"],
            ["id"=>49, "county_id"=>2, "constituency_id"=>10, "name"=>"MWAVUMBO"],
            ["id"=>50, "county_id"=>2, "constituency_id"=>10, "name"=>"KASEMENI"],


            //03_Kilifi
            //011_KILIFI_NORTH
            ["id"=>51, "county_id"=>3, "constituency_id"=>11, "name"=>"TEZO"],
            ["id"=>52, "county_id"=>3, "constituency_id"=>11, "name"=>"SOKONI"],
            ["id"=>53, "county_id"=>3, "constituency_id"=>11, "name"=>"KIBARANI"],
            ["id"=>54, "county_id"=>3, "constituency_id"=>11, "name"=>"DABASO"],
            ["id"=>55, "county_id"=>3, "constituency_id"=>11, "name"=>"MATSANGONI"],
            ["id"=>56, "county_id"=>3, "constituency_id"=>11, "name"=>"WATAMU"],
            ["id"=>57, "county_id"=>3, "constituency_id"=>11, "name"=>"MNARANI"],
            //012_KILIFI_SOUTH
            ["id"=>58, "county_id"=>3, "constituency_id"=>12, "name"=>"JUNJU"],
            ["id"=>59, "county_id"=>3, "constituency_id"=>12, "name"=>"MWARAKAYA"],
            ["id"=>60, "county_id"=>3, "constituency_id"=>12, "name"=>"SHIMO LA TEWA"],
            ["id"=>61, "county_id"=>3, "constituency_id"=>12, "name"=>"CHASIMBA"],
            ["id"=>62, "county_id"=>3, "constituency_id"=>12, "name"=>"MTEPENI"],
            //013_KALOLENI
            ["id"=>63, "county_id"=>3, "constituency_id"=>13, "name"=>"MARIAKANI"],
            ["id"=>64, "county_id"=>3, "constituency_id"=>13, "name"=>"KAYAFUNGO"],
            ["id"=>65, "county_id"=>3, "constituency_id"=>13, "name"=>"KALOLENI"],
            ["id"=>66, "county_id"=>3, "constituency_id"=>13, "name"=>"MWANAMWINGA"],
            //014_RABAI
            ["id"=>67, "county_id"=>3, "constituency_id"=>14, "name"=>"MWAWESA"],
            ["id"=>68, "county_id"=>3, "constituency_id"=>14, "name"=>"RURUMA"],
            ["id"=>69, "county_id"=>3, "constituency_id"=>14, "name"=>"KAMBE/RIBE"],
            ["id"=>70, "county_id"=>3, "constituency_id"=>14, "name"=>"RABAI/KISURUTINI"],
            //015_KANZE
            ["id"=>71, "county_id"=>3, "constituency_id"=>15, "name"=>"GANZE"],
            ["id"=>72, "county_id"=>3, "constituency_id"=>15, "name"=>"BAMBA"],
            ["id"=>73, "county_id"=>3, "constituency_id"=>15, "name"=>"JARIBUNI"],
            ["id"=>74, "county_id"=>3, "constituency_id"=>15, "name"=>"SOKOKE"],
            //016_MALINDI
            ["id"=>75, "county_id"=>3, "constituency_id"=>16, "name"=>"JILORE"],
            ["id"=>76, "county_id"=>3, "constituency_id"=>16, "name"=>"KAKUYUNI"],
            ["id"=>77, "county_id"=>3, "constituency_id"=>16, "name"=>"GANDA"],
            ["id"=>78, "county_id"=>3, "constituency_id"=>16, "name"=>"MALINDI TOWN"],
            ["id"=>79, "county_id"=>3, "constituency_id"=>16, "name"=>"SHELLA"],
            //017_MAGARINI
            ["id"=>80, "county_id"=>3, "constituency_id"=>17, "name"=>"MARAFA"],
            ["id"=>81, "county_id"=>3, "constituency_id"=>17, "name"=>"MAGARINI"],
            ["id"=>82, "county_id"=>3, "constituency_id"=>17, "name"=>"GONGONI"],
            ["id"=>83, "county_id"=>3, "constituency_id"=>17, "name"=>"ADU"],
            ["id"=>84, "county_id"=>3, "constituency_id"=>17, "name"=>"GARASHI"],
            ["id"=>85, "county_id"=>3, "constituency_id"=>17, "name"=>"SABAKI"],


            //04_TanaRiver
            //018_GARSEN
            ["id"=>86, "county_id"=>4, "constituency_id"=>18, "name"=>"KIPINI EAST"],
            ["id"=>87, "county_id"=>4, "constituency_id"=>18, "name"=>"GARSEN SOUTH"],
            ["id"=>88, "county_id"=>4, "constituency_id"=>18, "name"=>"KIPINI WEST"],
            ["id"=>89, "county_id"=>4, "constituency_id"=>18, "name"=>"GARSEN CENTRAL"],
            ["id"=>90, "county_id"=>4, "constituency_id"=>18, "name"=>"GARSEN WEST"],
            ["id"=>91, "county_id"=>4, "constituency_id"=>18, "name"=>"GARSEN NORTH"],
            //019_GALOLE
            ["id"=>92, "county_id"=>4, "constituency_id"=>19, "name"=>"KINAKOMBA"],
            ["id"=>93, "county_id"=>4, "constituency_id"=>19, "name"=>"MIKINDUNI"],
            ["id"=>94, "county_id"=>4, "constituency_id"=>19, "name"=>"CHEWANI"],
            ["id"=>95, "county_id"=>4, "constituency_id"=>19, "name"=>"WAYU"],
            //020_BURA
            ["id"=>96, "county_id"=>4, "constituency_id"=>20, "name"=>"CHEWELE"],
            ["id"=>97, "county_id"=>4, "constituency_id"=>20, "name"=>"HIRIMANI"],
            ["id"=>98, "county_id"=>4, "constituency_id"=>20, "name"=>"BANGALE"],
            ["id"=>99, "county_id"=>4, "constituency_id"=>20, "name"=>"SALA"],
            ["id"=>100, "county_id"=>4, "constituency_id"=>20, "name"=>"MADOGO"],


            //05_Lamu
            //021_LAMU_EAST
            ["id"=>101, "county_id"=>5, "constituency_id"=>21, "name"=>"FAZA"],
            ["id"=>102, "county_id"=>5, "constituency_id"=>21, "name"=>"KIUNGA"],
            ["id"=>103, "county_id"=>5, "constituency_id"=>21, "name"=>"BASUBA"],
            //022_LAMU_WEST
            ["id"=>104, "county_id"=>5, "constituency_id"=>22, "name"=>"SHELLA"],
            ["id"=>105, "county_id"=>5, "constituency_id"=>22, "name"=>"MKOMANI"],
            ["id"=>106, "county_id"=>5, "constituency_id"=>22, "name"=>"HINDI"],
            ["id"=>107, "county_id"=>5, "constituency_id"=>22, "name"=>"MKUNUMBI"],
            ["id"=>108, "county_id"=>5, "constituency_id"=>22, "name"=>"HONGWE"],
            ["id"=>109, "county_id"=>5, "constituency_id"=>22, "name"=>"WITU"],
            ["id"=>110, "county_id"=>5, "constituency_id"=>22, "name"=>"BAHARI"],


            //06_TaitaTaveta
            //023_TAVETA
            ["id"=>111, "county_id"=>6, "constituency_id"=>23, "name"=>"CHALA"],
            ["id"=>112, "county_id"=>6, "constituency_id"=>23, "name"=>"MAHOO"],
            ["id"=>113, "county_id"=>6, "constituency_id"=>23, "name"=>"BOMANI"],
            ["id"=>114, "county_id"=>6, "constituency_id"=>23, "name"=>"MBOGHONI"],
            ["id"=>115, "county_id"=>6, "constituency_id"=>23, "name"=>"MATA"],
            //024_WUNDANYI
            ["id"=>116, "county_id"=>6, "constituency_id"=>24, "name"=>"WUNDANYI/MBALE"],
            ["id"=>117, "county_id"=>6, "constituency_id"=>24, "name"=>"WERUGHA"],
            ["id"=>118, "county_id"=>6, "constituency_id"=>24, "name"=>"WUMINGU/KISHUSHE"],
            ["id"=>119, "county_id"=>6, "constituency_id"=>24, "name"=>"MWANDA/MGANGE"],
            //025_MWATATE
            ["id"=>120, "county_id"=>6, "constituency_id"=>25, "name"=>"RONG'E"],
            ["id"=>121, "county_id"=>6, "constituency_id"=>25, "name"=>"MWATATE"],
            ["id"=>122, "county_id"=>6, "constituency_id"=>25, "name"=>"BURA"],
            ["id"=>123, "county_id"=>6, "constituency_id"=>25, "name"=>"CHAWIA"],
            ["id"=>124, "county_id"=>6, "constituency_id"=>25, "name"=>"WUSI/KISHAMBA"],
            //026_VOI
            ["id"=>125, "county_id"=>6, "constituency_id"=>26, "name"=>"MBOLOLO"],
            ["id"=>126, "county_id"=>6, "constituency_id"=>26, "name"=>"SAGALLA"],
            ["id"=>127, "county_id"=>6, "constituency_id"=>26, "name"=>"KALOLENI"],
            ["id"=>128, "county_id"=>6, "constituency_id"=>26, "name"=>"MARUNGU"],
            ["id"=>129, "county_id"=>6, "constituency_id"=>26, "name"=>"KASIGAU"],
            ["id"=>130, "county_id"=>6, "constituency_id"=>26, "name"=>"NGOLIA"],


            //07_Garissa
            //027_GARISSATOWNSHIP
            ["id"=>131, "county_id"=>7, "constituency_id"=>27, "name"=>"WABERI"],
            ["id"=>132, "county_id"=>7, "constituency_id"=>27, "name"=>"GALBET"],
            ["id"=>133, "county_id"=>7, "constituency_id"=>27, "name"=>"TOWNSHIP"],
            ["id"=>134, "county_id"=>7, "constituency_id"=>27, "name"=>"IFTIN"],
            //028_BALAMBALA
            ["id"=>135, "county_id"=>7, "constituency_id"=>28, "name"=>"BALAMBALA"],
            ["id"=>136, "county_id"=>7, "constituency_id"=>28, "name"=>"DANYERE"],
            ["id"=>137, "county_id"=>7, "constituency_id"=>28, "name"=>"JARA JARA"],
            ["id"=>138, "county_id"=>7, "constituency_id"=>28, "name"=>"SAKA"],
            ["id"=>139, "county_id"=>7, "constituency_id"=>28, "name"=>"SANKURI"],
            //029_LAGDERA
            ["id"=>140, "county_id"=>7, "constituency_id"=>29, "name"=>"MODOGASHE"],
            ["id"=>141, "county_id"=>7, "constituency_id"=>29, "name"=>"BENANE"],
            ["id"=>142, "county_id"=>7, "constituency_id"=>29, "name"=>"GOREALE"],
            ["id"=>143, "county_id"=>7, "constituency_id"=>29, "name"=>"MAALIMIN"],
            ["id"=>144, "county_id"=>7, "constituency_id"=>29, "name"=>"SABENA"],
            ["id"=>145, "county_id"=>7, "constituency_id"=>29, "name"=>"BARAKI"],
            //030_DADAAB
            ["id"=>146, "county_id"=>7, "constituency_id"=>30, "name"=>"DERTU"],
            ["id"=>147, "county_id"=>7, "constituency_id"=>30, "name"=>"DADAAB"],
            ["id"=>148, "county_id"=>7, "constituency_id"=>30, "name"=>"LABASIGALE"],
            ["id"=>149, "county_id"=>7, "constituency_id"=>30, "name"=>"DAMAJALE"],
            ["id"=>150, "county_id"=>7, "constituency_id"=>30, "name"=>"LIBOI"],
            ["id"=>151, "county_id"=>7, "constituency_id"=>30, "name"=>"ABAKAILE"],
            //031_FAFI
            ["id"=>152, "county_id"=>7, "constituency_id"=>31, "name"=>"BURA"],
            ["id"=>153, "county_id"=>7, "constituency_id"=>31, "name"=>"DEKAHARIA"],
            ["id"=>154, "county_id"=>7, "constituency_id"=>31, "name"=>"JARAJILA"],
            ["id"=>155, "county_id"=>7, "constituency_id"=>31, "name"=>"FAFI"],
            ["id"=>156, "county_id"=>7, "constituency_id"=>31, "name"=>"NANIGHI"],
            //032_IJARA
            ["id"=>157, "county_id"=>7, "constituency_id"=>32, "name"=>"HULUGHO"],
            ["id"=>158, "county_id"=>7, "constituency_id"=>32, "name"=>"SANGAILU"],
            ["id"=>159, "county_id"=>7, "constituency_id"=>32, "name"=>"IJARA"],
            ["id"=>160, "county_id"=>7, "constituency_id"=>32, "name"=>"MASALANI"],


            //08_Wajir
            //033_WAJIR_NORTH
            ["id"=>161, "county_id"=>8, "constituency_id"=>33, "name"=>"GURAR"],
            ["id"=>162, "county_id"=>8, "constituency_id"=>33, "name"=>"BUTE"],
            ["id"=>163, "county_id"=>8, "constituency_id"=>33, "name"=>"KORONDILE"],
            ["id"=>164, "county_id"=>8, "constituency_id"=>33, "name"=>"MALKAGUFU"],
            ["id"=>165, "county_id"=>8, "constituency_id"=>33, "name"=>"BATALU"],
            ["id"=>166, "county_id"=>8, "constituency_id"=>33, "name"=>"DANABA"],
            ["id"=>167, "county_id"=>8, "constituency_id"=>33, "name"=>"GODOMA"],
            //034_WAJIR_EAST
            ["id"=>168, "county_id"=>8, "constituency_id"=>34, "name"=>"WAGBERI"],
            ["id"=>169, "county_id"=>8, "constituency_id"=>34, "name"=>"TOWNSHIP"],
            ["id"=>170, "county_id"=>8, "constituency_id"=>34, "name"=>"BARWAGO"],
            ["id"=>171, "county_id"=>8, "constituency_id"=>34, "name"=>"KHOROF/HARAR"],
            //035_TARBAJ
            ["id"=>172, "county_id"=>8, "constituency_id"=>35, "name"=>"ELBEN"],
            ["id"=>173, "county_id"=>8, "constituency_id"=>35, "name"=>"SARMAN"],
            ["id"=>174, "county_id"=>8, "constituency_id"=>35, "name"=>"TARBAJ"],
            ["id"=>175, "county_id"=>8, "constituency_id"=>35, "name"=>"WARGADUD"],
            //036_WAJIR_WEST
            ["id"=>176, "county_id"=>8, "constituency_id"=>36, "name"=>"ARBAJAHAN"],
            ["id"=>177, "county_id"=>8, "constituency_id"=>36, "name"=>"HADADO/ATHIBOHOL"],
            ["id"=>178, "county_id"=>8, "constituency_id"=>36, "name"=>"ADAMASAJIDE"],
            ["id"=>179, "county_id"=>8, "constituency_id"=>36, "name"=>"GANYURE/WAGALLA"],
            //037_ELDAS
            ["id"=>180, "county_id"=>8, "constituency_id"=>37, "name"=>"ELDAS"],
            ["id"=>181, "county_id"=>8, "constituency_id"=>37, "name"=>"DELLA"],
            ["id"=>182, "county_id"=>8, "constituency_id"=>37, "name"=>"LAKOLEY SOUTH/BASIR"],
            ["id"=>183, "county_id"=>8, "constituency_id"=>37, "name"=>"ELNUR/TULA TULA"],
            ["id"=>184, "county_id"=>8, "constituency_id"=>37, "name"=>"BENANE"],
            ["id"=>185, "county_id"=>8, "constituency_id"=>37, "name"=>"BURDER"],
            ["id"=>186, "county_id"=>8, "constituency_id"=>37, "name"=>"DADAJA BULLA"],
            //038_WAJIR_SOUTH
            ["id"=>187, "county_id"=>8, "constituency_id"=>38, "name"=>"HABASSWEIN"],
            ["id"=>188, "county_id"=>8, "constituency_id"=>38, "name"=>"LAGBOGHOL SOUTH"],
            ["id"=>189, "county_id"=>8, "constituency_id"=>38, "name"=>"IBRAHIM URE"],
            ["id"=>190, "county_id"=>8, "constituency_id"=>38, "name"=>"DIIF"],


            //09_Mandera
            //039_MANDERA_WEST
            ["id"=>191, "county_id"=>9, "constituency_id"=>39, "name"=>"TAKABA SOUTH"],
            ["id"=>192, "county_id"=>9, "constituency_id"=>39, "name"=>"TAKABA"],
            ["id"=>193, "county_id"=>9, "constituency_id"=>39, "name"=>"LAGSURE"],
            ["id"=>194, "county_id"=>9, "constituency_id"=>39, "name"=>"DANDU"],
            ["id"=>195, "county_id"=>9, "constituency_id"=>39, "name"=>"GITHER"],
            //040_BANISSA
            ["id"=>196, "county_id"=>9, "constituency_id"=>40, "name"=>"BANISSA"],
            ["id"=>197, "county_id"=>9, "constituency_id"=>40, "name"=>"DERKHALE"],
            ["id"=>198, "county_id"=>9, "constituency_id"=>40, "name"=>"GUBA"],
            ["id"=>199, "county_id"=>9, "constituency_id"=>40, "name"=>"MALKAMARI"],
            ["id"=>200, "county_id"=>9, "constituency_id"=>40, "name"=>"KILIWEHIRI"],
            //041_MANDERA_NORTH
            ["id"=>201, "county_id"=>9, "constituency_id"=>41, "name"=>"ASHABITO"],
            ["id"=>202, "county_id"=>9, "constituency_id"=>41, "name"=>"GUTICHA"],
            ["id"=>203, "county_id"=>9, "constituency_id"=>41, "name"=>"MOROTHILE"],
            ["id"=>204, "county_id"=>9, "constituency_id"=>41, "name"=>"RHAMU"],
            ["id"=>205, "county_id"=>9, "constituency_id"=>41, "name"=>"RHAMU-DIMTU"],
            //042_MANDERA_SOUTH
            ["id"=>206, "county_id"=>9, "constituency_id"=>42, "name"=>"WARGADUD"],
            ["id"=>207, "county_id"=>9, "constituency_id"=>42, "name"=>"KUTULO"],
            ["id"=>208, "county_id"=>9, "constituency_id"=>42, "name"=>"ELWAK SOUTH"],
            ["id"=>209, "county_id"=>9, "constituency_id"=>42, "name"=>"ELWAK NORTH"],
            ["id"=>210, "county_id"=>9, "constituency_id"=>42, "name"=>"SHIMBIR FATUMA"],
            //043_MANDERA_EAST
            ["id"=>211, "county_id"=>9, "constituency_id"=>43, "name"=>"ARABIA"],
            ["id"=>212, "county_id"=>9, "constituency_id"=>43, "name"=>"TOWNSHIP"],
            ["id"=>213, "county_id"=>9, "constituency_id"=>43, "name"=>"NEBOI"],
            ["id"=>214, "county_id"=>9, "constituency_id"=>43, "name"=>"KHALALIO"],
            ["id"=>215, "county_id"=>9, "constituency_id"=>43, "name"=>"LIBEHIA"],
            //044_LAFEY
            ["id"=>216, "county_id"=>9, "constituency_id"=>44, "name"=>"SALA"],
            ["id"=>217, "county_id"=>9, "constituency_id"=>44, "name"=>"FINO"],
            ["id"=>218, "county_id"=>9, "constituency_id"=>44, "name"=>"LAFEY"],
            ["id"=>219, "county_id"=>9, "constituency_id"=>44, "name"=>"WARANQARA"],
            ["id"=>220, "county_id"=>9, "constituency_id"=>44, "name"=>"ALANGO GOF"],


             //10_Marsabit
             //045_MOYALE
             ["id"=>221, "county_id"=>10, "constituency_id"=>45, "name"=>"BUTIYE"],
             ["id"=>222, "county_id"=>10, "constituency_id"=>45, "name"=>"SOLOLO"],
             ["id"=>223, "county_id"=>10, "constituency_id"=>45, "name"=>"HEILLU/MANYATTA"],
             ["id"=>224, "county_id"=>10, "constituency_id"=>45, "name"=>"GOLBO"],
             ["id"=>225, "county_id"=>10, "constituency_id"=>45, "name"=>"MOYALE TOWNSHIP"],
             ["id"=>226, "county_id"=>10, "constituency_id"=>45, "name"=>"URAN"],
             ["id"=>227, "county_id"=>10, "constituency_id"=>45, "name"=>"OBBU"],
             //046_NORTH_HORR
             ["id"=>228, "county_id"=>10, "constituency_id"=>46, "name"=>"DUKANA"],
             ["id"=>229, "county_id"=>10, "constituency_id"=>46, "name"=>"MAIKONA"],
             ["id"=>230, "county_id"=>10, "constituency_id"=>46, "name"=>"TURBI"],
             ["id"=>231, "county_id"=>10, "constituency_id"=>46, "name"=>"NORTH HORR"],
             ["id"=>232, "county_id"=>10, "constituency_id"=>46, "name"=>"ILLERET"],
             //047_SAKU
             ["id"=>233, "county_id"=>10, "constituency_id"=>47, "name"=>"SAGANTE/JALDESA"],
             ["id"=>234, "county_id"=>10, "constituency_id"=>47, "name"=>"KARARE"],
             ["id"=>235, "county_id"=>10, "constituency_id"=>47, "name"=>"MARSABIT CENTRAL"],
             //048_LAISAMIS
             ["id"=>236, "county_id"=>10, "constituency_id"=>48, "name"=>"LOIYANGALANI"],
             ["id"=>237, "county_id"=>10, "constituency_id"=>48, "name"=>"KARGI/SOUTH HORR"],
             ["id"=>238, "county_id"=>10, "constituency_id"=>48, "name"=>"KORR/NGURUNIT"],
             ["id"=>239, "county_id"=>10, "constituency_id"=>48, "name"=>"LOGO LOGO"],
             ["id"=>240, "county_id"=>10, "constituency_id"=>48, "name"=>"LAISAMIS"],


            //11_Isiolo
            // 049_ISIOLO_NORTH
            ["id"=>241, "county_id"=>11, "constituency_id"=>49, "name"=>"WABERA"],
            ["id"=>242, "county_id"=>11, "constituency_id"=>49, "name"=>"BULLA PESA"],
            ["id"=>243, "county_id"=>11, "constituency_id"=>49, "name"=>"CHARI"],
            ["id"=>244, "county_id"=>11, "constituency_id"=>49, "name"=>"CHERAB"],
            ["id"=>245, "county_id"=>11, "constituency_id"=>49, "name"=>"NGARE MARA"],
            ["id"=>246, "county_id"=>11, "constituency_id"=>49, "name"=>"BURAT"],
            ["id"=>247, "county_id"=>11, "constituency_id"=>49, "name"=>"OLDO/NYIRO"],
            //050_ISIOLO_NORTH
            ["id"=>248, "county_id"=>11, "constituency_id"=>50, "name"=>"GARBATULLA"],
            ["id"=>249, "county_id"=>11, "constituency_id"=>50, "name"=>"KINNA"],
            ["id"=>250, "county_id"=>11, "constituency_id"=>50, "name"=>"SERICHO"],


            //12_Meru
            //051_IGEMBE_SOUTH
            ["id"=>251, "county_id"=>12, "constituency_id"=>51, "name"=>"MAUA"],
            ["id"=>252, "county_id"=>12, "constituency_id"=>51, "name"=>"KIEGOI/ANTUBOCHIU"],
            ["id"=>253, "county_id"=>12, "constituency_id"=>51, "name"=>"ATHIRU GAITI"],
            ["id"=>254, "county_id"=>12, "constituency_id"=>51, "name"=>"AKACHIU"],
            ["id"=>255, "county_id"=>12, "constituency_id"=>51, "name"=>"KANUNI"],
            //052_IGEMBE_CENTRAL
            ["id"=>256, "county_id"=>12, "constituency_id"=>52, "name"=>"AKIRANG'ONDU"],
            ["id"=>257, "county_id"=>12, "constituency_id"=>52, "name"=>"ATHIRU RUUJINE"],
            ["id"=>258, "county_id"=>12, "constituency_id"=>52, "name"=>"IGEMBE EAST"],
            ["id"=>259, "county_id"=>12, "constituency_id"=>52, "name"=>"NJIA"],
            ["id"=>260, "county_id"=>12, "constituency_id"=>52, "name"=>"KANGETA"],
            //053_IGEMBE_NORTH
            ["id"=>261, "county_id"=>12, "constituency_id"=>53, "name"=>"ANTUAMBUI"],
            ["id"=>262, "county_id"=>12, "constituency_id"=>53, "name"=>"NTUNENE"],
            ["id"=>263, "county_id"=>12, "constituency_id"=>53, "name"=>"ANTUBETWE KIONGO"],
            ["id"=>264, "county_id"=>12, "constituency_id"=>53, "name"=>"NAATHU"],
            ["id"=>265, "county_id"=>12, "constituency_id"=>53, "name"=>"AMWATHI"],
            //054_TIGANIA_WEST
            ["id"=>266, "county_id"=>12, "constituency_id"=>54, "name"=>"ATHWANA"],
            ["id"=>267, "county_id"=>12, "constituency_id"=>54, "name"=>"AKITHII"],
            ["id"=>268, "county_id"=>12, "constituency_id"=>54, "name"=>"KIANJAI"],
            ["id"=>269, "county_id"=>12, "constituency_id"=>54, "name"=>"NKOMO"],
            ["id"=>270, "county_id"=>12, "constituency_id"=>54, "name"=>"MBEU"],
            //055_TIGANIA_EAST
            ["id"=>271, "county_id"=>12, "constituency_id"=>55, "name"=>"THANGATHA"],
            ["id"=>272, "county_id"=>12, "constituency_id"=>55, "name"=>"MIKINDURI"],
            ["id"=>273, "county_id"=>12, "constituency_id"=>55, "name"=>"KIGUCHWA"],
            ["id"=>274, "county_id"=>12, "constituency_id"=>55, "name"=>"MUTHARA"],
            ["id"=>275, "county_id"=>12, "constituency_id"=>55, "name"=>"KARAMA"],
            //056_NORTH_IMENTI
            ["id"=>276, "county_id"=>12, "constituency_id"=>56, "name"=>"MUNICIPALITY"],
            ["id"=>277, "county_id"=>12, "constituency_id"=>56, "name"=>"NTIMA EAST"],
            ["id"=>278, "county_id"=>12, "constituency_id"=>56, "name"=>"NTIMA WEST"],
            ["id"=>279, "county_id"=>12, "constituency_id"=>56, "name"=>"NYAKI WEST"],
            ["id"=>280, "county_id"=>12, "constituency_id"=>56, "name"=>"NYAKI EAST"],
            //057_BUURI
            ["id"=>281, "county_id"=>12, "constituency_id"=>57, "name"=>"TIMAU"],
            ["id"=>282, "county_id"=>12, "constituency_id"=>57, "name"=>"KISIMA"],
            ["id"=>283, "county_id"=>12, "constituency_id"=>57, "name"=>"KIIRUA/NAARI"],
            ["id"=>284, "county_id"=>12, "constituency_id"=>57, "name"=>"RUIRI/RWARERA"],
            //058_CENTRAL_IMENTI
            ["id"=>285, "county_id"=>12, "constituency_id"=>58, "name"=>"KIBIRICHIA"],
            ["id"=>286, "county_id"=>12, "constituency_id"=>58, "name"=>"MWANGANTHIA"],
            ["id"=>287, "county_id"=>12, "constituency_id"=>58, "name"=>"ABOTHUGUCHI CENTRAL"],
            ["id"=>288, "county_id"=>12, "constituency_id"=>58, "name"=>"ABOTHUGUCHI WEST"],
            ["id"=>289, "county_id"=>12, "constituency_id"=>58, "name"=>"KIAGU"],
            //059_SOUTH_IMENTI
            ["id"=>290, "county_id"=>12, "constituency_id"=>59, "name"=>"MITUNGUU"],
            ["id"=>291, "county_id"=>12, "constituency_id"=>59, "name"=>"IGOJI EAST"],
            ["id"=>292, "county_id"=>12, "constituency_id"=>59, "name"=>"IGOJI WEST"],
            ["id"=>293, "county_id"=>12, "constituency_id"=>59, "name"=>"ABOGETA EAST"],
            ["id"=>294, "county_id"=>12, "constituency_id"=>59, "name"=>"ABOGETA WEST"],
            ["id"=>295, "county_id"=>12, "constituency_id"=>59, "name"=>"NKUENE"],


            //13_TharakaNithi
            //060_MAARA
            ["id"=>296, "county_id"=>13, "constituency_id"=>60, "name"=>"MITHERU"],
            ["id"=>297, "county_id"=>13, "constituency_id"=>60, "name"=>"MUTHAMBI"],
            ["id"=>298, "county_id"=>13, "constituency_id"=>60, "name"=>"MWIMBI"],
            ["id"=>299, "county_id"=>13, "constituency_id"=>60, "name"=>"GANGA"],
            ["id"=>300, "county_id"=>13, "constituency_id"=>60, "name"=>"CHOGORIA"],
            //061_CHUKA/IGAMBANG'OMBE
            ["id"=>301, "county_id"=>13, "constituency_id"=>61, "name"=>"MARIANI"],
            ["id"=>302, "county_id"=>13, "constituency_id"=>61, "name"=>"KARINGANI"],
            ["id"=>303, "county_id"=>13, "constituency_id"=>61, "name"=>"MAGUMONI"],
            ["id"=>304, "county_id"=>13, "constituency_id"=>61, "name"=>"MUGWE"],
            ["id"=>305, "county_id"=>13, "constituency_id"=>61, "name"=>"IGAMBANG'OMBE"],
            //062_THARAKA
            ["id"=>306, "county_id"=>13, "constituency_id"=>62, "name"=>"GATUNGA"],
            ["id"=>307, "county_id"=>13, "constituency_id"=>62, "name"=>"MUKOTHIMA"],
            ["id"=>308, "county_id"=>13, "constituency_id"=>62, "name"=>"NKONDI"],
            ["id"=>309, "county_id"=>13, "constituency_id"=>62, "name"=>"CHIAKARIGA"],
            ["id"=>310, "county_id"=>13, "constituency_id"=>62, "name"=>"MARIMANTI"],


            //14_Embu
            //063_MANYATTA
            ["id"=>311, "county_id"=>14, "constituency_id"=>63, "name"=>"RUGURU/NGANDORI"],
            ["id"=>312, "county_id"=>14, "constituency_id"=>63, "name"=>"KITHIMU"],
            ["id"=>313, "county_id"=>14, "constituency_id"=>63, "name"=>"NGINDA"],
            ["id"=>314, "county_id"=>14, "constituency_id"=>63, "name"=>"MBETI NORTH"],
            ["id"=>315, "county_id"=>14, "constituency_id"=>63, "name"=>"KIRIMARI"],
            ["id"=>316, "county_id"=>14, "constituency_id"=>63, "name"=>"GATURI SOUTH"],
            //064_RUNYENJES
            ["id"=>317, "county_id"=>14, "constituency_id"=>64, "name"=>"GATURI NORTH"],
            ["id"=>318, "county_id"=>14, "constituency_id"=>64, "name"=>"KAGAARI SOUTH"],
            ["id"=>319, "county_id"=>14, "constituency_id"=>64, "name"=>"CENTRAL  WARD"],
            ["id"=>320, "county_id"=>14, "constituency_id"=>64, "name"=>"KAGAARI NORTH"],
            ["id"=>321, "county_id"=>14, "constituency_id"=>64, "name"=>"KYENI NORTH"],
            ["id"=>322, "county_id"=>14, "constituency_id"=>64, "name"=>"KYENI SOUTH"],
            //065_MBEERE_SOUTH
            ["id"=>323, "county_id"=>14, "constituency_id"=>65, "name"=>"MWEA"],
            ["id"=>324, "county_id"=>14, "constituency_id"=>65, "name"=>"MAKIMA"],
            ["id"=>325, "county_id"=>14, "constituency_id"=>65, "name"=>"MBETI SOUTH"],
            ["id"=>326, "county_id"=>14, "constituency_id"=>65, "name"=>"MAVURIA"],
            ["id"=>327, "county_id"=>14, "constituency_id"=>65, "name"=>"KIAMBERE"],
            //066_MBEERE_NORTH
            ["id"=>328, "county_id"=>14, "constituency_id"=>66, "name"=>"NTHAWA"],
            ["id"=>329, "county_id"=>14, "constituency_id"=>66, "name"=>"MUMINJI"],
            ["id"=>330, "county_id"=>14, "constituency_id"=>66, "name"=>"EVURORE"],


            //15_Kitui
            //067_MWINGI_NORTH
            ["id"=>331, "county_id"=>15, "constituency_id"=>67, "name"=>"NGOMENI"],
            ["id"=>332, "county_id"=>15, "constituency_id"=>67, "name"=>"KYUSO"],
            ["id"=>333, "county_id"=>15, "constituency_id"=>67, "name"=>"MUMONI"],
            ["id"=>334, "county_id"=>15, "constituency_id"=>67, "name"=>"TSEIKURU"],
            ["id"=>335, "county_id"=>15, "constituency_id"=>67, "name"=>"THARAKA"],
            //068_MWINGI_WEST
            ["id"=>336, "county_id"=>15, "constituency_id"=>68, "name"=>"KYOME/THAANA"],
            ["id"=>337, "county_id"=>15, "constituency_id"=>68, "name"=>"NGUUTANI"],
            ["id"=>338, "county_id"=>15, "constituency_id"=>68, "name"=>"MIGWANI"],
            ["id"=>339, "county_id"=>15, "constituency_id"=>68, "name"=>"KIOMO/KYETHANI"],
            //069_MWINGI_CENTRAL
            ["id"=>340, "county_id"=>15, "constituency_id"=>69, "name"=>"CENTRAL"],
            ["id"=>341, "county_id"=>15, "constituency_id"=>69, "name"=>"KIVOU"],
            ["id"=>342, "county_id"=>15, "constituency_id"=>69, "name"=>"NGUNI"],
            ["id"=>343, "county_id"=>15, "constituency_id"=>69, "name"=>"NUU"],
            ["id"=>344, "county_id"=>15, "constituency_id"=>69, "name"=>"MUI"],
            ["id"=>345, "county_id"=>15, "constituency_id"=>69, "name"=>"WAITA"],
            //070_KITUI_WEST
            ["id"=>346, "county_id"=>15, "constituency_id"=>70, "name"=>"MUTONGUNI"],
            ["id"=>347, "county_id"=>15, "constituency_id"=>70, "name"=>"KAUWI"],
            ["id"=>348, "county_id"=>15, "constituency_id"=>70, "name"=>"MATINYANI"],
            ["id"=>349, "county_id"=>15, "constituency_id"=>70, "name"=>"KWA MUTONGA/KITHUMULA"],
            //071_KITUI_RURAL
            ["id"=>350, "county_id"=>15, "constituency_id"=>71, "name"=>"KISASI"],
            ["id"=>351, "county_id"=>15, "constituency_id"=>71, "name"=>"MBITINI"],
            ["id"=>352, "county_id"=>15, "constituency_id"=>71, "name"=>"KWAVONZA/YATTA"],
            ["id"=>353, "county_id"=>15, "constituency_id"=>71, "name"=>"KANYANGI"],
            //072_KITUI_CENTRAL
            ["id"=>354, "county_id"=>15, "constituency_id"=>72, "name"=>"MIAMBANI"],
            ["id"=>355, "county_id"=>15, "constituency_id"=>72, "name"=>"TOWNSHIP"],
            ["id"=>356, "county_id"=>15, "constituency_id"=>72, "name"=>"KYANGWITHYA WEST"],
            ["id"=>357, "county_id"=>15, "constituency_id"=>72, "name"=>"MULANGO"],
            ["id"=>358, "county_id"=>15, "constituency_id"=>72, "name"=>"KYANGWITHYA EAST"],
            //073_KITUI_EAST
            ["id"=>359, "county_id"=>15, "constituency_id"=>73, "name"=>"ZOMBE/MWITIKA"],
            ["id"=>360, "county_id"=>15, "constituency_id"=>73, "name"=>"NZAMBANI"],
            ["id"=>361, "county_id"=>15, "constituency_id"=>73, "name"=>"CHULUNI"],
            ["id"=>362, "county_id"=>15, "constituency_id"=>73, "name"=>"VOO/KYAMATU"],
            ["id"=>363, "county_id"=>15, "constituency_id"=>73, "name"=>"ENDAU/MALALANI"],
            ["id"=>364, "county_id"=>15, "constituency_id"=>73, "name"=>"MUTITO/KALIKU"],
            //074_KITUI_SOUTH
            ["id"=>365, "county_id"=>15, "constituency_id"=>74, "name"=>"IKANGA/KYATUNE"],
            ["id"=>366, "county_id"=>15, "constituency_id"=>74, "name"=>"MUTOMO"],
            ["id"=>367, "county_id"=>15, "constituency_id"=>74, "name"=>"MUTHA"],
            ["id"=>368, "county_id"=>15, "constituency_id"=>74, "name"=>"IKUTHA"],
            ["id"=>369, "county_id"=>15, "constituency_id"=>74, "name"=>"KANZIKO"],
            ["id"=>370, "county_id"=>15, "constituency_id"=>74, "name"=>"ATHI"],


            //16_Machakos
            //075_MASINGA
            ["id"=>371, "county_id"=>16, "constituency_id"=>75, "name"=>"KIVAA"],
            ["id"=>372, "county_id"=>16, "constituency_id"=>75, "name"=>"MASINGA CENTRAL"],
            ["id"=>373, "county_id"=>16, "constituency_id"=>75, "name"=>"EKALAKALA"],
            ["id"=>374, "county_id"=>16, "constituency_id"=>75, "name"=>"MUTHESYA"],
            ["id"=>375, "county_id"=>16, "constituency_id"=>75, "name"=>"NDITHINI"],
            //076_YATTA
            ["id"=>376, "county_id"=>16, "constituency_id"=>76, "name"=>"NDALANI"],
            ["id"=>377, "county_id"=>16, "constituency_id"=>76, "name"=>"MATUU"],
            ["id"=>378, "county_id"=>16, "constituency_id"=>76, "name"=>"KITHIMANI"],
            ["id"=>379, "county_id"=>16, "constituency_id"=>76, "name"=>"IKOMBE"],
            ["id"=>380, "county_id"=>16, "constituency_id"=>76, "name"=>"KATANGI"],
            //077_KANGUNDO
            ["id"=>381, "county_id"=>16, "constituency_id"=>77, "name"=>"KANGUNDO NORTH"],
            ["id"=>382, "county_id"=>16, "constituency_id"=>77, "name"=>"KANGUNDO CENTRAL"],
            ["id"=>383, "county_id"=>16, "constituency_id"=>77, "name"=>"KANGUNDO EAST"],
            ["id"=>384, "county_id"=>16, "constituency_id"=>77, "name"=>"KANGUNDO WEST"],
            //078_MATUNGULU
            ["id"=>385, "county_id"=>16, "constituency_id"=>78, "name"=>"TALA"],
            ["id"=>386, "county_id"=>16, "constituency_id"=>78, "name"=>"MATUNGULU NORTH"],
            ["id"=>387, "county_id"=>16, "constituency_id"=>74, "name"=>"MATUNGULU EAST"],
            ["id"=>388, "county_id"=>16, "constituency_id"=>78, "name"=>"MATUNGULU WEST"],
            ["id"=>389, "county_id"=>16, "constituency_id"=>78, "name"=>"KYELENI"],
            //079_KATHIANI
            ["id"=>390, "county_id"=>16, "constituency_id"=>79, "name"=>"MITABONI"],
            ["id"=>391, "county_id"=>16, "constituency_id"=>79, "name"=>"KATHIANI CENTRAL"],
            ["id"=>392, "county_id"=>16, "constituency_id"=>79, "name"=>"UPPER KAEWA/IVETI"],
            ["id"=>393, "county_id"=>16, "constituency_id"=>79, "name"=>"LOWER KAEWA/KAANI"],
            //080_MAVOKO
            ["id"=>394, "county_id"=>16, "constituency_id"=>80, "name"=>"ATHI RIVER"],
            ["id"=>395, "county_id"=>16, "constituency_id"=>80, "name"=>"KINANIE"],
            ["id"=>396, "county_id"=>16, "constituency_id"=>80, "name"=>"MUTHWANI"],
            ["id"=>397, "county_id"=>16, "constituency_id"=>80, "name"=>"SYOKIMAU/MULOLONGO"],
            //081_MACHAKOS_TOWN
            ["id"=>398, "county_id"=>16, "constituency_id"=>81, "name"=>"KALAMA"],
            ["id"=>399, "county_id"=>16, "constituency_id"=>81, "name"=>"MUA"],
            ["id"=>400, "county_id"=>16, "constituency_id"=>81, "name"=>"MUTITUNI"],
            ["id"=>401, "county_id"=>16, "constituency_id"=>81, "name"=>"MACHAKOS CENTRAL"],
            ["id"=>402, "county_id"=>16, "constituency_id"=>81, "name"=>"MUMBUNI NORTH"],
            ["id"=>403, "county_id"=>16, "constituency_id"=>81, "name"=>"MUVUTI/KIIMA-KIMWE"],
            ["id"=>404, "county_id"=>16, "constituency_id"=>81, "name"=>"KOLA"],
            //082_MWALA
            ["id"=>405, "county_id"=>16, "constituency_id"=>82, "name"=>"MBIUNI"],
            ["id"=>406, "county_id"=>16, "constituency_id"=>82, "name"=>"MAKUTANO/ MWALA"],
            ["id"=>407, "county_id"=>16, "constituency_id"=>82, "name"=>"MASII"],
            ["id"=>408, "county_id"=>16, "constituency_id"=>82, "name"=>"MUTHETHENI"],
            ["id"=>409, "county_id"=>16, "constituency_id"=>82, "name"=>"WAMUNYU"],
            ["id"=>410, "county_id"=>16, "constituency_id"=>82, "name"=>"KIBAUNI"],


            //17_Makueni
            //083_MBOONI
            ["id"=>411, "county_id"=>17, "constituency_id"=>83, "name"=>"TULIMANI"],
            ["id"=>412, "county_id"=>17, "constituency_id"=>83, "name"=>"MBOONI"],
            ["id"=>413, "county_id"=>17, "constituency_id"=>83, "name"=>"KITHUNGO/KITUNDU"],
            ["id"=>414, "county_id"=>17, "constituency_id"=>83, "name"=>"KITETA/KISAU"],
            ["id"=>415, "county_id"=>17, "constituency_id"=>83, "name"=>"WAIA-KAKO"],
            ["id"=>416, "county_id"=>17, "constituency_id"=>83, "name"=>"KALAWA"],
            //084_KILOME
            ["id"=>417, "county_id"=>17, "constituency_id"=>84, "name"=>"KASIKEU"],
            ["id"=>418, "county_id"=>17, "constituency_id"=>84, "name"=>"MUKAA"],
            ["id"=>419, "county_id"=>17, "constituency_id"=>84, "name"=>"KIIMA KIU/KALANZONI"],
            //085_KAITI
            ["id"=>420, "county_id"=>17, "constituency_id"=>85, "name"=>"UKIA"],
            ["id"=>421, "county_id"=>17, "constituency_id"=>85, "name"=>"KEE"],
            ["id"=>422, "county_id"=>17, "constituency_id"=>85, "name"=>"KILUNGU"],
            ["id"=>423, "county_id"=>17, "constituency_id"=>85, "name"=>"ILIMA"],
            //086_MAKUENI
            ["id"=>424, "county_id"=>17, "constituency_id"=>86, "name"=>"WOTE"],
            ["id"=>425, "county_id"=>17, "constituency_id"=>86, "name"=>"MUVAU/KIKUUMINI"],
            ["id"=>426, "county_id"=>17, "constituency_id"=>86, "name"=>"MAVINDINI"],
            ["id"=>427, "county_id"=>17, "constituency_id"=>86, "name"=>"KITISE/KITHUKI"],
            ["id"=>428, "county_id"=>17, "constituency_id"=>86, "name"=>"KATHONZWENI"],
            ["id"=>429, "county_id"=>17, "constituency_id"=>86, "name"=>"NZAUI/KILILI/KALAMBA"],
            ["id"=>430, "county_id"=>17, "constituency_id"=>86, "name"=>"MBITINI"],
            //087_KIBWEZI_WEST
            ["id"=>431, "county_id"=>17, "constituency_id"=>87, "name"=>"MAKINDU"],
            ["id"=>432, "county_id"=>17, "constituency_id"=>87, "name"=>"NGUUMO"],
            ["id"=>433, "county_id"=>17, "constituency_id"=>87, "name"=>"KIKUMBULYU NORTH"],
            ["id"=>434, "county_id"=>17, "constituency_id"=>87, "name"=>"KIKUMBULYU SOUTH"],
            ["id"=>435, "county_id"=>17, "constituency_id"=>87, "name"=>"NGUU/MASUMBA"],
            ["id"=>436, "county_id"=>17, "constituency_id"=>87, "name"=>"EMALI/MULALA"],
            //088_KIBWEZI_EAST
            ["id"=>437, "county_id"=>17, "constituency_id"=>88, "name"=>"MASONGALENI"],
            ["id"=>438, "county_id"=>17, "constituency_id"=>88, "name"=>"MTITO ANDEI"],
            ["id"=>439, "county_id"=>17, "constituency_id"=>88, "name"=>"THANGE"],
            ["id"=>440, "county_id"=>17, "constituency_id"=>88, "name"=>"IVINGONI/NZAMBANI"],


            //18_Nyandarua
            //089_KINANGOP
            ["id"=>441, "county_id"=>18, "constituency_id"=>89, "name"=>"ENGINEER"],
            ["id"=>442, "county_id"=>18, "constituency_id"=>89, "name"=>"GATHARA"],
            ["id"=>443, "county_id"=>18, "constituency_id"=>89, "name"=>"NORTH KINANGOP"],
            ["id"=>444, "county_id"=>18, "constituency_id"=>89, "name"=>"MURUNGARU"],
            ["id"=>445, "county_id"=>18, "constituency_id"=>89, "name"=>"NJABINI\KIBURU"],
            ["id"=>446, "county_id"=>18, "constituency_id"=>89, "name"=>"NYAKIO"],
            ["id"=>447, "county_id"=>18, "constituency_id"=>89, "name"=>"GITHABAI"],
            ["id"=>448, "county_id"=>18, "constituency_id"=>89, "name"=>"MAGUMU"],
            //090_KIPIPIRI
            ["id"=>449, "county_id"=>18, "constituency_id"=>90, "name"=>"WANJOHI"],
            ["id"=>450, "county_id"=>18, "constituency_id"=>90, "name"=>"KIPIPIRI"],
            ["id"=>451, "county_id"=>18, "constituency_id"=>90, "name"=>"GETA"],
            ["id"=>452, "county_id"=>18, "constituency_id"=>90, "name"=>"GITHIORO"],
            //091_OL_KALOU
            ["id"=>453, "county_id"=>18, "constituency_id"=>91, "name"=>"KARAU"],
            ["id"=>454, "county_id"=>18, "constituency_id"=>91, "name"=>"KANJUIRI RANGE"],
            ["id"=>455, "county_id"=>18, "constituency_id"=>91, "name"=>"MIRANGINE"],
            ["id"=>456, "county_id"=>18, "constituency_id"=>91, "name"=>"KAIMBAGA"],
            ["id"=>457, "county_id"=>18, "constituency_id"=>91, "name"=>"RURII"],
            //092_OL_JOROK
            ["id"=>458, "county_id"=>18, "constituency_id"=>92, "name"=>"GATHANJI"],
            ["id"=>459, "county_id"=>18, "constituency_id"=>92, "name"=>"GATIMU"],
            ["id"=>460, "county_id"=>18, "constituency_id"=>92, "name"=>"WERU"],
            ["id"=>461, "county_id"=>18, "constituency_id"=>92, "name"=>"CHARAGITA"],
            //093_NDARAGWA
            ["id"=>462, "county_id"=>18, "constituency_id"=>93, "name"=>"LESHAU/PONDO"],
            ["id"=>463, "county_id"=>18, "constituency_id"=>93, "name"=>"KIRIITA"],
            ["id"=>464, "county_id"=>18, "constituency_id"=>93, "name"=>"CENTRAL"],
            ["id"=>465, "county_id"=>18, "constituency_id"=>93, "name"=>"SHAMATA"],

            //19_Nyeri
            //094_TETU
            ["id"=>466, "county_id"=>19, "constituency_id"=>94, "name"=>"DEDAN KIMANTHI"],
            ["id"=>467, "county_id"=>19, "constituency_id"=>94, "name"=>"WAMAGANA"],
            ["id"=>468, "county_id"=>19, "constituency_id"=>94, "name"=>"AGUTHI-GAAKI"],
            //095_KIENI
            ["id"=>469, "county_id"=>19, "constituency_id"=>95, "name"=>"MWEIGA"],
            ["id"=>470, "county_id"=>19, "constituency_id"=>95, "name"=>"NAROMORU KIAMATHAGA"],
            ["id"=>471, "county_id"=>19, "constituency_id"=>95, "name"=>"MWIYOGO/ENDARASHA"],
            ["id"=>472, "county_id"=>19, "constituency_id"=>95, "name"=>"MUGUNDA"],
            ["id"=>473, "county_id"=>19, "constituency_id"=>95, "name"=>"GATARAKWA"],
            ["id"=>474, "county_id"=>19, "constituency_id"=>95, "name"=>"THEGU RIVER"],
            ["id"=>475, "county_id"=>19, "constituency_id"=>95, "name"=>"KABARU"],
            ["id"=>476, "county_id"=>19, "constituency_id"=>95, "name"=>"GAKAWA"],
            //096_MATHIRA
            ["id"=>477, "county_id"=>19, "constituency_id"=>96, "name"=>"RUGURU"],
            ["id"=>478, "county_id"=>19, "constituency_id"=>96, "name"=>"MAGUTU"],
            ["id"=>479, "county_id"=>19, "constituency_id"=>96, "name"=>"IRIAINI"],
            ["id"=>480, "county_id"=>19, "constituency_id"=>96, "name"=>"KONYU"],
            ["id"=>481, "county_id"=>19, "constituency_id"=>96, "name"=>"KIRIMUKUYU"],
            ["id"=>482, "county_id"=>19, "constituency_id"=>96, "name"=>"KARATINA TOWN"],
            //097_OTHAYA
            ["id"=>483, "county_id"=>19, "constituency_id"=>97, "name"=>"MAHIGA"],
            ["id"=>484, "county_id"=>19, "constituency_id"=>97, "name"=>"IRIA-INI"],
            ["id"=>485, "county_id"=>19, "constituency_id"=>97, "name"=>"CHINGA"],
            ["id"=>486, "county_id"=>19, "constituency_id"=>97, "name"=>"KARIMA"],
            //098_MUKURWEINI
            ["id"=>487, "county_id"=>19, "constituency_id"=>98, "name"=>"GIKONDI"],
            ["id"=>488, "county_id"=>19, "constituency_id"=>98, "name"=>"RUGI"],
            ["id"=>489, "county_id"=>19, "constituency_id"=>98, "name"=>"MUKURWE-INI WEST"],
            ["id"=>490, "county_id"=>19, "constituency_id"=>98, "name"=>"MUKURWE-INI CENTRAL"],
            //099_NYERI_TOWN
            ["id"=>491, "county_id"=>19, "constituency_id"=>99, "name"=>"KIGANJO/MATHARI"],
            ["id"=>492, "county_id"=>19, "constituency_id"=>99, "name"=>"RWARE"],
            ["id"=>493, "county_id"=>19, "constituency_id"=>99, "name"=>"GATITU/MURUGURU"],
            ["id"=>494, "county_id"=>19, "constituency_id"=>99, "name"=>"RURING'U"],
            ["id"=>495, "county_id"=>19, "constituency_id"=>99, "name"=>"KAMAKWA/MUKARO"],


            //20_Kirinyaga
            //100_MWEA
            ["id"=>496,	"county_id"=>20, "constituency_id"=>100, "name"=>"MUTITHI"],
            ["id"=>497,	"county_id"=>20, "constituency_id"=>100, "name"=>"KANGAI"],
            ["id"=>498,	"county_id"=>20, "constituency_id"=>100, "name"=>"THIBA"],
            ["id"=>499,	"county_id"=>20, "constituency_id"=>100, "name"=>"WAMUMU"],
            ["id"=>500,	"county_id"=>20, "constituency_id"=>100, "name"=>"NYANGATI"],
            ["id"=>501,	"county_id"=>20, "constituency_id"=>100, "name"=>"MURINDUKO"],
            ["id"=>502,	"county_id"=>20, "constituency_id"=>100, "name"=>"GATHIGIRIRI"],
            ["id"=>503,	"county_id"=>20, "constituency_id"=>100, "name"=>"TEBERE"],
            //101_GICHUGU
            ["id"=>504,	"county_id"=>20, "constituency_id"=>101, "name"=>"KABARE"],
            ["id"=>505,	"county_id"=>20, "constituency_id"=>101, "name"=>"BARAGWI"],
            ["id"=>506,	"county_id"=>20, "constituency_id"=>101, "name"=>"NJUKIINI"],
            ["id"=>507,	"county_id"=>20, "constituency_id"=>101, "name"=>"NGARIAMA"],
            ["id"=>508,	"county_id"=>20, "constituency_id"=>101, "name"=>"KARUMANDI"],
            //102_NDIA
            ["id"=>509,	"county_id"=>20, "constituency_id"=>102, "name"=>"MUKURE"],
            ["id"=>510,	"county_id"=>20, "constituency_id"=>102, "name"=>"KIINE"],
            ["id"=>511,	"county_id"=>20, "constituency_id"=>102, "name"=>"KARITI"],
            //103_KIRINYAGA_CENTRAL
            ["id"=>512,	"county_id"=>20, "constituency_id"=>103, "name"=>"MUTIRA"],
            ["id"=>513,	"county_id"=>20, "constituency_id"=>103, "name"=>"KANYEKINI"],
            ["id"=>514,	"county_id"=>20, "constituency_id"=>103, "name"=>"KERUGOYA"],
            ["id"=>515,	"county_id"=>20, "constituency_id"=>103, "name"=>"INOI"],


            //21_Muranga
            //104_KANGEMA
            ["id"=>516,	"county_id"=>21, "constituency_id"=>104, "name"=>"KANYENYA-INI"],
            ["id"=>517,	"county_id"=>21, "constituency_id"=>104, "name"=>"MUGURU"],
            ["id"=>518,	"county_id"=>21, "constituency_id"=>104, "name"=>"RWATHIA"],
            //105_MATHIOYA
            ["id"=>519,	"county_id"=>21, "constituency_id"=>105, "name"=>"GITUGI"],
            ["id"=>520,	"county_id"=>21, "constituency_id"=>105, "name"=>"KIRU"],
            ["id"=>521,	"county_id"=>21, "constituency_id"=>105, "name"=>"KAMACHARIA"],
            //106_KIHARU
            ["id"=>522,	"county_id"=>21, "constituency_id"=>106, "name"=>"WANGU"],
            ["id"=>523,	"county_id"=>21, "constituency_id"=>106, "name"=>"MUGOIRI"],
            ["id"=>524,	"county_id"=>21, "constituency_id"=>106, "name"=>"MBIRI"],
            ["id"=>525,	"county_id"=>21, "constituency_id"=>106, "name"=>"TOWNSHIP"],
            ["id"=>526,	"county_id"=>21, "constituency_id"=>106, "name"=>"MURARANDIA"],
            ["id"=>527,	"county_id"=>21, "constituency_id"=>106, "name"=>"GATURI"],
            //107_KIGUMO
            ["id"=>528,	"county_id"=>21, "constituency_id"=>107, "name"=>"KAHUMBU"],
            ["id"=>529,	"county_id"=>21, "constituency_id"=>107, "name"=>"MUTHITHI"],
            ["id"=>530,	"county_id"=>21, "constituency_id"=>107, "name"=>"KIGUMO"],
            ["id"=>531,	"county_id"=>21, "constituency_id"=>107, "name"=>"KANGARI"],
            ["id"=>532,	"county_id"=>21, "constituency_id"=>107, "name"=>"KINYONA"],
            //108_MARAGWA
            ["id"=>533,	"county_id"=>21, "constituency_id"=>108, "name"=>"KIMORORI/WEMPA"],
            ["id"=>534,	"county_id"=>21, "constituency_id"=>108, "name"=>"MAKUYU"],
            ["id"=>535,	"county_id"=>21, "constituency_id"=>108, "name"=>"KAMBITI"],
            ["id"=>536,	"county_id"=>21, "constituency_id"=>108, "name"=>"KAMAHUHA"],
            ["id"=>537,	"county_id"=>21, "constituency_id"=>108, "name"=>"ICHAGAKI"],
            ["id"=>538,	"county_id"=>21, "constituency_id"=>108, "name"=>"NGINDA"],
            //109_KANDARA
            ["id"=>539,	"county_id"=>21, "constituency_id"=>109, "name"=>"NG'ARARIA"],
            ["id"=>540,	"county_id"=>21, "constituency_id"=>109, "name"=>"MURUKA"],
            ["id"=>541,	"county_id"=>21, "constituency_id"=>109, "name"=>"KAGUNDU-INI"],
            ["id"=>542,	"county_id"=>21, "constituency_id"=>109, "name"=>"GAICHANJIRU"],
            ["id"=>543,	"county_id"=>21, "constituency_id"=>109, "name"=>"ITHIRU"],
            ["id"=>544,	"county_id"=>21, "constituency_id"=>109, "name"=>"RUCHU"],
            //110_GATANGA
            ["id"=>545,	"county_id"=>21, "constituency_id"=>110, "name"=>"ITHANGA"],
            ["id"=>546,	"county_id"=>21, "constituency_id"=>110, "name"=>"KAKUZI/MITUBIRI"],
            ["id"=>547,	"county_id"=>21, "constituency_id"=>110, "name"=>"MUGUMO-INI"],
            ["id"=>548,	"county_id"=>21, "constituency_id"=>110, "name"=>"KIHUMBU-INI"],
            ["id"=>549,	"county_id"=>21, "constituency_id"=>110, "name"=>"GATANGA"],
            ["id"=>550,	"county_id"=>21, "constituency_id"=>110, "name"=>"KARIARA"],


            //22_Kiambu
            //111_GATUNDU_SOUTH
            ["id"=>551,	"county_id"=>22, "constituency_id"=>111, "name"=>"KIAMWANGI"],
            ["id"=>552,	"county_id"=>22, "constituency_id"=>111, "name"=>"KIGANJO"],
            ["id"=>553,	"county_id"=>22, "constituency_id"=>111, "name"=>"NDARUGU"],
            ["id"=>554,	"county_id"=>22, "constituency_id"=>111, "name"=>"NGENDA"],
            //112_GATUNDU_NORTH
            ["id"=>555,	"county_id"=>22, "constituency_id"=>112, "name"=>"GITUAMBA"],
            ["id"=>556,	"county_id"=>22, "constituency_id"=>112, "name"=>"GITHOBOKONI"],
            ["id"=>557,	"county_id"=>22, "constituency_id"=>112, "name"=>"CHANIA"],
            ["id"=>558,	"county_id"=>22, "constituency_id"=>112, "name"=>"MANG'U"],
            //113_JUJA
            ["id"=>559,	"county_id"=>22, "constituency_id"=>113, "name"=>"MURERA"],
            ["id"=>560,	"county_id"=>22, "constituency_id"=>113, "name"=>"THETA"],
            ["id"=>561,	"county_id"=>22, "constituency_id"=>113, "name"=>"JUJA"],
            ["id"=>562,	"county_id"=>22, "constituency_id"=>113, "name"=>"WITEITHIE"],
            ["id"=>563,	"county_id"=>22, "constituency_id"=>113, "name"=>"KALIMONI"],
            //114_THIKA_TOWN
            ["id"=>564,	"county_id"=>22, "constituency_id"=>114, "name"=>"TOWNSHIP"],
            ["id"=>565,	"county_id"=>22, "constituency_id"=>114, "name"=>"KAMENU"],
            ["id"=>566,	"county_id"=>22, "constituency_id"=>114, "name"=>"HOSPITAL"],
            ["id"=>567,	"county_id"=>22, "constituency_id"=>114, "name"=>"GATUANYAGA"],
            ["id"=>568,	"county_id"=>22, "constituency_id"=>114, "name"=>"NGOLIBA"],
            //115_RUIRU
            ["id"=>569,	"county_id"=>22, "constituency_id"=>115, "name"=>"GITOTHUA"],
            ["id"=>570,	"county_id"=>22, "constituency_id"=>115, "name"=>"BIASHARA"],
            ["id"=>571,	"county_id"=>22, "constituency_id"=>115, "name"=>"GATONGORA"],
            ["id"=>572,	"county_id"=>22, "constituency_id"=>115, "name"=>"KAHAWA SUKARI"],
            ["id"=>573,	"county_id"=>22, "constituency_id"=>115, "name"=>"KAHAWA WENDANI"],
            ["id"=>574,	"county_id"=>22, "constituency_id"=>115, "name"=>"KIUU"],
            ["id"=>575,	"county_id"=>22, "constituency_id"=>115, "name"=>"MWIKI"],
            ["id"=>576,	"county_id"=>22, "constituency_id"=>115, "name"=>"MWIHOKO"],
            //116_GITHUNGURI
            ["id"=>577,	"county_id"=>22, "constituency_id"=>116, "name"=>"GITHUNGURI"],
            ["id"=>578,	"county_id"=>22, "constituency_id"=>116, "name"=>"GITHIGA"],
            ["id"=>579,	"county_id"=>22, "constituency_id"=>116, "name"=>"IKINU"],
            ["id"=>580,	"county_id"=>22, "constituency_id"=>116, "name"=>"NGEWA"],
            ["id"=>581,	"county_id"=>22, "constituency_id"=>116, "name"=>"KOMOTHAI"],
            //117_KIAMBU
            ["id"=>582,	"county_id"=>22, "constituency_id"=>117, "name"=>"TING'ANG'A"],
            ["id"=>583,	"county_id"=>22, "constituency_id"=>117, "name"=>"NDUMBERI"],
            ["id"=>584,	"county_id"=>22, "constituency_id"=>117, "name"=>"RIABAI"],
            ["id"=>585,	"county_id"=>22, "constituency_id"=>117, "name"=>"TOWNSHIP"],
            //118_KIAMBAA
            ["id"=>586,	"county_id"=>22, "constituency_id"=>118, "name"=>"CIANDA"],
            ["id"=>587,	"county_id"=>22, "constituency_id"=>118, "name"=>"KARURI"],
            ["id"=>588,	"county_id"=>22, "constituency_id"=>118, "name"=>"NDENDERU"],
            ["id"=>589,	"county_id"=>22, "constituency_id"=>118, "name"=>"MUCHATHA"],
            ["id"=>590,	"county_id"=>22, "constituency_id"=>118, "name"=>"KIHARA"],
            //119_KABETE
            ["id"=>591,	"county_id"=>22, "constituency_id"=>119, "name"=>"GITARU"],
            ["id"=>592,	"county_id"=>22, "constituency_id"=>119, "name"=>"MUGUGA"],
            ["id"=>593,	"county_id"=>22, "constituency_id"=>119, "name"=>"NYADHUNA"],
            ["id"=>594,	"county_id"=>22, "constituency_id"=>119, "name"=>"KABETE"],
            ["id"=>595,	"county_id"=>22, "constituency_id"=>119, "name"=>"UTHIRU"],
            //120_KIKUYU
            ["id"=>596,	"county_id"=>22, "constituency_id"=>120, "name"=>"KARAI"],
            ["id"=>597,	"county_id"=>22, "constituency_id"=>120, "name"=>"NACHU"],
            ["id"=>598,	"county_id"=>22, "constituency_id"=>120, "name"=>"SIGONA"],
            ["id"=>599,	"county_id"=>22, "constituency_id"=>120, "name"=>"KIKUYU"],
            ["id"=>600,	"county_id"=>22, "constituency_id"=>120, "name"=>"KINOO"],
            //121_LIMURU
            ["id"=>601,	"county_id"=>22, "constituency_id"=>121, "name"=>"BIBIRIONI"],
            ["id"=>602,	"county_id"=>22, "constituency_id"=>121, "name"=>"LIMURU CENTRAL"],
            ["id"=>603,	"county_id"=>22, "constituency_id"=>121, "name"=>"NDEIYA"],
            ["id"=>604,	"county_id"=>22, "constituency_id"=>121, "name"=>"LIMURU EAST"],
            ["id"=>605,	"county_id"=>22, "constituency_id"=>121, "name"=>"NGECHA TIGONI"],
            //122_LARI
            ["id"=>606,	"county_id"=>22, "constituency_id"=>122, "name"=>"KINALE"],
            ["id"=>607,	"county_id"=>22, "constituency_id"=>122, "name"=>"KIJABE"],
            ["id"=>608,	"county_id"=>22, "constituency_id"=>122, "name"=>"NYANDUMA"],
            ["id"=>609,	"county_id"=>22, "constituency_id"=>122, "name"=>"KAMBURU"],
            ["id"=>610,	"county_id"=>22, "constituency_id"=>122, "name"=>"LARI/KIRENGA"],


            //23_Turkana
            //123_TURKANA_NORTH
            ["id"=>611,	"county_id"=>23, "constituency_id"=>123, "name"=>"KAERIS"],
            ["id"=>612,	"county_id"=>23, "constituency_id"=>123, "name"=>"LAKE ZONE"],
            ["id"=>613,	"county_id"=>23, "constituency_id"=>123, "name"=>"LAPUR"],
            ["id"=>614,	"county_id"=>23, "constituency_id"=>123, "name"=>"KAALENG/KAIKOR"],
            ["id"=>615,	"county_id"=>23, "constituency_id"=>123, "name"=>"KIBISH"],
            ["id"=>616,	"county_id"=>23, "constituency_id"=>123, "name"=>"NAKALALE"],
            //124_TURKANA_WEST
            ["id"=>617,	"county_id"=>23, "constituency_id"=>124, "name"=>"KAKUMA"],
            ["id"=>618,	"county_id"=>23, "constituency_id"=>124, "name"=>"LOPUR"],
            ["id"=>619,	"county_id"=>23, "constituency_id"=>124, "name"=>"LETEA"],
            ["id"=>620,	"county_id"=>23, "constituency_id"=>124, "name"=>"SONGOT"],
            ["id"=>621,	"county_id"=>23, "constituency_id"=>124, "name"=>"KALOBEYEI"],
            ["id"=>622,	"county_id"=>23, "constituency_id"=>124, "name"=>"LOKICHOGGIO"],
            ["id"=>623,	"county_id"=>23, "constituency_id"=>124, "name"=>"NANAAM"],
            //125_TURKANA_CENTRAL
            ["id"=>624,	"county_id"=>23, "constituency_id"=>125, "name"=>"KERIO DELTA"],
            ["id"=>625,	"county_id"=>23, "constituency_id"=>125, "name"=>"KANG'ATOTHA"],
            ["id"=>626,	"county_id"=>23, "constituency_id"=>125, "name"=>"KALOKOL"],
            ["id"=>627,	"county_id"=>23, "constituency_id"=>125, "name"=>"LODWAR TOWNSHIP"],
            ["id"=>628,	"county_id"=>23, "constituency_id"=>125, "name"=>"KANAMKEMER"],
            //126_LOIMA
            ["id"=>629,	"county_id"=>23, "constituency_id"=>126, "name"=>"KOTARUK/LOBEI"],
            ["id"=>630,	"county_id"=>23, "constituency_id"=>126, "name"=>"TURKWEL"],
            ["id"=>631,	"county_id"=>23, "constituency_id"=>126, "name"=>"LOIMA"],
            ["id"=>632,	"county_id"=>23, "constituency_id"=>126, "name"=>"LOKIRIAMA/LORENGIPPI"],
            //127_TURKANA_SOUTH
            ["id"=>633,	"county_id"=>23, "constituency_id"=>127, "name"=>"KAPUTIR"],
            ["id"=>634,	"county_id"=>23, "constituency_id"=>127, "name"=>"KATILU"],
            ["id"=>635,	"county_id"=>23, "constituency_id"=>127, "name"=>"LOBOKAT"],
            ["id"=>636,	"county_id"=>23, "constituency_id"=>127, "name"=>"KALAPATA"],
            ["id"=>637,	"county_id"=>23, "constituency_id"=>127, "name"=>"LOKICHAR"],
            //128_TURKANA_EAST
            ["id"=>638,	"county_id"=>23, "constituency_id"=>128, "name"=>"KAPEDO/NAPEITOM"],
            ["id"=>639,	"county_id"=>23, "constituency_id"=>128, "name"=>"KATILIA"],
            ["id"=>640,	"county_id"=>23, "constituency_id"=>128, "name"=>"LOKORI/KOCHODIN"],


            //24_WestPokot
            //129_KAPENGURIA
            ["id"=>641,	"county_id"=>24, "constituency_id"=>129, "name"=>"RIWO"],
            ["id"=>642,	"county_id"=>24, "constituency_id"=>129, "name"=>"KAPENGURIA"],
            ["id"=>643,	"county_id"=>24, "constituency_id"=>129, "name"=>"MNAGEI"],
            ["id"=>644,	"county_id"=>24, "constituency_id"=>129, "name"=>"SIYOI"],
            ["id"=>645,	"county_id"=>24, "constituency_id"=>129, "name"=>"ENDUGH"],
            ["id"=>646,	"county_id"=>24, "constituency_id"=>129, "name"=>"SOOK"],
            //130_SIGOR
            ["id"=>647,	"county_id"=>24, "constituency_id"=>130, "name"=>"SEKERR"],
            ["id"=>648,	"county_id"=>24, "constituency_id"=>130, "name"=>"MASOOL"],
            ["id"=>649,	"county_id"=>24, "constituency_id"=>130, "name"=>"LOMUT"],
            ["id"=>650,	"county_id"=>24, "constituency_id"=>130, "name"=>"WEIWEI"],
            //131_KACHELIBA
            ["id"=>651,	"county_id"=>24, "constituency_id"=>131, "name"=>"SUAM"],
            ["id"=>652,	"county_id"=>24, "constituency_id"=>131, "name"=>"KODICH"],
            ["id"=>653,	"county_id"=>24, "constituency_id"=>131, "name"=>"KASEI"],
            ["id"=>654,	"county_id"=>24, "constituency_id"=>131, "name"=>"KAPCHOK"],
            ["id"=>655,	"county_id"=>24, "constituency_id"=>131, "name"=>"KIWAWA"],
            ["id"=>656,	"county_id"=>24, "constituency_id"=>131, "name"=>"ALALE"],
            //132_POKOT_SOUTH
            ["id"=>657,	"county_id"=>24, "constituency_id"=>132, "name"=>"CHEPARERIA"],
            ["id"=>658,	"county_id"=>24, "constituency_id"=>132, "name"=>"BATEI"],
            ["id"=>659,	"county_id"=>24, "constituency_id"=>132, "name"=>"LELAN"],
            ["id"=>660,	"county_id"=>24, "constituency_id"=>132, "name"=>"TAPACH"],


            //25_Samburu
            //133_SAMBURU_WEST
            ["id"=>661,	"county_id"=>25, "constituency_id"=>133, "name"=>"LODOKEJEK"],
            ["id"=>662,	"county_id"=>25, "constituency_id"=>133, "name"=>"SUGUTA MARMAR"],
            ["id"=>663,	"county_id"=>25, "constituency_id"=>133, "name"=>"MARALAL"],
            ["id"=>664,	"county_id"=>25, "constituency_id"=>133, "name"=>"LOOSUK"],
            ["id"=>665,	"county_id"=>25, "constituency_id"=>133, "name"=>"PORO"],
            //134_SAMBURU_NORTH
            ["id"=>666,	"county_id"=>25, "constituency_id"=>134, "name"=>"EL-BARTA"],
            ["id"=>667,	"county_id"=>25, "constituency_id"=>134, "name"=>"NACHOLA"],
            ["id"=>668,	"county_id"=>25, "constituency_id"=>134, "name"=>"NDOTO"],
            ["id"=>669,	"county_id"=>25, "constituency_id"=>134, "name"=>"NYIRO"],
            ["id"=>670,	"county_id"=>25, "constituency_id"=>134, "name"=>"ANGATA NANYOKIE"],
            ["id"=>671,	"county_id"=>25, "constituency_id"=>134, "name"=>"BAAWA"],
            //135_SAMBURU_EAST
            ["id"=>672,	"county_id"=>25, "constituency_id"=>135, "name"=>"WASO"],
            ["id"=>673,	"county_id"=>25, "constituency_id"=>135, "name"=>"WAMBA WEST"],
            ["id"=>674,	"county_id"=>25, "constituency_id"=>135, "name"=>"WAMBA EAST"],
            ["id"=>675,	"county_id"=>25, "constituency_id"=>135, "name"=>"WAMBA NORTH"],


            //26_TransNzoia
            //136_KWANZA
            ["id"=>676,	"county_id"=>26, "constituency_id"=>136, "name"=>"KAPOMBOI"],
            ["id"=>677,	"county_id"=>26, "constituency_id"=>136, "name"=>"KWANZA"],
            ["id"=>678,	"county_id"=>26, "constituency_id"=>136, "name"=>"KEIYO"],
            ["id"=>679,	"county_id"=>26, "constituency_id"=>136, "name"=>"BIDII"],
            //137_ENDEBESS
            ["id"=>680,	"county_id"=>26, "constituency_id"=>137, "name"=>"CHEPCHOINA"],
            ["id"=>681,	"county_id"=>26, "constituency_id"=>137, "name"=>"ENDEBESS"],
            ["id"=>682,	"county_id"=>26, "constituency_id"=>137, "name"=>"MATUMBEI"],
            //138_SABOTI
            ["id"=>683,	"county_id"=>26, "constituency_id"=>138, "name"=>"KINYORO"],
            ["id"=>684,	"county_id"=>26, "constituency_id"=>138, "name"=>"MATISI"],
            ["id"=>685,	"county_id"=>26, "constituency_id"=>138, "name"=>"TUWANI"],
            ["id"=>686,	"county_id"=>26, "constituency_id"=>138, "name"=>"SABOTI"],
            ["id"=>687,	"county_id"=>26, "constituency_id"=>138, "name"=>"MACHEWA"],
            //139_KIMININI
            ["id"=>688,	"county_id"=>26, "constituency_id"=>139, "name"=>"KIMININI"],
            ["id"=>689,	"county_id"=>26, "constituency_id"=>139, "name"=>"WAITALUK"],
            ["id"=>690,	"county_id"=>26, "constituency_id"=>139, "name"=>"SIRENDE"],
            ["id"=>691,	"county_id"=>26, "constituency_id"=>139, "name"=>"HOSPITAL"],
            ["id"=>692,	"county_id"=>26, "constituency_id"=>139, "name"=>"SIKHENDU"],
            ["id"=>693,	"county_id"=>26, "constituency_id"=>139, "name"=>"NABISWA"],
            //140_CHERANGANY
            ["id"=>694,	"county_id"=>26, "constituency_id"=>140, "name"=>"SINYERERE"],
            ["id"=>695,	"county_id"=>26, "constituency_id"=>140, "name"=>"MAKUTANO"],
            ["id"=>696,	"county_id"=>26, "constituency_id"=>140, "name"=>"KAPLAMAI"],
            ["id"=>697,	"county_id"=>26, "constituency_id"=>140, "name"=>"MOTOSIET"],
            ["id"=>698,	"county_id"=>26, "constituency_id"=>140, "name"=>"CHERANGANY/SUWERWA"],
            ["id"=>699,	"county_id"=>26, "constituency_id"=>140, "name"=>"CHEPSIRO/KIPTOROR"],
            ["id"=>700,	"county_id"=>26, "constituency_id"=>140, "name"=>"SITATUNGA"],


            //27_UasinGishu
            //141_SOY
            ["id"=>701,	"county_id"=>27, "constituency_id"=>141, "name"=>"MOI'S BRIDGE"],
            ["id"=>702,	"county_id"=>27, "constituency_id"=>141, "name"=>"KAPKURES"],
            ["id"=>703,	"county_id"=>27, "constituency_id"=>141, "name"=>"ZIWA"],
            ["id"=>704,	"county_id"=>27, "constituency_id"=>141, "name"=>"SEGERO/BARSOMBE"],
            ["id"=>705,	"county_id"=>27, "constituency_id"=>141, "name"=>"KIPSOMBA"],
            ["id"=>706,	"county_id"=>27, "constituency_id"=>141, "name"=>"SOY"],
            ["id"=>707,	"county_id"=>27, "constituency_id"=>141, "name"=>"KUINET/KAPSUSWA"],
            //142_TURBO
            ["id"=>708,	"county_id"=>27, "constituency_id"=>142, "name"=>"NGENYILEL"],
            ["id"=>709,	"county_id"=>27, "constituency_id"=>142, "name"=>"TAPSAGOI"],
            ["id"=>710,	"county_id"=>27, "constituency_id"=>142, "name"=>"KAMAGUT"],
            ["id"=>711,	"county_id"=>27, "constituency_id"=>142, "name"=>"KIPLOMBE"],
            ["id"=>712,	"county_id"=>27, "constituency_id"=>142, "name"=>"KAPSAOS"],
            ["id"=>713,	"county_id"=>27, "constituency_id"=>142, "name"=>"HURUMA"],
            //143_MOIBEN
            ["id"=>714,	"county_id"=>27, "constituency_id"=>143, "name"=>"TEMBELIO"],
            ["id"=>715,	"county_id"=>27, "constituency_id"=>143, "name"=>"SERGOIT"],
            ["id"=>716,	"county_id"=>27, "constituency_id"=>143, "name"=>"KARUNA/MEIBEKI"],
            ["id"=>717,	"county_id"=>27, "constituency_id"=>143, "name"=>"MOIBEN"],
            ["id"=>718,	"county_id"=>27, "constituency_id"=>143, "name"=>"KIMUMU"],
            //144_AINABKOI
            ["id"=>719,	"county_id"=>27, "constituency_id"=>144, "name"=>"KAPSOYA"],
            ["id"=>720,	"county_id"=>27, "constituency_id"=>144, "name"=>"KAPTAGAT"],
            ["id"=>721,	"county_id"=>27, "constituency_id"=>144, "name"=>"AINABKOI/OLARE"],
            //145_KAPSERET
            ["id"=>722,	"county_id"=>27, "constituency_id"=>145, "name"=>"SIMAT/KAPSERET"],
            ["id"=>723,	"county_id"=>27, "constituency_id"=>145, "name"=>"KIPKENYO"],
            ["id"=>724,	"county_id"=>27, "constituency_id"=>145, "name"=>"NGERIA"],
            ["id"=>725,	"county_id"=>27, "constituency_id"=>145, "name"=>"MEGUN"],
            ["id"=>726,	"county_id"=>27, "constituency_id"=>145, "name"=>"LANGAS"],
            //146_KESSES
            ["id"=>727,	"county_id"=>27, "constituency_id"=>146, "name"=>"RACECOURSE"],
            ["id"=>728,	"county_id"=>27, "constituency_id"=>146, "name"=>"CHEPTIRET/KIPCHAMO"],
            ["id"=>729,	"county_id"=>27, "constituency_id"=>146, "name"=>"TULWET/CHUIYAT"],
            ["id"=>730,	"county_id"=>27, "constituency_id"=>146, "name"=>"TARAKWA"],


            //28_ElgeyoMarakwet
            //147_MARAKWET_EAST
            ["id"=>731,	"county_id"=>28, "constituency_id"=>147, "name"=>"KAPYEGO"],
            ["id"=>732,	"county_id"=>28, "constituency_id"=>147, "name"=>"SAMBIRIR"],
            ["id"=>733,	"county_id"=>28, "constituency_id"=>147, "name"=>"ENDO"],
            ["id"=>734,	"county_id"=>28, "constituency_id"=>147, "name"=>"EMBOBUT/EMBULOT"],
            ["id"=>735,	"county_id"=>28, "constituency_id"=>147, "name"=>"LELAN"],
            ["id"=>736,	"county_id"=>28, "constituency_id"=>147, "name"=>"SENGWER"],
            //148_MARAKWET_WEST
            ["id"=>737,	"county_id"=>28, "constituency_id"=>148, "name"=>"CHERANG'ANY/CHEBORORWA"],
            ["id"=>738,	"county_id"=>28, "constituency_id"=>148, "name"=>"MOIBEN/KUSERWO"],
            ["id"=>739,	"county_id"=>28, "constituency_id"=>148, "name"=>"KAPSOWAR"],
            ["id"=>740,	"county_id"=>28, "constituency_id"=>148, "name"=>"ARROR"],
            //149_KEIYO_NORTH
            ["id"=>741,	"county_id"=>28, "constituency_id"=>149, "name"=>"EMSOO"],
            ["id"=>742,	"county_id"=>28, "constituency_id"=>149, "name"=>"KAMARINY"],
            ["id"=>743,	"county_id"=>28, "constituency_id"=>149, "name"=>"KAPCHEMUTWA"],
            ["id"=>744,	"county_id"=>28, "constituency_id"=>149, "name"=>"TAMBACH"],
            //150_KEIYO_SOUTH
            ["id"=>745,	"county_id"=>28, "constituency_id"=>150, "name"=>"KAPTARAKWA"],
            ["id"=>746,	"county_id"=>28, "constituency_id"=>150, "name"=>"CHEPKORIO"],
            ["id"=>747,	"county_id"=>28, "constituency_id"=>150, "name"=>"SOY NORTH"],
            ["id"=>748,	"county_id"=>28, "constituency_id"=>150, "name"=>"SOY SOUTH"],
            ["id"=>749,	"county_id"=>28, "constituency_id"=>150, "name"=>"KABIEMIT"],
            ["id"=>750,	"county_id"=>28, "constituency_id"=>150, "name"=>"METKEI"],

            //29_Nandi
            //151_TINDERET
            ["id"=>751,	"county_id"=>29, "constituency_id"=>151, "name"=>"SONGHOR/SOBA"],
            ["id"=>752,	"county_id"=>29, "constituency_id"=>151, "name"=>"TINDIRET"],
            ["id"=>753,	"county_id"=>29, "constituency_id"=>151, "name"=>"CHEMELIL/CHEMASE"],
            ["id"=>754,	"county_id"=>29, "constituency_id"=>151, "name"=>"KAPSIMOTWO"],
            //152_ALDAI
            ["id"=>755,	"county_id"=>29, "constituency_id"=>152, "name"=>"KABWARENG"],
            ["id"=>756,	"county_id"=>29, "constituency_id"=>152, "name"=>"TERIK"],
            ["id"=>757,	"county_id"=>29, "constituency_id"=>152, "name"=>"KEMELOI-MARABA"],
            ["id"=>758,	"county_id"=>29, "constituency_id"=>152, "name"=>"KOBUJOI"],
            ["id"=>759,	"county_id"=>29, "constituency_id"=>152, "name"=>"KAPTUMO-KABOI"],
            ["id"=>760,	"county_id"=>29, "constituency_id"=>152, "name"=>"KOYO-NDURIO"],
            //153_NANDI_HILLS
            ["id"=>761,	"county_id"=>29, "constituency_id"=>153, "name"=>"NANDI HILLS"],
            ["id"=>762,	"county_id"=>29, "constituency_id"=>153, "name"=>"CHEPKUNYUK"],
            ["id"=>763,	"county_id"=>29, "constituency_id"=>153, "name"=>"OL'LESSOS"],
            ["id"=>764,	"county_id"=>29, "constituency_id"=>153, "name"=>"KAPCHORUA"],
            //154_CHESUMEI
            ["id"=>765,	"county_id"=>29, "constituency_id"=>154, "name"=>"CHEMUNDU/KAPNG'ETUNY"],
            ["id"=>766,	"county_id"=>29, "constituency_id"=>154, "name"=>"KOSIRAI"],
            ["id"=>767,	"county_id"=>29, "constituency_id"=>154, "name"=>"LELMOKWO/NGECHEK"],
            ["id"=>768,	"county_id"=>29, "constituency_id"=>154, "name"=>"KAPTEL/KAMOIYWO"],
            ["id"=>769,	"county_id"=>29, "constituency_id"=>154, "name"=>"KIPTUYA"],
            //155_EMGWEN
            ["id"=>770,	"county_id"=>29, "constituency_id"=>155, "name"=>"CHEPKUMIA"],
            ["id"=>771,	"county_id"=>29, "constituency_id"=>155, "name"=>"KAPKANGANI"],
            ["id"=>772,	"county_id"=>29, "constituency_id"=>155, "name"=>"KAPSABET"],
            ["id"=>773,	"county_id"=>29, "constituency_id"=>155, "name"=>"KILIBWONI"],
            //156_MOSOP
            ["id"=>774,	"county_id"=>29, "constituency_id"=>156, "name"=>"CHEPTERWAI"],
            ["id"=>775,	"county_id"=>29, "constituency_id"=>156, "name"=>"KIPKAREN"],
            ["id"=>776,	"county_id"=>29, "constituency_id"=>156, "name"=>"KURGUNG/SURUNGAI"],
            ["id"=>777,	"county_id"=>29, "constituency_id"=>156, "name"=>"KABIYET"],
            ["id"=>778,	"county_id"=>29, "constituency_id"=>156, "name"=>"NDALAT"],
            ["id"=>779,	"county_id"=>29, "constituency_id"=>156, "name"=>"KABISAGA"],
            ["id"=>780,	"county_id"=>29, "constituency_id"=>156, "name"=>"SANGALO/KEBULONIK"],


            //30_Baringo
            //157_TIATY
            ["id"=>781,	"county_id"=>30, "constituency_id"=>157, "name"=>"TIRIOKO"],
            ["id"=>782,	"county_id"=>30, "constituency_id"=>157, "name"=>"KOLOWA"],
            ["id"=>783,	"county_id"=>30, "constituency_id"=>157, "name"=>"RIBKWO"],
            ["id"=>784,	"county_id"=>30, "constituency_id"=>157, "name"=>"SILALE"],
            ["id"=>785,	"county_id"=>30, "constituency_id"=>157, "name"=>"LOIYAMOROCK"],
            ["id"=>786,	"county_id"=>30, "constituency_id"=>157, "name"=>"TANGULBEI/KOROSSI"],
            ["id"=>787,	"county_id"=>30, "constituency_id"=>157, "name"=>"CHURO/AMAYA"],
            //158_BARINGO_NORTH
            ["id"=>788,	"county_id"=>30, "constituency_id"=>158, "name"=>"BARWESSA"],
            ["id"=>789,	"county_id"=>30, "constituency_id"=>158, "name"=>"KABARTONJO"],
            ["id"=>790,	"county_id"=>30, "constituency_id"=>158, "name"=>"SAIMO/KIPSARAMAN"],
            ["id"=>791,	"county_id"=>30, "constituency_id"=>158, "name"=>"SAIMO/SOI"],
            ["id"=>792,	"county_id"=>30, "constituency_id"=>158, "name"=>"BARTABWA"],
            //159_BARINGO_CENTRAL
            ["id"=>793,	"county_id"=>30, "constituency_id"=>159, "name"=>"KABARNET"],
            ["id"=>794,	"county_id"=>30, "constituency_id"=>159, "name"=>"SACHO"],
            ["id"=>795,	"county_id"=>30, "constituency_id"=>159, "name"=>"TENGES"],
            ["id"=>796,	"county_id"=>30, "constituency_id"=>159, "name"=>"EWALEL/CHAPCHAP"],
            ["id"=>797,	"county_id"=>30, "constituency_id"=>159, "name"=>"KAPROPITA"],
            //160_BARINGO_SOUTH
            ["id"=>798,	"county_id"=>30, "constituency_id"=>160, "name"=>"MARIGAT"],
            ["id"=>799,	"county_id"=>30, "constituency_id"=>160, "name"=>"ILCHAMUS"],
            ["id"=>800,	"county_id"=>30, "constituency_id"=>160, "name"=>"MOCHONGOI"],
            ["id"=>801,	"county_id"=>30, "constituency_id"=>160, "name"=>"MUKUTANI"],
            //161_MOGOTIO
            ["id"=>802,	"county_id"=>30, "constituency_id"=>161, "name"=>"MOGOTIO"],
            ["id"=>803,	"county_id"=>30, "constituency_id"=>161, "name"=>"EMINING"],
            ["id"=>804,	"county_id"=>30, "constituency_id"=>161, "name"=>"KISANANA"],
            //162_ELDAMA_RAVINE
            ["id"=>805,	"county_id"=>30, "constituency_id"=>162, "name"=>"LEMBUS"],
            ["id"=>806,	"county_id"=>30, "constituency_id"=>162, "name"=>"LEMBUS KWEN"],
            ["id"=>807,	"county_id"=>30, "constituency_id"=>162, "name"=>"RAVINE"],
            ["id"=>808,	"county_id"=>30, "constituency_id"=>162, "name"=>"MUMBERES/MAJI MAZURI"],
            ["id"=>809,	"county_id"=>30, "constituency_id"=>162, "name"=>"LEMBUS/PERKERRA"],
            ["id"=>810,	"county_id"=>30, "constituency_id"=>162, "name"=>"KOIBATEK"],


            //31_Laikipia
            //163_LAIKIPIA_WEST
            ["id"=>811,	"county_id"=>31, "constituency_id"=>163, "name"=>"OL-MORAN"],
            ["id"=>812,	"county_id"=>31, "constituency_id"=>163, "name"=>"RUMURUTI TOWNSHIP"],
            ["id"=>813,	"county_id"=>31, "constituency_id"=>163, "name"=>"GITHIGA"],
            ["id"=>814,	"county_id"=>31, "constituency_id"=>163, "name"=>"MARMANET"],
            ["id"=>815,	"county_id"=>31, "constituency_id"=>163, "name"=>"IGWAMITI"],
            ["id"=>816,	"county_id"=>31, "constituency_id"=>163, "name"=>"SALAMA"],
            //164_LAIKIPIA_EAST
            ["id"=>817,	"county_id"=>31, "constituency_id"=>164, "name"=>"NGOBIT"],
            ["id"=>818,	"county_id"=>31, "constituency_id"=>164, "name"=>"TIGITHI"],
            ["id"=>819,	"county_id"=>31, "constituency_id"=>164, "name"=>"THINGITHU"],
            ["id"=>820,	"county_id"=>31, "constituency_id"=>164, "name"=>"NANYUKI"],
            ["id"=>821,	"county_id"=>31, "constituency_id"=>164, "name"=>"UMANDE"],
            //165_LAIKIPIA_NORTH
            ["id"=>822,	"county_id"=>31, "constituency_id"=>165, "name"=>"SOSIAN"],
            ["id"=>823,	"county_id"=>31, "constituency_id"=>165, "name"=>"SEGERA"],
            ["id"=>824,	"county_id"=>31, "constituency_id"=>165, "name"=>"MUGOGODO WEST"],
            ["id"=>825,	"county_id"=>31, "constituency_id"=>165, "name"=>"MUGOGODO EAST"],


            //32_Nakuru
            //166_MOLO
            ["id"=>826,	"county_id"=>32, "constituency_id"=>166, "name"=>"MARIASHONI"],
            ["id"=>827,	"county_id"=>32, "constituency_id"=>166, "name"=>"ELBURGON"],
            ["id"=>828,	"county_id"=>32, "constituency_id"=>166, "name"=>"TURI"],
            ["id"=>829,	"county_id"=>32, "constituency_id"=>166, "name"=>"MOLO"],
            //167_NJORO
            ["id"=>830,	"county_id"=>32, "constituency_id"=>167, "name"=>"MAU NAROK"],
            ["id"=>831,	"county_id"=>32, "constituency_id"=>167, "name"=>"MAUCHE"],
            ["id"=>832,	"county_id"=>32, "constituency_id"=>167, "name"=>"KIHINGO"],
            ["id"=>833,	"county_id"=>32, "constituency_id"=>167, "name"=>"NESSUIT"],
            ["id"=>834,	"county_id"=>32, "constituency_id"=>167, "name"=>"LARE"],
            ["id"=>835,	"county_id"=>32, "constituency_id"=>167, "name"=>"NJORO"],
            //168_NAIVASHA
            ["id"=>836,	"county_id"=>32, "constituency_id"=>168, "name"=>"BIASHARA"],
            ["id"=>837,	"county_id"=>32, "constituency_id"=>168, "name"=>"HELLS GATE"],
            ["id"=>838,	"county_id"=>32, "constituency_id"=>168, "name"=>"LAKE VIEW"],
            ["id"=>839,	"county_id"=>32, "constituency_id"=>168, "name"=>"MAI MAHIU"],
            ["id"=>840,	"county_id"=>32, "constituency_id"=>168, "name"=>"MAIELLA"],
            ["id"=>841,	"county_id"=>32, "constituency_id"=>168, "name"=>"OLKARIA"],
            ["id"=>842,	"county_id"=>32, "constituency_id"=>168, "name"=>"NAIVASHA EAST"],
            ["id"=>843,	"county_id"=>32, "constituency_id"=>168, "name"=>"VIWANDANI"],
            //169_GILGIL
            ["id"=>844,	"county_id"=>32, "constituency_id"=>169, "name"=>"GILGIL"],
            ["id"=>845,	"county_id"=>32, "constituency_id"=>169, "name"=>"ELEMENTAITA"],
            ["id"=>846,	"county_id"=>32, "constituency_id"=>169, "name"=>"MBARUK/EBURU"],
            ["id"=>847,	"county_id"=>32, "constituency_id"=>169, "name"=>"MALEWA WEST"],
            ["id"=>848,	"county_id"=>32, "constituency_id"=>169, "name"=>"MURINDATI"],
            //170_KURESOI_SOUTH
            ["id"=>849,	"county_id"=>32, "constituency_id"=>170, "name"=>"AMALO"],
            ["id"=>850,	"county_id"=>32, "constituency_id"=>170, "name"=>"KERINGET"],
            ["id"=>851,	"county_id"=>32, "constituency_id"=>170, "name"=>"KIPTAGICH"],
            ["id"=>852,	"county_id"=>32, "constituency_id"=>170, "name"=>"TINET"],
            //171_KURESOI_NORTH
            ["id"=>853,	"county_id"=>32, "constituency_id"=>171, "name"=>"KIPTORORO"],
            ["id"=>854,	"county_id"=>32, "constituency_id"=>171, "name"=>"NYOTA"],
            ["id"=>855,	"county_id"=>32, "constituency_id"=>171, "name"=>"SIRIKWA"],
            ["id"=>856,	"county_id"=>32, "constituency_id"=>171, "name"=>"KAMARA"],
            //172_SUBUKIA
            ["id"=>857,	"county_id"=>32, "constituency_id"=>172, "name"=>"SUBUKIA"],
            ["id"=>858,	"county_id"=>32, "constituency_id"=>172, "name"=>"WASEGES"],
            ["id"=>859,	"county_id"=>32, "constituency_id"=>172, "name"=>"KABAZI"],
            //173_RONGAI
            ["id"=>860,	"county_id"=>32, "constituency_id"=>173, "name"=>"MENENGAI WEST"],
            ["id"=>861,	"county_id"=>32, "constituency_id"=>173, "name"=>"SOIN"],
            ["id"=>862,	"county_id"=>32, "constituency_id"=>173, "name"=>"VISOI"],
            ["id"=>863,	"county_id"=>32, "constituency_id"=>173, "name"=>"MOSOP"],
            ["id"=>864,	"county_id"=>32, "constituency_id"=>173, "name"=>"SOLAI"],
            //174_BAHATI
            ["id"=>865,	"county_id"=>32, "constituency_id"=>174, "name"=>"DUNDORI"],
            ["id"=>866,	"county_id"=>32, "constituency_id"=>174, "name"=>"KABATINI"],
            ["id"=>867,	"county_id"=>32, "constituency_id"=>174, "name"=>"KIAMAINA"],
            ["id"=>868,	"county_id"=>32, "constituency_id"=>174, "name"=>"LANET/UMOJA"],
            ["id"=>869,	"county_id"=>32, "constituency_id"=>174, "name"=>"BAHATI"],
            //175_NAKURU_TOWN_WEST
            ["id"=>870,	"county_id"=>32, "constituency_id"=>175, "name"=>"BARUT"],
            ["id"=>871,	"county_id"=>32, "constituency_id"=>175, "name"=>"LONDON"],
            ["id"=>872,	"county_id"=>32, "constituency_id"=>175, "name"=>"KAPTEMBWO"],
            ["id"=>873,	"county_id"=>32, "constituency_id"=>175, "name"=>"KAPKURES"],
            ["id"=>874,	"county_id"=>32, "constituency_id"=>175, "name"=>"RHODA"],
            ["id"=>875,	"county_id"=>32, "constituency_id"=>175, "name"=>"SHAABAB"],
            //176_NAKURU_TOWN_EAST
            ["id"=>876,	"county_id"=>32, "constituency_id"=>176, "name"=>"BIASHARA"],
            ["id"=>877,	"county_id"=>32, "constituency_id"=>176, "name"=>"KIVUMBINI"],
            ["id"=>878,	"county_id"=>32, "constituency_id"=>176, "name"=>"FLAMINGO"],
            ["id"=>879,	"county_id"=>32, "constituency_id"=>176, "name"=>"MENENGAI"],
            ["id"=>880,	"county_id"=>32, "constituency_id"=>176, "name"=>"NAKURU EAST"],


            //33_Narok
            //177_KILGORIS
            ["id"=>881,	"county_id"=>33, "constituency_id"=>177, "name"=>"KILGORIS CENTRAL"],
            ["id"=>882,	"county_id"=>33, "constituency_id"=>177, "name"=>"KEYIAN"],
            ["id"=>883,	"county_id"=>33, "constituency_id"=>177, "name"=>"ANGATA BARIKOI"],
            ["id"=>884,	"county_id"=>33, "constituency_id"=>177, "name"=>"SHANKOE"],
            ["id"=>885,	"county_id"=>33, "constituency_id"=>177, "name"=>"KIMINTET"],
            ["id"=>886,	"county_id"=>33, "constituency_id"=>177, "name"=>"LOLGORIAN"],
            //178_EMURUA_DIKIRR
            ["id"=>887,	"county_id"=>33, "constituency_id"=>178, "name"=>"ILKERIN"],
            ["id"=>888,	"county_id"=>33, "constituency_id"=>178, "name"=>"OLOlMASANI"],
            ["id"=>889,	"county_id"=>33, "constituency_id"=>178, "name"=>"MOGONDO"],
            ["id"=>890,	"county_id"=>33, "constituency_id"=>178, "name"=>"KAPSASIAN"],
            //179_NAROK_NORTH
            ["id"=>891,	"county_id"=>33, "constituency_id"=>179, "name"=>"OLPUSIMORU"],
            ["id"=>892,	"county_id"=>33, "constituency_id"=>179, "name"=>"OLOKURTO"],
            ["id"=>893,	"county_id"=>33, "constituency_id"=>179, "name"=>"NAROK TOWN"],
            ["id"=>894,	"county_id"=>33, "constituency_id"=>179, "name"=>"NKARETA"],
            ["id"=>895,	"county_id"=>33, "constituency_id"=>179, "name"=>"OLORROPIL"],
            ["id"=>896,	"county_id"=>33, "constituency_id"=>179, "name"=>"MELILI"],
            //180_NAROK_EAST
            ["id"=>897,	"county_id"=>33, "constituency_id"=>180, "name"=>"MOSIRO"],
            ["id"=>898,	"county_id"=>33, "constituency_id"=>180, "name"=>"ILDAMAT"],
            ["id"=>899,	"county_id"=>33, "constituency_id"=>180, "name"=>"KEEKONYOKIE"],
            ["id"=>900,	"county_id"=>33, "constituency_id"=>180, "name"=>"SUSWA"],
            //181_NAROK_SOUTH
            ["id"=>901,	"county_id"=>33, "constituency_id"=>181, "name"=>"MAJIMOTO/NAROOSURA"],
            ["id"=>902,	"county_id"=>33, "constituency_id"=>181, "name"=>"OLOLULUNG'A"],
            ["id"=>903,	"county_id"=>33, "constituency_id"=>181, "name"=>"MELELO"],
            ["id"=>904,	"county_id"=>33, "constituency_id"=>181, "name"=>"LOITA"],
            ["id"=>905,	"county_id"=>33, "constituency_id"=>181, "name"=>"SOGOO"],
            ["id"=>906,	"county_id"=>33, "constituency_id"=>181, "name"=>"SAGAMIAN"],
            //182_NAROK_WEST
            ["id"=>907,	"county_id"=>33, "constituency_id"=>182, "name"=>"ILMOTIOK"],
            ["id"=>908,	"county_id"=>33, "constituency_id"=>182, "name"=>"MARA"],
            ["id"=>909,	"county_id"=>33, "constituency_id"=>182, "name"=>"SIANA"],
            ["id"=>910,	"county_id"=>33, "constituency_id"=>182, "name"=>"NAIKARRA"],


            //34_Kajiado
            //183_KAJIADO_NORTH
            ["id"=>911,	"county_id"=>34, "constituency_id"=>183, "name"=>"OLKERI"],
            ["id"=>912,	"county_id"=>34, "constituency_id"=>183, "name"=>"ONGATA RONGAI"],
            ["id"=>913,	"county_id"=>34, "constituency_id"=>183, "name"=>"NKAIMURUNYA"],
            ["id"=>914,	"county_id"=>34, "constituency_id"=>183, "name"=>"OLOOLUA"],
            ["id"=>915,	"county_id"=>34, "constituency_id"=>183, "name"=>"NGONG"],
            //184_KAJIADO_CENTRAL
            ["id"=>916,	"county_id"=>34, "constituency_id"=>184, "name"=>"PURKO"],
            ["id"=>917,	"county_id"=>34, "constituency_id"=>184, "name"=>"ILDAMAT"],
            ["id"=>918,	"county_id"=>34, "constituency_id"=>184, "name"=>"DALALEKUTUK"],
            ["id"=>919,	"county_id"=>34, "constituency_id"=>184, "name"=>"MATAPATO NORTH"],
            ["id"=>920,	"county_id"=>34, "constituency_id"=>184, "name"=>"MATAPATO SOUTH"],
            //185_KAJIADO_EAST
            ["id"=>921,	"county_id"=>34, "constituency_id"=>185, "name"=>"KAPUTIEI NORTH"],
            ["id"=>922,	"county_id"=>34, "constituency_id"=>185, "name"=>"KITENGELA"],
            ["id"=>923,	"county_id"=>34, "constituency_id"=>185, "name"=>"OLOOSIRKON/SHOLINKE"],
            ["id"=>924,	"county_id"=>34, "constituency_id"=>185, "name"=>"KENYAWA-POKA"],
            ["id"=>925,	"county_id"=>34, "constituency_id"=>185, "name"=>"IMARORO"],
            //186_KAJIADO_WEST
            ["id"=>926,	"county_id"=>34, "constituency_id"=>186, "name"=>"KEEKONYOKIE"],
            ["id"=>927,	"county_id"=>34, "constituency_id"=>186, "name"=>"ILOODOKILANI"],
            ["id"=>928,	"county_id"=>34, "constituency_id"=>186, "name"=>"MAGADI"],
            ["id"=>929,	"county_id"=>34, "constituency_id"=>186, "name"=>"EWUASO OoNKIDONG'I"],
            ["id"=>930,	"county_id"=>34, "constituency_id"=>186, "name"=>"MOSIRO"],
            //187_KAJIADO_SOUTH
            ["id"=>931,	"county_id"=>34, "constituency_id"=>187, "name"=>"ENTONET/LENKISIM"],
            ["id"=>932,	"county_id"=>34, "constituency_id"=>187, "name"=>"MBIRIKANI/ESELENKEI"],
            ["id"=>933,	"county_id"=>34, "constituency_id"=>187, "name"=>"KUKU"],
            ["id"=>934,	"county_id"=>34, "constituency_id"=>187, "name"=>"ROMBO"],
            ["id"=>935,	"county_id"=>34, "constituency_id"=>187, "name"=>"KIMANA"],


            //35_Kericho
            //188_KIPKELION_EAST
            ["id"=>936,	"county_id"=>35, "constituency_id"=>188, "name"=>"LONDIANI"],
            ["id"=>937,	"county_id"=>35, "constituency_id"=>188, "name"=>"KEDOWA/KIMUGUL"],
            ["id"=>938,	"county_id"=>35, "constituency_id"=>188, "name"=>"CHEPSEON"],
            ["id"=>939,	"county_id"=>35, "constituency_id"=>188, "name"=>"TENDENO/SORGET"],
            //189_KIPKELION_WEST
            ["id"=>940,	"county_id"=>35, "constituency_id"=>189, "name"=>"KUNYAK"],
            ["id"=>941,	"county_id"=>35, "constituency_id"=>189, "name"=>"KAMASIAN"],
            ["id"=>942,	"county_id"=>35, "constituency_id"=>189, "name"=>"KIPKELION"],
            ["id"=>943,	"county_id"=>35, "constituency_id"=>189, "name"=>"CHILCHILA"],
            //190_AINAMOI
            ["id"=>944,	"county_id"=>35, "constituency_id"=>190, "name"=>"KAPSOIT"],
            ["id"=>945,	"county_id"=>35, "constituency_id"=>190, "name"=>"AINAMOI"],
            ["id"=>946,	"county_id"=>35, "constituency_id"=>190, "name"=>"KAPKUGERWET"],
            ["id"=>947,	"county_id"=>35, "constituency_id"=>190, "name"=>"KIPCHEBOR"],
            ["id"=>948,	"county_id"=>35, "constituency_id"=>190, "name"=>"KIPCHIMCHIM"],
            ["id"=>949,	"county_id"=>35, "constituency_id"=>190, "name"=>"KAPSAOS"],
            //191_BURETI
            ["id"=>950,	"county_id"=>35, "constituency_id"=>191, "name"=>"KISIARA"],
            ["id"=>951,	"county_id"=>35, "constituency_id"=>191, "name"=>"TEBESONIK"],
            ["id"=>952,	"county_id"=>35, "constituency_id"=>191, "name"=>"CHEBOIN"],
            ["id"=>953,	"county_id"=>35, "constituency_id"=>191, "name"=>"CHEMOSOT"],
            ["id"=>954,	"county_id"=>35, "constituency_id"=>191, "name"=>"LITEIN"],
            ["id"=>955,	"county_id"=>35, "constituency_id"=>191, "name"=>"CHEPLANGET"],
            ["id"=>956,	"county_id"=>35, "constituency_id"=>191, "name"=>"KAPKATET"],
            //192_BELGUT
            ["id"=>957,	"county_id"=>35, "constituency_id"=>192, "name"=>"WALDAI"],
            ["id"=>958,	"county_id"=>35, "constituency_id"=>192, "name"=>"KABIANGA"],
            ["id"=>959,	"county_id"=>35, "constituency_id"=>192, "name"=>"CHEPTORORIET/SERETUT"],
            ["id"=>960,	"county_id"=>35, "constituency_id"=>192, "name"=>"CHAIK"],
            ["id"=>961,	"county_id"=>35, "constituency_id"=>192, "name"=>"KAPSUSER"],
            //193_SIGOWET/SOIN
            ["id"=>962,	"county_id"=>35, "constituency_id"=>193, "name"=>"SIGOWET"],
            ["id"=>963,	"county_id"=>35, "constituency_id"=>193, "name"=>"KAPLELARTET"],
            ["id"=>964,	"county_id"=>35, "constituency_id"=>193, "name"=>"SOLIAT"],
            ["id"=>965,	"county_id"=>35, "constituency_id"=>193, "name"=>"SOIN"],


            //36_Bomet
            //194_SOTIK
            ["id"=>966,	"county_id"=>36, "constituency_id"=>194, "name"=>"NDANAI/ABOSI"],
            ["id"=>967,	"county_id"=>36, "constituency_id"=>194, "name"=>"CHEMAGEL"],
            ["id"=>968,	"county_id"=>36, "constituency_id"=>194, "name"=>"KIPSONOI"],
            ["id"=>969,	"county_id"=>36, "constituency_id"=>194, "name"=>"KAPLETUNDO"],
            ["id"=>970,	"county_id"=>36, "constituency_id"=>194, "name"=>"RONGENA/MANARET"],
            //195_CHEPALUNGU
            ["id"=>971,	"county_id"=>36, "constituency_id"=>195, "name"=>"KONG'ASIS"],
            ["id"=>972,	"county_id"=>36, "constituency_id"=>195, "name"=>"NYANGORES"],
            ["id"=>973,	"county_id"=>36, "constituency_id"=>195, "name"=>"SIGOR"],
            ["id"=>974,	"county_id"=>36, "constituency_id"=>195, "name"=>"CHEBUNYO"],
            ["id"=>975,	"county_id"=>36, "constituency_id"=>195, "name"=>"SIONGIROI"],
            //196_BOMET_EAST
            ["id"=>976,	"county_id"=>36, "constituency_id"=>196, "name"=>"MERIGI"],
            ["id"=>977,	"county_id"=>36, "constituency_id"=>196, "name"=>"KEMBU"],
            ["id"=>978,	"county_id"=>36, "constituency_id"=>196, "name"=>"LONGISA"],
            ["id"=>979,	"county_id"=>36, "constituency_id"=>196, "name"=>"KIPRERES"],
            ["id"=>980,	"county_id"=>36, "constituency_id"=>196, "name"=>"CHEMANER"],
            //197_BOMET_CENTRAL
            ["id"=>981,	"county_id"=>36, "constituency_id"=>197, "name"=>"SILIBWET TOWNSHIP"],
            ["id"=>982,	"county_id"=>36, "constituency_id"=>197, "name"=>"NDARAWETA"],
            ["id"=>983,	"county_id"=>36, "constituency_id"=>197, "name"=>"SINGORWET"],
            ["id"=>984,	"county_id"=>36, "constituency_id"=>197, "name"=>"CHESOEN"],
            ["id"=>985,	"county_id"=>36, "constituency_id"=>197, "name"=>"MUTARAKWA"],
            //198_KONOIN
            ["id"=>986,	"county_id"=>36, "constituency_id"=>198, "name"=>"CHEPCHABAS"],
            ["id"=>987,	"county_id"=>36, "constituency_id"=>198, "name"=>"KIMULOT"],
            ["id"=>988,	"county_id"=>36, "constituency_id"=>198, "name"=>"MOGOGOSIEK"],
            ["id"=>989,	"county_id"=>36, "constituency_id"=>198, "name"=>"BOITO"],
            ["id"=>990,	"county_id"=>36, "constituency_id"=>198, "name"=>"EMBOMOS"],


            //37_Kakamega
            //199_LUGARI
            ["id"=> 991, "county_id"=>37, "constituency_id"=>199, "name"=>"MAUTUMA"],
            ["id"=> 992, "county_id"=>37, "constituency_id"=>199, "name"=>"LUGARI"],
            ["id"=> 993, "county_id"=>37, "constituency_id"=>199, "name"=>"LUMAKANDA"],
            ["id"=> 994, "county_id"=>37, "constituency_id"=>199, "name"=>"CHEKALINI"],
            ["id"=> 995, "county_id"=>37, "constituency_id"=>199, "name"=>"CHEVAYWA"],
            ["id"=> 996, "county_id"=>37, "constituency_id"=>199, "name"=>"LWANDETI"],
            //200_LIKUYANI
            ["id"=> 997, "county_id"=>37, "constituency_id"=>200, "name"=>"LIKUYANI"],
            ["id"=> 998, "county_id"=>37, "constituency_id"=>200, "name"=>"SANGO"],
            ["id"=> 999, "county_id"=>37, "constituency_id"=>200, "name"=>"KONGONI"],
            ["id"=>1000, "county_id"=>37, "constituency_id"=>200, "name"=>"NZOIA"],
            ["id"=>1001, "county_id"=>37, "constituency_id"=>200, "name"=>"SINOKO"],
            //201_MALAVA
            ["id"=>1002, "county_id"=>37, "constituency_id"=>201, "name"=>"WEST KABRAS"],
            ["id"=>1003, "county_id"=>37, "constituency_id"=>201, "name"=>"CHEMUCHE"],
            ["id"=>1004, "county_id"=>37, "constituency_id"=>201, "name"=>"EAST KABRAS"],
            ["id"=>1005, "county_id"=>37, "constituency_id"=>201, "name"=>"BUTALI/CHEGULO"],
            ["id"=>1006, "county_id"=>37, "constituency_id"=>201, "name"=>"MANDA-SHIVANGA"],
            ["id"=>1007, "county_id"=>37, "constituency_id"=>201, "name"=>"SHIRUGU-MUGAI"],
            ["id"=>1008, "county_id"=>37, "constituency_id"=>201, "name"=>"SOUTH KABRAS"],
            //202_LURAMBI
            ["id"=>1009, "county_id"=>37, "constituency_id"=>202, "name"=>"BUTSOTSO EAST"],
            ["id"=>1010, "county_id"=>37, "constituency_id"=>202, "name"=>"BUTSOTSO SOUTH"],
            ["id"=>1011, "county_id"=>37, "constituency_id"=>202, "name"=>"BUTSOTSO CENTRAL"],
            ["id"=>1012, "county_id"=>37, "constituency_id"=>202, "name"=>"SHEYWE"],
            ["id"=>1013, "county_id"=>37, "constituency_id"=>202, "name"=>"MAHIAKALO"],
            ["id"=>1014, "county_id"=>37, "constituency_id"=>202, "name"=>"SHIRERE"],
            //203_NAVAKHOLO
            ["id"=>1015, "county_id"=>37, "constituency_id"=>203, "name"=>"INGOSTSE-MATHIA"],
            ["id"=>1016, "county_id"=>37, "constituency_id"=>203, "name"=>"SHINOYI-SHIKOMARI-ESUMEYIA"],
            ["id"=>1017, "county_id"=>37, "constituency_id"=>203, "name"=>"BUNYALA WEST"],
            ["id"=>1018, "county_id"=>37, "constituency_id"=>203, "name"=>"BUNYALA EAST"],
            ["id"=>1019, "county_id"=>37, "constituency_id"=>203, "name"=>"BUNYALA CENTRAL"],
            //204_MUMIAS_WEST
            ["id"=>1020, "county_id"=>37, "constituency_id"=>204, "name"=>"MUMIAS CENTRAL"],
            ["id"=>1021, "county_id"=>37, "constituency_id"=>204, "name"=>"MUMIAS NORTH"],
            ["id"=>1022, "county_id"=>37, "constituency_id"=>204, "name"=>"ETENJE"],
            ["id"=>1023, "county_id"=>37, "constituency_id"=>204, "name"=>"MUSANDA"],
            //205_MUMIAS_EAST
            ["id"=>1024, "county_id"=>37, "constituency_id"=>205, "name"=>"LUSHEYA/LUBINU"],
            ["id"=>1025, "county_id"=>37, "constituency_id"=>205, "name"=>"MALAHA/ISONGO/MAKUNGA"],
            ["id"=>1026, "county_id"=>37, "constituency_id"=>205, "name"=>"EAST WANGA"],
            //206_MATUNGU
            ["id"=>1027, "county_id"=>37, "constituency_id"=>206, "name"=>"KOYONZO"],
            ["id"=>1028, "county_id"=>37, "constituency_id"=>206, "name"=>"KHOLERA"],
            ["id"=>1029, "county_id"=>37, "constituency_id"=>206, "name"=>"KHALABA"],
            ["id"=>1030, "county_id"=>37, "constituency_id"=>206, "name"=>"MAYONI"],
            ["id"=>1031, "county_id"=>37, "constituency_id"=>206, "name"=>"NAMAMALI"],
            //207_BUTERE
            ["id"=>1032, "county_id"=>37, "constituency_id"=>207, "name"=>"MARAMA WEST"],
            ["id"=>1033, "county_id"=>37, "constituency_id"=>207, "name"=>"MARAMA CENTRAL"],
            ["id"=>1034, "county_id"=>37, "constituency_id"=>207, "name"=>"MARENYO - SHIANDA"],
            ["id"=>1035, "county_id"=>37, "constituency_id"=>207, "name"=>"MARAMA NORTH"],
            ["id"=>1036, "county_id"=>37, "constituency_id"=>207, "name"=>"MARAMA SOUTH"],
            //208_KHWISERO
            ["id"=>1037, "county_id"=>37, "constituency_id"=>208, "name"=>"KISA NORTH"],
            ["id"=>1038, "county_id"=>37, "constituency_id"=>208, "name"=>"KISA EAST"],
            ["id"=>1039, "county_id"=>37, "constituency_id"=>208, "name"=>"KISA WEST"],
            ["id"=>1040, "county_id"=>37, "constituency_id"=>208, "name"=>"KISA CENTRAL"],
            //209_SHINYALU
            ["id"=>1041, "county_id"=>37, "constituency_id"=>209, "name"=>"ISUKHA NORTH"],
            ["id"=>1042, "county_id"=>37, "constituency_id"=>209, "name"=>"MURHANDA"],
            ["id"=>1043, "county_id"=>37, "constituency_id"=>209, "name"=>"ISUKHA CENTRAL"],
            ["id"=>1044, "county_id"=>37, "constituency_id"=>209, "name"=>"ISUKHA SOUTH"],
            ["id"=>1045, "county_id"=>37, "constituency_id"=>209, "name"=>"ISUKHA EAST"],
            ["id"=>1046, "county_id"=>37, "constituency_id"=>209, "name"=>"ISUKHA WEST"],
            //210_IKOLOMANI
            ["id"=>1047, "county_id"=>37, "constituency_id"=>210, "name"=>"IDAKHO SOUTH"],
            ["id"=>1048, "county_id"=>37, "constituency_id"=>210, "name"=>"IDAKHO EAST"],
            ["id"=>1049, "county_id"=>37, "constituency_id"=>210, "name"=>"IDAKHO NORTH"],
            ["id"=>1050, "county_id"=>37, "constituency_id"=>210, "name"=>"IDAKHO CENTRAL"],


            //38_Vihiga
            //211_VIHIGA
            ["id"=>1051, "county_id"=>38, "constituency_id"=>211, "name"=>"LUGAGA-WAMULUMA"],
            ["id"=>1052, "county_id"=>38, "constituency_id"=>211, "name"=>"SOUTH MARAGOLI"],
            ["id"=>1053, "county_id"=>38, "constituency_id"=>211, "name"=>"CENTRAL MARAGOLI"],
            //212_SABATIA
            ["id"=>1054, "county_id"=>38, "constituency_id"=>212, "name"=>"MUNGOMA"],
            ["id"=>1055, "county_id"=>38, "constituency_id"=>212, "name"=>"LYADUYWA/IZAVA"],
            ["id"=>1056, "county_id"=>38, "constituency_id"=>212, "name"=>"WEST SABATIA"],
            ["id"=>1057, "county_id"=>38, "constituency_id"=>212, "name"=>"CHAVAKALI"],
            ["id"=>1058, "county_id"=>38, "constituency_id"=>212, "name"=>"NORTH MARAGOLI"],
            ["id"=>1059, "county_id"=>38, "constituency_id"=>212, "name"=>"WODANGA"],
            ["id"=>1060, "county_id"=>38, "constituency_id"=>212, "name"=>"BUSALI"],
            //213_HAMISI
            ["id"=>1061, "county_id"=>38, "constituency_id"=>213, "name"=>"SHIRU"],
            ["id"=>1062, "county_id"=>38, "constituency_id"=>213, "name"=>"GISAMBAI"],
            ["id"=>1063, "county_id"=>38, "constituency_id"=>213, "name"=>"SHAMAKHOKHO"],
            ["id"=>1064, "county_id"=>38, "constituency_id"=>213, "name"=>"BANJA"],
            ["id"=>1065, "county_id"=>38, "constituency_id"=>213, "name"=>"MUHUDU"],
            ["id"=>1066, "county_id"=>38, "constituency_id"=>213, "name"=>"TAMBUA"],
            ["id"=>1067, "county_id"=>38, "constituency_id"=>213, "name"=>"JEPKOYAI"],
            //214_LUANDA
            ["id"=>1068, "county_id"=>38, "constituency_id"=>214, "name"=>"LUANDA TOWNSHIP"],
            ["id"=>1069, "county_id"=>38, "constituency_id"=>214, "name"=>"WEMILABI"],
            ["id"=>1070, "county_id"=>38, "constituency_id"=>214, "name"=>"MWIBONA"],
            ["id"=>1071, "county_id"=>38, "constituency_id"=>214, "name"=>"LUANDA SOUTH"],
            ["id"=>1072, "county_id"=>38, "constituency_id"=>214, "name"=>"EMABUNGO"],
            //215_EMUHAYA
            ["id"=>1073, "county_id"=>38, "constituency_id"=>215, "name"=>"NORTH EAST BUNYORE"],
            ["id"=>1074, "county_id"=>38, "constituency_id"=>215, "name"=>"CENTRAL BUNYORE"],
            ["id"=>1075, "county_id"=>38, "constituency_id"=>215, "name"=>"WEST BUNYORE"],


            //39_Bungoma
            //216_MT.ELGON
            ["id"=>1076, "county_id"=>39, "constituency_id"=>216, "name"=>"CHEPTAIS"],
            ["id"=>1077, "county_id"=>39, "constituency_id"=>216, "name"=>"CHESIKAKI"],
            ["id"=>1078, "county_id"=>39, "constituency_id"=>216, "name"=>"CHEPYUK"],
            ["id"=>1079, "county_id"=>39, "constituency_id"=>216, "name"=>"KAPKATENY"],
            ["id"=>1080, "county_id"=>39, "constituency_id"=>216, "name"=>"KAPTAMA"],
            ["id"=>1081, "county_id"=>39, "constituency_id"=>216, "name"=>"ELGON"],
            //217_SIRISIA
            ["id"=>1082, "county_id"=>39, "constituency_id"=>217, "name"=>"NAMWELA"],
            ["id"=>1083, "county_id"=>39, "constituency_id"=>217, "name"=>"MALAKISI/SOUTH KULISIRU"],
            ["id"=>1084, "county_id"=>39, "constituency_id"=>217, "name"=>"LWANDANYI"],
            //218_KABUCHAI
            ["id"=>1085, "county_id"=>39, "constituency_id"=>218, "name"=>"KABUCHAI/CHWELE"],
            ["id"=>1086, "county_id"=>39, "constituency_id"=>218, "name"=>"WEST NALONDO"],
            ["id"=>1087, "county_id"=>39, "constituency_id"=>218, "name"=>"BWAKE/LUUYA"],
            ["id"=>1088, "county_id"=>39, "constituency_id"=>218, "name"=>"MUKUYUNI"],
            //219_BUMULA
            ["id"=>1089, "county_id"=>39, "constituency_id"=>219, "name"=>"SOUTH BUKUSU"],
            ["id"=>1090, "county_id"=>39, "constituency_id"=>219, "name"=>"BUMULA"],
            ["id"=>1091, "county_id"=>39, "constituency_id"=>219, "name"=>"KHASOKO"],
            ["id"=>1092, "county_id"=>39, "constituency_id"=>219, "name"=>"KABULA"],
            ["id"=>1093, "county_id"=>39, "constituency_id"=>219, "name"=>"KIMAETI"],
            ["id"=>1094, "county_id"=>39, "constituency_id"=>219, "name"=>"WEST BUKUSU"],
            ["id"=>1095, "county_id"=>39, "constituency_id"=>219, "name"=>"SIBOTI"],
            //220_KANDUYI
            ["id"=>1096, "county_id"=>39, "constituency_id"=>220, "name"=>"BUKEMBE WEST"],
            ["id"=>1097, "county_id"=>39, "constituency_id"=>220, "name"=>"BUKEMBE EAST"],
            ["id"=>1098, "county_id"=>39, "constituency_id"=>220, "name"=>"TOWNSHIP"],
            ["id"=>1099, "county_id"=>39, "constituency_id"=>220, "name"=>"KHALABA"],
            ["id"=>1100, "county_id"=>39, "constituency_id"=>220, "name"=>"MUSIKOMA"],
            ["id"=>1101, "county_id"=>39, "constituency_id"=>220, "name"=>"EAST SANG'ALO"],
            ["id"=>1102, "county_id"=>39, "constituency_id"=>220, "name"=>"MARAKARU/TUUTI"],
            ["id"=>1103, "county_id"=>39, "constituency_id"=>220, "name"=>"WEST SANG'ALO"],
            //221_WEBUYE_EAST
            ["id"=>1104, "county_id"=>39, "constituency_id"=>221, "name"=>"MIHUU"],
            ["id"=>1105, "county_id"=>39, "constituency_id"=>221, "name"=>"NDIVISI"],
            ["id"=>1106, "county_id"=>39, "constituency_id"=>221, "name"=>"MARAKA"],
            //222_WEBUYE_WEST
            ["id"=>1107, "county_id"=>39, "constituency_id"=>222, "name"=>"MISIKHU"],
            ["id"=>1108, "county_id"=>39, "constituency_id"=>222, "name"=>"SITIKHO"],
            ["id"=>1109, "county_id"=>39, "constituency_id"=>222, "name"=>"MATULO"],
            ["id"=>1110, "county_id"=>39, "constituency_id"=>222, "name"=>"BOKOLI"],
            //223_KIMILILI
            ["id"=>1111, "county_id"=>39, "constituency_id"=>223, "name"=>"KIBINGEI"],
            ["id"=>1112, "county_id"=>39, "constituency_id"=>223, "name"=>"KIMILILI"],
            ["id"=>1113, "county_id"=>39, "constituency_id"=>223, "name"=>"MAENI"],
            ["id"=>1114, "county_id"=>39, "constituency_id"=>223, "name"=>"KAMUKUYWA"],
            //224_TONGAREN
            ["id"=>1115, "county_id"=>39, "constituency_id"=>224, "name"=>"MBAKALO"],
            ["id"=>1116, "county_id"=>39, "constituency_id"=>224, "name"=>"NAITIRI/KABUYEFWE"],
            ["id"=>1117, "county_id"=>39, "constituency_id"=>224, "name"=>"MILIMA"],
            ["id"=>1118, "county_id"=>39, "constituency_id"=>224, "name"=>"NDALU/TABANI"],
            ["id"=>1119, "county_id"=>39, "constituency_id"=>224, "name"=>"TONGAREN"],
            ["id"=>1120, "county_id"=>39, "constituency_id"=>224, "name"=>"SOYSAMBU/MITUA"],


            //40_Busia
            //225_TESO_NORTH
            ["id"=>1121, "county_id"=>40, "constituency_id"=>225, "name"=>"MALABA CENTRAL"],
            ["id"=>1122, "county_id"=>40, "constituency_id"=>225, "name"=>"MALABA NORTH"],
            ["id"=>1123, "county_id"=>40, "constituency_id"=>225, "name"=>"ANG'URAI SOUTH"],
            ["id"=>1124, "county_id"=>40, "constituency_id"=>225, "name"=>"ANG'URAI NORTH"],
            ["id"=>1125, "county_id"=>40, "constituency_id"=>225, "name"=>"ANG'URAI EAST"],
            ["id"=>1126, "county_id"=>40, "constituency_id"=>225, "name"=>"MALABA SOUTH"],
            //226_TESO_SOUTH
            ["id"=>1127, "county_id"=>40, "constituency_id"=>226, "name"=>"ANG'OROM"],
            ["id"=>1128, "county_id"=>40, "constituency_id"=>226, "name"=>"CHAKOL SOUTH"],
            ["id"=>1129, "county_id"=>40, "constituency_id"=>226, "name"=>"CHAKOL NORTH"],
            ["id"=>1130, "county_id"=>40, "constituency_id"=>226, "name"=>"AMUKURA WEST"],
            ["id"=>1131, "county_id"=>40, "constituency_id"=>226, "name"=>"AMUKURA EAST"],
            ["id"=>1132, "county_id"=>40, "constituency_id"=>226, "name"=>"AMUKURA CENTRAL"],
            //227_NAMBALE
            ["id"=>1133, "county_id"=>40, "constituency_id"=>227, "name"=>"NAMBALE TOWNSHIP"],
            ["id"=>1134, "county_id"=>40, "constituency_id"=>227, "name"=>"BUKHAYO NORTH/WALTSI"],
            ["id"=>1135, "county_id"=>40, "constituency_id"=>227, "name"=>"BUKHAYO EAST"],
            ["id"=>1136, "county_id"=>40, "constituency_id"=>227, "name"=>"BUKHAYO CENTRAL"],
            //228_MATAYOS
            ["id"=>1137, "county_id"=>40, "constituency_id"=>228, "name"=>"BUKHAYO WEST"],
            ["id"=>1138, "county_id"=>40, "constituency_id"=>228, "name"=>"MAYENJE"],
            ["id"=>1139, "county_id"=>40, "constituency_id"=>228, "name"=>"MATAYOS SOUTH"],
            ["id"=>1140, "county_id"=>40, "constituency_id"=>228, "name"=>"BUSIBWABO"],
            ["id"=>1141, "county_id"=>40, "constituency_id"=>228, "name"=>"BURUMBA"],
            //229_BUTULA
            ["id"=>1142, "county_id"=>40, "constituency_id"=>229, "name"=>"MARACHI WEST"],
            ["id"=>1143, "county_id"=>40, "constituency_id"=>229, "name"=>"KINGANDOLE"],
            ["id"=>1144, "county_id"=>40, "constituency_id"=>229, "name"=>"MARACHI CENTRAL"],
            ["id"=>1145, "county_id"=>40, "constituency_id"=>229, "name"=>"MARACHI EAST"],
            ["id"=>1146, "county_id"=>40, "constituency_id"=>229, "name"=>"MARACHI NORTH"],
            ["id"=>1147, "county_id"=>40, "constituency_id"=>229, "name"=>"ELUGULU"],
            //230_FUNYULA
            ["id"=>1148, "county_id"=>40, "constituency_id"=>230, "name"=>"NAMBOBOTO NAMBUKU"],
            ["id"=>1149, "county_id"=>40, "constituency_id"=>230, "name"=>"NANGINA"],
            ["id"=>1150, "county_id"=>40, "constituency_id"=>230, "name"=>"AGENG'A NANGUBA"],
            ["id"=>1151, "county_id"=>40, "constituency_id"=>230, "name"=>"BWIRI"],
            //231_BUDALANGI
            ["id"=>1152, "county_id"=>40, "constituency_id"=>231, "name"=>"BUNYALA CENTRAL"],
            ["id"=>1153, "county_id"=>40, "constituency_id"=>231, "name"=>"BUNYALA NORTH"],
            ["id"=>1154, "county_id"=>40, "constituency_id"=>231, "name"=>"BUNYALA WEST"],
            ["id"=>1155, "county_id"=>40, "constituency_id"=>231, "name"=>"BUNYALA SOUTH"],


            //41_Siaya
            //232_UGENYA
            ["id"=>1156, "county_id"=>41, "constituency_id"=>232, "name"=>"WEST UGENYA"],
            ["id"=>1157, "county_id"=>41, "constituency_id"=>232, "name"=>"UKWALA"],
            ["id"=>1158, "county_id"=>41, "constituency_id"=>232, "name"=>"NORTH UGENYA"],
            ["id"=>1159, "county_id"=>41, "constituency_id"=>232, "name"=>"EAST UGENYA"],
            //233_UGUNJA
            ["id"=>1160, "county_id"=>41, "constituency_id"=>233, "name"=>"SIDINDI"],
            ["id"=>1161, "county_id"=>41, "constituency_id"=>233, "name"=>"SIGOMERE"],
            ["id"=>1162, "county_id"=>41, "constituency_id"=>233, "name"=>"UGUNJA"],
            //234_ALEGO_USONGA
            ["id"=>1163, "county_id"=>41, "constituency_id"=>234, "name"=>"USONGA"],
            ["id"=>1164, "county_id"=>41, "constituency_id"=>234, "name"=>"WEST ALEGO"],
            ["id"=>1165, "county_id"=>41, "constituency_id"=>234, "name"=>"CENTRAL ALEGO"],
            ["id"=>1166, "county_id"=>41, "constituency_id"=>234, "name"=>"SIAYA TOWNSHIP"],
            ["id"=>1167, "county_id"=>41, "constituency_id"=>234, "name"=>"NORTH ALEGO"],
            ["id"=>1168, "county_id"=>41, "constituency_id"=>234, "name"=>"SOUTH EAST ALEGO"],
            //235_GEM
            ["id"=>1169, "county_id"=>41, "constituency_id"=>235, "name"=>"NORTH GEM"],
            ["id"=>1170, "county_id"=>41, "constituency_id"=>235, "name"=>"WEST GEM"],
            ["id"=>1171, "county_id"=>41, "constituency_id"=>235, "name"=>"CENTRAL GEM"],
            ["id"=>1172, "county_id"=>41, "constituency_id"=>235, "name"=>"YALA TOWNSHIP"],
            ["id"=>1173, "county_id"=>41, "constituency_id"=>235, "name"=>"EAST GEM"],
            ["id"=>1174, "county_id"=>41, "constituency_id"=>235, "name"=>"SOUTH GEM"],
            //236_BONDO
            ["id"=>1175, "county_id"=>41, "constituency_id"=>236, "name"=>"WEST YIMBO"],
            ["id"=>1176, "county_id"=>41, "constituency_id"=>236, "name"=>"CENTRAL SAKWA"],
            ["id"=>1177, "county_id"=>41, "constituency_id"=>236, "name"=>"SOUTH SAKWA"],
            ["id"=>1178, "county_id"=>41, "constituency_id"=>236, "name"=>"YIMBO EAST"],
            ["id"=>1179, "county_id"=>41, "constituency_id"=>236, "name"=>"WEST SAKWA"],
            ["id"=>1180, "county_id"=>41, "constituency_id"=>236, "name"=>"NORTH SAKWA"],
            //237_RARIEDA
            ["id"=>1181, "county_id"=>41, "constituency_id"=>237, "name"=>"EAST ASEMBO"],
            ["id"=>1182, "county_id"=>41, "constituency_id"=>237, "name"=>"WEST ASEMBO"],
            ["id"=>1183, "county_id"=>41, "constituency_id"=>237, "name"=>"NORTH UYOMA"],
            ["id"=>1184, "county_id"=>41, "constituency_id"=>237, "name"=>"SOUTH UYOMA"],
            ["id"=>1185, "county_id"=>41, "constituency_id"=>237, "name"=>"WEST UYOMA"],


            //42_Kisumu
            //238_KISUMU_EAST
            ["id"=>1186, "county_id"=>42, "constituency_id"=>238, "name"=>"KAJULU"],
            ["id"=>1187, "county_id"=>42, "constituency_id"=>238, "name"=>"KOLWA EAST"],
            ["id"=>1188, "county_id"=>42, "constituency_id"=>238, "name"=>"MANYATTA 'B'"],
            ["id"=>1189, "county_id"=>42, "constituency_id"=>238, "name"=>"NYALENDA 'A'"],
            ["id"=>1190, "county_id"=>42, "constituency_id"=>238, "name"=>"KOLWA CENTRAL"],
            //239_KISUMU_WEST
            ["id"=>1191, "county_id"=>42, "constituency_id"=>239, "name"=>"SOUTH WEST KISUMU"],
            ["id"=>1192, "county_id"=>42, "constituency_id"=>239, "name"=>"CENTRAL KISUMU"],
            ["id"=>1193, "county_id"=>42, "constituency_id"=>239, "name"=>"KISUMU NORTH"],
            ["id"=>1194, "county_id"=>42, "constituency_id"=>239, "name"=>"WEST KISUMU"],
            ["id"=>1195, "county_id"=>42, "constituency_id"=>239, "name"=>"NORTH WEST KISUMU"],
            //240_KISUMU_CENTRAL
            ["id"=>1196, "county_id"=>42, "constituency_id"=>240, "name"=>"RAILWAYS"],
            ["id"=>1197, "county_id"=>42, "constituency_id"=>240, "name"=>"MIGOSI"],
            ["id"=>1198, "county_id"=>42, "constituency_id"=>240, "name"=>"SHAURIMOYO KALOLENI"],
            ["id"=>1199, "county_id"=>42, "constituency_id"=>240, "name"=>"MARKET MILIMANI"],
            ["id"=>1200, "county_id"=>42, "constituency_id"=>240, "name"=>"KONDELE"],
            ["id"=>1201, "county_id"=>42, "constituency_id"=>240, "name"=>"NYALENDA B"],
            //241_SEME
            ["id"=>1202, "county_id"=>42, "constituency_id"=>241, "name"=>"WEST SEME"],
            ["id"=>1203, "county_id"=>42, "constituency_id"=>241, "name"=>"CENTRAL SEME"],
            ["id"=>1204, "county_id"=>42, "constituency_id"=>241, "name"=>"EAST SEME"],
            ["id"=>1205, "county_id"=>42, "constituency_id"=>241, "name"=>"NORTH SEME"],
            //242_NYANDO
            ["id"=>1206, "county_id"=>42, "constituency_id"=>242, "name"=>"EAST KANO/WAWIDHI"],
            ["id"=>1207, "county_id"=>42, "constituency_id"=>242, "name"=>"AWASI/ONJIKO"],
            ["id"=>1208, "county_id"=>42, "constituency_id"=>242, "name"=>"AHERO"],
            ["id"=>1209, "county_id"=>42, "constituency_id"=>242, "name"=>"KABONYO/KANYAGWAL"],
            ["id"=>1210, "county_id"=>42, "constituency_id"=>242, "name"=>"KOBURA"],
            //243_MUHORONI
            ["id"=>1211, "county_id"=>42, "constituency_id"=>243, "name"=>"MIWANI"],
            ["id"=>1212, "county_id"=>42, "constituency_id"=>243, "name"=>"OMBEYI"],
            ["id"=>1213, "county_id"=>42, "constituency_id"=>243, "name"=>"MASOGO/NYANG'OMA"],
            ["id"=>1214, "county_id"=>42, "constituency_id"=>243, "name"=>"CHEMELIL"],
            ["id"=>1215, "county_id"=>42, "constituency_id"=>243, "name"=>"MUHORONI/KORU"],
            //244_NYAKACH
            ["id"=>1216, "county_id"=>42, "constituency_id"=>244, "name"=>"SOUTH WEST NYAKACH"],
            ["id"=>1217, "county_id"=>42, "constituency_id"=>244, "name"=>"NORTH NYAKACH"],
            ["id"=>1218, "county_id"=>42, "constituency_id"=>244, "name"=>"CENTRAL NYAKACH"],
            ["id"=>1219, "county_id"=>42, "constituency_id"=>244, "name"=>"WEST NYAKACH"],
            ["id"=>1220, "county_id"=>42, "constituency_id"=>244, "name"=>"SOUTH EAST NYAKACH"],


            //43_HomaBay
            //245_KASIPUL
            ["id"=>1221, "county_id"=>43, "constituency_id"=>245, "name"=>"WEST KASIPUL"],
            ["id"=>1222, "county_id"=>43, "constituency_id"=>245, "name"=>"SOUTH KASIPUL"],
            ["id"=>1223, "county_id"=>43, "constituency_id"=>245, "name"=>"CENTRAL KASIPUL"],
            ["id"=>1224, "county_id"=>43, "constituency_id"=>245, "name"=>"EAST KAMAGAK"],
            ["id"=>1225, "county_id"=>43, "constituency_id"=>245, "name"=>"WEST KAMAGAK"],
            //246_KABONDO_KASIPUL
            ["id"=>1226, "county_id"=>43, "constituency_id"=>246, "name"=>"KABONDO EAST"],
            ["id"=>1227, "county_id"=>43, "constituency_id"=>246, "name"=>"KABONDO WEST"],
            ["id"=>1228, "county_id"=>43, "constituency_id"=>246, "name"=>"KOKWANYO/KAKELO"],
            ["id"=>1229, "county_id"=>43, "constituency_id"=>246, "name"=>"KOJWACH"],
            //247_KARACHUONYO
            ["id"=>1230, "county_id"=>43, "constituency_id"=>247, "name"=>"WEST KARACHUONYO"],
            ["id"=>1231, "county_id"=>43, "constituency_id"=>247, "name"=>"NORTH KARACHUONYO"],
            ["id"=>1232, "county_id"=>43, "constituency_id"=>247, "name"=>"CENTRAL"],
            ["id"=>1233, "county_id"=>43, "constituency_id"=>247, "name"=>"KANYALUO"],
            ["id"=>1234, "county_id"=>43, "constituency_id"=>247, "name"=>"KIBIRI"],
            ["id"=>1235, "county_id"=>43, "constituency_id"=>247, "name"=>"WANGCHIENG"],
            ["id"=>1236, "county_id"=>43, "constituency_id"=>247, "name"=>"KENDU BAY TOWN"],
            //248_RANGWE
            ["id"=>1237, "county_id"=>43, "constituency_id"=>248, "name"=>"WEST GEM"],
            ["id"=>1238, "county_id"=>43, "constituency_id"=>248, "name"=>"EAST GEM"],
            ["id"=>1239, "county_id"=>43, "constituency_id"=>248, "name"=>"KAGAN"],
            ["id"=>1240, "county_id"=>43, "constituency_id"=>248, "name"=>"KOCHIA"],
            //249_HOMA_BAY_TOWN
            ["id"=>1241, "county_id"=>43, "constituency_id"=>249, "name"=>"HOMA BAY CENTRAL"],
            ["id"=>1242, "county_id"=>43, "constituency_id"=>249, "name"=>"HOMA BAY ARUJO"],
            ["id"=>1243, "county_id"=>43, "constituency_id"=>249, "name"=>"HOMA BAY WEST"],
            ["id"=>1244, "county_id"=>43, "constituency_id"=>249, "name"=>"HOMA BAY EAST"],
            //250_NDHIWA
            ["id"=>1245, "county_id"=>43, "constituency_id"=>250, "name"=>"KWABWAI"],
            ["id"=>1246, "county_id"=>43, "constituency_id"=>250, "name"=>"KANYADOTO"],
            ["id"=>1247, "county_id"=>43, "constituency_id"=>250, "name"=>"KANYIKELA"],
            ["id"=>1248, "county_id"=>43, "constituency_id"=>250, "name"=>"KABUOCH NORTH"],
            ["id"=>1249, "county_id"=>43, "constituency_id"=>250, "name"=>"KABUOCH SOUTH/PALA"],
            ["id"=>1250, "county_id"=>43, "constituency_id"=>250, "name"=>"KANYAMWA KOLOGI"],
            ["id"=>1251, "county_id"=>43, "constituency_id"=>250, "name"=>"KANYAMWA KOSEWE"],
            //251_SUBA_NORTH
            ["id"=>1252, "county_id"=>43, "constituency_id"=>251, "name"=>"MFANGANO ISLAND"],
            ["id"=>1253, "county_id"=>43, "constituency_id"=>251, "name"=>"RUSINGA ISLAND"],
            ["id"=>1254, "county_id"=>43, "constituency_id"=>251, "name"=>"KASGUNGA"],
            ["id"=>1255, "county_id"=>43, "constituency_id"=>251, "name"=>"GEMBE"],
            ["id"=>1256, "county_id"=>43, "constituency_id"=>251, "name"=>"LAMBWE"],
            //252_SUBA_SOUTH
            ["id"=>1257, "county_id"=>43, "constituency_id"=>252, "name"=>"GWASSI SOUTH"],
            ["id"=>1258, "county_id"=>43, "constituency_id"=>252, "name"=>"GWASSI NORTH"],
            ["id"=>1259, "county_id"=>43, "constituency_id"=>252, "name"=>"KAKSINGRI WEST"],
            ["id"=>1260, "county_id"=>43, "constituency_id"=>252, "name"=>"RUMA-KAKSINGRI"],


            //44_Migori
            //253_RONGO
            ["id"=>1261, "county_id"=>44, "constituency_id"=>253, "name"=>"NORTH KAMAGAMBO"],
            ["id"=>1262, "county_id"=>44, "constituency_id"=>253, "name"=>"CENTRAL KAMAGAMBO"],
            ["id"=>1263, "county_id"=>44, "constituency_id"=>253, "name"=>"EAST KAMAGAMBO"],
            ["id"=>1264, "county_id"=>44, "constituency_id"=>253, "name"=>"SOUTH KAMAGAMBO"],
            //254_AWENDO
            ["id"=>1265, "county_id"=>44, "constituency_id"=>254, "name"=>"NORTH SAKWA"],
            ["id"=>1266, "county_id"=>44, "constituency_id"=>254, "name"=>"SOUTH SAKWA"],
            ["id"=>1267, "county_id"=>44, "constituency_id"=>254, "name"=>"WEST SAKWA"],
            ["id"=>1268, "county_id"=>44, "constituency_id"=>254, "name"=>"CENTRAL SAKWA"],
            //255_SUNA_EAST
            ["id"=>1269, "county_id"=>44, "constituency_id"=>255, "name"=>"GOD JOPE"],
            ["id"=>1270, "county_id"=>44, "constituency_id"=>255, "name"=>"SUNA CENTRAL"],
            ["id"=>1271, "county_id"=>44, "constituency_id"=>255, "name"=>"KAKRAO"],
            ["id"=>1272, "county_id"=>44, "constituency_id"=>255, "name"=>"KWA"],
            //256_SUNA_WEST
            ["id"=>1273, "county_id"=>44, "constituency_id"=>256, "name"=>"WIGA"],
            ["id"=>1274, "county_id"=>44, "constituency_id"=>256, "name"=>"WASWETA II"],
            ["id"=>1275, "county_id"=>44, "constituency_id"=>256, "name"=>"RAGANA-ORUBA"],
            ["id"=>1276, "county_id"=>44, "constituency_id"=>256, "name"=>"WASIMBETE"],
            //257_URIRI
            ["id"=>1277, "county_id"=>44, "constituency_id"=>257, "name"=>"WEST KANYAMKAGO"],
            ["id"=>1278, "county_id"=>44, "constituency_id"=>257, "name"=>"NORTH KANYAMKAGO"],
            ["id"=>1279, "county_id"=>44, "constituency_id"=>257, "name"=>"CENTRAL KANYAMKAGO"],
            ["id"=>1280, "county_id"=>44, "constituency_id"=>257, "name"=>"SOUTH KANYAMKAGO"],
            ["id"=>1281, "county_id"=>44, "constituency_id"=>257, "name"=>"EAST KANYAMKAGO"],
            //258_NYATIKE
            ["id"=>1282, "county_id"=>44, "constituency_id"=>258, "name"=>"KACHIEN'G"],
            ["id"=>1283, "county_id"=>44, "constituency_id"=>258, "name"=>"KANYASA"],
            ["id"=>1284, "county_id"=>44, "constituency_id"=>258, "name"=>"NORTH KADEM"],
            ["id"=>1285, "county_id"=>44, "constituency_id"=>258, "name"=>"MACALDER/KANYARWANDA"],
            ["id"=>1286, "county_id"=>44, "constituency_id"=>258, "name"=>"KALER"],
            ["id"=>1287, "county_id"=>44, "constituency_id"=>258, "name"=>"GOT KACHOLA"],
            ["id"=>1288, "county_id"=>44, "constituency_id"=>258, "name"=>"MUHURU"],
            //259_KURIA_WEST
            ["id"=>1289, "county_id"=>44, "constituency_id"=>259, "name"=>"BUKIRA EAST"],
            ["id"=>1290, "county_id"=>44, "constituency_id"=>259, "name"=>"BUKIRA CENTRL/IKEREGE"],
            ["id"=>1291, "county_id"=>44, "constituency_id"=>259, "name"=>"ISIBANIA"],
            ["id"=>1292, "county_id"=>44, "constituency_id"=>259, "name"=>"MAKERERO"],
            ["id"=>1293, "county_id"=>44, "constituency_id"=>259, "name"=>"MASABA"],
            ["id"=>1294, "county_id"=>44, "constituency_id"=>259, "name"=>"TAGARE"],
            ["id"=>1295, "county_id"=>44, "constituency_id"=>259, "name"=>"NYAMOSENSE/KOMOSOKO"],
            //260_KURIA_EAST
            ["id"=>1296, "county_id"=>44, "constituency_id"=>260, "name"=>"GOKEHARAKA/GETAMBWEGA"],
            ["id"=>1297, "county_id"=>44, "constituency_id"=>260, "name"=>"NTIMARU WEST"],
            ["id"=>1298, "county_id"=>44, "constituency_id"=>260, "name"=>"NTIMARU EAST"],
            ["id"=>1299, "county_id"=>44, "constituency_id"=>260, "name"=>"NYABASI EAST"],
            ["id"=>1300, "county_id"=>44, "constituency_id"=>260, "name"=>"NYABASI WEST"],


            //45_Kisii
            //261_BONCHARI
            ["id"=>1301, "county_id"=>45, "constituency_id"=>261, "name"=>"BOMARIBA"],
            ["id"=>1302, "county_id"=>45, "constituency_id"=>261, "name"=>"BOGIAKUMU"],
            ["id"=>1303, "county_id"=>45, "constituency_id"=>261, "name"=>"BOMORENDA"],
            ["id"=>1304, "county_id"=>45, "constituency_id"=>261, "name"=>"RIANA"],
            //262_SOUTH_MUGIRANGO
            ["id"=>1305, "county_id"=>45, "constituency_id"=>262, "name"=>"TABAKA"],
            ["id"=>1306, "county_id"=>45, "constituency_id"=>262, "name"=>"BOIKANG'A"],
            ["id"=>1307, "county_id"=>45, "constituency_id"=>262, "name"=>"BOGETENGA"],
            ["id"=>1308, "county_id"=>45, "constituency_id"=>262, "name"=>"BORABU/CHITAGO"],
            ["id"=>1309, "county_id"=>45, "constituency_id"=>262, "name"=>"MOTICHO"],
            ["id"=>1310, "county_id"=>45, "constituency_id"=>262, "name"=>"GETENGA"],
            //263_BOMACHOGE_BORABU
            ["id"=>1311, "county_id"=>45, "constituency_id"=>263, "name"=>"BOMBABA BORABU"],
            ["id"=>1312, "county_id"=>45, "constituency_id"=>263, "name"=>"BOOCHI BORABU"],
            ["id"=>1313, "county_id"=>45, "constituency_id"=>263, "name"=>"BOKIMONGE"],
            ["id"=>1314, "county_id"=>45, "constituency_id"=>263, "name"=>"MAGENCHE"],
            //264_BOBASI
            ["id"=>1315, "county_id"=>45, "constituency_id"=>264, "name"=>"MASIGE WEST"],
            ["id"=>1316, "county_id"=>45, "constituency_id"=>264, "name"=>"MASIGE EAST"],
            ["id"=>1317, "county_id"=>45, "constituency_id"=>264, "name"=>"BASI CENTRAL"],
            ["id"=>1318, "county_id"=>45, "constituency_id"=>264, "name"=>"NYACHEKI"],
            ["id"=>1319, "county_id"=>45, "constituency_id"=>264, "name"=>"BASI BOGETAORIO"],
            ["id"=>1320, "county_id"=>45, "constituency_id"=>264, "name"=>"BOBASI CHACHE"],
            ["id"=>1321, "county_id"=>45, "constituency_id"=>264, "name"=>"SAMETA/MOKWERERO"],
            ["id"=>1322, "county_id"=>45, "constituency_id"=>264, "name"=>"BOBASI BOITANGARE"],
            //265_BOMACHOGE_CHACHE
            ["id"=>1323, "county_id"=>45, "constituency_id"=>265, "name"=>"MAJOGE BASI"],
            ["id"=>1324, "county_id"=>45, "constituency_id"=>265, "name"=>"BOOCHI/TENDERE"],
            ["id"=>1325, "county_id"=>45, "constituency_id"=>265, "name"=>"BOSOTI/SENGERA"],
            //266_NYARIBARI_MASABA
            ["id"=>1326, "county_id"=>45, "constituency_id"=>266, "name"=>"ICHUNI"],
            ["id"=>1327, "county_id"=>45, "constituency_id"=>266, "name"=>"NYAMASIBI"],
            ["id"=>1328, "county_id"=>45, "constituency_id"=>266, "name"=>"MASIMBA"],
            ["id"=>1329, "county_id"=>45, "constituency_id"=>266, "name"=>"GESUSU"],
            ["id"=>1330, "county_id"=>45, "constituency_id"=>266, "name"=>"KIAMOKAMA"],
            //267_NYARIBARI_CHACHE
            ["id"=>1331, "county_id"=>45, "constituency_id"=>267, "name"=>"BOBARACHO"],
            ["id"=>1332, "county_id"=>45, "constituency_id"=>267, "name"=>"KISII CENTRAL"],
            ["id"=>1333, "county_id"=>45, "constituency_id"=>267, "name"=>"KEUMBU"],
            ["id"=>1334, "county_id"=>45, "constituency_id"=>267, "name"=>"KIOGORO"],
            ["id"=>1335, "county_id"=>45, "constituency_id"=>267, "name"=>"BIRONGO"],
            ["id"=>1336, "county_id"=>45, "constituency_id"=>267, "name"=>"IBENO"],
            //268_KITUTU_CHACHE_NORTH
            ["id"=>1337, "county_id"=>45, "constituency_id"=>268, "name"=>"MONYERERO"],
            ["id"=>1338, "county_id"=>45, "constituency_id"=>268, "name"=>"SENSI"],
            ["id"=>1339, "county_id"=>45, "constituency_id"=>268, "name"=>"MARANI"],
            ["id"=>1340, "county_id"=>45, "constituency_id"=>268, "name"=>"KEGOGI"],
            //269_KITUTU_CHACHE_SOUTH
            ["id"=>1341, "county_id"=>45, "constituency_id"=>269, "name"=>"BOGUSERO"],
            ["id"=>1342, "county_id"=>45, "constituency_id"=>269, "name"=>"BOGEKA"],
            ["id"=>1343, "county_id"=>45, "constituency_id"=>269, "name"=>"NYAKOE"],
            ["id"=>1344, "county_id"=>45, "constituency_id"=>269, "name"=>"KITUTU   CENTRAL"],
            ["id"=>1345, "county_id"=>45, "constituency_id"=>269, "name"=>"NYATIEKO"],


            //46_Nyamira
            //270_KITUTU_MASABA
            ["id"=>1346, "county_id"=>46, "constituency_id"=>270, "name"=>"RIGOMA"],
            ["id"=>1347, "county_id"=>46, "constituency_id"=>270, "name"=>"GACHUBA"],
            ["id"=>1348, "county_id"=>46, "constituency_id"=>270, "name"=>"KEMERA"],
            ["id"=>1349, "county_id"=>46, "constituency_id"=>270, "name"=>"MAGOMBO"],
            ["id"=>1350, "county_id"=>46, "constituency_id"=>270, "name"=>"MANGA"],
            ["id"=>1351, "county_id"=>46, "constituency_id"=>270, "name"=>"GESIMA"],
            //271_WEST_MUGIRANGO
            ["id"=>1352, "county_id"=>46, "constituency_id"=>271, "name"=>"NYAMAIYA"],
            ["id"=>1353, "county_id"=>46, "constituency_id"=>271, "name"=>"BOGICHORA"],
            ["id"=>1354, "county_id"=>46, "constituency_id"=>271, "name"=>"BOSAMARO"],
            ["id"=>1355, "county_id"=>46, "constituency_id"=>271, "name"=>"BONYAMATUTA"],
            ["id"=>1356, "county_id"=>46, "constituency_id"=>271, "name"=>"TOWNSHIP"],
            //272_NORTH_MUGIRANGO
            ["id"=>1357, "county_id"=>46, "constituency_id"=>272, "name"=>"ITIBO"],
            ["id"=>1358, "county_id"=>46, "constituency_id"=>272, "name"=>"BOMWAGAMO"],
            ["id"=>1359, "county_id"=>46, "constituency_id"=>272, "name"=>"BOKEIRA"],
            ["id"=>1360, "county_id"=>46, "constituency_id"=>272, "name"=>"MAGWAGWA"],
            ["id"=>1361, "county_id"=>46, "constituency_id"=>272, "name"=>"EKERENYO"],
            //273_BORABU
            ["id"=>1362, "county_id"=>46, "constituency_id"=>273, "name"=>"MEKENENE"],
            ["id"=>1363, "county_id"=>46, "constituency_id"=>273, "name"=>"KIABONYORU"],
            ["id"=>1364, "county_id"=>46, "constituency_id"=>273, "name"=>"NYANSIONGO"],
            ["id"=>1365, "county_id"=>46, "constituency_id"=>273, "name"=>"ESISE"],


            //47_Nairobi
            //274_WESTLANDS
            ["id"=>1366, "county_id"=>47, "constituency_id"=>274, "name"=>"KITISURU"],
            ["id"=>1367, "county_id"=>47, "constituency_id"=>274, "name"=>"PARKLANDS/HIGHRIDGE"],
            ["id"=>1368, "county_id"=>47, "constituency_id"=>274, "name"=>"KARURA"],
            ["id"=>1369, "county_id"=>47, "constituency_id"=>274, "name"=>"KANGEMI"],
            ["id"=>1370, "county_id"=>47, "constituency_id"=>274, "name"=>"MOUNTAIN VIEW"],
            //275_DAGORETTI_NORTH
            ["id"=>1371, "county_id"=>47, "constituency_id"=>275, "name"=>"KILIMANI"],
            ["id"=>1372, "county_id"=>47, "constituency_id"=>275, "name"=>"KAWANGWARE"],
            ["id"=>1373, "county_id"=>47, "constituency_id"=>275, "name"=>"GATINA"],
            ["id"=>1374, "county_id"=>47, "constituency_id"=>275, "name"=>"KILELESHWA"],
            ["id"=>1375, "county_id"=>47, "constituency_id"=>275, "name"=>"KABIRO"],
            //276_DAGORETTI_SOUTH
            ["id"=>1376, "county_id"=>47, "constituency_id"=>276, "name"=>"MUTU-INI"],
            ["id"=>1377, "county_id"=>47, "constituency_id"=>276, "name"=>"NGANDO"],
            ["id"=>1378, "county_id"=>47, "constituency_id"=>276, "name"=>"RIRUTA"],
            ["id"=>1379, "county_id"=>47, "constituency_id"=>276, "name"=>"UTHIRU/RUTHIMITU"],
            ["id"=>1380, "county_id"=>47, "constituency_id"=>276, "name"=>"WAITHAKA"],
            //277_LANGATA
            ["id"=>1381, "county_id"=>47, "constituency_id"=>277, "name"=>"KAREN"],
            ["id"=>1382, "county_id"=>47, "constituency_id"=>277, "name"=>"NAIROBI WEST"],
            ["id"=>1383, "county_id"=>47, "constituency_id"=>277, "name"=>"MUGUMU-INI"],
            ["id"=>1384, "county_id"=>47, "constituency_id"=>277, "name"=>"SOUTH C"],
            ["id"=>1385, "county_id"=>47, "constituency_id"=>277, "name"=>"NYAYO HIGHRISE"],
            //278_KIBRA
            ["id"=>1386, "county_id"=>47, "constituency_id"=>278, "name"=>"LAINI SABA"],
            ["id"=>1387, "county_id"=>47, "constituency_id"=>278, "name"=>"LINDI"],
            ["id"=>1388, "county_id"=>47, "constituency_id"=>278, "name"=>"MAKINA"],
            ["id"=>1389, "county_id"=>47, "constituency_id"=>278, "name"=>"WOODLEY/KENYATTA GOLF COURSE"],
            ["id"=>1390, "county_id"=>47, "constituency_id"=>278, "name"=>"SARANGOMBE"],
            //279_ROYSAMBU
            ["id"=>1391, "county_id"=>47, "constituency_id"=>279, "name"=>"GITHURAI"],
            ["id"=>1392, "county_id"=>47, "constituency_id"=>279, "name"=>"KAHAWA WEST"],
            ["id"=>1393, "county_id"=>47, "constituency_id"=>279, "name"=>"ZIMMERMAN"],
            ["id"=>1394, "county_id"=>47, "constituency_id"=>279, "name"=>"ROYSAMBU"],
            ["id"=>1395, "county_id"=>47, "constituency_id"=>279, "name"=>"KAHAWA"],
            //280_KASARANI
            ["id"=>1396, "county_id"=>47, "constituency_id"=>280, "name"=>"CLAY CITY"],
            ["id"=>1397, "county_id"=>47, "constituency_id"=>280, "name"=>"MWIKI"],
            ["id"=>1398, "county_id"=>47, "constituency_id"=>280, "name"=>"KASARANI"],
            ["id"=>1399, "county_id"=>47, "constituency_id"=>280, "name"=>"NJIRU"],
            ["id"=>1400, "county_id"=>47, "constituency_id"=>280, "name"=>"RUAI"],
            //281_RUARAKA
            ["id"=>1401, "county_id"=>47, "constituency_id"=>281, "name"=>"BABA DOGO"],
            ["id"=>1402, "county_id"=>47, "constituency_id"=>281, "name"=>"UTALII"],
            ["id"=>1403, "county_id"=>47, "constituency_id"=>281, "name"=>"MATHARE NORTH"],
            ["id"=>1404, "county_id"=>47, "constituency_id"=>281, "name"=>"LUCKY SUMMER"],
            ["id"=>1405, "county_id"=>47, "constituency_id"=>281, "name"=>"KOROGOCHO"],
            //282_EMBAKASI_SOUTH
            ["id"=>1406, "county_id"=>47, "constituency_id"=>282, "name"=>"IMARA DAIMA"],
            ["id"=>1407, "county_id"=>47, "constituency_id"=>282, "name"=>"KWA NJENGA"],
            ["id"=>1408, "county_id"=>47, "constituency_id"=>282, "name"=>"KWA REUBEN"],
            ["id"=>1409, "county_id"=>47, "constituency_id"=>282, "name"=>"PIPELINE"],
            ["id"=>1410, "county_id"=>47, "constituency_id"=>282, "name"=>"KWARE"],
            //283_EMBAKASI_NORTH
            ["id"=>1411, "county_id"=>47, "constituency_id"=>283, "name"=>"KARIOBANGI NORTH"],
            ["id"=>1412, "county_id"=>47, "constituency_id"=>283, "name"=>"DANDORA AREA I"],
            ["id"=>1413, "county_id"=>47, "constituency_id"=>283, "name"=>"DANDORA AREA II"],
            ["id"=>1414, "county_id"=>47, "constituency_id"=>283, "name"=>"DANDORA AREA III"],
            ["id"=>1415, "county_id"=>47, "constituency_id"=>283, "name"=>"DANDORA AREA IV"],
            //284_EMBAKASI_CENTRAL
            ["id"=>1416, "county_id"=>47, "constituency_id"=>284, "name"=>"KAYOLE NORTH"],
            ["id"=>1417, "county_id"=>47, "constituency_id"=>284, "name"=>"KAYOLE CENTRAL"],
            ["id"=>1418, "county_id"=>47, "constituency_id"=>284, "name"=>"KAYOLE SOUTH"],
            ["id"=>1419, "county_id"=>47, "constituency_id"=>284, "name"=>"KOMAROCK"],
            ["id"=>1420, "county_id"=>47, "constituency_id"=>284, "name"=>"MATOPENI/SPRING VALLEY"],
            //285_EMBAKASI_EAST
            ["id"=>1421, "county_id"=>47, "constituency_id"=>285, "name"=>"UPPER SAVANNAH"],
            ["id"=>1422, "county_id"=>47, "constituency_id"=>285, "name"=>"LOWER SAVANNAH"],
            ["id"=>1423, "county_id"=>47, "constituency_id"=>285, "name"=>"EMBAKASI"],
            ["id"=>1424, "county_id"=>47, "constituency_id"=>285, "name"=>"UTAWALA"],
            ["id"=>1425, "county_id"=>47, "constituency_id"=>285, "name"=>"MIHANGO"],
            //286_EMBAKASI_WEST
            ["id"=>1426, "county_id"=>47, "constituency_id"=>286, "name"=>"UMOJA I"],
            ["id"=>1427, "county_id"=>47, "constituency_id"=>286, "name"=>"UMOJA II"],
            ["id"=>1428, "county_id"=>47, "constituency_id"=>286, "name"=>"MOWLEM"],
            ["id"=>1429, "county_id"=>47, "constituency_id"=>286, "name"=>"KARIOBANGI SOUTH"],
            //287_MAKADARA
            ["id"=>1430, "county_id"=>47, "constituency_id"=>287, "name"=>"MARINGO/HAMZA"],
            ["id"=>1431, "county_id"=>47, "constituency_id"=>287, "name"=>"VIWANDANI"],
            ["id"=>1432, "county_id"=>47, "constituency_id"=>287, "name"=>"HARAMBEE"],
            ["id"=>1433, "county_id"=>47, "constituency_id"=>287, "name"=>"MAKONGENI"],
            //288_KAMUKUNJI
            ["id"=>1434, "county_id"=>47, "constituency_id"=>288, "name"=>"PUMWANI"],
            ["id"=>1435, "county_id"=>47, "constituency_id"=>288, "name"=>"EASTLEIGH NORTH"],
            ["id"=>1436, "county_id"=>47, "constituency_id"=>288, "name"=>"EASTLEIGH SOUTH"],
            ["id"=>1437, "county_id"=>47, "constituency_id"=>288, "name"=>"AIRBASE"],
            ["id"=>1438, "county_id"=>47, "constituency_id"=>288, "name"=>"CALIFORNIA"],
            //289_STAREHE
            ["id"=>1439, "county_id"=>47, "constituency_id"=>289, "name"=>"NAIROBI CENTRAL"],
            ["id"=>1440, "county_id"=>47, "constituency_id"=>289, "name"=>"NGARA"],
            ["id"=>1441, "county_id"=>47, "constituency_id"=>289, "name"=>"PANGANI"],
            ["id"=>1442, "county_id"=>47, "constituency_id"=>289, "name"=>"ZIWANI/KARIOKOR"],
            ["id"=>1443, "county_id"=>47, "constituency_id"=>289, "name"=>"LANDIMAWE"],
            ["id"=>1444, "county_id"=>47, "constituency_id"=>289, "name"=>"NAIROBI SOUTH"],
            //290_MATHARE
            ["id"=>1445, "county_id"=>47, "constituency_id"=>290, "name"=>"HOSPITAL"],
            ["id"=>1446, "county_id"=>47, "constituency_id"=>290, "name"=>"MABATINI"],
            ["id"=>1447, "county_id"=>47, "constituency_id"=>290, "name"=>"HURUMA"],
            ["id"=>1448, "county_id"=>47, "constituency_id"=>290, "name"=>"NGEI"],
            ["id"=>1449, "county_id"=>47, "constituency_id"=>290, "name"=>"MLANGO KUBWA"],
            ["id"=>1450, "county_id"=>47, "constituency_id"=>290, "name"=>"KIAMAIKO"],
         ];

         Ward::insert($items);
    }
}
