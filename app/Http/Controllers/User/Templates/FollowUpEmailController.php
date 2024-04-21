<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class FollowUpEmailController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFollowUpEmailPrompt($title, $description, $event, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write a follow up email about:\n\n" . $description . "\n\nOur company or product name is:\n" . $title . "\n\nFollowing up after:\n" . $event. "\n\nTarget audience is:\n" . $keywords. "\n\nTone of voice of the follow up email must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب رسالة متابعة بالبريد الإلكتروني حول:\n\n". $description . "\n\nاسم الشركة أو المنتج هو:\n". $title. "\n\nالمتابعة بعد:\n". $event. "\n\nالجمهور المستهدف هو:\n". $keywords. "\n\nيجب أن تكون نغمة الصوت في رسالة البريد الإلكتروني للمتابعة:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一封跟进电子邮件：\n\n". $description . "\n\n我们的公司或产品名称是：\n" . $title. "\n\n跟进之后：\n" . $event. "\n\n目标受众是：\n" . $keywords. "\n\n跟进邮件的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite naknadnu e-poruku o:\n\n" . $description . "\n\nIme naše tvrtke ili proizvoda je:\n" . $title. "\n\nSljedeće nakon:\n" . $event. "\n\nCiljana publika je:\n" . $keywords. "\n\nTon glasa dodatne e-pošte mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište následný e-mail o:\n\n" . $description  . "\n\nNázev naší společnosti nebo produktu je:\n" . $title . "\n\nSledování po:\n" . $event. "\n\nCílové publikum je:\n" . $keywords. "\n\nTón hlasu následného e-mailu musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en opfølgningsmail om:\n\n" . $description . "\n\nVores firma- eller produktnavn er:\n" . $title. "\n\nOpfølgning efter:\n" . $event. "\n\nMålgruppe er:\n" . $keywords. "\n\nTone i opfølgnings-e-mailen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een vervolgmail over:\n\n" . $description  . "\n\nOnze bedrijfs- of productnaam is:\n" . $title . "\n\nOpvolging na:\n" . $event. "\n\nDoelgroep is:\n" . $keywords. "\n\nDe toon van de vervolgmail moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage järelmeil teemal:\n\n" . $description  . "\n\nMeie ettevõtte või toote nimi on:\n" . $title . "\n\nJälgimine pärast:\n" . $event. "\n\nSihtpublik on:\n" . $keywords. "\n\nJärelmeili hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita seurantasähköposti aiheesta:\n\n" . $description . "\n\nYrityksemme tai tuotteemme nimi on:\n" . $title . "\n\nSeurataan tämän jälkeen:\n" . $event. "\n\nKohdeyleisö on:\n" . $keywords. "\n\nSeurantaviestin äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez un e-mail de suivi concernant :\n\n" . $description . "\n\nLe nom de notre entreprise ou de notre produit est :\n" . $title. "\n\nSuivi après :\n" . $event. "\n\nLe public cible est :\n" . $keywords. "\n\nLe ton de la voix de l'e-mail de suivi doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine Folge-E-Mail zu:\n\n" . $description  . "\n\nUnser Firmen- oder Produktname lautet:\n" . $title . "\n\nNachverfolgung nach:\n" . $event. "\n\nZielpublikum ist:\n" . $keywords. "\n\nTonfall der Folge-E-Mail muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα επόμενο μήνυμα ηλεκτρονικού ταχυδρομείου σχετικά με:\n\n" . $description  . "\n\nΗ εταιρεία ή το όνομα του προϊόντος μας είναι:\n" . $title . "\n\nΣυνέχεια μετά:\n" . $event. "\n\nΤο κοινό-στόχος είναι:\n" . $keywords. "\n\nΟ τόνος της φωνής του επόμενου email πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב אימייל מעקב על:\n\n" . $description . "\n\nשם החברה או המוצר שלנו הוא:\n" . $title . "\n\nמעקב אחרי:\n" . $event. "\n\nקהל היעד הוא:\n" . $keywords. "\n\nטון הדיבור של דואל המעקב חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में एक अनुवर्ती ईमेल लिखें:\n\n" .$description . "\n\nहमारी कंपनी या उत्पाद का नाम है:\n".$title. "\n\nइसके बाद:\n" .$event. "\n\nलक्षित दर्शक हैं:\n" . $keywords. "\n\nफ़ॉलो अप ईमेल का स्वर इस प्रकार होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon e-mailt a következőről:\n\n" . $description . "\n\nCégünk vagy termékünk neve:\n" . $title . "\n\nKövetés a következő után:\n" . $event. "\n\nA célközönség:\n" . $keywords. "\n\nA követő e-mail hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu eftirfylgnipóst um:\n\n" . $description . "\n\nFyrirtækis eða vöruheiti okkar er:\n" . $title. "\n\nFylgst með eftir:\n" . $event. "\n\nMarkhópur er:\n" . $keywords. "\n\nTónn í eftirfylgnipóstinum verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis email tindak lanjut tentang:\n\n" . $description  . "\n\nNama perusahaan atau produk kami adalah:\n" . $title . "\n\nMenindaklanjuti setelah:\n" . $event. "\n\nTarget audiens adalah:\n" . $keywords. "\n\nNada suara email tindak lanjut harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un'email di follow-up su:\n\n" . $description  . "\n\nIl nome della nostra azienda o prodotto è:\n" . $title . "\n\nFollow up dopo:\n" . $event. "\n\nIl pubblico di destinazione è:\n" . $keywords. "\n\nIl tono di voce dell'email di follow-up deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "フォローアップのメールを書いてください:\n\n" . $description . "\n\n当社または製品名は次のとおりです:\n" . $title. "\n\nフォローアップ:\n" . $event. "\n\n対象者:\n" . $keywords. "\n\nフォローアップ メールのトーンは次のとおりです:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 후속 이메일 작성:\n\n" . $description  . "\n\n저희 회사 또는 제품 이름은:\n" . $title . "\n\n다음 이후:\n" . $event. "\n\n대상은:\n" . $keywords. "\n\n후속 이메일의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis e-mel susulan tentang:\n\n" . $description  . "\n\nNama syarikat atau produk kami ialah:\n" . $title . "\n\nMenyusul selepas:\n" . $event. "\n\nKhalayak sasaran ialah:\n" . $keywords. "\n\nNada suara e-mel susulan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en oppfølgings-e-post om:\n\n" . $description  . "\n\nVårt firma eller produktnavn er:\n" . $title . "\n\nOppfølging etter:\n" . $event. "\n\nMålgruppen er:\n" . $keywords. "\n\nTone i oppfølgings-e-posten må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz e-mail uzupełniający na temat:\n\n" . $description  . "\n\nNazwa naszej firmy lub produktu to:\n" . $title. "\n\nKontynuacja po:\n" . $event. "\n\nDocelowi odbiorcy to:\n" . $keywords. "\n\nTon w e-mailu uzupełniającym musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um e-mail de acompanhamento sobre:\n\n" . $description . "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nAcompanhamento após:\n" . $event. "\n\nO público-alvo é:\n" . $keywords. "\n\nTom de voz do e-mail de acompanhamento deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите последующее электронное письмо о:\n\n" . $description  . "\n\nНазвание нашей компании или продукта:\n" . $title . "\n\nПоследующие действия после:\n" . $event. "\n\nЦелевая аудитория:\n" . $keywords. "\n\nТон голоса в последующем электронном письме должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un correo electrónico de seguimiento sobre:\n\n" . $description  . "\n\nEl nombre de nuestra empresa o producto es:\n" . $title . "\n\nSeguimiento después de:\n" . $event. "\n\nEl público objetivo es:\n" . $keywords. "\n\nEl tono de voz del correo electrónico de seguimiento debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett uppföljningsmeddelande om:\n\n" . $description . "\n\nVårt företag eller produktnamn är:\n" . $title . "\n\nFöljer upp efter:\n" . $event. "\n\nMålgruppen är:\n" . $keywords. "\n\nRösten i uppföljningsmeddelandet måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şu konuda bir takip e-postası yazın:\n\n" . $description . "\n\nŞirketimizin veya ürünümüzün adı:\n" . $title."\n\nSonra takip:\n" . $event. "\n\nHedef kitle:\n" . $keywords. "\n\nTakip e-postasının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um e-mail de acompanhamento sobre:\n\n" . $description . "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nAcompanhamento após:\n" . $event. "\n\nO público-alvo é:\n" . $keywords. "\n\nTom de voz do e-mail de acompanhamento deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un e-mail de continuare despre:\n\n" . $description  . "\n\nNumele companiei sau al produsului nostru este:\n" . $title. "\n\nUrmărire după:\n" . $event. "\n\nPublicul țintă este:\n" . $keywords. "\n\nTonul de voce al e-mailului de urmărire trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết email tiếp theo về:\n\n" . $description . "\n\nTên sản phẩm hoặc công ty của chúng tôi là:\n" . $title. "\n\nTiếp tục sau:\n" . $event. "\n\nĐối tượng mục tiêu là:\n" . $keywords. "\n\nGiọng điệu của email tiếp theo phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika barua pepe ya ufuatiliaji kuhusu:\n\n" . $description . "\n\nJina la kampuni au bidhaa yetu ni:\n" . $title. "\n\nInafuata baada ya:\n" . $event. "\n\nHadhira inayolengwa ni:\n" . $keywords. "\n\nToni ya sauti ya barua pepe ya ufuatiliaji lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite nadaljnje e-poštno sporočilo o:\n\n" . $description . "\n\nIme našega podjetja ali izdelka je:\n" . $title. "\n\nNadaljevanje po:\n" . $event. "\n\nCiljna publika je:\n" . $keywords. "\n\nTon glasu nadaljnjega e-poštnega sporočila mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
