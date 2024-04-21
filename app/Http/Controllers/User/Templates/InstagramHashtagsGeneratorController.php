<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class InstagramHashtagsGeneratorController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createInstagramHashtagsPrompt($keyword, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Find the best hashtags to use for this Instagram keyword:\n\n" . $keyword . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "ابحث عن أفضل علامات التصنيف لاستخدامها لهذه الكلمة الأساسية في Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "找到用于此 Instagram 关键字的最佳主题标签：\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Pronađite najbolje hashtagove za ovu ključnu riječ za Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Najděte nejlepší hashtagy pro toto klíčové slovo na Instagramu:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Find de bedste hashtags til dette Instagram-søgeord:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Vind de beste hashtags om te gebruiken voor dit Instagram-trefwoord:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Leia parimad hashtagid, mida selle Instagrami märksõna jaoks kasutada:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Etsi parhaat hashtagit tälle Instagram-avainsanalle:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Trouvez les meilleurs hashtags à utiliser pour ce mot clé Instagram :\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Finde die besten Hashtags für dieses Instagram-Keyword:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Βρείτε τα καλύτερα hashtags για χρήση για αυτήν τη λέξη-κλειδί Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "מצא את ההאשטאגים הטובים ביותר לשימוש עבור מילת המפתח הזו באינסטגרם:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस Instagram कीवर्ड के लिए उपयोग करने के लिए सर्वोत्तम हैशटैग खोजें:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Keresse meg az ehhez az Instagram-kulcsszóhoz használható legjobb hashtageket:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Finndu bestu myllumerkin til að nota fyrir þetta Instagram leitarorð:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Temukan tagar terbaik untuk digunakan untuk kata kunci Instagram ini:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Trova i migliori hashtag da utilizzare per questa parola chiave di Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "この Instagram キーワードに使用するのに最適なハッシュタグを見つけてください:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 Instagram 키워드에 사용할 최고의 해시태그 찾기:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Cari hashtag terbaik untuk digunakan untuk kata kunci Instagram ini:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Finn de beste hashtaggene du kan bruke for dette Instagram-søkeordet:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Znajdź najlepsze hashtagi do użycia dla tego słowa kluczowego na Instagramie:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Encontre as melhores hashtags para usar com esta palavra-chave do Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Найдите лучшие хэштеги для этого ключевого слова Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Encuentra los mejores hashtags para usar con esta palabra clave de Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Hitta de bästa hashtaggarna att använda för detta Instagram-sökord:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu Instagram anahtar kelimesi için kullanılacak en iyi etiketleri bulun:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Encontre as melhores hashtags para usar com esta palavra-chave do Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Găsiți cele mai bune hashtag-uri de folosit pentru acest cuvânt cheie Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tìm các thẻ bắt đầu bằng # tốt nhất để sử dụng cho từ khóa Instagram này:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Tafuta lebo za reli bora za kutumia kwa neno kuu la Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Poiščite najboljše hashtage za to ključno besedo za Instagram:\n\n" . $keyword . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
