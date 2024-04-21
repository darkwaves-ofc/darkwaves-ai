<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ContentRewriterController extends Controller
{
    use VoiceToneTrait;

     /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createContentRewriterPrompt($title, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Improve and rewrite the text in a creative and smart way:\n\n" . $title . "\n\n Tone of voice of the result must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "تحسين وإعادة كتابة النص بطريقة إبداعية وذكية:\n\n". $title. "\n\nيجب أن تكون نبرة صوت النتيجة:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "以创造性和聪明的方式改进和重写文本：\n\n". $title. "\n\n 结果的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Poboljšajte i prepišite tekst na kreativan i pametan način:\n\n" . $title. "\n\n Ton glasa rezultata mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vylepšete a přepište text kreativním a chytrým způsobem:\n\n" . $title . "\n\n Tón hlasu výsledku musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Forbedre og omskriv teksten på en kreativ og smart måde:\n\n" . $title. "\n\n Tonen i resultatet skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Verbeter en herschrijf de tekst op een creatieve en slimme manier:\n\n" . $title . "\n\n Tone of voice van het resultaat moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Täiustage ja kirjutage teksti loominguliselt ja nutikalt ümber:\n\n" . $title . "\n\n Tulemuse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Paranna ja kirjoita tekstiä uudelleen luovalla ja älykkäällä tavalla:\n\n" . $title . "\n\n Tuloksen äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Améliorez et réécrivez le texte de manière créative et intelligente :\n\n" . $title . "\n\n Le ton de la voix du résultat doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Verbessern und überarbeiten Sie den Text auf kreative und intelligente Weise:\n\n" . $title . "\n\n Tonfall des Ergebnisses muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Βελτιώστε και ξαναγράψτε το κείμενο με δημιουργικό και έξυπνο τρόπο:\n\n" . $title . "\n\n Ο τόνος της φωνής του αποτελέσματος πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "שפר ושכתב את הטקסט בצורה יצירתית וחכמה:\n\n" . $title . "\n\n גוון הקול של התוצאה חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "रचनात्मक और स्मार्ट तरीके से टेक्स्ट को सुधारें और फिर से लिखें:\n\n" .$title. "\n\n परिणाम की आवाज़ का स्वर होना चाहिए:\n" .$tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Javítsa és írja át a szöveget kreatív és okos módon:\n\n" . $title . "\n\n Az eredmény hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Bættu og endurskrifaðu textann á skapandi og snjallan hátt:\n\n" . $title. "\n\n Röddtónn niðurstöðunnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tingkatkan dan tulis ulang teks dengan cara yang kreatif dan cerdas:\n\n" . $title . "\n\n Nada suara hasil harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Migliora e riscrivi il testo in modo creativo e intelligente:\n\n" . $title . "\n\n Il tono di voce del risultato deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "創造的かつスマートな方法でテキストを改善および書き直します:\n\n" . $title. "\n\n 結果の声の調子:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "창의적이고 스마트한 방식으로 텍스트를 개선하고 다시 작성:\n\n" . $title. "\n\n 결과의 음성 톤은 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tingkatkan dan tulis semula teks dengan cara yang kreatif dan pintar:\n\n" . $title . "\n\n Nada suara hasil carian mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Forbedre og omskriv teksten på en kreativ og smart måte:\n\n" . $title . "\n\n Tonen til resultatet må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Popraw i przepisz tekst w kreatywny i inteligentny sposób:\n\n" . $title . "\n\n Ton głosu wyniku musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Melhorar e reescrever o texto de forma criativa e inteligente:\n\n" . $title . "\n\n Tom de voz do resultado deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Улучшите и перепишите текст творчески и по-умному:\n\n" . $title . "\n\n Тон голоса результата должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Mejora y reescribe el texto de forma creativa e inteligente:\n\n" . $title . "\n\n El tono de voz del resultado debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Förbättra och skriv om texten på ett kreativt och smart sätt:\n\n" . $title . "\n\n Tonen i resultatet måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Metni yaratıcı ve akıllı bir şekilde iyileştirin ve yeniden yazın:\n\n" . $title. "\n\n Sonucun ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Melhorar e reescrever o texto de forma criativa e inteligente:\n\n" . $title . "\n\n Tom de voz do resultado deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Îmbunătățiți și rescrieți textul într-un mod creativ și inteligent:\n\n" . $title . "\n\n Tonul vocii rezultatului trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Cải thiện và viết lại văn bản một cách sáng tạo và thông minh:\n\n" . $title . "\n\n Giọng điệu của kết quả phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Boresha na uandike upya maandishi kwa njia ya kibunifu na ya busara:\n\n" . $title. "\n\n Toni ya sauti ya matokeo lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Izboljšajte in prepišite besedilo na kreativen in pameten način:\n\n" . $title. "\n\n Ton glasu rezultata mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
