<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class InstagramCaptionsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createInstagramCaptionsPrompt($description, $language, $tone) {
        
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
                    $prompt = "Grab attention with catchy captions for this Instagram post:\n\n" . $description . "\n\nTone of voice of the captions must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اجذب الانتباه باستخدام التسميات التوضيحية الجذابة لمشاركة Instagram هذه:\n\n".$description. "\n\nيجب أن تكون نغمة صوت التسميات التوضيحية:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为这条 Instagram 帖子添加朗朗上口的标题以吸引注意力：\n\n". $description. "\n\n字幕的语调必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Privucite pažnju privlačnim natpisima za ovu objavu na Instagramu:\n\n" . $description. "\n\nTon glasa titlova mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Přitáhněte pozornost chytlavými titulky k tomuto příspěvku na Instagramu:\n\n" . $description. "\n\nTón hlasu titulků musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Fang opmærksomhed med fængende billedtekster til dette Instagram-opslag:\n\n" . $description. "\n\nTelefonen for billedteksterne skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Trek de aandacht met pakkende bijschriften voor dit Instagram-bericht:\n\n" . $description. "\n\nDe toon van de ondertiteling moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Pöörake tähelepanu selle Instagrami postituse meeldejäävate pealkirjadega:\n\n" . $description. "\n\nTiitrite hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kiinnitä huomiota tarttuvilla kuvateksteillä tälle Instagram-julkaisulle:\n\n" . $description. "\n\nTekstitysten äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Attirez l'attention avec des légendes accrocheuses pour cette publication Instagram :\n\n" . $description. "\n\nLe ton de la voix des sous-titres doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Erregen Sie Aufmerksamkeit mit einprägsamen Bildunterschriften für diesen Instagram-Post:\n\n" . $description. "\n\nTonlage der Untertitel muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Τραβήξτε την προσοχή με εντυπωσιακούς λεζάντες για αυτήν την ανάρτηση στο Instagram:\n\n" . $description. "\n\nΟ τόνος της φωνής των υπότιτλων πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "משכו תשומת לב עם כיתובים קליטים לפוסט הזה באינסטגרם:\n\n" . $description. "\n\nטון הדיבור של הכתוביות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस Instagram पोस्ट के लिए आकर्षक कैप्शन के साथ ध्यान आकर्षित करें:\n\n" . $description."\n\nकैप्शन की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Felhívja fel a figyelmet ennek az Instagram-bejegyzésnek a fülbemászó felirataival:\n\n" . $description. "\n\nA feliratok hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Gríptu athygli með grípandi texta fyrir þessa Instagram færslu:\n\n" . $description. "\n\nTónn skjátextanna verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Raih perhatian dengan teks menarik untuk postingan Instagram ini:\n\n" . $description. "\n\nNada suara teks harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Attira l'attenzione con didascalie accattivanti per questo post di Instagram:\n\n" . $description. "\n\nIl tono di voce dei sottotitoli deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "この Instagram 投稿のキャッチーなキャプションで注目を集めましょう:\n\n" . $description. "\n\nキャプションの声のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 Instagram 게시물에 대한 눈길을 끄는 캡션으로 관심 끌기:\n\n" . $description. "\n\n캡션의 목소리 톤은 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tarik perhatian dengan kapsyen yang menarik untuk siaran Instagram ini:\n\n" . $description. "\n\nNada suara kapsyen mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Fang oppmerksomhet med fengende bildetekster for dette Instagram-innlegget:\n\n" . $description. "\n\nStemmetonen til bildetekstene må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Przyciągnij uwagę chwytliwymi napisami do tego posta na Instagramie:\n\n" . $description. "\n\nTon głosu napisów musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Chame a atenção com legendas cativantes para esta postagem do Instagram:\n\n" . $description. "\n\nTom de voz das legendas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Привлеките внимание броскими подписями к этому посту в Instagram:\n\n" . $description . "\n\nТон титров должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Capte la atención con subtítulos pegadizos para esta publicación de Instagram:\n\n" . $description . "\n\nEl tono de voz de los subtítulos debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Fånga uppmärksamhet med catchy bildtexter för detta Instagram-inlägg:\n\n" . $description . "\n\nRösten för bildtexterna måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu Instagram gönderisi için akılda kalıcı altyazılarla dikkat çekin:\n\n" . $description. "\n\nAltyazıların ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Chame a atenção com legendas cativantes para esta postagem do Instagram:\n\n" . $description. "\n\nTom de voz das legendas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Atrageți atenția cu subtitrări captivante pentru această postare pe Instagram:\n\n" . $description. "\n\nTonul vocii subtitrărilor trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Thu hút sự chú ý bằng chú thích hấp dẫn cho bài đăng trên Instagram này:\n\n" . $description. "\n\nGiọng điệu của phụ đề phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Chukua umakini na manukuu ya kuvutia ya chapisho hili la Instagram:\n\n" . $description. "\n\nToni ya sauti ya manukuu lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Pritegnite pozornost s privlačnimi napisi za to objavo na Instagramu:\n\n" . $description. "\n\nTon glasu napisov mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
