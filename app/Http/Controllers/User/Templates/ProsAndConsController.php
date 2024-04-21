<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ProsAndConsController extends Controller
{
    use VoiceToneTrait;

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProsAndConsPrompt($title, $keywords, $language, $tone) {
        
        if ($language != 'en-US') {
            $tone_language = $this->translateTone($tone, $language);
        } else {
            $tone_language = $tone;
        }

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return false;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write pros and cons of these products:\n\n" . $title . "\n\nUse following product description:\n" . $keywords . "\n\nTone of voice of the pros and cons must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب إيجابيات وسلبيات هذه المنتجات:\n\n". $title. "\n\nاستخدم وصف المنتج التالي:\n". $keywords. "\n\nيجب أن تكون نغمة الإيجابيات والسلبيات:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "写下这些产品的优缺点：\n\n" . $title . "\n\n使用以下产品描述：\n" . $keywords . "\n\n正反的语气必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite prednosti i nedostatke ovih proizvoda:\n\n" . $title . "\n\nKoristite sljedeći opis proizvoda:\n" . $keywords . "\n\nTon glasa za i protiv mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište výhody a nevýhody těchto produktů:\n\n" . $title . "\n\nPoužijte následující popis produktu:\n" . $keywords . "\n\nTón hlasu pro a proti musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv fordele og ulemper ved disse produkter:\n\n" . $title. "\n\nBrug følgende produktbeskrivelse:\n" . $keywords. "\n\nTone af fordele og ulemper skal være:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf de voor- en nadelen van deze producten op:\n\n" . $title. "\n\nGebruik de volgende productbeschrijving:\n" . $keywords. "\n\nDe toon van de voor- en nadelen moet zijn:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage nende toodete plussid ja miinused:\n\n" . $title. "\n\nKasutage järgmist tootekirjeldust:\n" . $keywords. "\n\nPusside ja miinuste hääletoon peab olema:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita näiden tuotteiden hyvät ja huonot puolet:\n\n" . $title. "\n\nKäytä seuraavaa tuotekuvausta:\n" . $keywords. "\n\nPussien ja haittojen äänensävyn on oltava:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez les avantages et les inconvénients de ces produits :\n\n" . $title . "\n\nUtilisez la description de produit suivante :\n" . $keywords . "\n\nLe ton de la voix des pour et des contre doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie Vor- und Nachteile dieser Produkte auf:\n\n" . $title . "\n\nFolgende Produktbeschreibung verwenden:\n" . $keywords . "\n\nTonfall der Vor- und Nachteile muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε τα πλεονεκτήματα και τα μειονεκτήματα αυτών των προϊόντων:\n\n" . $title. "\n\nΧρησιμοποιήστε την ακόλουθη περιγραφή προϊόντος:\n" . $keywords. "\n\nΟ τόνος της φωνής των πλεονεκτημάτων και των μειονεκτημάτων πρέπει να είναι:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב יתרונות וחסרונות של המוצרים האלה:\n\n" . $title . "\n\nהשתמש בתיאור המוצר הבא:\n" . $keywords . "\n\nטון הדיבור של היתרונות והחסרונות חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इन उत्पादों के फायदे और नुकसान लिखें:\n\n" .  $title. "\n\nनिम्न उत्पाद विवरण का उपयोग करें:\n" . $keywords . "\n\n पक्ष और विपक्ष की आवाज़ का स्वर होना चाहिए:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írja le ezeknek a termékeknek előnyeit és hátrányait:\n\n" . $title. "\n\nHasználja a következő termékleírást:\n" . $keywords. "\n\nAz előnyök és hátrányok hangnemének a következőnek kell lennie:\n" . $tone_language. "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu kosti og galla þessara vara:\n\n" . $title. "\n\nNotaðu eftirfarandi vörulýsingu:\n" . $keywords. "\n\nTónn fyrir kosti og galla verður að vera:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis pro dan kontra dari produk ini:\n\n" . $title . "\n\nGunakan deskripsi produk berikut:\n" . $keywords . "\n\nNada suara pro dan kontra harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi pro e contro di questi prodotti:\n\n" . $title . "\n\nUsa la seguente descrizione del prodotto:\n" . $keywords . "\n\nIl tono di voce dei pro e dei contro deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "これらの製品の長所と短所を書いてください:\n\n" . $title . "\n\n次の製品説明を使用してください:\n" . $keywords . "\n\n賛成派と反対派の口調は次のとおりでなければなりません:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "이 제품의 장단점을 작성하십시오:\n\n" . $title . "\n\n다음 제품 설명을 사용하십시오:\n" . $keywords . "\n\n장단점의 어조는 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis kebaikan dan keburukan produk ini:\n\n" . $title . "\n\nGunakan penerangan produk berikut:\n" . $keywords . "\n\nNada suara kebaikan dan keburukan mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv fordeler og ulemper med disse produktene:\n\n" . $title . "\n\nBruk følgende produktbeskrivelse:\n" . $keywords . "\n\nTone for fordeler og ulemper må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz wady i zalety tych produktów:\n\n" . $title . "\n\nUżyj następującego opisu produktu:\n" . $keywords . "\n\nTon głosu za i przeciw musi być następujący:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva prós e contras destes produtos:\n\n" . $title . "\n\nUse a seguinte descrição do produto:\n" . $keywords . "\n\nTom de voz dos prós e contras deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите плюсы и минусы этих продуктов:\n\n" . $title . "\n\nИспользуйте следующее описание продукта:\n" . $keywords . "\n\nТон озвучивания плюсов и минусов должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba pros y contras de estos productos:\n\n" . $title. "\n\nUtilice la siguiente descripción del producto:\n" . $keywords. "\n\nEl tono de voz de los pros y los contras debe ser:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv för- och nackdelar med dessa produkter:\n\n" . $title . "\n\nAnvänd följande produktbeskrivning:\n" . $keywords . "\n\nTonfall för för- och nackdelar måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Bu ürünlerin artılarını ve eksilerini yazın:\n\n" . $title . "\n\nAşağıdaki ürün açıklamasını kullanın:\n" . $keywords . "\n\nSes tonu artıları ve eksileri şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva prós e contras destes produtos:\n\n" . $title . "\n\nUse a seguinte descrição do produto:\n" . $keywords . "\n\nTom de voz dos prós e contras deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți argumentele pro și contra acestor produse:\n\n" . $title . "\n\nUtilizați următoarea descriere a produsului:\n" . $keywords . "\n\nTonul vocii argumentelor pro și contra trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết ưu và nhược điểm của những sản phẩm này:\n\n" . $title. "\n\nSử dụng mô tả sản phẩm sau:\n" . $keywords. "\n\nGiọng điệu của những ưu và nhược điểm phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika faida na hasara za bidhaa hizi:\n\n" . $title. "\n\nTumia maelezo ya bidhaa yafuatayo:\n" . $keywords . "\n\nToni ya sauti ya faida na hasara lazima iwe:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite prednosti in slabosti teh izdelkov:\n\n" . $title. "\n\nUporabi naslednji opis izdelka:\n" . $keywords. "\n\nTon glasu prednosti in slabosti mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
