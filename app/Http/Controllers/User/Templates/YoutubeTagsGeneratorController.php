<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class YoutubeTagsGeneratorController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createYoutubeTagsGeneratorPrompt($title, $language) {
        
        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return false;

        switch ($language) {
            case 'en-US':
                    $prompt = "Generate SEO-optimized YouTube tags and keywords for:\n\n" . $title . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "إنشاء علامات وكلمات رئيسية على YouTube مُحسّنة لتحسين محركات البحث لـ:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容生成针对 SEO 优化的 YouTube 标签和关键字：\n\n"  . $title . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Generiraj SEO-optimizirane YouTube oznake i ključne riječi za:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Generujte značky a klíčová slova YouTube optimalizované pro SEO pro:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Generer SEO-optimerede YouTube-tags og søgeord til:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Genereer SEO-geoptimaliseerde YouTube-tags en trefwoorden voor:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "SEO jaoks optimeeritud YouTube'i märgendite ja märksõnade loomine:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo SEO-optimoituja YouTube-tageja ja avainsanoja:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Générez des balises et des mots clés YouTube optimisés pour le référencement pour :\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Generiere SEO-optimierte YouTube-Tags und Keywords für:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργήστε ετικέτες και λέξεις-κλειδιά YouTube βελτιστοποιημένες για SEO για:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור תגיות YouTube ומילות מפתח מותאמות לקידום אתרים עבור:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इनके लिए SEO-अनुकूलित YouTube टैग और कीवर्ड जनरेट करें:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "SEO-optimalizált YouTube-címkék és kulcsszavak létrehozása a következőkhöz:\n\n" . $title . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búðu til SEO-bjartsýni YouTube merki og leitarorð fyrir:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Buat tag dan kata kunci YouTube yang dioptimalkan untuk SEO untuk:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Genera tag e parole chiave YouTube ottimizzati per la SEO per:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "SEO 用に最適化された YouTube タグとキーワードを生成します:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "SEO에 최적화된 YouTube 태그 및 키워드 생성:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Jana teg dan kata kunci YouTube yang dioptimumkan SEO untuk:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Generer SEO-optimaliserte YouTube-tagger og søkeord for:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Wygeneruj zoptymalizowane pod kątem SEO tagi i słowa kluczowe YouTube dla:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Gerar tags e palavras-chave do YouTube otimizadas para SEO para:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создать SEO-оптимизированные теги и ключевые слова YouTube для:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Generar etiquetas y palabras clave de YouTube optimizadas para SEO para:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Zalisha lebo za YouTube zilizoboreshwa na SEO na maneno muhimu ya:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunlar için SEO için optimize edilmiş YouTube etiketleri ve anahtar kelimeler oluşturun:\n\n" . $title . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Gerar tags e palavras-chave do YouTube otimizadas para SEO para:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Generează etichete și cuvinte cheie YouTube optimizate pentru SEO pentru:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo thẻ và từ khóa YouTube được tối ưu hóa cho SEO cho:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Zalisha lebo za YouTube zilizoboreshwa na SEO na maneno muhimu ya:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvari YouTube oznake in ključne besede, optimizirane za SEO za:\n\n" . $title . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
