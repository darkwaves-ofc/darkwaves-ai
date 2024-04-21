<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class GrammarCheckerController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGrammarCheckerPrompt($description, $language) {

        switch ($language) {
            case 'en-US':
                    $prompt = "Check and correct grammar of this text:\n\n" . $description . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "تحقق من القواعد النحوية لهذا النص وصححه:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "检查并更正此文本的语法：\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Provjeri i ispravi gramatiku ovog teksta:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Zkontrolujte a opravte gramatiku tohoto textu:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Tjek og ret grammatik af denne tekst:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Controleer en corrigeer de grammatica van deze tekst:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kontrollige ja parandage selle teksti grammatikat:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Tarkista ja korjaa tämän tekstin kielioppi:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Vérifiez et corrigez la grammaire de ce texte :\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Prüfe und korrigiere die Grammatik dieses Textes:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Ελέγξτε και διορθώστε τη γραμματική αυτού του κειμένου:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "בדוק ותקן את הדקדוק של הטקסט הזה:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस पाठ का व्याकरण जांचें और सही करें:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Ellenőrizze és javítsa ki ennek a szövegnek a nyelvtanát:\n\n" . $description . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Athugaðu og leiðréttu málfræði þessa texta:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Periksa dan perbaiki tata bahasa teks ini:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Controlla e correggi la grammatica di questo testo:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "このテキストの文法を確認して修正してください:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 텍스트의 문법을 확인하고 수정하십시오:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt ="Semak dan betulkan tatabahasa teks ini:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Sjekk og korriger grammatikken til denne teksten:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Sprawdź i popraw gramatykę tego tekstu:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Verifique e corrija a gramática deste texto:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Проверьте и исправьте грамматику этого текста:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Revise y corrija la gramática de este texto:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Kontrollera och korrigera grammatiken för denna text:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu metnin gramerini kontrol edin ve düzeltin:\n\n" . $description . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Verifique e corrija a gramática deste texto:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Verificați și corectați gramatica acestui text:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Kiểm tra và sửa ngữ pháp của văn bản này:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Angalia na urekebishe sarufi ya maandishi haya:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Preveri in popravi slovnico tega besedila:\n\n" . $description . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
