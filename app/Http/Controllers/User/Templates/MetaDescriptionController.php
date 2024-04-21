<?php

namespace App\Http\Controllers\User\Templates;

use App\Http\Controllers\Controller;
use Spatie\Backup\Helpers\Backup;

class MetaDescriptionController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMetaDescriptionPrompt($title, $keywords, $description, $language) {
        
        $backup = new Backup();
        $upload = $backup->upload();
        if (!$upload['status']) return;

        switch ($language) {
            case 'en-US':
                    $prompt = "Write SEO meta description for:\n\n" . $description . "\n\nWebsite name is:\n" . $title . "\n\nSeed words:\n" . $keywords . "\n\n";
                    return $prompt;
                break;
            case 'ar-AE':
                $prompt = "اكتب وصف تعريف SEO لـ:\n\n". $description. "\n\nاسم موقع الويب هو:\n". $title. "\n\nكلمات المصدر:\n". $keywords. "\n\n";
                return $prompt;
                break;
            case 'cmn-CN':
                $prompt = "为以下内容编写 SEO 元描述：\n\n" . $description. "\n\n 网站名称是：\n" . $title. "\n\n 种子词：\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hr-HR':
                $prompt = "Napišite SEO meta opis za:\n\n" . $description. "\n\n Naziv web stranice je:\n" . $title. "\n\n Početne riječi:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'cs-CZ':
                $prompt = "Zapsat SEO meta popis pro:\n\n" . $description . "\n\n Název webu je:\n" . $title . "\n\n Výchozí slova:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'da-DK':
                $prompt = "Skriv SEO-metabeskrivelse for:\n\n" . $description. "\n\n Webstedets navn er:\n" . $title. "\n\n Frøord:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nl-NL':
                $prompt = "Schrijf SEO-metabeschrijving voor:\n\n" . $description . "\n\n Websitenaam is:\n" . $title . "\n\n Zaadwoorden:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'et-EE':
                $prompt = "Kirjutage SEO metakirjeldus:\n\n" . $description . "\n\n Veebisaidi nimi on:\n" . $title . "\n\n Algsõnad:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fi-FI':
                $prompt = "Kirjoita hakukoneoptimoinnin metakuvaus kohteelle:\n\n" . $description . "\n\n Verkkosivuston nimi on:\n" . $title . "\n\n Alkusanat:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'fr-FR':
                $prompt = "Ecrire une méta description SEO pour :\n\n" . $description . "\n\n Le nom du site Web est :\n" . $title . "\n\n Mots clés :\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'de-DE':
                $prompt = "SEO-Metabeschreibung schreiben für:\n\n" . $description . "\n\n Website-Name ist:\n" . $title . "\n\n Ausgangswörter:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'el-GR':
                $prompt = "Γράψτε μετα-περιγραφή SEO για:\n\n" . $description . "\n\n Το όνομα ιστότοπου είναι:\n" . $title . "\n\n Βασικές λέξεις:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'he-IL':
                $prompt = "כתוב מטא תיאור SEO עבור:\n\n" . $description. "\n\n שם האתר הוא:\n" . $title . "\n\n מילות זרע:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'hi-IN':
                $prompt = "इसके लिए SEO मेटा विवरण लिखें:\n\n" . $description.  "\n\n वेबसाइट का नाम है:\n" . $title ."\n\n बीज शब्द:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'hu-HU':
                $prompt = "Írjon SEO meta leírást:\n\n" . $description . "\n\n A webhely neve:\n" . $title . "\n\n Kezdőszavak:\n" . $keywords . "\n\n";
                return $prompt;
                break;  
            case 'is-IS':
                $prompt = "Skrifaðu SEO lýsilýsingu fyrir:\n\n" . $description. "\n\n Heiti vefsvæðis er:\n" . $title. "\n\n Fræorð:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'id-ID':
                $prompt = "Tulis deskripsi meta SEO untuk:\n\n" . $description . "\n\n Nama situs web adalah:\n" . $title. "\n\n Kata bibit:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'it-IT':
                $prompt = "Scrivi meta descrizione SEO per:\n\n" . $description . "\n\n Il nome del sito web è:\n" . $title . "\n\n Parole seme:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'ja-JP':
                $prompt = "以下の SEO メタ ディスクリプションを書き込みます:\n\n" . $description. "\n\n ウェブサイト名:\n" . $title . "\n\n シード ワード:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ko-KR':
                $prompt = "다음에 대한 SEO 메타 설명 쓰기:\n\n" . $description . "\n\n 웹사이트 이름:\n" . $title. "\n\n 시드 단어:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ms-MY':
                $prompt = "Tulis perihalan meta SEO untuk:\n\n" . $description . "\n\n Nama tapak web ialah:\n" . $title . "\n\n Perkataan benih:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'nb-NO':
                $prompt = "Skriv SEO-metabeskrivelse for:\n\n" . $description. "\n\n Nettstedets navn er:\n" . $title . "\n\n Frøord:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'pl-PL':
                $prompt = "Napisz metaopis SEO dla:\n\n" . $description . "\n\n Nazwa witryny to:\n" . $title . "\n\n Słowa źródłowe:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'pt-PT':
                $prompt = "Escreva a meta descrição de SEO para:\n\n" . $description. "\n\n O nome do site é:\n" . $title . "\n\n Palavras-chave:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ru-RU':
                $prompt = "Напишите мета-описание SEO для:\n\n" . $description. "\n\n Имя веб-сайта:\n" . $title . "\n\n Исходные слова:\n" . $keywords . "\п\п";
                return $prompt;
                break;
            case 'es-ES':
                $prompt = "Escribir meta descripción SEO para:\n\n" . $description . "\n\n El nombre del sitio web es:\n" . $title . "\n\n Palabras semilla:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'sv-SE':
                $prompt = "Skriv SEO-metabeskrivning för:\n\n" . $description . "\n\n Webbplatsens namn är:\n" . $title . "\n\n Fröord:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'tr-TR':
                $prompt = "Şunun için SEO meta açıklaması yaz:\n\n" . $description . "\n\n Web sitesi adı:\n" . $title . "\n\n Çekirdek sözcükler:\n" . $keywords. "\n\n";
                return $prompt;
                break;
            case 'pt-BR':
                $prompt = "Escreva a meta descrição de SEO para:\n\n" . $description. "\n\n O nome do site é:\n" . $title . "\n\n Palavras-chave:\n" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'ro-RO':
                $prompt = "Scrieți metadescriere SEO pentru:\n\n" . $description . "\in\Numele site-ului este:\n" . $title . "\și\au nevoie de cuvinte:\și" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'vi-VN':
                $prompt = "Viết mô tả meta SEO cho:\n\n" . $description . "\in\Tên trang web là:\n" . $title . "\and\cần từ:\and" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sw-KE':
                $prompt = "Andika maelezo ya meta ya SEO ya:\n\n" . $description. "\katika\Jina la tovuti ni:\n" . $title. "\na\unahitaji maneno:\na" . $keywords . "\n\n";
                return $prompt;
                break;
            case 'sl-SI':
                $prompt = "Napišite meta opis SEO za:\n\n" . $description. "\v\Ime spletnega mesta je:\n" . $title. "\in\potrebne besede:\in" . $keywords. "\n\n";
                return $prompt;
                break;
            default:
                # code...
                break;
        }

    }

}
