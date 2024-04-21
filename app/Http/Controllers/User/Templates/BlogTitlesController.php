<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class BlogTitlesController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlogTitlesPrompt($description, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Generate 10 catchy blog titles for:\n\n" . $description . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "قم بإنشاء 10 عناوين مدونة جذابة لـ:\n\n". $description. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容生成 10 个吸引人的博客标题：\n\n". $description. "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Generiraj 10 privlačnih naslova bloga za:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vygenerujte 10 chytlavých názvů blogů pro:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Generer 10 fængende blogtitler til:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Genereer 10 pakkende blogtitels voor:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Loo 10 meeldejäävat ajaveebi pealkirja:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo 10 tarttuvaa blogiotsikkoa:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Générez 10 titres de blog accrocheurs pour :\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Generiere 10 einprägsame Blog-Titel für:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργήστε 10 εντυπωσιακούς τίτλους ιστολογίου για:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור 10 כותרות בלוג קליטות עבור:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "10 आकर्षक ब्लॉग शीर्षक उत्पन्न करें:\n\n" .$description. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Generálj 10 fülbemászó blogcímet a következőhöz:\n\n" . $description . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til 10 grípandi bloggtitla fyrir:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Hasilkan 10 judul blog menarik untuk:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Genera 10 titoli di blog accattivanti per:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "キャッチーなブログ タイトルを 10 個生成します:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 10개의 눈길을 끄는 블로그 제목 생성:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Jana 10 tajuk blog yang menarik untuk:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Generer 10 fengende bloggtitler for:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Wygeneruj 10 chwytliwych tytułów blogów dla:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Gerar 10 títulos de blog cativantes para:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создайте 10 броских заголовков блога для:\n\n" . $description . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Generar 10 títulos de blog pegadizos para:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Generera 10 catchy bloggtitlar för:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "10 akılda kalıcı blog başlığı oluşturun:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Gerar 10 títulos de blog cativantes para:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Generează 10 titluri de blog atrăgătoare pentru:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo 10 tiêu đề blog hấp dẫn cho:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Zalisha vichwa 10 vya blogu vya kuvutia vya:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvari 10 privlačnih naslovov blogov za:\n\n" . $description. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
