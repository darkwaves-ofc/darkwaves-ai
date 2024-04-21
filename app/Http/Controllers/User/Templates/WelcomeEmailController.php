<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class WelcomeEmailController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWelcomeEmailPrompt($title, $description, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                $prompt = "Write a welcome email about:\n\n" . $description . "\n\nOur company or product name is:\n" . $title . "\n\nTarget audience is:\n" . $keywords. "\n\nTone of voice of the welcome email must be:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب بريدًا إلكترونيًا ترحيبيًا عن:\n\n". $description. "\n\nاسم الشركة أو المنتج هو:\n". $title. "\n\nالجمهور المستهدف هو:\n". $keywords. "\n\n يجب أن تكون نغمة صوت البريد الإلكتروني الترحيبي:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一封关于以下内容的欢迎电子邮件：\n\n" . $description. "\n\n我们的公司或产品名称是：\n" . $title. "\n\n目标受众是：\n" . $keywords. "\n\n欢迎邮件的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite poruku dobrodošlice o:\n\n" . $description. "\n\nIme naše tvrtke ili proizvoda je:\n" . $title. "\n\nCiljana publika je:\n" . $keywords. "\n\nTon glasa e-pošte dobrodošlice mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napišite poruku dobrodošlice o:\n\n" . $description. "\n\nIme naše tvrtke ili proizvoda je:\n" . $title. "\n\nCiljana publika je:\n" . $keywords. "\n\nTon glasa e-pošte dobrodošlice mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en velkomstmail om:\n\n" . $description. "\n\nVores firma- eller produktnavn er:\n" . $title. "\n\nMålgruppe er:\n" . $keywords. "\n\nTone i velkomstmailen skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een welkomstmail over:\n\n" . $description . "\n\nOnze bedrijfs- of productnaam is:\n" . $title . "\n\nDoelgroep is:\n" . $keywords. "\n\nDe toon van de welkomstmail moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage tervitusmeil teemal:\n\n" . $description . "\n\nMeie ettevõtte või toote nimi on:\n" . $title . "\n\nSihtpublik on:\n" . $keywords. "\n\nTervitusmeili hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita tervetuloa sähköposti aiheesta:\n\n" . $description . "\n\nYrityksemme tai tuotteemme nimi on:\n" . $title . "\n\nKohdeyleisö on:\n" . $keywords. "\n\nTervetuloviestin äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un e-mail de bienvenue à propos de :\n\n" . $description . "\n\nLe nom de notre entreprise ou de notre produit est :\n" . $title. "\n\nLe public cible est :\n" . $keywords. "\n\nLe ton de la voix de l'e-mail de bienvenue doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Willkommens-E-Mail schreiben über:\n\n" . $description. "\n\nUnser Firmen- oder Produktname lautet:\n" . $title . "\n\nZielpublikum ist:\n" . $keywords. "\n\nTonfall der Willkommens-E-Mail muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα email καλωσορίσματος σχετικά με:\n\n" . $description . "\n\nΗ εταιρεία ή το όνομα του προϊόντος μας είναι:\n" . $title . "\n\nΤο κοινό-στόχος είναι:\n" . $keywords. "\n\nΟ τόνος της φωνής του email καλωσορίσματος πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב הודעת קבלת פנים על:\n\n" . $description . "\n\nשם החברה או המוצר שלנו הוא:\n" . $title . "\n\nקהל היעד הוא:\n" . $keywords. "\n\nנימת הקול של הודעת קבלת הפנים חייבת להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में एक स्वागत योग्य ईमेल लिखें:\n\n" .$description. "\n\nहमारी कंपनी या उत्पाद का नाम है:\n".$title."\n\nलक्षित दर्शक हैं:\n" . $keywords. "\n\nस्वागत ईमेल का स्वर इस प्रकार होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon üdvözlő e-mailt erről:\n\n" . $description . "\n\nCégünk vagy termékünk neve:\n" . $title . "\n\nA célközönség:\n" . $keywords. "\n\nAz üdvözlő e-mail hangjának a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu velkominn tölvupóst um:\n\n" . $description. "\n\nFyrirtækis eða vöruheiti okkar er:\n" . $title. "\n\nMarkhópur er:\n" . $keywords. "\n\nTónn í móttökupóstinum verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis email selamat datang tentang:\n\n" . $description . "\n\nNama perusahaan atau produk kami adalah:\n" . $title . "\n\nTarget audiens adalah:\n" . $keywords. "\n\nNada suara email selamat datang harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi un'e-mail di benvenuto su:\n\n" . $description . "\n\nIl nome della nostra azienda o prodotto è:\n" . $title . "\n\nIl pubblico di destinazione è:\n" . $keywords. "\n\nIl tono della mail di benvenuto deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "ウェルカム メールを書いてください:\n\n" . $description. "\n\n当社または製品名は次のとおりです:\n" . $title. "\n\n対象者:\n" . $keywords. "\n\nウェルカム メールのトーンは次のようにする必要があります:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 환영 이메일 작성:\n\n" . $description . "\n\n저희 회사 또는 제품 이름은:\n" . $title . "\n\n대상은:\n" . $keywords. "\n\n환영 이메일의 어조는 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis e-mel alu-aluan tentang:\n\n" . $description . "\n\nNama syarikat atau produk kami ialah:\n" . $title . "\n\nKhalayak sasaran ialah:\n" . $keywords. "\n\nNada suara e-mel alu-aluan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en velkomst-e-post om:\n\n" . $description . "\n\nVårt firma eller produktnavn er:\n" . $title . "\n\nMålgruppen er:\n" . $keywords. "\n\nStemmetonen i velkomst-e-posten må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz powitalną wiadomość e-mail na temat:\n\n" . $description . "\n\nNazwa naszej firmy lub produktu to:\n" . $title . "\n\nDocelowi odbiorcy to:\n" . $keywords. "\n\nTon powitalnego e-maila musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um e-mail de boas-vindas sobre:\n\n" . $description. "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nO público-alvo é:\n" . $keywords. "\n\nTom de voz do e-mail de boas-vindas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите приветственное письмо о:\n\n" . $description . "\n\nНазвание нашей компании или продукта:\n" . $title . "\n\nЦелевая аудитория:\n" . $keywords. "\n\nТон приветственного письма должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un correo electrónico de bienvenida sobre:\n\n" . $description . "\n\nEl nombre de nuestra empresa o producto es:\n" . $title . "\n\nEl público objetivo es:\n" . $keywords. "\n\nEl tono de voz del email de bienvenida debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett välkomstmail om:\n\n" . $description . "\n\nVårt företag eller produktnamn är:\n" . $title . "\n\nMålgruppen är:\n" . $keywords. "\n\nRösten i välkomstmeddelandet måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun hakkında bir karşılama e-postası yazın:\n\n" . $description ."\n\nŞirketimizin veya ürünümüzün adı:\n" . $title. "\n\nHedef kitle:\n" . $keywords. "\n\nKarşılama e-postasının ses tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um e-mail de boas-vindas sobre:\n\n" . $description. "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nO público-alvo é:\n" . $keywords. "\n\nTom de voz do e-mail de boas-vindas deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un e-mail de bun venit despre:\n\n" . $description . "\n\nNumele companiei sau al produsului nostru este:\n" . $title . "\n\nPublicul țintă este:\n" . $keywords. "\n\nTonul vocii al e-mailului de bun venit trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết email chào mừng về:\n\n" . $description . "\n\nTên sản phẩm hoặc công ty của chúng tôi là:\n" . $title . "\n\nĐối tượng mục tiêu là:\n" . $keywords. "\n\nGiọng điệu của email chào mừng phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika barua pepe ya kukaribisha kuhusu:\n\n" . $description. "\n\nJina la kampuni au bidhaa yetu ni:\n" . $title. "\n\nHadhira inayolengwa ni:\n" . $keywords. "\n\nToni ya sauti ya barua pepe ya kukaribisha lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite pozdravno e-pošto o:\n\n" . $description. "\n\nIme našega podjetja ali izdelka je:\n" . $title. "\n\nCiljna publika je:\n" . $keywords. "\n\nTon glasu pozdravnega e-poštnega sporočila mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
