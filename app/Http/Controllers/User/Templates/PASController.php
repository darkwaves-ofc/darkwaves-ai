<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class PASController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPASPrompt($title, $audience, $description, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write problem-agitate-solution for the following product description:\n\n" . $description . "\n\nProduct name:\n" . $title . "\n\nTarget audience:\n" . $audience . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب حل المشكلات لوصف المنتج التالي:\n\n". $description. "\n\n اسم المنتج و". $title. "\n\n الجمهور المستهدف: \n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下产品描述编写问题解决方案：\n\n" . $description. "\in\Product name:\and" . $title. "\nn\目标受众：\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite problem-agitate-solution za sljedeći opis proizvoda:\n\n" . $description. "\u\Naziv proizvoda:\i" . $title. "\nn\Ciljana publika:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Napište problém-agitovat-řešení pro následující popis produktu:\n\n" . $description . "\in\Název produktu:\and" . $title . "\nn\Cílové publikum:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv problem-agitere-løsning til følgende produktbeskrivelse:\n\n" . $description. "\i\Produktnavn:\og" . $title. "\nn\Målgruppe:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf probleem-agitatie-oplossing voor de volgende productbeschrijving:\n\n" . $description . "\in\Productnaam:\en" . $title . "\nn\Doelgroep:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage probleem-agitate-lahendus järgmisele tootekirjeldusele:\n\n" . $description . "\in\Toote nimi:\ja" . $title . "\nn\Sihtpublik:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita ongelma-agitate-ratkaisu seuraavaan tuotekuvaukseen:\n\n" . $description . "\in\Tuotteen nimi:\ja" . $title . "\nn\Kohdeyleisö:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Écrivez problem-agitate-solution pour la description de produit suivante :\n\n" . $description . "\in\Nom du produit :\et" . $title . "\nn\Public cible :\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Problem-agitate-solution für die folgende Produktbeschreibung schreiben:\n\n" . $description . "\in\Produktname:\und" . $title . "\nn\Zielgruppe:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε πρόβλημα-ανακίνηση-λύση για την ακόλουθη περιγραφή προϊόντος:\n\n" . $description . "\in\Product name:\and" . $title . "\n\Στοχευόμενο κοινό:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב פתרון לבעיה-ערעור עבור תיאור המוצר הבא:\n\n" . $description . "\in\שם המוצר:\and" . $title . "\nn\קהל יעד:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "निम्नलिखित उत्पाद विवरण के लिए समस्या-आंदोलन-समाधान लिखें:\n\n".$description."\in\Product name:\and".$title. "\n\लक्षित दर्शक:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon probléma-agitáció-megoldást a következő termékleíráshoz:\n\n" . $description . "\in\Terméknév:\és" . $title . "\nn\Célközönség:\n" . $audience . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu vandamál-agitate-lausn fyrir eftirfarandi vörulýsingu:\n\n" . $description. "\in\Vöruheiti:\og" . $title. "\nn\Markhópur:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis problem-agitate-solution untuk deskripsi produk berikut:\n\n" . $description . "\in\Nama produk:\dan" . $title . "\nn\Audiens target:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi problem-agitate-solution per la seguente descrizione del prodotto:\n\n" . $description . "\in\Nome prodotto:\e" . $title . "\nn\Pubblico di destinazione:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "次の製品説明について、問題 - 扇動 - 解決策を書いてください:\n\n" . $description. "\in\商品名:\and" . $title. "\nn\対象視聴者:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음 제품 설명에 대한 문제-동요-해결책 쓰기:\n\n" . $description. "\in\제품 이름:\및" . $title . "\nn\대상:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis problem-agitate-solution untuk penerangan produk berikut:\n\n" . $description . "\dalam\Nama produk:\dan" . $title . "\nn\Khalayak sasaran:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv problem-agitere-løsning for følgende produktbeskrivelse:\n\n" . $description. "\i\Produktnavn:\og" . $title . "\nn\Målgruppe:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Napisz problem-agitate-solution dla następującego opisu produktu:\n\n" . $description . "\w\Nazwa produktu:\i" . $title. "\nn\Docelowi odbiorcy:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escrever problema-agitar-solução para a seguinte descrição do produto:\n\n" . $description. "\no\Nome do produto:\e" . $title . "\nn\Público-alvo:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите проблему-агитация-решение для следующего описания продукта:\n\n" . $description . "\in\Название продукта:\и" . $title . "\nn\Целевая аудитория:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escriba problema-agitación-solución para la siguiente descripción del producto:\n\n" . $description . "\en\Nombre del producto:\y" . $title. "\nn\Audiencia objetivo:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv problem-agitera-lösning för följande produktbeskrivning:\n\n" . $description . "\i\Produktnamn:\och" . $title . "\nn\Målgrupp:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Aşağıdaki ürün açıklaması için problem-ajitasyon-çözüm yazın:\n\n" . $description."\in\Ürün adı:\ve" . $title. "\nn\Hedef kitle:\n" . $audience . "\n\n";
                return $prompt;
                break;
			case 'pt-BR':
                $prompt = "Escrever problema-agitar-solução para a seguinte descrição do produto:\n\n" . $description. "\no\Nome do produto:\e" . $title. "\nn\Público-alvo:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți problem-agitate-solution pentru următoarea descriere a produsului:\n\n" . $description . "\în\Nume produs:\și" . $title . "\nn\Public țintă:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết giải pháp kích động vấn đề cho phần mô tả sản phẩm sau:\n\n" . $description . "\in\Tên sản phẩm:\và" . $title. "\nn\Đối tượng mục tiêu:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika utatuzi wa tatizo kwa maelezo yafuatayo ya bidhaa:\n\n" . $description. "\katika\Jina la bidhaa:\na" . $title. "\nn\Hadhira lengwa:\n" . $audience . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite problem-agitate-solution za naslednji opis izdelka:\n\n" . $description. "\v\Ime izdelka:\in" . $title. "\nn\Ciljna publika:\n" . $audience . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
