<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class AmazonProductController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAmazonProductPrompt($title, $keywords, $language) {

        switch ($language) {
            case 'en-US':
                    $prompt = "Write attention grabbing Amazon marketplace product description for:\n\n" . $title . "\n\nUse following keywords in the product description:\n" . $keywords . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب وصف منتج سوق أمازون الذي يجذب الانتباه لـ:\n\n". $title. "\ n \ n استخدم الكلمات الأساسية التالية في وصف المنتج:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容撰写引人注目的亚马逊市场产品说明：\n\n". $title. "\n\n在产品描述中使用以下关键词：\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite opis proizvoda na Amazonovom tržištu koji privlači pažnju za:\n\n" . $title. "\n\nKoristite sljedeće ključne riječi u opisu proizvoda:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište popis produktu na tržišti Amazon pro:\n\n" . $title . "\n\nV popisu produktu použijte následující klíčová slova:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv opmærksomhedsfangende Amazon-markedsplads-produktbeskrivelse for:\n\n" . $title. "\n\nBrug følgende søgeord i produktbeskrivelsen:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een opvallende productbeschrijving op de Amazon-marktplaats voor:\n\n" . $title . "\n\nGebruik de volgende trefwoorden in de productbeschrijving:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage tähelepanu haarav Amazoni turu tootekirjeldus:\n\n" . $title . "\n\nKasutage tootekirjelduses järgmisi märksõnu:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita huomiota herättävä Amazon Marketplace -tuotteen kuvaus:\n\n" . $title . "\n\nKäytä seuraavia avainsanoja tuotekuvauksessa:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une description de produit accrocheuse sur la place de marché Amazon pour :\n\n" . $title . "\n\nUtilisez les mots clés suivants dans la description du produit :\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine aufmerksamkeitsstarke Amazon Marketplace-Produktbeschreibung für:\n\n" . $title . "\n\nVerwenden Sie folgende Schlüsselwörter in der Produktbeschreibung:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε την προσοχή που προσελκύει την περιγραφή προϊόντος της Amazon Marketplace για:\n\n" . $title . "\n\nΧρησιμοποιήστε τις ακόλουθες λέξεις-κλειδιά στην περιγραφή του προϊόντος:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב תשומת לב מושכת את תיאור המוצר של Amazon Marketplace עבור:\n\n" . $title . "\n\nהשתמש במילות המפתח הבאות בתיאור המוצר:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "ध्यान आकर्षित करने वाले Amazon मार्केटप्लेस उत्पाद विवरण के लिए लिखें:\n\n" . $title."\n\nउत्पाद विवरण में निम्नलिखित कीवर्ड का उपयोग करें:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon figyelemfelkeltő Amazon Marketplace termékleírást:\n\n" . $title . "\n\nHasználja a következő kulcsszavakat a termékleírásban:\n" . $keywords . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu athyglisverða vörulýsingu á Amazon markaðstorginu fyrir:\n\n" . $title. "\n\nNotaðu eftirfarandi leitarorð í vörulýsingunni:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis deskripsi produk pasar Amazon yang menarik perhatian untuk:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam deskripsi produk:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una descrizione del prodotto del marketplace Amazon che attiri l'attenzione per:\n\n" . $title . "\n\nUsa le seguenti parole chiave nella descrizione del prodotto:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "注目を集める Amazon マーケットプレイスの商品説明を書いてください:\n\n" . $title. "\n\n製品説明には次のキーワードを使用してください:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 관심을 끄는 Amazon 마켓플레이스 제품 설명 작성:\n\n" . $title . "\n\n제품 설명에 다음 키워드를 사용하십시오:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis penerangan produk pasaran Amazon yang menarik perhatian untuk:\n\n" . $title . "\n\nGunakan kata kunci berikut dalam penerangan produk:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en oppmerksomhetsfangende produktbeskrivelse for Amazon Marketplace for:\n\n" . $title . "\n\nBruk følgende nøkkelord i produktbeskrivelsen:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz przyciągający uwagę opis produktu na rynku Amazon dla:\n\n" . $title . "\n\nUżyj następujących słów kluczowych w opisie produktu:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma descrição atraente do produto Amazon marketplace para:\n\n" . $title . "\n\nUse as seguintes palavras-chave na descrição do produto:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите привлекающее внимание описание продукта на торговой площадке Amazon для:\n\n" . $title . "\n\nИспользуйте следующие ключевые слова в описании продукта:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba la descripción del producto del mercado de Amazon que llame la atención para:\n\n" . $title. "\n\nUtilice las siguientes palabras clave en la descripción del producto:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv uppmärksamhet fånga Amazon marknadsplats produktbeskrivning för:\n\n" . $title . "\n\nAnvänd följande nyckelord i produktbeskrivningen:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun için dikkat çekici Amazon pazar yeri ürün açıklamasını yazın:\n\n" . $title ."\n\nÜrün açıklamasında aşağıdaki anahtar kelimeleri kullanın:\n" . $keywords . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escreva uma descrição atraente do produto Amazon marketplace para:\n\n" . $title . "\n\nUse as seguintes palavras-chave na descrição do produto:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți atenția captând descrierea produsului Amazon marketplace pentru:\n\n" . $title . "\n\nFolosiți următoarele cuvinte cheie în descrierea produsului:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết mô tả sản phẩm thu hút sự chú ý trên thị trường Amazon cho:\n\n" . $title . "\n\nSử dụng các từ khóa sau trong phần mô tả sản phẩm:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika umakini wa kunyakua maelezo ya bidhaa ya soko la Amazon kwa:\n\n" . $title. "\n\nTumia manenomsingi yafuatayo katika maelezo ya bidhaa:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite opis izdelka Amazon Marketplace, ki pritegne pozornost za:\n\n" . $title. "\n\nV opisu izdelka uporabite naslednje ključne besede:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
