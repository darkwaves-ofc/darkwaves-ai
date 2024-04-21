<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class ProductNameGeneratorController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductNameGeneratorPrompt($keywords, $description, $language) {

        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Create creative product names: " . $description . "\n\nSeed words: " . $keywords . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "إنشاء أسماء المنتجات الإبداعية:". $description. "\n\n كلمات المصدر:".$keywords. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "创建有创意的产品名称：". $description. "\n\n种子词：" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Stvorite kreativne nazive proizvoda: ". $description. "\n\nPočetne riječi: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Vytvořit názvy kreativních produktů: " . $description . "\n\nVýchozí slova: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Opret kreative produktnavne: " . $description. "\n\nSeed ord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Creëer creatieve productnamen: ". $description. "\n\nZaalwoorden: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Loo loomingulised tootenimed: " . $description . "\n\nAlgussõnad: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Luo luovia tuotenimiä: " . $description . "\n\nSiemensanat: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Créer des noms de produits créatifs : " . $description . "\n\nMots clés : " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "Kreative Produktnamen erstellen: " . $description . "\n\nStartwörter: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Δημιουργία δημιουργικών ονομάτων προϊόντων: " . $description . "\n\nΔείτε λέξεις: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "צור שמות מוצרים יצירתיים: " . $description . "\n\nמילות הזרע: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "रचनात्मक उत्पाद नाम बनाएँ:" . $description .  "\n\nबीज शब्द:" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Kreatív terméknevek létrehozása: " . $description . "\n\nKiinduló szavak: " . $keywords . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Búa til skapandi vöruheiti: " . $description. "\n\nSeed orð: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Buat nama produk kreatif: " . $description . "\n\nBenih kata: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Crea nomi di prodotti creativi: " . $description . "\n\nParole iniziali: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "クリエイティブな商品名を作成する: " . $description. "\n\nシード ワード: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "창의적인 제품 이름 만들기: " . $description . "\n\n시드 단어: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Buat nama produk kreatif: " . $description . "\n\nPerkataan benih: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Lag kreative produktnavn: " . $description . "\n\nSeed ord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt =  "Utwórz kreatywne nazwy produktów:" . $description . "\n\nSłowa źródłowe: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Criar nomes de produtos criativos: " . $description. "\n\nPalavras iniciais: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Создайте креативные названия продуктов: " . $description . "\n\nИсходные слова: " . $keywords . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Crear nombres de productos creativos: " . $description . "\n\nPalabras semilla: " . $keywords. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skapa kreativa produktnamn: " . $description . "\n\nFröord: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Yaratıcı ürün adları oluşturun: " . $description. "\n\nÖz sözcükler: " . $keywords ."\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Criar nomes de produtos criativos: " . $description. "\n\nPalavras iniciais: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Creați nume de produse creative: " . $description . "\n\nCuvinte semințe: " . $keywords  . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Tạo tên sản phẩm sáng tạo: " . $description . "\n\nTừ giống: " . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Unda majina ya ubunifu ya bidhaa: ". $description. "\n\nManeno ya mbegu: " . $keywords  . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Ustvarite ustvarjalna imena izdelkov: ". $description. "\n\nSemenske besede: " . $keywords . "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
