<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Add
use App\Models\Other\Constituency;

class ConstituencySeeder extends Seeder
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
            ["id"=> 1, "county_id"=>1, "name"=>"CHANGAMWE"],
            ["id"=> 2, "county_id"=>1, "name"=>"JOMVU"],
            ["id"=> 3, "county_id"=>1, "name"=>"KISAUNI"],
            ["id"=> 4, "county_id"=>1, "name"=>"NYALI"],
            ["id"=> 5, "county_id"=>1, "name"=>"LIKONI"],
            ["id"=> 6, "county_id"=>1, "name"=>"MVITA"],
            //02_Kwale
            ["id"=> 7, "county_id"=>2, "name"=>"MSAMBWENI"],
            ["id"=> 8, "county_id"=>2, "name"=>"LUNGALUNGA"],
            ["id"=> 9, "county_id"=>2, "name"=>"MATUGA"],
            ["id"=>10, "county_id"=>2, "name"=>"KINANGO"],
            //03_Kilifi
            ["id"=>11, "county_id"=>3, "name"=>"KILIFI NORTH"],
            ["id"=>12, "county_id"=>3, "name"=>"KILIFI SOUTH"],
            ["id"=>13, "county_id"=>3, "name"=>"KALOLENI"],
            ["id"=>14, "county_id"=>3, "name"=>"RABAI"],
            ["id"=>15, "county_id"=>3, "name"=>"GANZE"],
            ["id"=>16, "county_id"=>3, "name"=>"MALINDI"],
            ["id"=>17, "county_id"=>3, "name"=>"MAGARINI"],
            //04_TanaRiver
            ["id"=>18, "county_id"=>4,"name"=>"GARSEN"],
            ["id"=>19, "county_id"=>4,"name"=>"GALOLE"],
            ["id"=>20, "county_id"=>4,"name"=>"BURA"],
            //05_Lamu
            ["id"=>21, "county_id"=>5, "name"=>"LAMU EAST"],
            ["id"=>22, "county_id"=>5, "name"=>"LAMU WEST"],
            //06_TaitaTaveta
            ["id"=>23, "county_id"=>6, "name"=>"TAVETA"],
            ["id"=>24, "county_id"=>6, "name"=>"WUNDANYI"],
            ["id"=>25, "county_id"=>6, "name"=>"MWATATE"],
            ["id"=>26, "county_id"=>6, "name"=>"VOI"],
            //07_Garissa
            ["id"=>27, "county_id"=>7, "name"=>"GARISSA TOWNSHIP"],
            ["id"=>28, "county_id"=>7, "name"=>"BALAMBALA"],
            ["id"=>29, "county_id"=>7, "name"=>"LAGDERA"],
            ["id"=>30, "county_id"=>7, "name"=>"DADAAB"],
            ["id"=>31, "county_id"=>7, "name"=>"FAFI"],
            ["id"=>32, "county_id"=>7, "name"=>"IJARA"],
            //08_Wajir
            ["id"=>33, "county_id"=>8, "name"=>"WAJIR NORTH"],
            ["id"=>34, "county_id"=>8, "name"=>"WAJIR EAST"],
            ["id"=>35, "county_id"=>8, "name"=>"TARBAJ"],
            ["id"=>36, "county_id"=>8, "name"=>"WAJIR WEST"],
            ["id"=>37, "county_id"=>8, "name"=>"ELDAS"],
            ["id"=>38, "county_id"=>8, "name"=>"WAJIR SOUTH"],
            //09_Mandera
            ["id"=>39, "county_id"=>9, "name"=>"MANDERA WEST"],
            ["id"=>40, "county_id"=>9, "name"=>"BANISSA"],
            ["id"=>41, "county_id"=>9, "name"=>"MANDERA NORTH"],
            ["id"=>42, "county_id"=>9, "name"=>"MANDERA SOUTH"],
            ["id"=>43, "county_id"=>9, "name"=>"MANDERA EAST"],
            ["id"=>44, "county_id"=>9, "name"=>"LAFEY"],
             //10_Marsabit
            ["id"=>45, "county_id"=>10, "name"=>"MOYALE"],
            ["id"=>46, "county_id"=>10, "name"=>"NORTH HORR"],
            ["id"=>47, "county_id"=>10, "name"=>"SAKU"],
            ["id"=>48, "county_id"=>10, "name"=>"LAISAMIS"],
            //11_Isiolo
            ["id"=>49, "county_id"=>11, "name"=>"ISIOLO NORTH"],
            ["id"=>50, "county_id"=>11, "name"=>"ISIOLO SOUTH"],
            //12_Meru
            ["id"=>51, "county_id"=>12, "name"=>"IGEMBE SOUTH"],
            ["id"=>52, "county_id"=>12, "name"=>"IGEMBE CENTRAL"],
            ["id"=>53, "county_id"=>12, "name"=>"IGEMBE NORTH"],
            ["id"=>54, "county_id"=>12, "name"=>"TIGANIA WEST"],
            ["id"=>55, "county_id"=>12, "name"=>"TIGANIA EAST"],
            ["id"=>56, "county_id"=>12, "name"=>"NORTH IMENTI"],
            ["id"=>57, "county_id"=>12, "name"=>"BUURI"],
            ["id"=>58, "county_id"=>12, "name"=>"CENTRAL IMENTI"],
            ["id"=>59, "county_id"=>12, "name"=>"SOUTH IMENTI"],
            //13_TharakaNithi
            ["id"=>60, "county_id"=>13, "name"=>"MAARA"],
            ["id"=>61, "county_id"=>13, "name"=>"CHUKA/IGAMBANG'OMBE"],
            ["id"=>62, "county_id"=>13, "name"=>"THARAKA"],
            //14_Embu
            ["id"=>63, "county_id"=>14, "name"=>"MANYATTA"],
            ["id"=>64, "county_id"=>14, "name"=>"RUNYENJES"],
            ["id"=>65, "county_id"=>14, "name"=>"MBEERE SOUTH"],
            ["id"=>66, "county_id"=>14, "name"=>"MBEERE NORTH"],
            //15_Kitui
            ["id"=>67, "county_id"=>15, "name"=>"MWINGI NORTH"],
            ["id"=>68, "county_id"=>15, "name"=>"MWINGI WEST"],
            ["id"=>69, "county_id"=>15, "name"=>"MWINGI CENTRAL"],
            ["id"=>70, "county_id"=>15, "name"=>"KITUI WEST"],
            ["id"=>71, "county_id"=>15, "name"=>"KITUI RURAL"],
            ["id"=>72, "county_id"=>15, "name"=>"KITUI CENTRAL"],
            ["id"=>73, "county_id"=>15, "name"=>"KITUI EAST"],
            ["id"=>74, "county_id"=>15, "name"=>"KITUI SOUTH"],
            //16_Machakos
            ["id"=>75, "county_id"=>16, "name"=>"MASINGA"],
            ["id"=>76, "county_id"=>16, "name"=>"YATTA"],
            ["id"=>77, "county_id"=>16, "name"=>"KANGUNDO"],
            ["id"=>78, "county_id"=>16, "name"=>"MATUNGULU"],
            ["id"=>79, "county_id"=>16, "name"=>"KATHIANI"],
            ["id"=>80, "county_id"=>16, "name"=>"MAVOKO"],
            ["id"=>81, "county_id"=>16, "name"=>"MACHAKOS TOWN"],
            ["id"=>82, "county_id"=>16, "name"=>"MWALA"],
            //17_Makueni
            ["id"=>83, "county_id"=>17, "name"=>"MBOONI"],
            ["id"=>84, "county_id"=>17, "name"=>"KILOME"],
            ["id"=>85, "county_id"=>17, "name"=>"KAITI"],
            ["id"=>86, "county_id"=>17, "name"=>"MAKUENI"],
            ["id"=>87, "county_id"=>17, "name"=>"KIBWEZI WEST"],
            ["id"=>88, "county_id"=>17, "name"=>"KIBWEZI EAST"],
            //18_Nyandarua
            ["id"=>89, "county_id"=>18, "name"=>"KINANGOP"],
            ["id"=>90, "county_id"=>18, "name"=>"KIPIPIRI"],
            ["id"=>91, "county_id"=>18, "name"=>"OL KALOU"],
            ["id"=>92, "county_id"=>18, "name"=>"OL JOROK"],
            ["id"=>93, "county_id"=>18, "name"=>"NDARAGWA"],
            //19_Nyeri
            ["id"=>94, "county_id"=>19, "name"=>"TETU"],
            ["id"=>95, "county_id"=>19, "name"=>"KIENI"],
            ["id"=>96, "county_id"=>19, "name"=>"MATHIRA"],
            ["id"=>97, "county_id"=>19, "name"=>"OTHAYA"],
            ["id"=>98, "county_id"=>19, "name"=>"MUKURWEINI"],
            ["id"=>99, "county_id"=>19, "name"=>"NYERI TOWN"],
            //20_Kirinyaga
            ["id"=>100, "county_id"=>20, "name"=>"MWEA"],
            ["id"=>101, "county_id"=>20, "name"=>"GICHUGU"],
            ["id"=>102, "county_id"=>20, "name"=>"NDIA"],
            ["id"=>103, "county_id"=>20, "name"=>"KIRINYAGA CENTRAL"],
            //21_Muranga
            ["id"=>104, "county_id"=>21, "name"=>"KANGEMA"],
            ["id"=>105, "county_id"=>21, "name"=>"MATHIOYA"],
            ["id"=>106, "county_id"=>21, "name"=>"KIHARU"],
            ["id"=>107, "county_id"=>21, "name"=>"KIGUMO"],
            ["id"=>108, "county_id"=>21, "name"=>"MARAGWA"],
            ["id"=>109, "county_id"=>21, "name"=>"KANDARA"],
            ["id"=>110, "county_id"=>21, "name"=>"GATANGA"],
            //22_Kiambu
            ["id"=>111, "county_id"=>22, "name"=>"GATUNDU SOUTH"],
            ["id"=>112, "county_id"=>22, "name"=>"GATUNDU NORTH"],
            ["id"=>113, "county_id"=>22, "name"=>"JUJA"],
            ["id"=>114, "county_id"=>22, "name"=>"THIKA TOWN"],
            ["id"=>115, "county_id"=>22, "name"=>"RUIRU"],
            ["id"=>116, "county_id"=>22, "name"=>"GITHUNGURI"],
            ["id"=>117, "county_id"=>22, "name"=>"KIAMBU"],
            ["id"=>118, "county_id"=>22, "name"=>"KIAMBAA"],
            ["id"=>119, "county_id"=>22, "name"=>"KABETE"],
            ["id"=>120, "county_id"=>22, "name"=>"KIKUYU"],
            ["id"=>121, "county_id"=>22, "name"=>"LIMURU"],
            ["id"=>122, "county_id"=>22, "name"=>"LARI"],
            //23_Turkana
            ["id"=>123, "county_id"=>23, "name"=>"TURKANA NORTH"],
            ["id"=>124, "county_id"=>23, "name"=>"TURKANA WEST"],
            ["id"=>125, "county_id"=>23, "name"=>"TURKANA CENTRAL"],
            ["id"=>126, "county_id"=>23, "name"=>"LOIMA"],
            ["id"=>127, "county_id"=>23, "name"=>"TURKANA SOUTH"],
            ["id"=>128, "county_id"=>23, "name"=>"TURKANA EAST"],
            //24_WestPokot
            ["id"=>129, "county_id"=>24, "name"=>"KAPENGURIA"],
            ["id"=>130, "county_id"=>24, "name"=>"SIGOR"],
            ["id"=>131, "county_id"=>24, "name"=>"KACHELIBA"],
            ["id"=>132, "county_id"=>24, "name"=>"POKOT SOUTH"],
            //25_Samburu
            ["id"=>133, "county_id"=>25, "name"=>"SAMBURU WEST"],
            ["id"=>134, "county_id"=>25, "name"=>"SAMBURU NORTH"],
            ["id"=>135, "county_id"=>25, "name"=>"SAMBURU EAST"],
            //26_TransNzoia
            ["id"=>136, "county_id"=>26, "name"=>"KWANZA"],
            ["id"=>137, "county_id"=>26, "name"=>"ENDEBESS"],
            ["id"=>138, "county_id"=>26, "name"=>"SABOTI"],
            ["id"=>139, "county_id"=>26, "name"=>"KIMININI"],
            ["id"=>140, "county_id"=>26, "name"=>"CHERANGANY"],
            //27_UasinGishu
            ["id"=>141, "county_id"=>27, "name"=>"SOY"],
            ["id"=>142, "county_id"=>27, "name"=>"TURBO"],
            ["id"=>143, "county_id"=>27, "name"=>"MOIBEN"],
            ["id"=>144, "county_id"=>27, "name"=>"AINABKOI"],
            ["id"=>145, "county_id"=>27, "name"=>"KAPSERET"],
            ["id"=>146, "county_id"=>27, "name"=>"KESSES"],
            //28_ElgeyoMarakwet
            ["id"=>147, "county_id"=>28, "name"=>"MARAKWET EAST"],
            ["id"=>148, "county_id"=>28, "name"=>"MARAKWET WEST"],
            ["id"=>149, "county_id"=>28, "name"=>"KEIYO NORTH"],
            ["id"=>150, "county_id"=>28, "name"=>"KEIYO SOUTH"],
            //29_Nandi
            ["id"=>151, "county_id"=>29, "name"=>"TINDERET"],
            ["id"=>152, "county_id"=>29, "name"=>"ALDAI"],
            ["id"=>153, "county_id"=>29, "name"=>"NANDI HILLS"],
            ["id"=>154, "county_id"=>29, "name"=>"CHESUMEI"],
            ["id"=>155, "county_id"=>29, "name"=>"EMGWEN"],
            ["id"=>156, "county_id"=>29, "name"=>"MOSOP"],
            //30_Baringo
            ["id"=>157, "county_id"=>30, "name"=>"TIATY"],
            ["id"=>158, "county_id"=>30, "name"=>"BARINGO  NORTH"],
            ["id"=>159, "county_id"=>30, "name"=>"BARINGO CENTRAL"],
            ["id"=>160, "county_id"=>30, "name"=>"BARINGO SOUTH"],
            ["id"=>161, "county_id"=>30, "name"=>"MOGOTIO"],
            ["id"=>162, "county_id"=>30, "name"=>"ELDAMA RAVINE"],
            //31_Laikipia
            ["id"=>163, "county_id"=>31, "name"=>"LAIKIPIA WEST"],
            ["id"=>164, "county_id"=>31, "name"=>"LAIKIPIA EAST"],
            ["id"=>165, "county_id"=>31, "name"=>"LAIKIPIA NORTH"],
            //32_Nakuru
            ["id"=>166, "county_id"=>32, "name"=>"MOLO"],
            ["id"=>167, "county_id"=>32, "name"=>"NJORO"],
            ["id"=>168, "county_id"=>32, "name"=>"NAIVASHA"],
            ["id"=>169, "county_id"=>32, "name"=>"GILGIL"],
            ["id"=>170, "county_id"=>32, "name"=>"KURESOI SOUTH"],
            ["id"=>171, "county_id"=>32, "name"=>"KURESOI NORTH"],
            ["id"=>172, "county_id"=>32, "name"=>"SUBUKIA"],
            ["id"=>173, "county_id"=>32, "name"=>"RONGAI"],
            ["id"=>174, "county_id"=>32, "name"=>"BAHATI"],
            ["id"=>175, "county_id"=>32, "name"=>"NAKURU TOWN WEST"],
            ["id"=>176, "county_id"=>32, "name"=>"NAKURU TOWN EAST"],
            //33_Narok
            ["id"=>177, "county_id"=>33, "name"=>"KILGORIS"],
            ["id"=>178, "county_id"=>33, "name"=>"EMURUA DIKIRR"],
            ["id"=>179, "county_id"=>33, "name"=>"NAROK NORTH"],
            ["id"=>180, "county_id"=>33, "name"=>"NAROK EAST"],
            ["id"=>181, "county_id"=>33, "name"=>"NAROK SOUTH"],
            ["id"=>182, "county_id"=>33, "name"=>"NAROK WEST"],
            //34_Kajiado
            ["id"=>183, "county_id"=>34, "name"=>"KAJIADO NORTH"],
            ["id"=>184, "county_id"=>34, "name"=>"KAJIADO CENTRAL"],
            ["id"=>185, "county_id"=>34, "name"=>"KAJIADO EAST"],
            ["id"=>186, "county_id"=>34, "name"=>"KAJIADO WEST"],
            ["id"=>187, "county_id"=>34, "name"=>"KAJIADO SOUTH"],
            //35_Kericho
            ["id"=>188, "county_id"=>35, "name"=>"KIPKELION EAST"],
            ["id"=>189, "county_id"=>35, "name"=>"KIPKELION WEST"],
            ["id"=>190, "county_id"=>35, "name"=>"AINAMOI"],
            ["id"=>191, "county_id"=>35, "name"=>"BURETI"],
            ["id"=>192, "county_id"=>35, "name"=>"BELGUT"],
            ["id"=>193, "county_id"=>35, "name"=>"SIGOWET/SOIN"],
            //36_Bomet
            ["id"=>194, "county_id"=>36, "name"=>"SOTIK"],
            ["id"=>195, "county_id"=>36, "name"=>"CHEPALUNGU"],
            ["id"=>196, "county_id"=>36, "name"=>"BOMET EAST"],
            ["id"=>197, "county_id"=>36, "name"=>"BOMET CENTRAL"],
            ["id"=>198, "county_id"=>36, "name"=>"KONOIN"],
            //37_Kakamega
            ["id"=>199, "county_id"=>37, "name"=>"LUGARI"],
            ["id"=>200, "county_id"=>37, "name"=>"LIKUYANI"],
            ["id"=>201, "county_id"=>37, "name"=>"MALAVA"],
            ["id"=>202, "county_id"=>37, "name"=>"LURAMBI"],
            ["id"=>203, "county_id"=>37, "name"=>"NAVAKHOLO"],
            ["id"=>204, "county_id"=>37, "name"=>"MUMIAS WEST"],
            ["id"=>205, "county_id"=>37, "name"=>"MUMIAS EAST"],
            ["id"=>206, "county_id"=>37, "name"=>"MATUNGU"],
            ["id"=>207, "county_id"=>37, "name"=>"BUTERE"],
            ["id"=>208, "county_id"=>37, "name"=>"KHWISERO"],
            ["id"=>209, "county_id"=>37, "name"=>"SHINYALU"],
            ["id"=>210, "county_id"=>37, "name"=>"IKOLOMANI"],
            //38_Vihiga
            ["id"=>211, "county_id"=>38, "name"=>"VIHIGA"],
            ["id"=>212, "county_id"=>38, "name"=>"SABATIA"],
            ["id"=>213, "county_id"=>38, "name"=>"HAMISI"],
            ["id"=>214, "county_id"=>38, "name"=>"LUANDA"],
            ["id"=>215, "county_id"=>38, "name"=>"EMUHAYA"],
            //39_Bungoma
            ["id"=>216, "county_id"=>39, "name"=>"MT.ELGON"],
            ["id"=>217, "county_id"=>39, "name"=>"SIRISIA"],
            ["id"=>218, "county_id"=>39, "name"=>"KABUCHAI"],
            ["id"=>219, "county_id"=>39, "name"=>"BUMULA"],
            ["id"=>220, "county_id"=>39, "name"=>"KANDUYI"],
            ["id"=>221, "county_id"=>39, "name"=>"WEBUYE EAST"],
            ["id"=>222, "county_id"=>39, "name"=>"WEBUYE WEST"],
            ["id"=>223, "county_id"=>39, "name"=>"KIMILILI"],
            ["id"=>224, "county_id"=>39, "name"=>"TONGAREN"],
            //40_Busia
            ["id"=>225, "county_id"=>40, "name"=>"TESO NORTH"],
            ["id"=>226, "county_id"=>40, "name"=>"TESO SOUTH"],
            ["id"=>227, "county_id"=>40, "name"=>"NAMBALE"],
            ["id"=>228, "county_id"=>40, "name"=>"MATAYOS"],
            ["id"=>229, "county_id"=>40, "name"=>"BUTULA"],
            ["id"=>230, "county_id"=>40, "name"=>"FUNYULA"],
            ["id"=>231, "county_id"=>40, "name"=>"BUDALANGI"],
            //41_Siaya
            ["id"=>232, "county_id"=>41, "name"=>"UGENYA"],
            ["id"=>233, "county_id"=>41, "name"=>"UGUNJA"],
            ["id"=>234, "county_id"=>41, "name"=>"ALEGO USONGA"],
            ["id"=>235, "county_id"=>41, "name"=>"GEM"],
            ["id"=>236, "county_id"=>41, "name"=>"BONDO"],
            ["id"=>237, "county_id"=>41, "name"=>"RARIEDA"],
            //42_Kisumu
            ["id"=>238, "county_id"=>42, "name"=>"KISUMU EAST"],
            ["id"=>239, "county_id"=>42, "name"=>"KISUMU WEST"],
            ["id"=>240, "county_id"=>42, "name"=>"KISUMU CENTRAL"],
            ["id"=>241, "county_id"=>42, "name"=>"SEME"],
            ["id"=>242, "county_id"=>42, "name"=>"NYANDO"],
            ["id"=>243, "county_id"=>42, "name"=>"MUHORONI"],
            ["id"=>244, "county_id"=>42, "name"=>"NYAKACH"],
            //43_HomaBay
            ["id"=>245, "county_id"=>43, "name"=>"KASIPUL"],
            ["id"=>246, "county_id"=>43, "name"=>"KABONDO KASIPUL"],
            ["id"=>247, "county_id"=>43, "name"=>"KARACHUONYO"],
            ["id"=>248, "county_id"=>43, "name"=>"RANGWE"],
            ["id"=>249, "county_id"=>43, "name"=>"HOMA BAY TOWN"],
            ["id"=>250, "county_id"=>43, "name"=>"NDHIWA"],
            ["id"=>251, "county_id"=>43, "name"=>"SUBA NORTH"],
            ["id"=>252, "county_id"=>43, "name"=>"SUBA SOUTH"],
            //44_Migori
            ["id"=>253, "county_id"=>44, "name"=>"RONGO"],
            ["id"=>254, "county_id"=>44, "name"=>"AWENDO"],
            ["id"=>255, "county_id"=>44, "name"=>"SUNA EAST"],
            ["id"=>256, "county_id"=>44, "name"=>"SUNA WEST"],
            ["id"=>257, "county_id"=>44, "name"=>"URIRI"],
            ["id"=>258, "county_id"=>44, "name"=>"NYATIKE"],
            ["id"=>259, "county_id"=>44, "name"=>"KURIA WEST"],
            ["id"=>260, "county_id"=>44, "name"=>"KURIA EAST"],
            //45_Kisii
            ["id"=>261, "county_id"=>45, "name"=>"BONCHARI"],
            ["id"=>262, "county_id"=>45, "name"=>"SOUTH MUGIRANGO"],
            ["id"=>263, "county_id"=>45, "name"=>"BOMACHOGE BORABU"],
            ["id"=>264, "county_id"=>45, "name"=>"BOBASI"],
            ["id"=>265, "county_id"=>45, "name"=>"BOMACHOGE CHACHE"],
            ["id"=>266, "county_id"=>45, "name"=>"NYARIBARI MASABA"],
            ["id"=>267, "county_id"=>45, "name"=>"NYARIBARI CHACHE"],
            ["id"=>268, "county_id"=>45, "name"=>"KITUTU CHACHE NORTH"],
            ["id"=>269, "county_id"=>45, "name"=>"KITUTU CHACHE SOUTH"],
            //46_Nyamira
            ["id"=>270, "county_id"=>46, "name"=>"KITUTU MASABA"],
            ["id"=>271, "county_id"=>46, "name"=>"WEST MUGIRANGO"],
            ["id"=>272, "county_id"=>46, "name"=>"NORTH MUGIRANGO"],
            ["id"=>273, "county_id"=>46, "name"=>"BORABU"],
            //47_Nairobi
            ["id"=>274, "county_id"=>47, "name"=>"WESTLANDS"],
            ["id"=>275, "county_id"=>47, "name"=>"DAGORETTI NORTH"],
            ["id"=>276, "county_id"=>47, "name"=>"DAGORETTI SOUTH"],
            ["id"=>277, "county_id"=>47, "name"=>"LANGATA"],
            ["id"=>278, "county_id"=>47, "name"=>"KIBRA"],
            ["id"=>279, "county_id"=>47, "name"=>"ROYSAMBU"],
            ["id"=>280, "county_id"=>47, "name"=>"KASARANI"],
            ["id"=>281, "county_id"=>47, "name"=>"RUARAKA"],
            ["id"=>282, "county_id"=>47, "name"=>"EMBAKASI SOUTH"],
            ["id"=>283, "county_id"=>47, "name"=>"EMBAKASI NORTH"],
            ["id"=>284, "county_id"=>47, "name"=>"EMBAKASI CENTRAL"],
            ["id"=>285, "county_id"=>47, "name"=>"EMBAKASI EAST"],
            ["id"=>286, "county_id"=>47, "name"=>"EMBAKASI WEST"],
            ["id"=>287, "county_id"=>47, "name"=>"MAKADARA"],
            ["id"=>288, "county_id"=>47, "name"=>"KAMUKUNJI"],
            ["id"=>289, "county_id"=>47, "name"=>"STAREHE"],
            ["id"=>290, "county_id"=>47, "name"=>"MATHARE"],
         ];

         Constituency::insert($items);
    }
}
