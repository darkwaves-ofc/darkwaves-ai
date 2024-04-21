<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class SocialMediaPostPersonalController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSocialPostPersonalPrompt($description, $language, $tone) {
        
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
                    $prompt = "Write a personal social media post about:\n\n" . $description . "\n\nTone of voice of the post must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب منشورًا شخصيًا على وسائل التواصل الاجتماعي حول:\n\n". $description. "\n\nيجب أن تكون نغمة صوت المشاركة:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一篇个人社交媒体帖子：\n\n". $description. "\n\n帖子的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite osobnu objavu na društvenim mrežama o:\n\n" . $description. "\n\nTon glasa objave mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište osobní příspěvek na sociální média o:\n\n" . $description . "\n\nTón hlasu příspěvku musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv et personligt opslag på sociale medier om:\n\n" . $description. "\n\nOplæggets stemme skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een persoonlijk bericht op sociale media over:\n\n" . $description . "\n\nDe toon van het bericht moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage isiklik sotsiaalmeedia postitus teemal:\n\n" . $description . "\n\nPostituse hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita henkilökohtainen sosiaalisen median viesti aiheesta:\n\n" . $description . "\n\nViestin äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez un message personnel sur les réseaux sociaux à propos de :\n\n" . $description . "\n\nLe ton de la voix du message doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie einen persönlichen Social-Media-Beitrag über:\n\n" . $description . "\n\nTonlage des Beitrags muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια προσωπική ανάρτηση στα μέσα κοινωνικής δικτύωσης σχετικά με:\n\n" . $description . "\n\nΟ τόνος της φωνής της ανάρτησης πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב פוסט אישי במדיה החברתית על:\n\n" . $description . "\n\nטון הדיבור של הפוסט חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इसके बारे में एक निजी सोशल मीडिया पोस्ट लिखें:\n\n" .$description. "\n\nपोस्ट की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon személyes közösségimédia-bejegyzést erről:\n\n" . $description . "\n\nA bejegyzés hangnemének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu persónulega færslu á samfélagsmiðlum um:\n\n" . $description. "\n\nTónn færslunnar verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis postingan media sosial pribadi tentang:\n\n" . $description . "\n\nNada suara postingan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un post personale sui social media su:\n\n" . $description . "\n\nIl tono di voce del post deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "個人的なソーシャル メディアの投稿について書く:\n\n" . $description. "\n\n投稿のトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 개인 소셜 미디어 게시물 작성:\n\n" . $description . "\n\n포스트의 어조는 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis siaran media sosial peribadi tentang:\n\n" . $description. "\n\nNada suara siaran mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv et personlig innlegg på sosiale medier om:\n\n" . $description . "\n\nTone i innlegget må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz osobisty post w mediach społecznościowych na temat:\n\n" . $description . "\n\nTon wypowiedzi w poście musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma postagem de mídia social pessoal sobre:\n\n" . $description. "\n\nTom de voz da postagem deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите личный пост в социальной сети о:\n\n" . $description . "\n\nТон сообщения должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe una publicación personal en las redes sociales sobre:\n\n" . $description . "\n\nEl tono de voz de la publicación debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett personligt inlägg på sociala medier om:\n\n" . $description . "\n\nTonfallet i inlägget måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şununla ilgili kişisel bir sosyal medya gönderisi yaz:\n\n" . $description. "\n\nGönderinin ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva uma postagem de mídia social pessoal sobre:\n\n" . $description. "\n\nTom de voz da postagem deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o postare personală pe rețelele sociale despre:\n\n" . $description . "\n\nTonul vocii postării trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một bài đăng cá nhân trên mạng xã hội về:\n\n" . $description . "\n\nGiọng điệu của bài đăng phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika chapisho la kibinafsi la mtandao wa kijamii kuhusu:\n\n" . $description. "\n\nToni ya sauti ya chapisho lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite osebno objavo v družabnem omrežju o:\n\n" . $description. "\n\nTon objave mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
