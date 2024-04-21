<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;
use App\Traits\VoiceToneTrait;

class ProductDescriptionController extends Controller
{
    use VoiceToneTrait;
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductDescriptionPrompt($title, $audience, $description, $language, $tone) {
        
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
                    $prompt = "Write a long creative product description for:" . $title . "\n\nTarget audience is:" . $audience . "\n\nUse this description:" . $description . "\n\nTone of generated text must be:\n" . $tone_language . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب وصفًا إبداعيًا طويلًا للمنتج لـ:". $title . "\n\nالجمهور المستهدف هو:". $audience. "\n\nاستخدم هذا الوصف:". $description. "\n\nيجب أن تكون نغمة النص الناتج:\n". $tone_language. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为：写一个长的创意产品描述" . $title . "\n\n目标受众是：" . $audience. "\n\n使用这个描述：" . $description . "\n\n生成文本的基调必须是：\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite dugačak kreativni opis proizvoda za:" . $title. "\n\nCiljana publika je:" . $audience. "\n\nKoristite ovaj opis:" . $description. "\n\nTon generiranog teksta mora biti:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište dlouhý popis kreativního produktu pro:" . $title . "\n\nCílové publikum je:" . $audience . "\n\nPoužijte tento popis:" . $description . "\n\nTón generovaného textu musí být:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv en lang kreativ produktbeskrivelse til:" . $title. "\n\nMålgruppe er:" . $audience. "\n\nBrug denne beskrivelse:" . $description. "\n\nTone i genereret tekst skal være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf een lange creatieve productbeschrijving voor:" . $title . "\n\nDoelgroep is:" . $audience. "\n\nGebruik deze omschrijving:" . $description . "\n\nDe toon van gegenereerde tekst moet zijn:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage pikk loominguline tootekirjeldus:" . $title . "\n\nSihtpublik on:" . $audience . "\n\nKasutage seda kirjeldust:" . $description . "\n\nLoodud teksti toon peab olema:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita pitkä luova tuotekuvaus:" . $title . "\n\nKohdeyleisö on:" . $audience. "\n\nKäytä tätä kuvausta:" . $description . "\n\nLuodun tekstin äänen tulee olla:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Rédigez une longue description de produit créative pour :" . $title . "\n\nLe public cible est :" . $audience . "\n\nUtilisez cette description :" . $description . "\n\nLe ton du texte généré doit être :\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Schreiben Sie eine lange kreative Produktbeschreibung für:" . $title . "\n\nZielpublikum ist:" . $audience . "\n\nVerwenden Sie diese Beschreibung:" . $description . "\n\nTon des generierten Textes muss sein:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μια μεγάλη περιγραφή δημιουργικού προϊόντος για:" . $title . "\n\nΤο κοινό-στόχος είναι:" . $audience . "\n\nΧρησιμοποιήστε αυτήν την περιγραφή:" . $description . "\n\nΟ τόνος του κειμένου που δημιουργείται πρέπει να είναι:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב תיאור מוצר יצירתי ארוך עבור:" . $title . "\n\nקהל היעד הוא:" . $audience . "\n\nהשתמש בתיאור הזה:" . $description . "\n\nטון הטקסט שנוצר חייב להיות:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इसके लिए एक लंबा रचनात्मक उत्पाद विवरण लिखें:" . $title. "\n\nलक्षित दर्शक हैं:" . $audience . "\n\nइस विवरण का उपयोग करें:" . $description . "\n\nजनरेट किए गए टेक्स्ट का टोन होना चाहिए:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon hosszú kreatív termékleírást a következőhöz:" . $title . "\n\nA célközönség:" . $audience . "\n\nHasználja ezt a leírást:" . $description . "\n\nA generált szöveg hangjának a következőnek kell lennie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu langa skapandi vörulýsingu fyrir:" . $title. "\n\nMarkhópur er:" . $audience. "\n\nNotaðu þessa lýsingu:" . $description. "\n\nTónn texta sem myndast verður að vera:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis deskripsi produk kreatif yang panjang untuk:" . $title. "\n\nTarget audiens adalah:" . $audience . "\n\nGunakan deskripsi ini:" . $description . "\n\nNada teks yang dihasilkan harus:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi una lunga descrizione del prodotto creativo per:" . $title . "\n\nIl pubblico di destinazione è:" . $audience. "\n\nUsa questa descrizione:" . $description . "\n\nIl tono del testo generato deve essere:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次の製品の長いクリエイティブな説明を書いてください:" . $title. "\n\n対象者:" . $audience. "\n\nこの説明を使用してください:" . $description . "\n\n生成されたテキストのトーンは:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 길고 창의적인 제품 설명 작성:" . $title. "\n\n대상은:" . $audience . "\n\n이 설명을 사용하십시오:" . $description . "\n\n생성된 텍스트의 톤은 다음과 같아야 합니다.\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis penerangan produk kreatif yang panjang untuk:" . $title . "\n\nKhalayak sasaran ialah:" . $audience . "\n\nGunakan penerangan ini:" . $description . "\n\nNada teks yang dijana mestilah:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv en lang kreativ produktbeskrivelse for:" . $title . "\n\nMålgruppen er:" . $audience . "\n\nBruk denne beskrivelsen:" . $description . "\n\nTone i generert tekst må være:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz długi kreatywny opis produktu dla:" . $title . "\n\nDocelowi odbiorcy to:" . $audience . "\n\nUżyj tego opisu:" . $description . "\n\nTon generowanego tekstu musi być:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva uma longa descrição de produto criativo para:" . $title . "\n\nO público-alvo é:" . $audience . "\n\nUse esta descrição:" . $description. "\n\nO tom do texto gerado deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите длинное креативное описание продукта для:" . $title . "\n\nЦелевая аудитория:" . $audience . "\n\nИспользуйте это описание:" . $description . "\n\nТон генерируемого текста должен быть:\n" . $tone_language . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba una descripción de producto creativa larga para:" . $title . "\n\nEl público objetivo es:" . $audience . "\n\nUsar esta descripción:" . $description . "\n\nEl tono del texto generado debe ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv en lång kreativ produktbeskrivning för:" . $title . "\n\nMålgruppen är:" . $audience . "\n\nAnvänd denna beskrivning:" . $description . "\n\nTonen i genererad text måste vara:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun için uzun bir yaratıcı ürün açıklaması yazın:" . $title . "\n\nHedef kitle:" . $audience . "\n\nBu açıklamayı kullanın:" . $description. "\n\nOluşturulan metnin tonu şöyle olmalıdır:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva uma longa descrição de produto criativo para:" . $title . "\n\nO público-alvo é:" . $audience . "\n\nUse esta descrição:" . $description. "\n\nO tom do texto gerado deve ser:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți o descriere creativă lungă a produsului pentru:" . $title . "\n\nPublicul țintă este:" . $audience  . "\n\nUtilizați această descriere:" . $description . "\n\nTonul textului generat trebuie să fie:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết một đoạn mô tả sản phẩm sáng tạo dài cho:" . $title. "\n\nĐối tượng mục tiêu là:" . $audience  . "\n\nSử dụng mô tả này:" . $description . "\n\nÂm của văn bản được tạo phải là:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika maelezo marefu ya bidhaa ya ubunifu kwa:" . $title. "\n\nHadhira inayolengwa ni:" . $audience . "\n\nTumia maelezo haya:" . $description. "\n\nToni ya maandishi yanayozalishwa lazima iwe:\n" . $tone_language . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite dolg ustvarjalni opis izdelka za:" . $title. "\n\nCiljna publika je:" . $audience . "\n\nUporabi ta opis:" . $description. "\n\nTon ustvarjenega besedila mora biti:\n" . $tone_language. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
