<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ColdEmailController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createColdEmailPrompt($title, $description, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        switch ($language) {
            case 'en-US':
                    $prompt = "Write a cold email about:\n\n" . $description . "\n\nOur company or product name is:\n" . $title . "\n\nContext to include in the cold email:\n" . $keywords. "\n\nTone of voice of the cold email must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب بريدًا إلكترونيًا باردًا حول:\n\n". $description. "\n\nاسم الشركة أو المنتج هو:\n". $title. "\n\nالسياق المراد تضمينه في البريد الإلكتروني البارد:\n". $keywords. "\n\nيجب أن تكون نغمة صوت البريد الإلكتروني البارد:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写一封冷电子邮件：\n\n". $description. "\n\n我们的公司或产品名称是：\n" . $title. "\n\n要包含在冷电子邮件中的上下文：\n" . $keywords. "\n\n冷邮件的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite hladnu e-poštu o:\n\n" . $description. "\n\nIme naše tvrtke ili proizvoda je:\n" . $title. "\n\nKontekst za uključivanje u hladnu e-poštu:\n" . $keywords. "\n\nTon glasa hladne e-pošte mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište chladný e-mail o:\n\n" . $description . "\n\nNázev naší společnosti nebo produktu je:\n" . $title . "\n\nKontext, který se má zahrnout do studeného e-mailu:\n" . $keywords. "\n\nTón hlasu chladného e-mailu musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en kold e-mail om:\n\n" . $description. "\n\nVores firma- eller produktnavn er:\n" . $title. "\n\nKontekst, der skal inkluderes i den kolde e-mail:\n" . $keywords. "\n\nTone i den kolde e-mail skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een koude e-mail over:\n\n" . $description . "\n\nOnze bedrijfs- of productnaam is:\n" . $title . "\n\nContext om op te nemen in de koude e-mail:\n" . $keywords. "\n\nDe toon van de koude e-mail moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage külma meili teemal:\n\n" . $description . "\n\nMeie ettevõtte või toote nimi on:\n" . $title . "\n\nKülmasse meili lisatav kontekst:\n" . $keywords. "\n\nKülma meili hääletoon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita kylmä sähköposti aiheesta:\n\n" . $description . "\n\nYrityksemme tai tuotteemme nimi on:\n" . $title . "\n\nKonteksti sisällytettäväksi kylmään sähköpostiin:\n" . $keywords. "\n\nKylmän sähköpostin äänensävyn on oltava:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez un e-mail froid à propos de :\n\n" . $description . "\n\nLe nom de notre entreprise ou de notre produit est :\n" . $title . "\n\nContexte à inclure dans le cold email :\n" . $keywords. "\n\nLe ton de la voix de l'e-mail froid doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine kalte E-Mail über:\n\n" . $description . "\n\nUnser Firmen- oder Produktname lautet:\n" . $title . "\n\nIn die Cold-E-Mail aufzunehmender Kontext:\n" . $keywords. "\n\nTonfall der kalten E-Mail muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε ένα κρύο email για:\n\n" . $description . "\n\nΗ εταιρεία ή το όνομα του προϊόντος μας είναι:\n" . $title . "\n\nΠλαίσιο που θα συμπεριληφθεί στο κρύο email:\n" . $keywords. "\n\nΟ τόνος της φωνής του κρύου email πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב אימייל קר על:\n\n" . $description . "\n\nשם החברה או המוצר שלנו הוא:\n" . $title . "\n\nהקשר לכלול בדוא הקר:\n" . $keywords. "\n\nטון הדיבור של האימייל הקר חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इस बारे में एक ठंडा ईमेल लिखें:\n\n" .$description. "\n\nहमारी कंपनी या उत्पाद का नाम है:\n".$title."\n\nकोल्ड ईमेल में शामिल करने के लिए प्रसंग:\n" .$keywords. "\n\nठंडे ईमेल की आवाज़ का स्वर होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon hideg e-mailt erről:\n\n" . $description. "\n\nCégünk vagy termékünk neve:\n" . $title . "\n\nA hideg e-mailben szereplő kontextus:\n" . $keywords. "\n\nA hideg e-mail hangszínének a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu kalt tölvupóst um:\n\n" . $description. "\n\nFyrirtækis eða vöruheiti okkar er:\n" . $title. "\n\nSamhengi til að hafa með í kalda tölvupóstinum:\n" . $keywords. "\n\nTónn í kalda tölvupóstinum verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis email dingin tentang:\n\n" . $description . "\n\nNama perusahaan atau produk kami adalah:\n" . $title. "\n\nKonteks untuk disertakan dalam email dingin:\n" . $keywords. "\n\nNada suara email dingin harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una fredda email su:\n\n" . $description . "\n\nIl nome della nostra azienda o prodotto è:\n" . $title . "\n\nContesto da includere nell'email fredda:\n" . $keywords. "\n\nIl tono di voce dell'email fredda deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "以下についての冷たいメールを書いてください:\n\n" . $description. "\n\n当社または製品名は次のとおりです:\n" . $title. "\n\nコールド メールに含めるコンテキスト:\n" . $keywords. "\n\nコールド メールのトーンは次のとおりです:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 콜드 이메일 작성:\n\n" . $description . "\n\n저희 회사 또는 제품 이름은:\n" . $title . "\n\n콜드 이메일에 포함할 컨텍스트:\n" . $keywords. "\n\n콜드 이메일의 어조는 다음과 같아야 합니다:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis e-mel sejuk tentang:\n\n" . $description. "\n\nNama syarikat atau produk kami ialah:\n" . $title . "\n\nKonteks untuk disertakan dalam e-mel sejuk:\n" . $keywords. "\n\nNada suara e-mel sejuk mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en kald e-post om:\n\n" . $description . "\n\nVårt firma eller produktnavn er:\n" . $title . "\n\nKontekst som skal inkluderes i den kalde e-posten:\n" . $keywords. "\n\nStemmetonen til den kalde e-posten må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz zimny e-mail na temat:\n\n" . $description . "\n\nNazwa naszej firmy lub produktu to:\n" . $title . "\n\nKontekst do uwzględnienia w zimnej wiadomości e-mail:\n" . $keywords. "\n\nTon zimnej wiadomości e-mail musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva um e-mail frio sobre:\n\n" . $description. "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nContexto para incluir no e-mail frio:\n" . $keywords. "\n\nTom de voz do e-mail frio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите холодное электронное письмо о:\n\n" . $description . "\n\nНазвание нашей компании или продукта:\n" . $title . "\n\nКонтекст для включения в холодное электронное письмо:\n" . $keywords. "\n\nТон голоса холодного письма должен быть:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribe un correo electrónico frío sobre:\n\n" . $description . "\n\nEl nombre de nuestra empresa o producto es:\n" . $title . "\n\nContexto para incluir en el correo electrónico frío:\n" . $keywords. "\n\nEl tono de voz del correo frío debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv ett kallt e-postmeddelande om:\n\n" . $description . "\n\nVårt företag eller produktnamn är:\n" . $title . "\n\nKontext att inkludera i det kalla e-postmeddelandet:\n" . $keywords. "\n\nTonfallet för det kalla e-postmeddelandet måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun hakkında soğuk bir e-posta yaz:\n\n" . $description. "\n\nŞirketimizin veya ürünümüzün adı:\n" . $title. "\n\nSoğuk e-postaya eklenecek içerik:\n" . $keywords. "\n\nSoğuk e-postanın ses tonu şöyle olmalı:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva um e-mail frio sobre:\n\n" . $description. "\n\nO nome da nossa empresa ou produto é:\n" . $title . "\n\nContexto para incluir no e-mail frio:\n" . $keywords. "\n\nTom de voz do e-mail frio deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți un e-mail rece despre:\n\n" . $description. "\n\nNumele companiei sau al produsului nostru este:\n" . $title . "\n\nContext de inclus în e-mailul rece:\n" . $keywords. "\n\nTonul de voce al e-mailului rece trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một email lạnh nhạt về:\n\n" . $description . "\n\nTên sản phẩm hoặc công ty của chúng tôi là:\n" . $title . "\n\nBối cảnh bao gồm trong email lạnh:\n" . $keywords. "\n\nGiọng nói của email lạnh phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika barua pepe baridi kuhusu:\n\n" . $description. "\n\nJina la kampuni au bidhaa yetu ni:\n" . $title. "\n\nMuktadha wa kujumuisha katika barua pepe baridi:\n" . $keywords. "\n\nToni ya sauti ya barua pepe baridi lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite hladno e-pošto o:\n\n" . $description. "\n\nIme našega podjetja ali izdelka je:\n" . $title. "\n\nKontekst za vključitev v hladno e-pošto:\n" . $keywords. "\n\nTon glasu hladnega e-poštnega sporočila mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
